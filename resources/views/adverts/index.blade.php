@extends('layouts.app')

@section('content')
        <section class="container clearfix">
            <aside role="complementary">
                <h2>Addtional info</h2>
                <p>Information for users.</p>
            </aside>
            <article class="post content">
                <ul class="post-list">
                    <li>

                        {!! Form::open(array('action' => ['Insertions\AdvertsController@index'], 'method' => 'get')) !!}
                        <div class="grid_4 about">Search:<div>
                                <div><br>Title: <input type="search" name="title"></div>
                                <div><br>Genre: <input type="search" name="genre"></div>
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

                        @foreach($adverts as $advert)
                            <h2><a href="{{ url('/posts/'. $advert->id) }}">{{$advert->title}}</a></h2>
                            <h4>{{$advert->year}}</h4>
                            <h5>Genre:{{$advert->genre}}</h5>
                            <h5>Publishing house:{{$advert->publishing_house}}</h5>
                            <p class="meta">On {{ date("d.m.Y", strtotime($advert->created_at)) }} | By: <a href="#"></a></p>
                            <img src="http://lorempixel.com/400/180/fashion/" alt="Photo">
                            <p>{{$advert->description}} </p>
                            <p><a href="{{ url('/adverts/'. $advert->id) }}" class="more-link">Read more </a></p>
                            @if(Auth::check())
                                @if (Auth::user()->id == $advert->author_id)
                                    {!! Form::open(array('action' => ['Insertions\AdvertsController@destroy', $advert->id], 'method' => 'delete')) !!}
                                    <button type="submit" >Delete advert</button>
                                    {!! Form::close() !!}
                                @endif
                            @endif
                        @endforeach
                    </li>
                </ul>
            </article>
        </section>




@endsection