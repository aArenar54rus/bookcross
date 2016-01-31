<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Insertion extends Model
{
    /**
     * Table name
     *
     * @string table
     * */
    protected $table = 'insertions';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'description',
    ];
}
