<?php

namespace App\Http\Livewire\Game;

use Livewire\Component;

class ShowGame extends Component
{
    public $game,$dataBar,$selected;

    public function showReview(){
       $this->selected = true;
    }
    public function render()
    {
        return view('livewire.game.show-game');
    }
}
