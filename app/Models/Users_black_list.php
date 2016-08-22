<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Users_black_list extends Model
{
    protected $table = 'users_black_list';
    protected $fillable = [
        'user_id','banned', 'description', 'Blacklist_off_time',
    ];
}
