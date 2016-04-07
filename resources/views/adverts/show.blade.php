@extends('layouts.app')

@section('content')
    <h1>{{$advert->name}}</h1>
    <div>
        {{$advert->description}}
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