<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
    protected $table = 'feedbacks';

    protected $fillable = [
        'content','karma','user_id',
    ];

    // returns post of any feedback
    public function post()
    {
        return $this->belongsTo('App\Models\Insertion');
    }

    // user who has used feedback
    public function author()
    {
        return $this->belongsTo('App\User','author_id');
    }

}
