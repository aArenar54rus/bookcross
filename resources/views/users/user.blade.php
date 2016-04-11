@extends('layouts.app')

@section('content')

    <h1>{{$user->name}} {{$user->last_name}}</h1>
{{--    @if ($photo->user_id == $user->id)
        --}}{{--{{ HTML::image('storage/'.$user->id.'*.jpg') }}--}}{{--
        <img src="{{URL::asset($photo->path)}}" height="200" width="300">
    @endif--}}
    @if (($user->id)!=(Auth::user()->id))
        Add new avatar: <a href="{{ url('/upload') }}">tap here</a>.
    @endif
    <br><h2>Personal karma:</h2>
    <div>
    {{$user->karma}}
    </div>

    <br><h2>Sex:</h2>
    <div>
        {{$user->sex}}
    </div>

    <br><h2>Country:</h2>
    <div>
        {{$user->country}}
    </div>

    <br><h2>Tel.:</h2>
    <div>
        {{$user->phone}}
    </div>

    @if (($user->id)!=(Auth::user()->id))
        Would you like to leave a feedback about this person?
        @include('users.feedback')
    @endif

@stop