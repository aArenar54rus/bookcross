@extends('admin.app')

@section('adminPanel')
    <br>{{session('error')}}

    {!! Form::open(array('action' => 'Admin\PermissionsController@store', 'method' => 'POST')) !!}
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
        @foreach($permissions as $permission)
            <tr>
                <td>{{$permission->id}}</td>
                <td>{{$permission->name}}</td>
                <td>{{$permission->label}}</td>
                <td>{{$permission->created_at}}</td>
                <td>{{$permission->updated_at}}</td>
                <td>
                    {!! Form::open(array('action' => ['Admin\PermissionsController@destroy', $permission->id], 'method' => 'delete')) !!}
                    {!! Form::button('Delete', array('class' => 'btn btn-primary', 'type' => 'submit')) !!}
                    {!! Form::close() !!}
                </td>
                <td>
                    {!! Form::open(array('action' => ['Admin\PermissionsController@update', $permission->id], 'method' => 'PATCH')) !!}
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