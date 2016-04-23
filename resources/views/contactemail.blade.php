@extends('layouts.app')

@section('content')

<strong>:</strong> {{ $name }} <br>
<strong>{{Lang::get('messages.email')}}:</strong> {{ $email }} <br>
<strong>{{Lang::get('messages.message')}}:</strong><br>
{{ $msg }}

@endsection