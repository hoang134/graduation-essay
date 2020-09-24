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
    <h1>Sửa thông tin tài khoản</h1>
    <div style="font-size: 20px">
        <form action="{{route('student.save',['id'=>$user->id])}}" method="post">
            @csrf
            Tên:<input type="text" name="name" value="{{$user->name}}"><br>
            Ngày sinh:<input type="text" name="birthday" value=" {{$user->birthday}}"><br>
            Mã số sinh viên:<input type="text" name="code" value=" {{$user->code}}"><br>
            Lớp:<input type="text" name="class" value="{{$user->class}}"><br>
            Giới tính:<input style="margin-right: 10px" type="radio" name="gender" value="Nam">Nam
                      <input type="radio" name="gender" value="Nữ">Nữ<br>
            Mật khẩu mới:<input type="text" name="password" value=""><br>
            Xác nhận khẩu mới:<input type="text" name="password_confirmation" value=""><br>
            <input type="submit" value="Lưu">
        </form>
    </div>
</body>
</html>
