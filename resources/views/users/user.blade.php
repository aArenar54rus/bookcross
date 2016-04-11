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

    Would you like to leave a feedback about this person?
    <form action="{{ url('/user/'.$user->id.'/feedback')}}">
        <button type="submit">Of course!</button>
    </form>

@endsection