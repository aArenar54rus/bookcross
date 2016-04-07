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
        <footer class="foo-slogan">
            <form class="c-form">
                <h2>Drop us a line ...</h2>
                <label for="name">Name</label>
                <input type="text" id="name">
                <label for="email">Email</label>
                <input type="email" id="email">
                <label for="msg">Message</label>
                <textarea id="msg" rows="10" cols="60"></textarea>
                <input type="submit" value="Send" class="button green">
            </form>
        </footer>
    </section>
@endsection