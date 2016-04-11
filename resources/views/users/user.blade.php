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
    {!! Form::open(array('url' => 'foo/bar')) !!}
    if (($user->id)==(\Illuminate\Support\Facades\Auth::user()->id)){
    Would you like to leave a feedback about this person?
    @include('users.feedback')
    }
    {!! Form::close() !!}
@endsection