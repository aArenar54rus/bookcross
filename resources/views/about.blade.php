@extends('layouts.app')

@section('content')
    <section role="banner">
        <article role="main" class="clearfix contact">
            <div class="post">
                <h2>About us</h2>
                <p>It's information about us and our site</p>
            </div>
        </article>
    </section>

    <section class="container">
        <div class="foo-slogan">
            <form class="c-form" id="contact" method="post" class="form" role="form">
                <h2>{{Lang::get('messages.dropUs')}}...</h2>
                @if(Session::has('errors'))
                        @foreach(Session::get('errors')->all() as $error_message)
                            <p>{{ $error_message }}</p>
                        @endforeach
                @endif
                <label for="name">{{Lang::get('messages.name')}}</label>
                <input id="name" name="name" placeholder="{{Lang::get('messages.yourName')}}" type="text" autofocus="">
                <label for="email">{{Lang::get('messages.email')}}</label>
                <input id="email" name="email" placeholder="{{Lang::get('messages.yourEmail')}}" type="text">
                <label for="message">{{Lang::get('messages.message')}}</label>
                <textarea id="message" name="msg" placeholder="{{Lang::get('messages.yourMessage')}}" rows="5" cols="40"></textarea>
                <button type="submit" class="button green">{{Lang::get('messages.submit')}}</button>
            </form>
        </div>
    </section>


@endsection