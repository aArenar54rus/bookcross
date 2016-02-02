@extends('layouts.app')

@section('content')
    @foreach($posts as $post)
        <p>{{$post->title}}</p>
        <div>
            {{$post->description}}
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