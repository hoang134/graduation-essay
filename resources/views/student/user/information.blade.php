@extends('home.home')
@section('title', 'sửa thông tin')

@section('content')
<center><h1>Thông tin tài khoản</h1></center>
<br>
<head>
    <link rel="stylesheet" href="{{ '/css/admin.css' }}">
    <style type="text/css">
        th,td {
            border-left: 1px solid #dee2e6;
            border-right: 1px solid #dee2e6;
        }
    </style>
</head>
<body>
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
        <br>
        <br>
        <div class="infostudent" style="font-size: 20px;">
        <a href="{{route('student.edit')}}" style="margin-right: 30px">Sửa thông tin Tài khoản</a>
        <a href="{{route('student.post')}} " style="margin-right: 30px">Thông đăng ký khóa luận</a>
        <a href="{{route('post')}}">Trở về trang chủ</a>
    </div>
    </div>
</body>
@endsection
