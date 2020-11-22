<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class gameCRUD extends Eloquent
{
    protected $connection = 'mongodb';
    protected $collection = 'game';
    protected $fillable = [
        'gameName', 'picture','rating','developer','releaseDate','summary','genre_ids','rec_requirement','min_requirement','platform'
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
    public function platform(){
        return $this->belongsToMany(Platform::class,null,'game_ids','platform_ids');
    }
    public function profile(){
        return $this->belongsTo(Profile::class,'_id');
    }
    public function embedsUser(){
        return $this->embedsMany(gameCRUD::class,'userlist');
    }
    public function gameUser(){
        return $this->hasMany(gameUser::class,'game_id','_id');
    }
    public function review(){
        return $this->hasMany(Review::class,'game_id','_id');
    }
    public function favUser(){
        return $this->belongsToMany(Profile::class,null,'favourite_game','userfav');
    }
    
}
