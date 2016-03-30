@extends('layouts.app')

@section('content')
    @if(Auth::check())
        {!! Form::open(array('action' => ['Insertions\PostsController@create'], 'method' => 'get')) !!}
        <button type="submit" >Create new post</button>
        {!! Form::close() !!}
    @endif
    <br>
    @foreach($posts as $post)
        Name: <p>{{$post->title}}</p>
        <div>
        Text:    {{$post->description}}
        </div>
        <div>
        Date:    {{ date("d.m.Y", strtotime($post->created_at)) }}
        </div>
        @if(Auth::check())
            @if (Auth::user()->id == $post->author_id)
                {!! Form::open(array('action' => ['Insertions\PostsController@destroy', $post->id], 'method' => 'delete')) !!}
                    <button type="submit" >Delete insertion</button>
                {!! Form::close() !!}
            @endif
        @endif
    @endforeach
@endsection