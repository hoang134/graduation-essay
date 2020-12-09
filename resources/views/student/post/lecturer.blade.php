
@extends('home.home')
@section('title', 'Thông tin đề tài')

@section('content')
    <head>
        <style type="text/css">
            th,td {
                border-left: 1px solid #dee2e6;
                border-right: 1px solid #dee2e6;
            }
        </style>
    </head>
    <body>
    <h2>thông tin Giảng viên </h2>
    <div class="table-responsive">
        <table class="table table-striped table-sm">
            <tr>
                <th>Họ tên</th>
                <th>Ngày sinh</th>
                <th>Giới tính</th>
                <th>khoa</th>
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
