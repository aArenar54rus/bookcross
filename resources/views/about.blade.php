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
{{--            <form class="c-form" method="post" class="form" role="form">
                <h2>Drop us a line ...</h2>
                <label for="name">Name</label>
                <input type="text" id="name">
                <label for="email">Email</label>
                <input type="email" id="email">
                <label for="message">Message</label>
                <textarea id="message" rows="10" cols="60"></textarea>
                <input type="submit" value="Send" class="button green">
            </form>--}}

            <form class="c-form" id="contact" method="post" class="form" role="form">
                <h2>Drop us a line ...</h2>
                @if(Session::has('errors'))
                        @foreach(Session::get('errors')->all() as $error_message)
                            <p>{{ $error_message }}</p>
                        @endforeach
                @endif
                <label for="name">Name</label>
                <input id="name" name="name" placeholder="Your name..." type="text" autofocus="">
                <label for="email">Email</label>
                <input id="email" name="email" placeholder="Your e-mail..." type="text">
                <label for="message">Message</label>
                <textarea id="message" name="msg" placeholder="Your message..." rows="5" cols="40"></textarea>
                <button type="submit" class="button green">Submit</button>
            </form>
        </div>
    </section>


@endsection