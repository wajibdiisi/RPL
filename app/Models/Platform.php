<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class Platform extends Eloquent
{
    protected $connection = 'mongodb';
    protected $collection = 'platform';
    protected $fillable = [
        'title',
        'game_ids',
        'button_class',
        'i_class'
        ];
    public function game(){
        return $this->belongsToMany(gameCRUD::class,null,'platform_ids','game_ids');
    }
}
