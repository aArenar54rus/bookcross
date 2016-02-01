@extends('layouts.app')

@section('content')
    @foreach($posts as $post)
        <p>{{$post->title}}</p>
        <div>
            {{$post->description}}
        </div>
        @if (Auth::user()->id == $post->author_id)
            {!! Form::open(array('action' => ['PostsController@destroy', $post->id], 'method' => 'delete')) !!}
                <button type="submit" >Delete insertion</button>
            {!! Form::close() !!}
        @endif
    @endforeach
@endsection