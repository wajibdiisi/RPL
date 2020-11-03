<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Image;
use App\Models\User;
use App\Models\Profile;
use Illuminate\Support\Facades\File;

class UserProfileController extends Controller
{
    public function show($id){
        
        $user = Profile::with('user')->where('user_id','=',Auth::user()->id)->first();
        return view('profile/profile',compact('user'));
    }

    public function editProfile(){
        
    }
    public function update_avatar(Request $request){
    // Logic for user upload of avatar
        $updateProfile = Profile::where('_id','=',$request->session()->get('profile_id'))->first();
        if($request->hasFile('avatar')){
            $avatar = $request->file('avatar');
            var_dump($request->session()->get('profile_id'));
            $filename = $request->session()->get('profile_id') ."." . $avatar->getClientOriginalExtension();
            $path = 'uploads/avatars/' . $filename;
            Image::make($avatar)->resize(300, 300)->save($path);
            $user = Profile::find($request->session()->get('profile_id'));
            $user->avatar = $filename;
            $user->save();
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
