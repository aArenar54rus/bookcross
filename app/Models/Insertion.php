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

    /**
     * Get the comments for the insertion.
     */
    public function comments()
    {
        return $this->hasMany('App\Models\Comment');
    }

    public function author()
    {
        return $this->belongsTo('App\User','author_id');
    }
}
