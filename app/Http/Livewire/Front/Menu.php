<?php

namespace App\Http\Livewire\Front;

use App\Models\Profile;
use App\Models\ServiceType;
use Livewire\Component;

class Menu extends Component
{

    public $email;

    public function render()
    {
       
        $profileDetails = Profile::first();
        $serviceTypes = ServiceType::whereNull('parent_id')->get();
        return view('livewire.front.menu', compact('profileDetails','serviceTypes'));
    }

}
