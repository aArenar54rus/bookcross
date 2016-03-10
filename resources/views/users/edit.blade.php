@extends('layouts.app')

@section('content')

    {!! Form::open(array('action' => ['UsersController@update', Auth::user()->id], 'method' => 'put', 'class' => 'form-horizontal' )) !!}


    {!! Form::label('name', 'Name: ', array('class' => 'col-md-4 control-label')) !!}

    <div class="col-md-6">
        {!! Form::text('name', $user->name, array('class' => 'form-control')) !!}
    </div>


    {!! Form::label('last_name', 'Last name: ', array('class' => 'col-md-4 control-label')) !!}

    <div class="col-md-6">
        {!! Form::text('last_name', $user->last_name, array('class' => 'form-control')) !!}
    </div>


    {!! Form::label('sex', 'Sex: ', array('class' => 'col-md-4 control-label')) !!}

    <div class="col-md-6">
        {!! Form::text('sex', $user->sex, array('class' => 'form-control')) !!}
    </div>


    {!! Form::label('country', 'Country: ', array('class' => 'col-md-4 control-label')) !!}

    <div class="col-md-6">
        {!! Form::text('country', $user->country, array('class' => 'form-control')) !!}
    </div>


    {!! Form::label('phone', 'Phone: ', array('class' => 'col-md-4 control-label')) !!}

    <div class="col-md-6">
        {!! Form::text('phone', $user->phone, array('class' => 'form-control')) !!}
    </div>


    {!! Form::label('email', 'E-mail address: ', array('class' => 'col-md-4 control-label')) !!}

    <div class="col-md-6">
        {!! Form::text('email', $user->email, array('class' => 'form-control')) !!}
    </div>


    <div class="form-group">
        <div class="col-md-6 col-md-offset-4">
            {!! Form::button('Send', array('class' => 'btn btn-primary', 'type' => 'submit')) !!}
        </div>
    </div>
@endsection