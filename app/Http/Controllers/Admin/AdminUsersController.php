<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;
use App\Models\Users_black_list;

class AdminUsersController extends Controller
{
    public function index()
    {
        $users = User::all();
        $users_black_list = Users_black_list::all();

        $viewModel = [
            'userID', 'userName', 'userSecondName', 'roleName',
        ];
        $viewModel['userId'] = $users->id; /*$users['id'];*/
        $viewModel['userName'] = $users->name;/*$users['name'];*/
        $viewModel['userSecondName'] = $users->last_name;/*$users['last_name'];*/
       /* if ($users['id'] == $users_black_list['user_id']) {*/
        if ($users->id == $users_black_list->user_id){
            $viewModel['roleName'] = $users_black_list->name;/*$users_black_list['name'];*/
        }

        return view ('admin\users', ['viewModel' => $viewModel]);
    }




/*    public function store(Request $request)
    {
        $role = new Role();
        $role->name = $request->name;
        $role->label = $request->label;
        $role->save();

        return redirect()->action('Admin\RolesController@index');
    }

        public function show($id)
        {
            $role = Role::find($id);

            if ($role) {
                return view('admin.roles', ['role' => $role]);
            }
            else {
                return 'No such role';
            }
        }

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
    }*/
}
