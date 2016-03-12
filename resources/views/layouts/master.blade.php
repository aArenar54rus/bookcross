<html>
<head>
    <meta charset="utf-8">
    <title>Социальная сеть BookCross для истинных ценителей литературы.</title>

    <link rel="stylesheet" href="public/css/main.css">
</head>
<body>
<header>
    <br>
    <ul>
        @if (Auth::guest())
        @else
            <li><a href="#" class="menu">{{ Auth::user()->name }} </a></li>
        @endif
        <li><a href="{{ url('/') }}">Главная</a></li>
        <li><a href="{{ url('/services') }}">Информация</a></li>
        <li><a href="{{ url('/portfolio') }}">Объявления</a></li>
        <li><a href="{{ url('/about') }}">О нас</a></li>
        <li><a href="{{ url('/blog') }}">Blog</a></li>
        @if (Auth::guest())
            <li><a href="{{ url('/login') }}">Login</a></li>
            <li><a href="{{ url('/register') }}">Register</a></li>
        @else
            <li><a href="{{ url('/logout') }}">Logout</a></li>
        @endif
    </ul>
</header>
<article>

@yield('content')

</article>
<footer>
    Copyright
</footer>
</body>
</html>