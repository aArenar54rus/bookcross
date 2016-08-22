<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Permission;

class PermissionsController extends Controller
{
    public function index()
    {
        $permissions = Permission::all();
        return view ('admin\permissions', ['permissions' => $permissions]);
    }

    public function store(Request $request)
    {
        $permission = new Permission();
        $permission->name = $request->name;
        $permission->label = $request->label;
        $permission->save();

        return redirect()->action('Admin\PermissionsController@index');
    }

    public function update( Request $request, $id)
    {
        $permission = Permission::find($id);

        $permission->name = $request->name;
        $permission->label = $request->label;

        $permission->save();

        return redirect()->action('Admin\PermissionsController@index');
    }

    public function destroy($id)
    {
        $permissions = Permission::find($id);

        if ($permissions->id != 1) {
            $permissions->delete();
            return redirect()->action('Admin\PermissionsController@index');
        }
        else {
            return redirect()->action('Admin\PermissionsController@index')->with('error', 'Something went wrong.');;
        }
    }
}