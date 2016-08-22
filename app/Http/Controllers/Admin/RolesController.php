<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Role;

class RolesController extends Controller
{
    public function index()
    {
        $roles = Role::all();
        return view ('admin\roles', ['roles' => $roles]);
    }

    public function store(Request $request)
    {
        $role = new Role();
        $role->name = $request->name;
        $role->label = $request->label;
        $role->save();

        return redirect()->action('Admin\RolesController@index');
    }

/*    public function show($id)
    {
        $role = Role::find($id);

        if ($role) {
            return view('admin.roles', ['role' => $role]);
        }
        else {
            return 'No such role';
        }
    }*/

    public function update( Request $request, $id)
    {
        //dd($id);
        $role = Role::find($id);

        $role->name = $request->name;
        $role->label = $request->label;

        $role->save();

        return redirect()->action('Admin\RolesController@index');
    }

    public function destroy($id)
    {
         $roles = Role::find($id);

         if ($roles->id != 1) {
             $roles->delete();
             return redirect()->action('Admin\RolesController@index');
         }
         else {
             return redirect()->action('Admin\RolesController@index')->with('error', 'Something went wrong.');;
         }
    }
}
