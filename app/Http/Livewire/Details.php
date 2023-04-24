<?php

namespace App\Http\Livewire;

use App\Models\Visitor;
use Livewire\Component;

class Details extends Component
{

    public $detailsId;
    public $details;
    public $name;
    public $email;
    public $mobile;
    public $showModal = false;
    protected $listeners = [
        'ShowVisitorDetails'
    ];
    public function mount($detailsId=null){
        $this->name =""; 
        $this->email = "";
        $this->mobile = "";
        $this->detailsId = $detailsId;
    }

    public function ShowVisitorDetails($detailsId)
    {
       
        $this->mount($detailsId);
        $this->dispatchBrowserEvent('show-details-modal');
    }
    public function hideModal()
    {
        $this->showModal = false;
    }

    public function render()
    {
        return view('livewire.detail');
    }
    public function submit()
    {

        $validatedData = $this->validate([
            'name' => 'required',
            'email' => 'required',
            'mobile' => 'required',

        ]);
        $validatedData['visitor_type']="property";
        //$validatedData['property_id']= $this->detailsId;

        Visitor::create($validatedData);

        return redirect()->route('view.property.details',$this->detailsId);
    
    }
}
