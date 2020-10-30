@extends('home.home')
@section('title', 'Đăng ký đề tài')

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
    <h1>Đăng ký đề tài</h1>
    <table class="table table-striped table-sm">
        <thead>
        <tr>
            <th scope="col">id</th>
            <th scope="col">Giảng viên</th>
            <th scope="col">Tên đề tài</th>
            <th scope="col">Nội dung</th>
            <th scope="col">Thực hiện</th>
        </tr>
        </thead>
        <tbody>
        @foreach($posts as $post)
        <tr>
            <td>{{$post->id}}</td>
            <td>{{$post->title}}</td>
            <td>{{$post->lecturer->first()->name}}</td>
            <td>{{$post->content}}</td>
            <td><a href="{{route('student.register',['user_id'=>\Illuminate\Support\Facades\Auth::user()->id,'post_id'=>$post->id])}}">Đăng ký</a></td>
        </tr>
        @endforeach
        </tbody>
    </table>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
</body>
@endsection