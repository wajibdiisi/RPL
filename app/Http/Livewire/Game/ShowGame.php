<?php

namespace App\Http\Livewire\Game;

use Livewire\Component;
use App\Models\gameUser;
use App\Models\gameCRUD;
use App\Models\Profile;
use Livewire\WithPagination;
use App\Models\Review;


class ShowGame extends Component
{
 
    public $game,$dataBar,$selected,$star_rating,$dataRating;

    public function showReview(){
       $this->selected = true;
    }

    public function render()
    {
        return view('livewire.game.show-game',[
            'reviews' => Review::where('game_id',$this->game->id)->paginate(1)
        ]);
    }
}
