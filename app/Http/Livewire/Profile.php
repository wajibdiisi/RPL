<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Profile extends Component
{
    public function render()
    {
        $test = 'Test test test';
        return view('livewire.profile',compact('test'));
    }
}
