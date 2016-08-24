@extends('app')
@section('content')
    <div class="panel-heading">Invite new user</div>
    <div class="panel-body">
        @if (count($errors) > 0)
            <div class="alert alert-danger">
                <strong>Whoops!</strong> There were some problems with your input.<br><br>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        {!! Form::open() !!}
        <div class="form-group">
            {!! Form::label('email', 'Email:') !!}
            {!! Form::text('email', NULL, ['class' => 'form-control']) !!}
            {!! Form::label('message', 'Message:') !!}
            {!! Form::textarea('message', NULL, ['class' => 'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::submit('Send', ['class' => 'btn btn-primary form-control']) !!}
        </div>
        {!! Form::close() !!}
    </div>
@endsection