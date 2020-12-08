<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Models\Profile;
use App\Models\ProfileManager;
use App\Rules\MatchOldPassword;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\User;
use App\Helpers\UserHelp;
use Illuminate\Support\Facades\Validator;
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
}
    public function changePassword(Request $request){
        $validator = Validator::make($request->all(),[
            'current_password' =>['required', new MatchOldPassword],
            'new_password' => 'required|min:8|string',
            'new_confirm_password' => 'same:new_password',
        ]);
        if($validator->fails()){
            Alert::error("New Password doesn't match");
            return redirect()->route('profile.show', UserHelp::get_username(auth()->user()->id));
        }else{
        User::find(auth()->user()->id)->update(['password'=> Hash::make($request->new_password)]);
        Alert::success('Password Changed');
        return redirect()->route('profile.show', UserHelp::get_username(auth()->user()->id));
        }
    }
    

}

