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
    <center><h2>Quản lý tài khoản</h2></center>
    @can('create',\App\User::class)
        <a href="{{route('user.create')}}">Thêm  tài khoản</a>

    @endcan
    <div class="table-responsive">
        <table class="table table-striped table-sm">
            <thead>
            <tr style="background-color: #555;">
                <th>Id</th>
                <th>Tên</th>
                <th>Ngày sinh</th>
                <th>code</th>
                <th>email</th>
                <th>lớp</th>
                <th>giới tính</th>
                <th colspan="2">thực hiện</th>
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
                    <td>
                        @can('update', $user)
                            <a href="{{route('user.edit',['id'=>$user->id])}}">Sửa</a>
                        @endcan
                    </td>

                    <td>
                        @can('delete',$user)
                            <a href="{{route('user.delete',['id'=>$user->id])}}">Xóa</a>
                        @endcan
                    </td>

                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
