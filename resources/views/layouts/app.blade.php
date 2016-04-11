<!DOCTYPE html>
<html lang="rus">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Bookcrossing</title>

    <link rel="stylesheet" media="all" href="{{ url('public/css/main.css')}}">
    <link  href="http://fonts.googleapis.com/css?family=Oswald:regular" rel="stylesheet" type="text/css" >
    <link href='http://fonts.googleapis.com/css?family=Junge' rel='stylesheet' type='text/css'>

</head>
<body>
    <header class="clearfix">
        <div class="container">
            <a id="logo" href="{{ url('/') }}">Bookcrossing</a>
            <ul class="social-icons">
                <li><a href="http://www.facebook.com/blog.cssjuntion" class="icon flip">F</a></li>
                <li><a href="" class="icon">Vk</a></li>
                <li><a href="http://www.twitter.com/cssjunction" class="icon">T</a></li>
            </ul>
            <nav class="clearfix">
                <ul class="topmenu">
                    <li><a href="{{ url('/') }}" class="link">Home</a></li>
                    <li><a href="{{ url('/posts') }}" class="link">Blog</a></li>
                    <li><a href="{{ url('/adverts') }}" class="link">Adverts</a></li>
                    <li><a href="{{ url('/about') }}" class="link">About us</a></li>
                    @if (Auth::guest())

                        <li><a href="{{ url('/login') }}" class="link">Login</a></li>
                        <li><a href="{{ url('/register') }}" class="link">Register</a></li>

                    @else

                        <li><a href="{{ url('/user/'. \Illuminate\Support\Facades\Auth::user()->id) }}" class="link">Profile</a></li>
                        <li class="dropdown">
                            <a href="#" class="link" data-toggle="dropdown" role="button" aria-expanded="false">{{ Auth::user()->name }}</a>
                            <ul class="submenu" role="menu">
                                <li><a href="{{ url('/dashboard') }}">User page</a></li>
                                <li><a href="{{ url('/dashboard') }}">Dashboard</a></li>
                                <li><a href="{{ url('/logout') }}">Logout</a></li>
                            </ul>
                        </li>

                    @endif
                </ul>
            </nav>
        </div>
    </header>

    <section class="container clearfix">
        @yield('content')
    </section>

    <footer role="contentinfo">
        <p>
            <span class="left">CSS Junction &copy; - 2012 | Released under Creative Common License. <a href="#">Goto Top</a></span>
            <a href="index.html">HOME</a> | <a href="portfolio.html">PORTFOLIO</a> | <a href="page.html">PAGE</a> |  <a href="blog.html">BLOG</a> | <a href="contact.html">CONTACT US</a>
        </p>
    </footer>
</body>
</html>
