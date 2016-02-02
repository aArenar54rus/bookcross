@extends('layouts.app')

@section('content')

 {!! Form::open(array('action' => ['Insertions\PostsController@update', $post->id], 'method' => 'put', 'class' => 'form-horizontal' )) !!}

        {!! Form::label('title', 'Your insertion title', array('class' => 'col-md-4 control-label')); !!}

        <div class="col-md-6">
            {!! Form::text('title', $post->title, array('class' => 'form-control')) !!}
        </div>

        {!! Form::label('description', 'Your insertion description', array('class' => 'col-md-4 control-label')); !!}

        <div class="col-md-6">
            {!! Form::text('description', $post->description, array('class' => 'form-control')) !!}
        </div>

        <div class="form-group">
            <div class="col-md-6 col-md-offset-4">
            {!! Form::button('Send', array('class' => 'btn btn-primary', 'type' => 'submit')) !!}
            </div>
        </div>

    {!! Form::close() !!}

@endsection