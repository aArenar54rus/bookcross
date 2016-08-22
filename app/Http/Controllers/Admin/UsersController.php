<?php

namespace App\Http\Controllers\Admin;

use App\Models\Role;
use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class UsersController extends Controller
{
    public function index()
    {
        $users = User::all();
        $roles = Role::name;
        $
        return view ('admin\users', ['users' => $users], ['roles' => $roles]);
    }

}