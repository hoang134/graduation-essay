@extends('admin.layout')
@section('title', 'Quản lý tài khoản')

@section('content')
    <h2>Quản lý danh sách đăng ký đề tài</h2>
    <a href="{{route('user.create')}}">Thêm đề tài khoản</a>
    <div class="table-responsive">
        <table class="table table-striped table-sm">
            <thead>
            <tr>
                <th>Id</th>
                <th>Tên đề tài</th>
                <th>tên</th>
                <th>loại</th>
                <th>thực hiện</th>
            </tr>
            </thead>
            <tbody>

            @foreach($userPosts as $userPost )
                <tr>
                    <td>{{$userPost-> id}}</td>
                    <td>{{$userPost->post->title}}</td>
                    <td>{{$userPost->user->name}}</td>
                    <td>{{$userPost->type}}</td>
                    <td><a href="{{route('list.delete',['id'=>$userPost->id])}}">Xóa</a></td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
