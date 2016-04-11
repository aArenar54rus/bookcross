@extends('layouts.app')

@section('content')
<h1>Create new feedback: </h1>
<form action="{{$user->id}}/feedbacks" method="POST">
    <br>Add feedback:<br>
    <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
    <textarea type="comment" name="message"></textarea><br>
    <input type="radio" name="karma" value="+1" />Good :)<br />
    <input type="radio" name="karma" value="-1" />Bad :(<br />
    <input type="submit" value="Отправить" /><br>
</form>

@endsection