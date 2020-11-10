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
        'avatar'
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
    public function showGame(){
        return $this->hasMany(gameUser::class,'profile_id','_id');
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
