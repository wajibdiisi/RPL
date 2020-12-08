<?php
namespace App\Helpers;
use App\Models\Profile;
use Illuminate\Support\Facades\DB;
use App\Helpers\UserHelp;
use App\Models\gameCRUD;
use App\Models\userCollection;
use App\Models\Contact;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class UserHelp extends Eloquent {
    public static function get_username($id) {
        $user = Profile::where('username',$id)->orWhere('_id',$id)->orWhere('user_id',$id)->first();
        return (isset($user->username) ? $user->username : '');
    }
    public static function get_fullname($id) {
        $user = Profile::where('username',$id)->orWhere('_id',$id)->orWhere('user_id',$id)->first();
        return (isset($user->nama_lengkap) ? $user->nama_lengkap : '');
    }
    public static function get_avatar($id) {
        $user = Profile::where('username',$id)->orWhere('_id',$id)->orWhere('user_id',$id)->first();
        return (isset($user->avatar) ? $user->avatar : '');
    }
    public static function getProfile($id) {
        $user = Profile::where('username',$id)->orWhere('_id',$id)->orWhere('user_id',$id)->first();
        return (isset($user) ? $user : '');
    }
    public static function getID($id){
        $user = Profile::where('username',$id)->orWhere('_id',$id)->orWhere('user_id',$id)->first();
        return (isset($user->id) ? $user->id : '');
    }
    public static function getGame($id){
        $game = gameCRUD::find($id);
        return (isset($game) ? $game : '');
    } 
    public static function getGame_URL($id){
        $game = gameCRUD::find($id);
        return (isset($game->custom_url)? $game->custom_url : '');
    }

    public static function getCollection($id){
        $data = userCollection::with('game')->where('profile_id', $id)->get();
        return (isset($data) ? $data : null );
    }
    public static function getallGames(){
        $data = gameCRUD::all('_id','gameName');
        return $data;
    }
    public static function get_contact(){
        $data = Contact::all();
        return $data;
    }
}
