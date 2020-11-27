<?php

namespace App\Http\Livewire\Game;

use Livewire\Component;
use App\Models\gameCRUD;
use Livewire\WithPagination;
use App\Models\Genre;
use App\Models\Platform;


class Gamehome extends Component
{
    use WithPagination;
    public $data,$game_search,$genre,$key_genre,$sort,$genre_title,$selectedGenre,$genre_jumbotron,$sort_genre,$type;
    public $gamedata,$gameID,$platforms,$platforms_id;

    protected $paginationTheme = 'bootstrap';


    public function mount($selectedGenre){
        if($selectedGenre != 'all' && $selectedGenre != null){
            $this->genre_jumbotron = $selectedGenre;
           
        }
    }
    public function reset_genre(){
        $id_genre =  "all";
        $this->search_genre($id_genre);
    }

    public function search_platform($id){
        if($id === "all"){
            $this->reset('platforms_id');
        }else{
            $this->platforms_id = Platform::find($id);
        
        }
    }

    public function search_genre($id){
        if($id == "all"){
            $this->gamedata = gameCRUD::all();
            $this->reset('genre_jumbotron');
            $this->reset('key_genre');
            $this->reset('game_search');

        }else{
        $genres = Genre::find($id);
        $this->gamedata = gameCRUD::with('platform')->where('genre_ids',$id)->get();
        $this->game_search = $genres->title;
        $this->genre_jumbotron = $genres;
        $this->key_genre = $genres->title;
        }
        if($this->type == "ascending"){
            $this->gamedata = $this->gamedata->sortBy($this->sort_genre);
        }elseif($this->type == "descending"){
            $this->gamedata = $this->gamedata->sortByDesc($this->sort_genre);
        }
        $this->gameID = $this->gamedata->pluck('_id');
        
    }

    public function sortbyName_asc(){
        $this->gameID = $this->gamedata->sortBy("gameName")->pluck('_id');
        $this->sort = "Name, A to Z";
        $this->type = "ascending";
        $this->sort_genre = "gameName";
    }
    public function sortbyName_desc(){
        $this->gameID = $this->gamedata->sortByDesc("gameName")->pluck('_id');
        $this->sort = "Name, Z to A";
        $this->type = "descending";
        $this->sort_genre = "gameName";
    }
    public function sortbyReview_desc(){
        
        $this->gameID = $this->gamedata->sortByDesc('review')->pluck('_id')->toArray();
        $this->sort = "Most Reviews";
        $this->type = "descending";
        $this->sort_genre = "review";
    }
    public function sortbyReview_asc(){
        
        $this->gameID = $this->gamedata->sortBy('review')->pluck('_id')->toArray();
        $this->sort = "Most Reviews";
        $this->type = "ascending";
        $this->sort_genre = "review";
    }

    public function sortbyView_desc(){
        $this->gameID = $this->gamedata->sortByDesc('view_counter')->pluck('_id')->toArray();
        $this->sort = "Most Views";
        $this->type = "descending";
        $this->sort_genre = "view_counter";
    }
    


    public function sortbyView_asc(){

        $this->gameID = $this->gamedata->sortBy('view_counter')->pluck('_id')->toArray();
        $this->sort = "Least Review";
        $this->type = "ascending";
        $this->sort_genre = "view_counter";
    }

    public function render()
    {
        $this->platforms = Platform::all();
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
            }elseif($this->sort != null){
                
            }
        $merged = collect();
        foreach($this->gameID as $id){
            if($this->platforms_id != null)
            $merged = $merged->merge(gameCRUD::with('platform','review')->where('_id', $id)->where('platform_ids',$this->platforms_id->id)->get());
            else
            $merged = $merged->merge(gameCRUD::with('platform','review')->where('_id', $id)->get());
        }
        return view('livewire.game.gamehome',[
            'games' => $merged->paginate(9)
        ]);
    }
}
