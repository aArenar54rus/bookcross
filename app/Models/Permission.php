<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


//Add permissions for roles
class Permission extends Model
{
    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }
}
