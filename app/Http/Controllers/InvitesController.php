<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Invite;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use PhpParser\Node\Expr\Array_;

class InvitesController extends Controller
{
     public function index(){
         return view('invites\create');
     }

    public function store(request $request) {
        $code = str_random(15);
        $email = $request->email;

        $invite = new Invite();
        $invite->inviter_id = Auth::user()->id;
        $invite->code = $code;
        $invite->email = $email;
        $invite->claimed = false;
        $invite->date_expired = time() + (24 * 60 * 60);
        $invite->save();

        $url = url('/').'/auth/activate?code='.$code;

        $mailSend = array(
            'from'=>'bookcrossing@administrator.com',
            'person'=>'Your friend!',
            'to'=>$email,
        );

        Mail::send('invites/email',  array('url'=>$url), function ($message)  use ($mailSend) {
            $message->from($mailSend['from'], $mailSend['person']);

            $message->to($mailSend['to']);
        });

        return view('home');
    }
}
