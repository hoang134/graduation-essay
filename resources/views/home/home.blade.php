<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
    <title>Home</title>
</head>
<body>
    <h1>Trang chủ</h1>
    <div><a href="{{route('student.information')}}" style="color: #1c7430; font-size: 25px;float: right;padding-bottom: 10px; padding-top: 20px; padding-right: 15px" >{{\Illuminate\Support\Facades\Auth::user()->name}}</a></div>
    <div><a href="{{route('student.report.index')}}" style="color: #1c7430; font-size: 20px;float: right;padding-bottom: 10px; padding-top: 50px;">Báo cáo tuần</a></div>
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
</html>
