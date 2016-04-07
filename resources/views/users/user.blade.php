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
@endsection