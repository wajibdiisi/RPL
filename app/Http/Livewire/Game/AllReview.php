<?php

namespace App\Http\Livewire\Game;

use Livewire\Component;
use Livewire\WithPagination;

class AllReview extends Component
{
    use WithPagination;
    public $game,$currentUser,$key_sort,$all_review;
    protected $paginationTheme = 'bootstrap';


    public function back($id){
        return redirect()->route('game.show',$id);
    }

    public function sortbyDate_desc(){
        $this->all_review = $this->all_review->sortByDesc('created_at');
        $this->key_sort = "Newest First";
    }
    public function sortbyDate_asc(){
        $this->all_review = $this->all_review->sortBy('created_at');
        $this->key_sort = "Oldest First";
    }
    public function sortbyLike_desc(){
        $this->all_review = $this->all_review->sortByDesc('thumbsup');
        $this->key_sort ="Most Liked";
    }
    public function sortbyLike_asc(){
        $this->all_review = $this->all_review->sortBy('thumbsup');
        $this->key_sort ="Least Liked";
    }

    public function render()
    {
        if(!$this->key_sort){
            $this->all_review = $this->game->review;
        }
        return view('livewire.game.all-review',[
            'reviews' => $this->all_review->paginate(5)
        ]);
    }
}
