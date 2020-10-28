<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Image;
use Illuminate\Support\Facades\File;

class UserProfileController extends Controller
{
    public function show(){
    return view('profile', ['user' => Auth::user()] );
}
    public function update_avatar(Request $request){
    // Logic for user upload of avatar
    if($request->hasFile('avatar')){
        $avatar = $request->file('avatar');
        $filename = $request->user()->id ."." . $avatar->getClientOriginalExtension();
        $path = 'uploads/avatars/' . $filename;
        Image::make($avatar)->resize(300, 300)->save($path);
        $user = Auth::user();
        $user->avatar = $filename;
        $user->save();
    }
    return view('profile', ['user' => Auth::user()] );
}
}
