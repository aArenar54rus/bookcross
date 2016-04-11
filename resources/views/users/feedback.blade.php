{{--@extends('layouts.app')

@section('content')--}}

<form action="{{$user->id}}/feedback" method="POST">
    <br>Add feedback:<br>
    <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
    <textarea type="comment" name="message"></textarea><br>
    <input type="hidden" name="user_id" value="{{$user->id}}">
    <input type="radio" name="karma" value="+1" />Good :)<br />
    <input type="radio" name="karma" value="-1" />Bad :(<br />
    <input type="submit" value="Отправить" /><br>
</form>

{{--
@endsection--}}
