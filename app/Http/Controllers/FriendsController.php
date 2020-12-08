<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Auth;
use Carbon\Carbon;
use App\Models\Profile;
use Jenssegers\Mongodb\Eloquent\SoftDeletes;
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
    public function store($id,$username,$action)
    {
        $addedFriend = Profile::where('user_id','=',$username)->orWhere('username','=',$username)->first();
        $user = Profile::where('user_id','=',$id)->orWhere('username','=',$id)->first();
        $sender = array('id'=> $addedFriend->id,'time' => Carbon::now()->toDateTimeString(),'status' => 'pending');
        $receiver = array('id' =>$user->id,'time' => Carbon::now()->toDateTimeString(),'status' => 'Need Action');
        if($action =="add"){
        ProfileManager::where('profile_id','=',$user->id)->push('friend_ids',$sender,true);
        ProfileManager::where('profile_id','=',$addedFriend->id)->push('friend_ids',$receiver,true);
        }elseif($action =="remove"){
          ProfileManager::where('profile_id','=',$user->id)->pull('friend_ids',['id' => $addedFriend->id]);
            ProfileManager::where('profile_id','=',$addedFriend->id)->pull('friend_ids',['id' => $user->id]); 
        }
        return redirect()->route('profile.show',$addedFriend->username);
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($username)
    {
        $userView = Profile::with('profilemanager')->where('user_id','=',$username)->orWhere('username','=',$username)->orWhere('_id','=',$username)->first();
        $checkUser = ProfileManager::where('profile_id','=',$userView->id)->first();
        $user = $userView;
        $friendArray = array();
        foreach($checkUser->friend_ids as $friendId){
            if($friendId['status'] == 'approved')
            array_push($friendArray,$friendId['id']);
        }
        $friendList = Profile::whereIn('_id',$friendArray)->get();
        
        $friendCheck = ProfileManager::where('user_id','=',$userView->user_id)->where('friend_ids.id',session()->get('profile_id'))->exists();
        if($userView->user_id != Auth::user()->user_id){
            return view('profile/profile',compact('user','userView','friendCheck','friendList'));
        }else{
            return redirect()->route('profile.show',$id);
        }
    }
    public function accept($id,$username){
        $user = ProfileManager::where('user_id','=',$id)->first();
        $selectedUser = Profile::where('username','=',$username)->first();
        foreach($user->friend_ids as $req){
            if($req['id'] == $selectedUser->id){
                $receiver = array();
                array_push($receiver,['id' => $req['id'],'status' => 'approved','time' => Carbon::now()->toDateTimeString()]);
                ProfileManager::where('user_id','=',$user->user_id)->pull('friend_ids',['id' =>$receiver[0]['id']]);
                ProfileManager::where('user_id','=',$user->user_id)->push('friend_ids',$receiver);
            }
        }
        $test = ProfileManager::where('profile_id','=',$selectedUser->id)->where('friend_ids.id',$user->profile_id)->first();
        foreach($test->friend_ids as $update){
            if($update['id'] == $user->profile_id){
                $sender = array();
                array_push($sender,['id' => $user->profile_id,'status' => 'approved','time' => Carbon::now()->toDateTimeString()]);
                ProfileManager::where('user_id','=',$user->user_id)->pull('friend_ids',['id' => $sender[0]['id']]);
                ProfileManager::where('profile_id','=',$selectedUser->id)->push('friend_ids',$sender);
                
            break;
            }
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
