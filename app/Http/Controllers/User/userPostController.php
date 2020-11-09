<?php

namespace App\Http\Controllers\User;
use App\Http\Controllers\Controller;
use App\Models\userPost;
use App\Helpers\UserHelp;
use Illuminate\Http\Request;

class userPostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,$id,$posted_by)
    {
        
        userPost::create([
            'profile_id' => $id,
            'posted_by' => $posted_by,
            'post_content' => $request->get('content'),
            'like' => array(),
            'comments' =>array()
        ]);
        /*$post = new userPost;
        $post->profile_id = $id;
        $post->post_content = $request->get('content');
        $post->like = array();
        $post->save();
        */
        return redirect()->route('profile.show',UserHelp::get_username($id));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }
    public function addLike($post_id,$id){
        $post = userPost::find($post_id);
        $post->push('like',$id);
        return redirect()->route('profile.show',$post->profile_id);
    }
    public function removeLike($post_id,$id){
        $post = userPost::find($post_id);
        $post->pull('like',$id);
        return redirect()->route('profile.show',$post->profile_id);   
    }
    public function addComment(Request $request,$post_id,$id){
        $post = userPost::find($post_id);
        $comment = array('_id'  => new \MongoDB\BSON\ObjectID,
                                'profile_id' => $id,
                                'comment_content' => $request->get('comment_content')

    );
        $post->push('comments',$comment);
        return redirect()->route('profile.show',$post->profile_id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
