@extends('layouts.app')

@section('content')
    {!! Form::open(array('action' => ['Insertions\AdvertsController@update', $advert->id], 'method' => 'put', 'class' => 'form-horizontal' )) !!}

        {!! Form::label('title', 'Название объявления', array('class' => 'col-md-4 control-label')) !!}

        <div class="col-md-6">
            {!! Form::text('title', $advert->title, array('class' => 'form-control')) !!}
        </div>


        {!! Form::label('description', 'Описание', array('class' => 'col-md-4 control-label')) !!}

        <div class="col-md-6">
            {!! Form::text('description', $advert->description, array('class' => 'form-control')) !!}
        </div>


        {!! Form::label('genre', 'Жанр книги', array('class' => 'col-md-4 control-label')) !!}

        <div class="col-md-6">
            {!! Form::text('genre', $advert->genre, array('class' => 'form-control')) !!}
        </div>


        {!! Form::label('publishing_house', 'Издательство', array('class' => 'col-md-4 control-label')) !!}

        <div class="col-md-6">
            {!! Form::text('publishing_house', $advert->publishing_house, array('class' => 'form-control')) !!}
        </div>


        {!! Form::label('year', 'Год издания', array('class' => 'col-md-4 control-label')) !!}

        <div class="col-md-6">
            {!! Form::text('year', $advert->year, array('class' => 'form-control')) !!}
        </div>


        <div class="form-group">
            <div class="col-md-6 col-md-offset-4">
                {!! Form::button('Send', array('class' => 'btn btn-primary', 'type' => 'submit')) !!}
            </div>
        </div>

    {!! Form::close() !!}
@endsection