<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class profileManager extends Eloquent
{
    protected $connection = 'mongodb';
    protected $collection = 'profileManager';
    protected $fillable = [
        'friend_ids'
    ];

    public function profile(){
        return $this->belongsTo(Profile::class,'_id','profile_id');
    }
    public function profileFriend(){
        return $this->belongsToMany(Profile::class,null,'_id','friends_ids.id');
    }
}
