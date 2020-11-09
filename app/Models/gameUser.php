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
        'id',
        'profile_id',
        'gamelist'
    ];
    public function game(){
        return $this->belongsToMany(gameCRUD::class,null,'userlist','gamelist');
    }
}
