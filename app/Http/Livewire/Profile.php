<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\userPost;

class Profile extends Component
{
    public $posted_by;
    public $postedProfile_id;
    public $content;
    
    public function resetData(){
        $this->content = '';
    }

    public function store(){
        userPost::create([
            'profile_id' => $this->postedProfile_id,
            'posted_by' => $this->posted_by,
            'like' => array(),
            'post_content' =>$this->content,
            'comments' =>array()
        ]);
        $this->emit('postStored');
    }

    public function render()
    {
        return view('livewire.postView');
    }
    
}
