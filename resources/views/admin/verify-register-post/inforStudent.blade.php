@extends('admin.layout')
@section('title', 'Thông tin sinh viên')

@section('content')
    <h2>thông tin sinh viên</h2>
    <div class="table-responsive">
        <table class="table table-striped table-sm">
            <tr>
                <th>Họ tên</th>
                <th>Ngày sinh</th>
                <th>Giới tính</th>
                <th>Lớp</th>
                <th>Email</th>
            </tr>
            <tr>
                <td>{{$user->name}}</td>
                <td>{{$user->birthday}}</td>
                <td>{{$user->gender}}</td>
                <td>{{$user->class}}</td>
                <td>{{$user->email}}</td>
            </tr>
        </table>
    </div>

@endsection
