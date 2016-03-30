@extends('layouts.app')

@section('content')

    {!! Form::open(array('action' => ['Insertions\AdvertsController@index'], 'method' => 'get')) !!}
    Search:
    <br>Title: <input type="search" name="title">
    <br>Genre: <input type="search" name="genre">
    {{--<p><input type="search" name="year">--}}
    {{--<p><input type="search" name="publishing_house">--}}

    <input type="submit" value="search"></p>
    {!! Form::close() !!}

    @if(Auth::check())
        {{--@if (Auth::user()->id == $advert->author_id)--}}
            {!! Form::open(array('action' => ['Insertions\AdvertsController@create'], 'method' => 'get')) !!}
            <button type="submit" >Create new</button>
            {!! Form::close() !!}
        {{--@endif--}}
    @endif
    <br>

    @foreach($adverts as $advert)
        <br><p>{{$advert->title}}</p>
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
        @if(Auth::check())
            @if (Auth::user()->id == $advert->author_id)
                {!! Form::open(array('action' => ['Insertions\AdvertsController@destroy', $advert->id], 'method' => 'delete')) !!}
                <button type="submit" >Delete advert</button>
                {!! Form::close() !!}
            @endif
        @endif
    @endforeach

@endsection