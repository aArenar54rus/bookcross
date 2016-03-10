@extends('layouts.app')

@section('content')
    {!! Form::open(array('action' => 'Insertions\AdvertsController@store', 'method' => 'post', 'class' => 'form-horizontal' )) !!}

    {!! Form::label('title', 'Title', array('class' => 'col-md-4 control-label')) !!}

    <div class="col-md-6">
        {!! Form::text('title', '�������� ����������', array('class' => 'form-control')) !!}
    </div>


    {!! Form::label('description', 'description', array('class' => 'col-md-4 control-label')) !!}

    <div class="col-md-6">
        {!! Form::text('description', '��������', array('class' => 'form-control')) !!}
    </div>


    {!! Form::label('genre', 'Genre', array('class' => 'col-md-4 control-label')) !!}

    <div class="col-md-6">
        {!! Form::text('genre', '���� �����', array('class' => 'form-control')) !!}
    </div>


    {!! Form::label('publishing_house', 'Publishing_house', array('class' => 'col-md-4 control-label')) !!}

    <div class="col-md-6">
        {!! Form::text('publishing_house', '������������', array('class' => 'form-control')) !!}
    </div>


    {!! Form::label('year', 'Year', array('class' => 'col-md-4 control-label')) !!}

    <div class="col-md-6">
        {!! Form::text('year', '��� �������', array('class' => 'form-control')) !!}
    </div>


    <div class="form-group">
        <div class="col-md-6 col-md-offset-4">
            {!! Form::button('Send', array('class' => 'btn btn-primary', 'type' => 'submit')) !!}
        </div>
    </div>
    {!! Form::close() !!}
@endsection