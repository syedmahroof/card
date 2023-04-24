<?php

namespace App\Http\Livewire\Products;

use App\Models\Project;
use App\Models\Category;
use App\Models\Product;
use App\Models\Transaction;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\WithFileUploads;


class Details extends Component
{
    use WithFileUploads;
    use WithPagination;

    protected $listeners = ['deleteConfirmed' => 'deleteData'];
    public $title, $updateData = false, $updateStock = false, $addData = false, $dataId = null;
    public $productId;
    public $category_id;
    public $tag_line;
    public $categories;
    public $projects;
    public $type;
    public $project_id;
    public $image;
    public $stock;
    public $value;
    public $price;
    public $key_itineraries;
    public $location;
    public $status = 1;
    public $features = [];
    public $itineraries = [];
    public $inclusions = [];
    public $exclusions = [];
    public $destination_id;

    public function render()
    {
        return view('livewire.products.details', [
            'products' => Product::paginate(20),
        ]);
    }

    public function resetFields()
    {
        $this->title = '';
      
        $this->tag_line = '';
        $this->price = '';
    
        $this->features = [];
        $this->itineraries = [];
        $this->inclusions = [];
        $this->exclusions = [];
    }

    public function changeStatus($id)
    {
        // Find the destination with the given ID
        $service = Product::find($id);

        // Update the status of the destination
        $service->status = !$service->status;
        $service->save();

        // Refresh the page to show the updated status
        $this->mount();
    }

    public function addFeature()
    {
        $this->features[] = '';
    }

    public function removeFeature($index)
    {
        array_splice($this->features, $index, 1);
    }

    public function addItinerary()
    {
        $this->itineraries[] = '';
    }

    public function addExclusion()
    {
        $this->exclusions[] = '';
    }

    public function addInclusion()
    {
        $this->inclusions[] = '';
    }

    public function removeItinerary($index)
    {
        array_splice($this->itineraries, $index, 1);
    }

    public function removeExclusion($index)
    {
        array_splice($this->itineraries, $index, 1);
    }

    public function removeInclusion($index)
    {
        array_splice($this->itineraries, $index, 1);
    }

    public function storePost()
    {
        $validatedData = $this->validate([
            'title' => 'required',
            'price' => 'required',
            'image'  => 'required',
            'category_id' => '',
         
            'key_itineraries' => '',
        ]);

        if ($this->image) {
            if (!is_string($this->image)) {
                $save = $this->image->store('images', 'public');
                $validatedData['image'] = $save;
            }
        }
        
        $validatedData['key_itineraries'] = json_encode($this->itineraries);

        // try {

        Product::create($validatedData);
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
            $service = Product::findOrFail($id);
            if (!$service) {
                $this->dispatchBrowserEvent('show-update-error');
            } else {
                
                $this->productId = $service->id;
                $this->title = $service->title;
                $this->price = $service->price;
                $this->category_id = $service->category_id;
                $this->key_itineraries = json_decode($service->key_itineraries);
                $this->itineraries  = $this->key_itineraries;

                $this->updateData();
            }
        } catch (\Exception $ex) {
            $this->dispatchBrowserEvent('show-update-error');
        }
    }

    public function updateStock($id)
    {
       
        try {
            $service = Product::findOrFail($id);
            if (!$service) {
                $this->dispatchBrowserEvent('show-update-error');
            } else {
                $this->productId = $id;
                $this->title = $service->title;
                $this->stock  = $this->stock;
                $this->updateData = false;
                $this->addData = false;
                $this->updateStock = true;
                $this->projects =  Project::whereStatus(1)->get();
                
            }
        } catch (\Exception $ex) {
            $this->dispatchBrowserEvent('show-update-error');
        }
    }

    public function updatePost()
    {
        $validatedData = $this->validate([
            'title' => 'required',
            'price' => 'required',
            'category_id' => '',
            'key_itineraries' => '',

        ]);

        if ($this->image) {
            if (!is_string($this->image)) {
                $save = $this->image->store('images', 'public');
                $validatedData['image'] = $save;
            }
        }
        $validatedData['key_itineraries'] = json_encode($this->itineraries);
        try {
            Product::whereId($this->productId)->update($validatedData);
            $this->dispatchBrowserEvent('show-update-success');
            $this->resetFields();
            $this->updateData = false;
        } catch (\Exception $ex) {
            $this->dispatchBrowserEvent('show-update-error');
        }
    }

    public function updateStockPost()
    {
        $validatedData = $this->validate([
            'value' => 'required',
            'type' => 'required',
            'project_id' => '',
        ]);
    
        $validatedData['product_id'] = $this->productId;
    
        try {
            $transaction = Transaction::create($validatedData);
            if($transaction ){
                $product = Product::find($this->productId);

                if($product){
                    if($validatedData['type'] == "in"){
                        $product->stock += $validatedData['value'];
                    }
                    else{
                        $product->stock -= $validatedData['value'];
                    }
                    $product->save();
                }
              
            }
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
        $this->updateStock = false;
        $this->resetFields();
    }

    public function addPost()
    {
        $this->resetFields();
        $this->addData = true;
        $this->updateData = false;
        $this->updateStock = false;
        $this->categories =  Category::all();
    }

    public function updateData()
    {

        $this->updateData = true;
        $this->addData = false;
        $this->updateStock = false;
        $this->categories =  Category::whereNull('parent_id')->get();
    }

    

    public function updatedServiceTypeId($value)
    {
    }

    public function confirmData($dataId)
    {
        $this->dataId = $dataId;
        $this->dispatchBrowserEvent('show-delete-confirmation');
    }

    public function deleteData()
    {
        $data = Product::findOrFail($this->dataId);
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
