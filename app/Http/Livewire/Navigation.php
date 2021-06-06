<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Meeting;

class Navigation extends Component
{
    public function render()
    {    $citas = Meeting::all();
        return view('livewire.navigation', compact('citas'));
    }
}
