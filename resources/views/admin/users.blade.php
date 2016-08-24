@extends('admin.app')

@section('adminPanel')
    <table>
        @foreach($viewModel as $table)
            <tr>
                <td>{{$user->userID}}</td>
                <td>{{$user->userName}}</td>
            </tr>
        @endforeach
    </table>
@endsection
