<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    protected $table = 'photos';
    protected $fillable = [
        'insertion_id','user_id','advert_id', 'url', 'main',
    ];
}
