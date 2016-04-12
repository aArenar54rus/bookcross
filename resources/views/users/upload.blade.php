@extends('layouts.app')

@section('content')
    <h2>Upload avatar's image:</h2>
    {!! Form::open(array('url'=>'upload','method'=>'POST', 'files'=>true)) !!}
    {!! Form::file('file', null,
                    array('class'=>'btn btn-default')) !!}
    {!! Form::submit('Submit', array('class'=>'send-btn')) !!}
    {!! Form::close() !!}
@endsection