<?php

namespace App\Http\Livewire\Game;

use Livewire\Component;
use App\Models\gameUser;

class ShowGame extends Component
{
    public $game,$dataBar,$selected,$star_rating;

    public function showReview(){
       $this->selected = true;
    }

    public function render()
    {
        return view('livewire.game.show-game');
    }
}
