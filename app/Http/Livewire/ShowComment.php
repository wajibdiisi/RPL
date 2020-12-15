<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\userPost;
use App\Models\Profile;

class ShowComment extends Component
{
    public $commentlist,$post,$currentUser_id,$comment_content,$user;
    protected $listeners = [
        'commentAdded','showComment'
    ];
    public function commentAdded(){
        
    }
    public function mount($post,$currentUser_id){
        $this->post = $post;
        $this->user = Profile::find($currentUser_id);
    }

    public function store(){
        if(!auth()->user()){
            $notification = array(
                'message' => 'You Must Login First',
                'alert-type' => 'danger'
            );
           return redirect()->route('home');
        };
        $comment = array('_id'  => new \MongoDB\BSON\ObjectID,
        'profile_id' => $this->user->id,
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
