<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\userPost;
use App\Models\Review;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Profile extends Component
{
    use AuthorizesRequests;
    public $posted_by;
    public $postedProfile_id;
    public $content;
    public $post;
    public $currentUser_id;
    public $reviews;
    public $userView;
    
    public function resetData(){
        $this->content = '';
    }
    public function mount(userPost $post){
        $this->post = $post;
    }

    public function store(userPost $post){
        
        if(!auth()->user()){
            $notification = array(
                'message' => 'You Must Login First',
                'alert-type' => 'danger'
            );
           return redirect()->route('home');
        };

        userPost::create([
            'profile_id' => $this->postedProfile_id,
            'posted_by' => $this->posted_by,
            'like' => array(),
            'post_content' =>$this->content,
            'comments' =>array()
        ]);
        session()->flash('message', 'Post Created Successfully');
        $this->emit('postStored');
    }

   

    public function render()
    {
        $this->reviews = Review::where('profile_id',$this->postedProfile_id)->get();
        return view('livewire.postView');
    }
    
}
