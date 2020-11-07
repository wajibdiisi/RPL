<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;
class userPost extends Eloquent
{
    protected $connection = 'mongodb';
    protected $collection = 'userPost';

    protected $fillable     = [
        'profile_id','like','post_content','comments','posted_by'
    ];
    public function profile(){
        return $this->belongsTo(Profile::class,'_id','profile_id');
    }
    public function getCreatedTime(){
        return $this->created_at;
    }
    public function getUpdatedTime(){
        return $this->updated_at;
    }
    public function embedsComment(){
        return $this->embedsMany(userPost::class,'comments');
    }


}
