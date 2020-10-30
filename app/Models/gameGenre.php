<?php

namespace App\Models;

use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class gameGenre extends Eloquent
{
    protected $connection = 'mongodb';
    protected $collection = 'game_genre';
    protected $fillable = [
        'game_id','genre_id'
    ];
    public function genre(){
        return $this->hasMany(Genre::class,'_id','genre_id');
    }
    public function game(){
        return $this->hasMany('App\Models\gameCRUD','_id','game_id');
    }
    public function games(){
        return $this->belongsToMany(gameCRUD::class);
    }
    
}
