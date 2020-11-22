<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class gameUser extends Eloquent
{
    protected $connection = 'mongodb';
    protected $collection = 'gameUser';
    protected $fillable = [
        'game_id',
        'profile_id',
        'status',
        'rating',
        'progress',
    ];
    public function gameData(){
        return $this->hasOne(gameCRUD::class,'_id','game_id');
    }
    public function profile(){
        return $this->hasOne(Profile::class,'_id','profile_id');
    }
}
