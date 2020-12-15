@extends('home.home')
@section('title', 'Sửa thông tin')

@section('content')
<head>
    <style type="text/css">
        th,td {
            border-left: 1px solid #dee2e6;
            border-right: 1px solid #dee2e6;
        }
    </style>
</head>

<div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
      Thông tin tài khoản
    </div>
    <div class="table-responsive">
      <table class="table table-striped b-t b-light">
        <thead>
          <tr>
            <th>Họ tên</th>
            <th>Ngày sinh</th>
            <th>Giới tính</th>
            <th>Lớp</th>
            <th>Email</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>{{$user->name}}</td>
            <td>{{$user->birthday}}</td>
            <td>{{$user->gender}}</td>
            <td>{{$user->class}}</td>
            <td>{{$user->email}}</td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
  <center>
        <div class="infostudent" style="font-size: 20px;">
            <a href="{{route('student.edit')}}" style="margin-right: 30px">Cập nhật tài khoản</a>
            <a href="{{route('student.post')}} " style="margin-right: 30px">Thông tin đăng ký khóa luận</a>
        </div>
    </center>
</div>
@endsection
