<?php

namespace App;

use App\Models\Role;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /*protected $table = 'users';*/
    protected $fillable = [
        'name', 'last_name', 'email', 'password', 'sex', 'country', 'phone,', 'town', 'vip', 'karma',
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
    //role for user
    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }

    public function hasRole($role)
    {
        if (is_string($role))
        {
            return $this->roles->contains('name', $role);
        }
        return !! $role->intersect($this->roles)->count();
    }
}
