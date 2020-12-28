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
      Quản lý danh sách đăng ký đề tài
    </div>
    <a href="{{route('user.create')}}">Thêm đề tài khoản</a>
    <div class="table-responsive">
      <table class="table table-striped b-t b-light">
        <thead>
          <tr>
            <th>Id</th>
            <th>Tên đề tài</th>
            <th>Tên</th>
            <th>Loại</th>
            <th>Thực hiện</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            @foreach($userPosts as $userPost )
                <tr>
                <td>{{$userPost-> id}}</td>
                <td>{{$userPost->post->title}}</td>
                <td>{{$userPost->user->name}}</td>
                <td>{{$userPost->type}}</td>
                <td><a style="color: #ff0000;" href="{{route('list.delete',['id'=>$userPost->id])}}"><i class="fa fa-times text-danger text"></i> Xóa</a></td>
                </tr>
            @endforeach
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</div>
@endsection
