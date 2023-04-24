<?php

namespace App\Http\Livewire\Projects;


use App\Models\Project;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\WithFileUploads;


class Details extends Component
{
    use WithFileUploads;
    use WithPagination;

    protected $listeners = ['deleteConfirmed' => 'deleteData'];
    public $name,$description,$location, $updateData = false, $addData = false, $dataId = null;
    public $ProjectId;
    public $status = 1; // Default status is active (1)
    public $image;

    public function render()
    {
        return view('livewire.projects.details', [
            'projects' => Project::paginate(20),
        ]);
    }

    public function changeStatus($id)
    {
        // Find the Project with the given ID
        $Project = Project::find($id);

        // Update the status of the Project
        $Project->status = !$Project->status;
        $Project->save();

        // Refresh the page to show the updated status
        $this->mount();
    }


    public function resetFields()
    {
        $this->name = '';
       
    }

    public function storePost()
    {
        $validatedData = $this->validate([
            'name' => 'required',
            'location' => 'required',
           
        ]);
    
        if($this->image){
            if(!is_string($this->image)){
                $save = $this->image->store('images', 'public');
                $validatedData['image'] = $save;
            }
        }
        
        // try {
            Project::create($validatedData);
            $this->dispatchBrowserEvent('show-create-success');
            $this->resetFields();
            $this->addData = false;
        // } catch (\Exception $ex) {
        //     $this->dispatchBrowserEvent('show-create-error');
        // }
    }


    public function editPost($id)
    {
        try {
            $serviceType = Project::findOrFail($id);
            if (!$serviceType) {
                $this->dispatchBrowserEvent('show-update-error');
                //   session()->flash('error','Post not found');
            } else {
                $this->name = $serviceType->name;
                $this->location = $serviceType->location;
               
                $this->updateData = true;
                $this->addData = false;
            
            }
        } catch (\Exception $ex) {
            $this->dispatchBrowserEvent('show-update-error');
        }
    }

    public function updatePost()
    {
        $validatedData = $this->validate([
            'name' => 'required',
        ]);

        if($this->image){
            if(!is_string($this->image)){
                $save = $this->image->store('images', 'public');
                $validatedData['image'] = $save;
            }
        }


        // try {
            Project::whereId($this->ProjectId)->update($validatedData);
            $this->dispatchBrowserEvent('show-update-success');
            $this->resetFields();
            $this->updateData = false;
        // } catch (\Exception $ex) {
        //     $this->dispatchBrowserEvent('show-update-error');
        // }
    }

    public function cancelPost()
    {
        $this->addData = false;
        $this->updateData = false;
        $this->resetFields();
    }

    public function addPost()
    {
        $this->resetFields();
        $this->addData = true;
        $this->updateData = false;
    }

    public function confirmData($dataId)
    {
        $this->dataId = $dataId;
        $this->dispatchBrowserEvent('show-delete-confirmation');
    }

    public function deleteData()
    {
        $data = Project::findOrFail($this->dataId);
        $data->delete();
        $this->dispatchBrowserEvent('deleted');
        $this->resetPage();
    }

    public function viewData($id)
    {
        // try {
        return redirect()->route('view.manufacture', ['id' => $id, 'viewflag' => 1]);
        // } catch (\Exception $ex) {
        //     session()->flash('error', 'Something goes wrong!!');
        // }
    }
}
