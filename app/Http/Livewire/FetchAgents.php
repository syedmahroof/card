<?php

namespace App\Http\Livewire;


use App\Models\User;
use Livewire\Component;

class FetchAgents extends Component
{
    public function render()
    {
        return view('livewire.fetch-agents',[
            'agents' => User::latest()->limit(12)->get(),
        ]);
    }
}
