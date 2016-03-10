@extends('layouts.app')

@section('content')
    <h1>{{$post->title}}</h1>
    <div>
        {{$post->description}}
    </div>
    <div>
        {{$advert->genre}}
    </div>
    <div>
        {{$advert->year}}
    </div>
    <div>
        {{$advert->publishing_house}}
    </div>

@endsection