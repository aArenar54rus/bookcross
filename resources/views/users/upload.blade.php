@extends('layouts.app')

@section('content')
    <h2>{{Lang::get('messages.uploadAvatar')}}:</h2>
    <h4>{{Lang::get('messages.formatAvatar')}}</h4>
    {!! Form::open(array('url'=>'upload','method'=>'POST', 'files'=>true)) !!}
    {!! Form::file('image', null,
                    array('class'=>'btn btn-default')) !!}
    {!! Form::submit('Submit', array('class'=>'send-btn')) !!}
    {!! Form::close() !!}
@endsection