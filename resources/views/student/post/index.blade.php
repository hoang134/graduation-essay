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
    <div>
        <div>
            @if(isset($user))
            <h1>Đề tài đã chọn</h1>
            <table class="table table-striped table-sm">
                <tr>
                    <th scope="col">Tên đề tài</th>
                    <th scope="col">Giảng viên</th>
                    <th scope="col">Nội dung đề tài</th>
                    <th scope="col">Thực hiện</th>
                </tr>
                <tr>
                    <td>{{$user->posts->first()->title}}</td>
                    <td>{{$user->posts->first()->lecturer->first()->name}}</td>
                    <td>{{$user->posts->first()->content}}</td>
                    <td><a href="{{route('student.post.delete')}}">Hủy đăng ký</a></td>
                </tr>
            </table>
            @else
            <p>Bạn chưa dăng ký khóa luận. <a href="/student/viewpost">Đăng ký</a> </p>
            @endif
        </div>
    </div>
</body>
@endsection