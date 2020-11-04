<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Auth;
use Carbon\Carbon;
use App\Models\Profile;
use App\Models\ProfileManager;

class FriendsController extends Controller
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
    public function store($id,$username)
    {
        $addedFriend = Profile::where('user_id','=',$username)->orWhere('username','=',$username)->first();
        $user = Profile::where('user_id','=',$id)->orWhere('username','=',$id)->first();
        $insert = array('id'=> $addedFriend->id,'timeAdded' => Carbon::now()->toDateTimeString(),'status' => 'pending');
        $currentUser = ProfileManager::where('profile_id','=',$user->id)->push('friend_ids',$insert,true);
        return redirect()->route('friends.profile',['id'=>$user->username,'username'=>$addedFriend->username]);
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id,$username)
    {
        $user = Profile::where('username','=',$username)->orWhere('user_id','=',$username)->first();
        $currentUser = Profile::with('profilemanager')->where('user_id','=',$id)->orWhere('username','=',$id)->first();
        $friendCheck = ProfileManager::where('user_id','=',Auth::user()->id)->where('friend_ids.id',$user->id)->exists();
        if($user->user_id != Auth::user()->id){
            return view('friends/friendprofiles',compact('user','currentUser','friendCheck'));
        }else{
            return redirect()->route('profile.show',$id);
        }
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
