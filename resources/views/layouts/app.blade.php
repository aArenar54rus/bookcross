<!DOCTYPE html>
<html lang="rus">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Bookcrossing</title>

    <link rel="stylesheet" media="all" href="{{ url('public/css/main.css')}}">
    <link href="http://fonts.googleapis.com/css?family=Oswald:regular" rel="stylesheet" type="text/css" >
    <link href='http://fonts.googleapis.com/css?family=Junge' rel='stylesheet' type='text/css'>

</head>
<body>
    <header class="clearfix">
        <div class="container">
            <a id="logo" href="{{ url('/') }}">Bookcrossing</a>
            <nav class="clearfix">
                <ul class="topmenu">
                    <li><a href="{{ url('/') }}" class="link">{{Lang::get('messages.home')}}</a></li>
                    <li><a href="{{ url('/posts') }}" class="link">{{Lang::get('messages.blog')}}</a></li>
                    <li><a href="{{ url('/adverts') }}" class="link">{{Lang::get('messages.adverts')}}</a></li>
                    <li><a href="{{ url('/about') }}" class="link">{{Lang::get('messages.aboutUs')}}</a></li>
                    @if (Auth::guest())
                        <li><a href="{{ url('/login') }}" class="link">{{Lang::get('messages.login')}}</a></li>
                        <li><a href="{{ url('/register') }}" class="link">{{Lang::get('messages.register')}}</a></li>
                    @else
                        <li class="dropdown">
                            <a href="#" class="link" data-toggle="dropdown" role="button" aria-expanded="false">{{ Auth::user()->name }}</a>
                            <ul class="submenu" role="menu">
                                <li><a href="{{ url('/user/'. \Illuminate\Support\Facades\Auth::user()->id) }}">User page</a></li>
                                <li><a href="{{ url('/dashboard') }}">{{Lang::get('messages.dashboard')}}</a></li>
                                <li><a href="{{ url('/logout') }}">{{Lang::get('messages.logout')}}</a></li>
                            </ul>
                        </li>
                    @endif
                    <li class="social_icons" twitter><a href="{{ url('/dashboard') }}"><div class="social_icon_sprite"></div></a></li>
                    <li class="social_icons" facebook><a href="{{ url('/dashboard') }}">F</a></li>
                    <li class="social_icons" google><a href="{{ url('/dashboard') }}">G</a></li>

                </ul>
            </nav>
        </div>
    </header>
    <section role="banner">
        <hgroup>
            @if (Auth::guest())
            <h2>{{Lang::get('messages.mainWelcome')}}</h2>
            @else
                <h2>{{Lang::get('messages.news')}}</h2>
            @endif
        </hgroup>
    </section>
    <div class="social_icon_sprite"></div>
    <section class="container clearfix">
        @yield('content')
    </section>

    <footer role="contentinfo">
        <p>
            <span class="left">CSS Junction &copy; - 2012 | Released under Creative Common License. <a href="#">Goto Top</a></span>
            Created by <a href="vk.com/arenar">Semibokov Stanislav</a> and <a href="buben.guru">Buben Guru</a>, 2015.
        </p>
    </footer>
</body>
</html>
