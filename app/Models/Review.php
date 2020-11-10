<?php

namespace App\Models;

use Laravel\Scout\Searchable;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;
class Review extends Eloquent
{
    protected $connection = 'mongodb';
    protected $collection = 'review';
    protected $fillable = [
       'game_id',
       'profile_id',
       'rating',
       'review_content'
    ];
    
}
