<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Image;
use App\Models\User;
use App\Models\Profile;
use App\Models\userPost;
use App\Models\ProfileManager;
use Illuminate\Support\Facades\File;

class UserProfileController extends Controller
{
    public function show($id){
        
        $userView = Profile::with('profilemanager','userpost','comments')->where('user_id','=',$id)->orWhere('username','=',$id)->orWhere('_id','=',$id)->first();
        if(Auth::user()){
            $currentUser = Auth::user()->id;
            $user = Profile::with('profilemanager')->where('user_id','=',$currentUser)->first();
        }else{
            $user = '';
            $currentUser = '';
        }
        $checkUser = ProfileManager::where('profile_id','=',$userView->id)->first(); //awalnya $user->id 
        $friendArray = array();
        foreach($checkUser->friend_ids as $friendId){
            if($friendId['status'] == 'approved')
            array_push($friendArray,$friendId['id']);
        }
        
        $friendList = Profile::whereIn('_id',$friendArray)->get();
        $friendCheck = ProfileManager::where('profile_id','=',$userView->id)->where('friend_ids.id',$user->id)->exists();
        return view('profile/profile',compact('user','friendList','friendCheck','userView','currentUser'));
        //$checkUser = ProfileManager::with('profileFriend')->where('profile_id','=',$user->id)->get();
    }

   

    public function showRequest($id){
    
        $user = ProfileManager::with('embedsRequest')->where('user_id','=',Auth::user()->id)->first();
        $reqArray=array();
        foreach($user->embedsRequest as $req){
            if($req->status == 'Need Action'){
                array_push($reqArray,['id'=>$req->id,'timeAdded' =>$req->timeAdded]);
            }
        }
        $friendReq = Profile::whereIn('_id',array_column($reqArray,'id'))->get();
        return view('profile/friendRequest',compact('user','friendReq','reqArray'));
        }

    public function update_avatar(Request $request,$id){
    // Logic for user upload of avatar
       
        $updateProfile = Profile::where('_id','=',$id)->first();
        if($request->hasFile('avatar') && $updateProfile){
            $avatar = $request->file('avatar');
            $filename = $updateProfile->id ."." . $avatar->getClientOriginalExtension();
            $path = 'uploads/avatars/' . $filename;
            Image::make($avatar)->resize(300, 300)->save($path);
            $updateProfile->avatar = $filename;
            $updateProfile->save();
        }
        $unique = Profile::where('username','=',$request->get('username'))->exists();
        if(!$unique && $request->get('username')){
            $updateProfile->username = $request->get('username');
            $updateProfile->save();
            $request->session()->forget('username');
            $request->session()->put('username',$request->get('username'));
        }
        elseif($unique && $request->get('username')){
            flashy()->push('This message will be flashed.');
            return redirect()->route('profile.show',$request->session()->get('username'))->with(['error' => 'Username sudah terpakai']);
        }

        flashy()->push('This message wisss.');
    return redirect()->route('profile.show',$request->session()->get('username'))->with(['success' => 'Data berhasil diubah']);
}
}