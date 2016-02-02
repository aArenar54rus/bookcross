<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $table = 'comments';

    protected $fillable = [
        'content',
    ];

    // returns post of any comment
    public function post()
    {
        return $this->belongsTo('App\Models\Insertion');
    }

    // user who has commented
    public function author()
    {
        return $this->belongsTo('App\User','author_id');
    }

}
