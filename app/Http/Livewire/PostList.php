<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Profile;
use App\Models\userPost;
class PostList extends Component
{
    public $posts,$user,$profile_id,$user_id;
    protected $listeners = [
        'postStored'
    ];
   
    public function mount($profile_id,$user_id){
        $this->profile_id = $profile_id;
        $this->user = Profile::find($user_id);
    }
    public function postStored(){
        
    }

    
    public function render()
    {
        $this->posts = userPost::where('profile_id','=', $this->profile_id)->latest()->get();
        return view('livewire.post-list');
    
    }
}