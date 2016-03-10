@extends('layouts.app')

@section('content')
    <h1>{{$user->name}} {{$user->last_name}}</h1>

    <br>Пол:
    <div>
        {{$user->sex}}
    </div>

    <br>Страна:
    <div>
        {{$user->country}}
    </div>

    <br>Телефон:
    <div>
        {{$user->phone}}
    </div>




@endsection