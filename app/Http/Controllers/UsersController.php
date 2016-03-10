<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models;
use App\User;

class UsersController extends Controller
{
    public function __construct() {
        $this->middleware('auth', ['except' => [    //����������� ������� ��� ��������������������� ������������
            'index',
            'show',
        ]]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);

        if ($user) {
            return view('users.show', ['user' => $user]);
        }
        else {
            return 'This user does not exist!';
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        $user = User::find(Auth::user()->id);

        if ($user->id == Auth::user()->id) {
            return view('users.edit', ['user' => $user]);
        }
        else {
            return view('errors.503');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = User::find($id);

        /*$user->id = Auth::user()->id;  !!! Id менять категорически нельзя !!! */
        $user->name = $request->input('name');
        $user->last_name = $request->input('last_name');
        $user->email = $request->input('email');
        /*$user->password = $request->password; за смену пароля отвечает Auth/PasswordController */
        $user->sex = $request->input('sex');
        $user->phone = $request->input('phone');
        $user->country = $request->input('country');

        $user->save();

        return redirect()->action('PagesController@Index');//, [$user->id]);
    }

    public function destroy($id)
    {
        //
    }
}
