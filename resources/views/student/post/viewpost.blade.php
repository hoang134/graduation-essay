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
    <center><h1>Đăng ký đề tài</h1></center>
    <table class="table table-striped table-sm">
        <thead>
        <tr style="background-color: #555;">
            <th scope="col">id</th>
            <th scope="col">Giảng viên</th>
            <th scope="col">Tên đề tài</th>
            <th scope="col">Nội dung</th>
            <th scope="col">Số lượng</th>
            <th scope="col">Thời hạn đăng ký</th>
            <th scope="col">Thực hiện</th>
        </tr>
        </thead>
        <tbody>
        @php
            $i = 0;
        @endphp
        @foreach($posts as $post)
        <tr>
            <td>{{$post->id}}</td>
            <td>{{$post->title}}</td>
            <td>{{$post->lecturer->first()->name}}</td>
            <td>{{$post->content}}</td>
            <td> {{$quantityUserPosts[$i][$post->id]}}/{{$post->quantity}}</td>
            <td>{{$post->deadline}}</td>
            @if($date > $post->deadline)
                <td style="color:#ff0000 ">hết hạn đăng ký</td>

            @elseif($quantityUserPosts[$i][$post->id] >= $post->quantity)
                <td style="color:#ff0000 ">hết số lượng đăng ký</td>
                @else
                    <td><a href="{{route('student.register',['user_id'=>\Illuminate\Support\Facades\Auth::user()->id,'post_id'=>$post->id])}}">Đăng ký</a></td>
            @endif
        </tr>
        @php
            $i++;
        @endphp
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
