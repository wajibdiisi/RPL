<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Profile;
use App\Models\userPost;
use Livewire\WithPagination;
use App\Models\Review;

class PostList extends Component
{
    use WithPagination;
    public $postData,$user,$profile_id,$currentUser_id,$post_id,$comment_content,$openPost_id,$reviews;
    public $confirm_action;
    public $updateMode = false;
    protected $listeners = [
        'postStored','likeStored'
    ];

    public function paginationView()
    {
        return 'vendor.livewire.bootstrap';
    }

    public function mount($profile_id,$currentUser_id){
        $this->profile_id = $profile_id;
        $this->user = Profile::find($currentUser_id);
    }
    public function postStored(){
        
    }
    public function likeStored(){

    }

    public function openComment(){
        $this->updateMode = true;
    }
    public function closeComment(){
        $this->updateMode = false;
    }
    
    public function addLike($post_id,$currentUser_id){
        if(!auth()->user()){
            $notification = array(
                'message' => 'You Must Login First',
                'alert-type' => 'danger'
            );
           return redirect()->route('home');
        };
        $postData = userPost::find($post_id);
        $postData->push('like',$currentUser_id,true);
        session()->flash('message', 'Like Added Successfully');
        $this->emit('likeStored');
    }
    public function removeLike($post_id,$currentUser_id){
        if(!auth()->user()){
            $notification = array(
                'message' => 'You Must Login First',
                'alert-type' => 'danger'
            );
           return redirect()->route('home');
        };
        $post = userPost::find($post_id);
        session()->flash('danger', 'Like Deleted Successfully');
        $post->pull('like',$currentUser_id);
        
        $this->emit('likeStored');
    }
    public function deletePost($post_id){
        $data = userPost::find($post_id);
        $data->delete();
        session()->flash('message', 'Post Deleted Successfully');
        $this->emit('postStored');
    }
    public function confirmDelete($id){
        $this->confirm_action = $id;
    }

    public function render()
    {
        $this->reviews = Review::where('profile_id',$this->profile_id)->get();
        $this->postData = userPost::where('profile_id','=', $this->profile_id)->orWhere('posted_by','=',$this->profile_id)->latest()->get();
        return view('livewire.post-list',[
            'posts' => userPost::where('profile_id','=', $this->profile_id)->orWhere('posted_by','=',$this->profile_id)->latest()->paginate(4)
        ]);
    
    }
}
