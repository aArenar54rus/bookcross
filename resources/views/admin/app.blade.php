<!DOCTYPE html>
@can('admin_watch')
<head>
    <title>Admin Panel Bookcrossing</title>

    <link rel="stylesheet" media="all" href="{{ url('public/css/main.css')}}">
    <link href="http://fonts.googleapis.com/css?family=Oswald:regular" rel="stylesheet" type="text/css" >
    <link href='http://fonts.googleapis.com/css?family=Junge' rel='stylesheet' type='text/css'>
    <!-- Fonts -->
    <link href='//fonts.googleapis.com/css?family=Roboto:400,300' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.1/js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.3.2/angular.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.3.2/angular-route.min.js"></script>
    <!-- MY App -->
    {{--<script src="{{ asset('/public/app/routes.js') }}" ></script>--}}
    <script src="http://localhost/laravel.bookcross/public/app/route.js"></script>
    <script src="http://localhost/laravel.bookcross/public/app/packages/dirPagination.js" defer></script>

    <script src="{{ asset('/public/app/services/myServices.js') }}" defer></script>
    <script src="{{ asset('http://localhost/laravel.bookcross/public/app/helpers/myHelper.js') }}" defer></script>
    <!-- App Controller -->
    <script src="{{ asset('http://localhost/laravel.bookcross/public/app/controllers/advertsController.js') }}"> </script>
    <!-- JavaScript -->
    <script src="{{ /*URL::*/asset('js/PopUp.js') }}"> </script>

</head>
<body>
<header class="clearfix">
    <div class="container">
        <a id="logo" href="{{ url('/') }}">Admin panel</a>
        <nav class="clearfix">
            <ul class="topmenu">
                <li><a href="{{ url('/admin/users') }}" class="link">{{Lang::get('messages.users')}}</a></li>
                <li><a href="{{ url('/admin/roles') }}" class="link">{{Lang::get('messages.rolesControl')}}</a></li>
                <li><a href="{{ url('/admin/permissions') }}" class="link">{{Lang::get('messages.permissionsControl')}}</a></li>
                <li><a href="{{ url('/') }}" class="link">{{Lang::get('messages.exit')}}</a></li>
            </ul>
        </nav>
    </div>
</header>

@yield('adminPanel')

<footer role="contentinfo">
    <p>
        <span class="left">CSS Junction &copy; - 2012 | Released under Creative Common License. <a href="#">Goto Top</a></span>
        Created by <a href="http://vk.com/arenar">Semibokov Stanislav</a> and <a href="http://buben.guru">Buben Guru</a>, 2015.
    </p>
</footer>
</body>
@endcan