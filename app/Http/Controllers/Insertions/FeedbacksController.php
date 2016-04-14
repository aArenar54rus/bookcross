<?php

namespace App\Http\Controllers\Insertions;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Feedback;
use App\User;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;

class FeedbacksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    /*public function index()
    {
        //
    }*/

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $user_id = $request->input('user_id');
        $karma = $request->input('karma');
        $message = $request->input('message');

        $user = User::find($user_id);
        $userId = $user ->id;
        if ($karma == '+1'){
            $user->karma += 1;
        } else{
            $user->karma -= 1;
        }

        $feedback = new feedback();
        $feedback->message = $message;
        $feedback->author_id = Auth::user()->id;
        $feedback->user_id = $userId;

        if ($karma == '+1'){
            $feedback->karma += 1;
        } else{
            $feedback->karma -= 1;
        }

        if (Feedback::where('author_id', Auth::user()->id)) /*or (Feedback::find(author_id) == Auth::user()->id)*/ {
            return view('errors.505');
        } else{
            $user->save();
            $feedback->save();
            return view('users.user');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    /*    public function store(Request $request)
        {
            //
        }*/

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    /*   public function show($id)
       {
           //
       }*/

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    /*    public function edit($id)
        {
            //
        }*/

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $feedback = feedback::find($id);

        $feedback->content = $request->message;

        $feedback->save();

        return redirect()->action('Insertions\FeedbacksController@show');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $feedback = feedback::find($id);

        if ($feedback->author_id == Auth::user()->id) {
            $feedback->delete();
            return redirect()->action('Insertions\PostsController@index');
        }
        else {
            return view('errors.503');
        }
    }
}