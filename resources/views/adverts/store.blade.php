@extends('layouts.app')

@section('content')
    {!! Form::open(array('action' => 'Insertions\AdvertsController@store', 'method' => 'POST', 'files'=>true)) !!}

    {!! Form::label('title', 'Title', array('class' => 'col-md-4 control-label')) !!}

    <br>{!! Form::text('title', 'Название объявления', array('class' => 'form-control')) !!}

    <br>{!! Form::label('description', 'Description', array('class' => 'col-md-4 control-label')) !!}

    <br>{!! Form::text('description', 'Описание', array('class' => 'form-control')) !!}

    <br>{!! Form::label('genre', 'Genre', array('class' => 'col-md-4 control-label')) !!}

    <br>{!! Form::text('genre', 'Жанр книги', array('class' => 'form-control')) !!}

    <br>{!! Form::label('publishing_house', 'Publishing house', array('class' => 'col-md-4 control-label')) !!}

    <br>{!! Form::text('publishing_house', 'Издательство', array('class' => 'form-control')) !!}

    <br>{!! Form::label('year', 'Year', array('class' => 'col-md-4 control-label')) !!}

    <br>{!! Form::text('year', 'Год издания', array('class' => 'form-control')) !!}

    <br>Upload picture:

    {{--{!! Form::file('pic') !!}--}}
    <br>{!! Form::file('images[]', array('multiple'=>true)) !!}

    <br>{!! Form::button('Create new', array('class' => 'btn btn-primary', 'type' => 'submit')) !!}

    {!! Form::close() !!}
@endsection