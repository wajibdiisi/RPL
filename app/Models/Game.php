<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class Game extends Eloquent
{
    protected $connection = 'mongodb';
    protected $collection = 'game';
    protected $fillable = [
        'gameName', 'picture','rating','developer','releaseDate','summary','userlist','genre_ids','userfav','custom_url','view_counter','wishlist'
    ];
    public function game_genre(){
        return $this->hasMany(gameGenre::class,'game_id','_id');
    }
    /*public function genre(){
        return $this->belongsto(Genre::class,'game_genre');
    }*/
    public function genre(){
        return $this->belongsToMany(Genre::class,null,'game_ids','genre_ids');
    }
    public function gameUser(){
        return $this->hasOne(gameUser::class,'game_id','_id');
    }
    public function user_favourite(){
        return $this->belongsToMany(Profile::class,'null','favourite_game','userfav');
    }
}
