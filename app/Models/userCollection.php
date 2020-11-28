<?php

namespace App\Models;

use Laravel\Scout\Searchable;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;
class userCollection extends Eloquent
{
    protected $connection = 'mongodb';
    protected $collection = 'userCollection';
    protected $fillable = [
       'profile_id',
       'collection_name',
       'collection_desc',
       'game_ids'
    ];

    public function profile(){
        return $this->hasOne(Profile::class,'_id','profile_id');
    }
    public function game(){
        return $this->belongsToMany(gameCRUD::class,null,'collection','game_ids');
    }
    
}
