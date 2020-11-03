<?php

namespace App\Models;


use Jenssegers\Mongodb\Eloquent\Model as Eloquent;
class Profile extends Eloquent
{
    protected $connection = 'mongodb';
    protected $collection = 'profile';
    protected $fillable = [
        'name',
        'username',
        'user_id',
        'tgl_lahir',
        'avatar'
    ];
    public function user(){
        return $this->hasOne(User::class,'_id','user_id');
    }
}
