@extends('layouts.app')

@section('content')
    {!! Form::open(array('action' => 'PostsController@store', 'method' => 'post')) !!}

        {!! Form::text('title') !!}

        {!! Form::text('description') !!}

        {!! Form::submit('Send') !!}

    {!! Form::close() !!}
@endsection