@extends('admin.layout')
@section('title', 'Quản lý đề tài khóa luận')

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
      Quản lý đề tài khóa luận
    </div>
    <a href="{{route('post.create')}}">Thêm đề tài khóa luận</a>
    <div class="table-responsive">
      <table class="table table-striped b-t b-light">
        <thead>
          <tr>
            <th>Id</th>
            <th>Giảng viên</th>
            <th>Tên đề tài</th>
            <th>Nội dung</th>
            <th>Số lượng</th>
            <th colspan="2">Thực hiện</th>
          </tr>
        </thead>
        <tbody>
          @foreach($posts as $post)
            <tr>
               <tr>
                <td>{{$post->id}}</td>
                <td>{{$post->lecturer->first()->name}}</td>
                <td>{{$post->title}}</td>
                <td>{{$post->content}}</td>
                <td>{{$post->quantity}}</td>

                <td>
                    @can('update',$post)
                        <a style="color:#27b722;" href="{{route('post.edit',['id'=>$post->id])}}"><i class="fa fa-pencil-square-o"></i> Sửa</a></td>
                    @endcan
                <td>
                    @can('delete',$post)
                        <a style="color: #ff0000;" href="{{route('post.delete',['id'=>$post->id])}}"><i class="fa fa-times text-danger text"></i> Xóa</a>
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
