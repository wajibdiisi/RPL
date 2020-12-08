<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class ProfileManager extends Eloquent
{
    protected $connection = 'mongodb';
    protected $collection = 'profileManager';
    protected $fillable = [
        'user_id','profile_id','friend_ids','post_ids'
    ];

    public function profile(){
        return $this->belongsTo(Profile::class,'_id','profile_id');
    }
    public function embedsRequest(){
        return $this->embedsMany(profileManager::class,'friend_ids');
    }
    public function acceptedFriend(){
        return $this->embedsMany(profileManager::class,'friend_ids')->where('status','approved');
    }
    public function embedsPost(){
        return $this->embedsMany(profileManager::class,'post_ids');
    }
    /*public function profileFriend(){
        return $this->belongsToMany(Profile::class,null,'_id','friends_ids.id');
    }*/
}
