@extends('admin.layout')
@section('title', 'Quản lý tài khoản')

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
      Quản lý tài khoản
    </div>
    @can('create',\App\User::class)
        <a href="{{route('user.create')}}">Thêm tài khoản</a>
    @endcan
    <div class="table-responsive">
      <table class="table table-striped b-t b-light">
        <thead>
          <tr>
            <th>Id</th>
            <th>Tên</th>
            <th>Ngày sinh</th>
            <th>Mã số</th>
            <th>Email</th>
            <th>Lớp/Nơi công tác</th>
            <th>Giới tính</th>
            <th>Loại tài khoản</th>
            <th colspan="2">Thực hiện</th>
          </tr>
        </thead>
        <tbody>
          @foreach($users as $user)
            <tr>
                <td>{{$user->id}}</td>
                <td>{{$user->name}}</td>
                <td>{{$user->birthday}}</td>
                <td>{{$user->code}}</td>
                <td>{{$user->email}}</td>
                <td>{{$user->class}}</td>
                <td>{{$user->gender}}</td>
                <td>{{$user->role}}</td>
                <td>
                    @can('update', $user)
                        <a style="color:#27b722;" href="{{route('user.edit',['id'=>$user->id])}}"><i class="fa fa-pencil-square-o text-success text-active"></i> Sửa</a>
                    @endcan
                </td>
                <td>
                    @can('delete',$user)
                        <a style="color:#ff0000 " href="{{route('user.delete',['id'=>$user->id])}}"><i class="fa fa-times text-danger text"></i> Xóa</a>
                    @endcan
                </td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>
@endsection
