<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Insertion extends Model
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];

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
