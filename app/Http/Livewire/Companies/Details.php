<?php

namespace App\Http\Livewire\Companies;

use App\Models\Company;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\WithFileUploads;


class Details extends Component
{
    use WithFileUploads;
    use WithPagination;

    protected $listeners = ['deleteConfirmed' => 'deleteData'];
    public $name, $country, $logo, $updateData = false, $addData = false, $dataId = null;
    public $serviceTypeId;
    public $status = 1; 
    public $image;

    public function render()
    {

        return view('livewire.companies.details', [
            'companies' => Company::paginate(20),
        ]);
    }

    public function changeStatus($id)
    {
        // Find the destination with the given ID
        $serviceType = Company::find($id);

        // Update the status of the destination
        $serviceType->status = !$serviceType->status;
        $serviceType->save();

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
            'image' => 'required',
           
        ]);
    
        if($this->image){
            if(!is_string($this->image)){
                $save = $this->image->store('images', 'public');
                $validatedData['image'] = $save;
            }
        }
        
        try {
            Company::create($validatedData);
            $this->dispatchBrowserEvent('show-create-success');
            $this->resetFields();
            $this->addData = false;
        } catch (\Exception $ex) {
            $this->dispatchBrowserEvent('show-create-error');
        }
    }


    public function editPost($id)
    {
        try {
            $serviceType = Company::findOrFail($id);
            if (!$serviceType) {
                $this->dispatchBrowserEvent('show-update-error');
                //   session()->flash('error','Post not found');
            } else {
                $this->name = $serviceType->name;
               
                $this->serviceTypeId = $serviceType->id;
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

        try {
            Company::whereId($this->serviceTypeId)->update($validatedData);
            $this->dispatchBrowserEvent('show-update-success');
            $this->resetFields();
            $this->updateData = false;
        } catch (\Exception $ex) {
            $this->dispatchBrowserEvent('show-update-error');
        }
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
        $data = Company::findOrFail($this->dataId);
        $data->delete();
        $this->dispatchBrowserEvent('deleted');
        $this->resetPage();
    }

    public function viewData($id)
    {
        try {
            return redirect()->route('view.manufacture', ['id' => $id, 'viewflag' => 1]);
        } catch (\Exception $ex) {
            session()->flash('error', 'Something goes wrong!!');
        }
    }
}
