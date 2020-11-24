<?php

namespace App\Http\Livewire\Game;

use Livewire\Component;
use App\Models\gameCRUD;
use Livewire\WithPagination;
use App\Models\Genre;


class Gamehome extends Component
{
    use WithPagination;
    public $data,$game_search,$genre,$key_genre,$sort,$genre_title,$selectedGenre,$genre_jumbotron;
    public $gamedata,$gameID;

    protected $paginationTheme = 'bootstrap';


    public function mount($selectedGenre){
        if($selectedGenre != 'all' && $selectedGenre != null){
            $this->genre_jumbotron = $selectedGenre;
           
        }
    }

    public function search_genre($id){
        $genres = Genre::find($id);
        $this->gameID = gameCRUD::with('platform')->where('genre_ids',$id)->pluck('_id');
        $this->game_search = $genres->title;
        $this->genre_jumbotron = $genres;
        $this->key_genre = $genres->title;
    }

    public function sortbyName_asc(){
        $this->gameID = $this->gamedata->sortBy("gameName")->pluck('_id');
        $this->sort = "Name, A to Z";
    }
    public function sortbyName_desc(){
        $this->gameID = $this->gamedata->sortByDesc("gameName")->pluck('_id');
        
        $this->sort = "Name, Z to A";
    }
    public function sortbyReview_desc(){
        
        $this->gameID = $this->gamedata->sortByDesc('review')->pluck('_id')->toArray();
        $this->sort = "Most Reviews";
    }
    public function sortbyReview_asc(){

        $this->gameID = $this->gamedata->sortBy('review')->pluck('_id')->toArray();
        $this->sort = "Least Review";
    }

    public function render()
    {
        if($this->game_search == null && $this->sort == null){
            $game_id = array();
            foreach($this->data as $dataTemp){
                array_push($game_id,$dataTemp->id);
            }
            $this->gamedata = gameCRUD::with('platform','review')->whereIn('_id',$game_id)->get();
            $this->gameID = $this->gamedata->pluck('id');
            }elseif($this->game_search != $this->key_genre && $this->game_search != null){
            $this->gamedata = gameCRUD::with('platform','review')->whereRaw(array('$text' => array('$search' => $this->game_search)                            
            ))->get();
            $this->gameID = $this->gamedata->pluck('id');
            }else{

            }
        $merged = collect();
        foreach($this->gameID as $id){
            $merged = $merged->merge(gameCRUD::with('platform','review')->where('_id', $id)->get());
        }
        return view('livewire.game.gamehome',[
            'games' => $merged->paginate(9)
        ]);
    }
}
