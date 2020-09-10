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
        <p>Tên:{{\Illuminate\Support\Facades\Auth::user()->name}}</p>
        <p>Ngày sinh:{{\Illuminate\Support\Facades\Auth::user()->birthday}}</p>
        <p>Lớp:{{\Illuminate\Support\Facades\Auth::user()->class}}</p>
        <p>Email:{{\Illuminate\Support\Facades\Auth::user()->email}}</p>
    </div>
    <div>
        <a href="">Sửa thông tin Tài khoản</a>
        <a href="">Thông đăng ký khóa luận</a>
    </div>
</body>
</html>
