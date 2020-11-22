<?php

namespace App\Http\Livewire\Game;

use Livewire\Component;
use App\Models\gameCRUD;

class Gamehome extends Component
{
    public $gamedata,$data,$game_search,$games;
    public function render()
    {
        if($this->game_search == null){
            $game_id = array();
            foreach($this->data as $dataTemp){
                array_push($game_id,$dataTemp->id);
            }
            $this->games = gameCRUD::with('platform')->whereIn('_id',$game_id)->get();
            }else{
            $this->games = gameCRUD::with('platform')->whereRaw(array('$text' => array('$search' => $this->game_search)                            
            ))->get();
            }
        return view('livewire.game.gamehome');
    }
}
