<?php

namespace App\Models;

use Laravel\Scout\Searchable;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;
class Profile extends Eloquent
{
    protected $connection = 'mongodb';
    protected $collection = 'profile';
    protected $fillable = [
        'nama_lengkap',
        'username',
        'user_id',
        'tgl_lahir',
        'avatar',
        'favourite_game',
        'last_seen',
        'game_wishlist'
    ];
    public function user(){
        return $this->hasOne(User::class,'_id','user_id');
    }
    public function profilemanager(){
        return $this->hasOne(ProfileManager::class,'profile_id','_id');
    }
    public function userpost(){
        return $this->hasMany(userPost::class,'profile_id','_id')->orderBy('created_at','DESC');
    }
    public function comments(){
        return $this->embedsMany(userPost::class,'_id');
    }
    public function game(){
        return $this->hasMany(gameCRUD::class,'userlist.profile_id','_id');
    }
    public function game_favourite(){
        return $this->belongsToMany(gameCRUD::class,null,'userfav','favourite_game');
    }
    public function showFavourite(){
        return $this->belongsToMany(gameCRUD::class,null,'userfav','favourite_game');
    }
    public function gameCollection(){
        return $this->hasMany(gameUser::class,'profile_id','_id');
    }
    public function gameWishlist(){
        return $this->belongsToMany(gameCRUD::class,null,'wishlist','game_wishlist');
    }
    /*public function searchableAs(){
        return 'mygame';
    }
    public function toSearchableArray()
    {
        $array = $this->only('nama_lengkap','username');
        return $array;
    }*/
}
