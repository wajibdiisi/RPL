<?php
namespace App\Helpers;
use App\Models\Profile;
use Illuminate\Support\Facades\DB;
use App\Helpers\UserHelp;
use App\Models\gameCRUD;
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
}
