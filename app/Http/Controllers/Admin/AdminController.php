<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\Role;
use App\Models\Permission;
class AdminController extends Controller
{
    public function index()
    {
        return view ('admin\index');
    }

    public function users()
    {
        return view ('admin\users');
    }

    public function roles()
    {
        $roles = Role::all();
        return view ('admin\roles', ['roles' => $roles]);
    }

    public function permissions()
    {
        return view ('admin\permissions');
    }



}