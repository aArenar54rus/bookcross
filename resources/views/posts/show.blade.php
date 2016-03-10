@extends('layouts.app')

@section('content')
        <h1>{{$post->title}}</h1>
        <div>
            {{$post->description}}
        </div>
        @foreach(\App\Models\Comment::all() as $comment)
        <br>{{ $comment->author_id }}{{ $comment->message }}
        @endforeach
        <form action="{{$post->id}}/comments" method="POST">
                <br>Добавить комментарий:<br>
                <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                <textarea type="comment" name="message"></textarea><br>
                <input type="submit" value="Отправить" /><br>
        </form>

@endsection