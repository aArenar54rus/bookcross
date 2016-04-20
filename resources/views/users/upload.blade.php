@extends('layouts.app')

@section('content')
    <h2>Upload avatar's image:</h2>
    <h4>Max size is 5 megabyte. Format - .jpg or .png.</h4>
    {!! Form::open(array('url'=>'upload','method'=>'POST', 'files'=>true)) !!}
    {!! Form::file('image', null,
                    array('class'=>'btn btn-default')) !!}
    {!! Form::submit('Submit', array('class'=>'send-btn')) !!}
    {!! Form::close() !!}
@endsection