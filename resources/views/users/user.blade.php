@extends('layouts.app')

@section('content')
    <h1>{{$user->name}} {{$user->last_name}}</h1>

    <br>Sex:
    <div>
        {{$user->sex}}
    </div>

    <br>Country:
    <div>
        {{$user->country}}
    </div>

    <br>Tel.:
    <div>
        {{$user->phone}}
    </div>

    <form action="{{$user->id}}/feedbacks" method="POST">
        <br>Add feedback:<br>
        <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
        <textarea type="comment" name="message"></textarea><br>
        <input type="radio" name="karma" value="male" />Good :)<br />
        <input type="radio" name="karma" value="female" />Bad :(<br />
        <input type="submit" value="Отправить" /><br>
    </form>

@endsection