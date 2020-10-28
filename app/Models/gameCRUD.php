<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class gameCRUD extends Eloquent
{
    protected $collection = 'game';
    protected $fillable = [
        'gameName', 'picture','rating','genre','developer','ReleaseDate','summary'
    ];
}
