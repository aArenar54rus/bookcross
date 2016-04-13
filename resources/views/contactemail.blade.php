@extends('layouts.app')

@section('content')

<strong>Name:</strong> {{ $name }} <br>
<strong>Email address:</strong> {{ $email }} <br>
<strong>Message:</strong><br>
{{ $msg }}

@endsection