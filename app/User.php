<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /*protected $table = 'users';*/
    protected $fillable = [
        'name', 'last_name', 'email', 'password', 'sex', 'country', 'phone,'
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    // user has many posts
    public function posts()
    {
        return $this->hasMany('App\Posts','author_id');
    }
}
