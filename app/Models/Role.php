<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
//Add Roles
class Role extends Model
{
    //название таблицы, с которой связана модель
    protected $table = 'roles';

    //поля, которые можно заполнять. Остальные поля заполняются автоматически
    protected $fillable = [
        'name', 'label'
    ];

    public function permissions()
    {
        return $this->belongsToMany(Permission::class);
    }

    public function givePermissionTo (Permission $permission)
    {
        return $this->permissions()->save($permission);
    }
}
