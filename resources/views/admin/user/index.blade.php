@extends('admin.layout')
@section('title', 'Quản lý tài khoản')

@section('content')
    <h2>Quản lý tài khoản</h2>
    <a href="{{route('user.create')}}">Thêm đề tài khoản</a>
    <div class="table-responsive">
        <table class="table table-striped table-sm">
            <thead>
            <tr>
                <th>Id</th>
                <th>Tên</th>
                <th>Ngày sinh</th>
                <th>code</th>
                <th>email</th>
                <th>lớp</th>
                <th>giới tính</th>
                <th>thực hiện</th>
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
                    <td><a href="{{route('user.edit',['id'=>$user->id])}}">Sửa</a></td>
                    <td><a href="{{route('user.delete',['id'=>$user->id])}}">Xóa</a></td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection