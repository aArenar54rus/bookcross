@extends('layouts.app')

@section('content')
<h1>{{Lang::get('messages.errorLogin')}}</h1>
<br>
<button><a href="{{ url('/register') }}">{{Lang::get('messages.register')}}</a></button>
@endsection