@extends('layouts.app')

@section('content')
        <h1>{{$post->title}}</h1>
        <div>
            {{$post->description}}
        </div>
        @foreach($comments as $comment)
        <br>{{ $comment->author_id }}{{ $comment->content }}
        @endforeach
@endsection