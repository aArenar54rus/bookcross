@extends('layouts.app')

@section('content')
    @foreach($users as $user)
    <h1>{{$user->name}} {{$user->last_name}}</h1>

    <br>���:
    <div>
        {{$user->sex}}
    </div>

    <br>������:
    <div>
        {{$user->country}}
    </div>

    <br>�������:
    <div>
        {{$user->phone}}
    </div>
    @endforeach



@endsection