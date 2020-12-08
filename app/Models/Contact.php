<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class Contact extends Eloquent
{
    protected $connection = 'mongodb';
    protected $collection = 'Contact';
    protected $fillable = [
        'contact_name','user_list'
    ];
    public function userlist(){
        return $this->belongsToMany(Profile::class,null,'contact_list','user_list');
    }
}
