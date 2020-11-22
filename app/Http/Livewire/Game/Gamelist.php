<?php

namespace App\Http\Livewire\Game;

use Livewire\Component;
use App\Models\gameCRUD;

class Gamelist extends Component
{
    public $gamedata,$games,$game_search;
    protected $listeners = [
        'gameSearch'
    ];
    public function gameSearch($game_search){
        $this->game_search = $game_search;
    }
    public function render()
    {   
        if($this->game_search == null){
        $game_id = array();
        foreach($this->gamedata as $dataTemp){
            array_push($game_id,$dataTemp->id);
        }
        $this->games = gameCRUD::whereIn('_id',$game_id)->get();
        }else{
        $this->games = gameCRUD::whereRaw(array('$text' => array('$search' => $this->game_search)                            
        ))->get();
        }
        return view('livewire.game.gamelist');
    }
}
