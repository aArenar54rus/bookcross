<?php

namespace App\Http\Controllers\Insertions;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use App\Http\Requests;
use App\Models\Insertion;
use App\Http\Controllers\Controller;

class PostsController extends Controller
{
    public function __construct() {
        $this->middleware('auth', ['except' => [
            'index',
            'show',
        ]]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Insertion::all();

        return view('posts.index', ['posts' => $posts]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.store');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $post = new Insertion();

        $post->title = $request->title;
        $post->description = $request->description;
        $post->author_id = Auth::user()->id;

        $post->save();

        return redirect()->action('Insertions\PostsController@index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Insertion::find($id);

        if ($post) {
            return view('posts.show', ['post' => $post]);
        }
        else {
            return 'No such post';
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Insertion::find($id);

        if ($post->author_id == Auth::user()->id) {
            return view('posts.edit', ['post' => $post]);
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
        $post = Insertion::find($id);

        $post->title = $request->title;
        $post->description = $request->description;

        $post->save();

        return redirect()->action('Insertions\PostsController@show', [$post->id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Insertion::find($id);

        if ($post->author_id == Auth::user()->id) {
            $post->delete();
            return redirect()->action('Insertions\PostsController@index');
        }
        else {
            return view('errors.503');
        }
    }
}
