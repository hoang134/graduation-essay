<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Thông tin đề tài khóa luận</h1>
    @if(isset($user))
        <div style="font-size: 20px">
            <p>Tên đề tài: {{$user->posts->first()->title}}</p>
            <p>Giảng viên: {{$user->posts->first()->lecturer->first()->name}}</p>
            <p>Nội dung để tài: {{$user->posts->first()->content}}</p>
            <p><a href="{{route('student.post.delete')}}">hủy đăng ký</a></p>
        </div>
    @else
        <p>Bạn chưa dăng ký khóa luận. <a href="{{route('home')}}">Đăng ký</a> </p>
    @endif
</body>
</html>
