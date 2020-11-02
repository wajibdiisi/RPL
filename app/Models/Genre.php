<?php

namespace App\Models;

use App\Models\gameGenre;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;
use Illuminate\Support\Collection;

class Genre extends Eloquent
{
    protected $connection = 'mongodb';
    protected $collection = 'genre';
    protected $fillable = [
        'title','genreID'
    ];
    public function game_genre(){   
        return $this->hasMany('App\Models\gameGenre','genre_id','_id');
    }
    public function game(){
        return $this->belongsToMany(gameCRUD::class,null,'genre_ids','game_ids');
    }
}