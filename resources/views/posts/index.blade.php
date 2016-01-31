@extends('layouts.app')

@section('content')
    @foreach($posts as $post)
        <p>{{$post->title}}</p>
        <div>
            {{$post->description}}
        </div>
    @endforeach
@endsection