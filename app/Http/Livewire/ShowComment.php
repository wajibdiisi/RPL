<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\userPost;
use App\Models\Profile;

class ShowComment extends Component
{
    public $commentlist,$post,$currentUser_id,$comment_content;
    protected $listeners = [
        'commentAdded','showComment'
    ];
    public function commentAdded(){
        
    }
    public function mount($post,$currentUser_id){
        $this->post = $post;
        $this->user = Profile::find($user_id);
    }

    public function store(){
        $comment = array('_id'  => new \MongoDB\BSON\ObjectID,
        'profile_id' => $this->user_id,
        'comment_content' => $this->comment_content,

);
        $this->post->push('comments',$comment);
    }
    
    
    public function render()
    {
        $this->commentlist = userPost::with('embedsComment')->where('_id','=',$this->post->id)->get(); 
        return view('livewire.show-comment');
    }
}
