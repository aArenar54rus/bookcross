<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Invite;

class InviteRegisterController extends Controller
{
    public function index(Request $request){
        if(Invite::where('code','=', $request->code)->exists()) {
            if (Invite::where('code', $request->code)->first()->claimed == false) {
                return view('/invites/register');
            } else {
                return view('home')->with('error', 'This code has been used.');
            }
            return view('home')->with('error', 'This code does not exist.');
        }
    }

    public function store(Request $request)
    {
        $user = new \App\User();

        $user->name=$request->name;
        $user->email=$request->email;
        $user->password=bcrypt($request->password);
        $user->save();

        $invite = Invite::firstOrCreate(array('email'=>$user->email));
        $invite->claimed = 1;
        $invite->invitee_id = $user->id;
        $invite->save();

        return redirect('home');

    }
}
