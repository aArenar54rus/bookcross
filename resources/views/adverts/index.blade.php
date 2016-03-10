@extends('layouts.app')

@section('content')

    @foreach($adverts as $advert)
        <p>{{$advert->title}}</p>
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
                <button type="submit" >”далить объ€вление</button>
                {!! Form::close() !!}
            @endif
        @endif
    @endforeach

@endsection