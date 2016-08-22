@extends('admin.app')

@section('adminPanel')
    {{--ПОПАП - надо доделать!--}}
    {{--    <div class="b-popup" id="popup1">
            <div class="b-popup-content">
                Text in Popup
                <a href="javascript:PopUpHide()">Hide popup</a>
            </div>
        </div>--}}

    <table>
        @foreach($users as $user)
            @foreach($roles as $role)
                <tr>
                    <td>{{$user->id}}</td>
                    <td>{{$user->name}}</td>
                    <td>{{$user->last_label}}</td>
                    <td>{{$user->country}}</td>
                    <td>{{$user->town}}</td>
                    <td>{{$user->email}}</td>
                    <td>{{$user->phone}}</td>
                    <td>{{$user->sex}}</td>
                    <td>{{$user->vip}}</td>
                    <td>{{$user->karma}}</td>
                    <td>{{$user->balance}}</td>
                    <td>{{$user->phone}}</td>
                    <td>{{$user->created_at}}</td>
                    <td>{{$user->updated_at}}</td>
{{--                    <td>
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
                    </td>--}}
                </tr>
            @endforeach
        @endforeach
    </table>
@endsection