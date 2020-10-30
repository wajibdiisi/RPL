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
        'gameName', 'picture','rating','genre','developer','ReleaseDate','summary'
    ];
    public function game_genre(){
        return $this->hasMany(gameGenre::class,'game_id','_id');
    }
    /*public function genre(){
        return $this->belongstoMany(Genre::class,'game_genre');
    }*/
}
