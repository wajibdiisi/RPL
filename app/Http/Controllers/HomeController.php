<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Models\Profile;
use App\Models\ProfileManager;
use Auth;
use Image;  

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth','verified']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        $user = Profile::with('user')->where('user_id','=',Auth::user()->id)->first();
        $request->session()->put('profile_id',$user->id);
        if(!$user->username):
            $request->session()->put('username',$user->id);
            return redirect()->route('profile.show',$user->id);
        elseif($user->username) :
            $request->session()->put('username',$user->username);
            return redirect()->route('profile.show',$user->username);
        endif;
}}

