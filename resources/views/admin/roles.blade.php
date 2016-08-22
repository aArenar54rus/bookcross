@extends('admin.app')

@section('adminPanel')
    <br>{{session('error')}}

    {!! Form::open(array('action' => 'Admin\RolesController@store', 'method' => 'POST')) !!}
    {!! Form::label('name', 'Role', array()) !!}
    <br>{!! Form::text('name', 'Роль', array('class' => 'form-control')) !!}
    <br>{!! Form::label('label', 'Label', array()) !!}
    <br>{!! Form::text('label', 'Описание', array('class' => 'form-control')) !!}
    <br>{!! Form::button('Create new', array('class' => 'btn btn-primary', 'type' => 'submit')) !!}
    {!! Form::close() !!}


{{--ПОПАП - надо доделать!--}}
{{--    <div class="b-popup" id="popup1">
        <div class="b-popup-content">
            Text in Popup
            <a href="javascript:PopUpHide()">Hide popup</a>
        </div>
    </div>--}}

    <table>
    @foreach($roles as $role)
        <tr>
            <td>{{$role->id}}</td>
            <td>{{$role->name}}</td>
            <td>{{$role->label}}</td>
            <td>{{$role->created_at}}</td>
            <td>{{$role->updated_at}}</td>
            <td>
                {!! Form::open(array('action' => ['Admin\RolesController@destroy', $role->id], 'method' => 'delete')) !!}
                {!! Form::button('Delete', array('class' => 'btn btn-primary', 'type' => 'submit')) !!}
                {!! Form::close() !!}
            </td>
            <td>
                {!! Form::open(array('action' => ['Admin\RolesController@update', $role->id], 'method' => 'PATCH')) !!}
                {!! Form::label('name', 'Role', array()) !!}
                <br>{!! Form::text('name', 'Роль', array('class' => 'form-control')) !!}
                <br>{!! Form::label('label', 'Label', array()) !!}
                <br>{!! Form::text('label', 'Описание', array('class' => 'form-control')) !!}
                <br>{!! Form::button('Update', array('class' => 'btn btn-primary', 'type' => 'submit')) !!}
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </table>
@endsection