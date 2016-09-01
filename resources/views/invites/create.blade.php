@extends('layouts/app')
@section('content')
    Create invite:
    {!! Form::open(array('action' => 'InvitesController@store', 'method' => 'post', 'class' => 'form-horizontal' )) !!}
    {!! Form::label('email', 'Your friend\'s email', array('class' => 'col-md-4 control-label')) !!}
    <br>{!! Form::text('email', '', array('class' => 'form-control')) !!}
    <div class="form-group">
        <div class="col-md-6 col-md-offset-4">
            {!! Form::button('Send', array('class' => 'btn btn-primary', 'type' => 'submit')) !!}
        </div>
    </div>
    {!! Form::close() !!}
@endsection