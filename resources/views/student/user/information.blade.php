<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Student</title>
</head>
<h1>Thông tin tài khoản</h1>
<body>
    <div>
        <p>Tên:{{$user->name}}</p>
        <p>Ngày sinh:{{$user->birthday}}</p>
        <p>Giới tính:{{$user->gender}}</p>
        <p>Lớp{{$user->class}}</p>
        <p>Email:{{$user->email}}</p>
    </div>
    <div style="font-size: 20px">
        <a href="{{route('student.edit')}}" style="margin-right: 30px">Sửa thông tin Tài khoản</a>
        <a href="{{route('student.post')}}">Thông đăng ký khóa luận</a>
    </div>
</body>
</html>
