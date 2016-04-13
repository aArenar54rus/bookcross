<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
/*use App\Http\Controllers\Input;*/
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redirect;

class EmailController extends Controller
{
    public function showForm()
    {
        return View::make('about');
    }

    public function handleFormPost()
    {
        /*$name = Input::get('name');
        $email = Input::get('email');
        $message = Input::get('mgs');*/

        $input = Input::only('name', 'email', 'msg');

        $validator = Validator::make($input,
            array(
                'name' => 'required',
                'email' => 'required|email',
                'msg' => 'required',
            )
        );

        if ($validator->fails()) {
            return Redirect::to('/')->with('errors', $validator->messages);
        } else {

            // Send the email with the contactemail view, the user input
            Mail::send('contactemail', $input, function ($message) {
                $message->from('your@email.address', 'User');

                $message->to('arenar54rus@gmail.com');
            });

            // Specify a route to go to after the message is sent to provide the user feedback
            return Redirect::to('/')->with('message', 'Thank you!');
        }
    }
   /* public function send(Request $request){
        /*$name = $request->input('name');
        $email = $request->input('email');
        $message = $request->input('message');
        $name = Input::get('name');
        $email = Input::get('email');
        $message = Input::get('message');

        ['title' => $name, 'email' => $email, 'content' => $content]

        Mail::send('about',array(
            'name' => $name,
            'email' => $email,
            'user_message' => $message
        ) , function ($message)
        {

            $message->from('arenar93@yandex.ru');

            $message->to('arenar54rus@gmail.com', 'Administrator');

        });

        return response()->json(['message' => 'Request completed']);
        return \Redirect::route('about')->with('message', 'Thanks for contacting us!');
    }*/
}
