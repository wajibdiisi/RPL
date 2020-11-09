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
        'gameName', 'picture','rating','developer','releaseDate','summary','userlist','genre_ids'
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
    public function user_list(){
        return $this->belongsToMany(gameUser::class,null,'gamelist','userlist');
    }
}
