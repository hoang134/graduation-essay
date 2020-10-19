@extends('home.home')
@section('title', 'đề tài')

@section('content')
<body>
    <center><h1>Sửa thông tin tài khoản</h1></center>
    <br>
    <div style="font-size: 20px">
        <form action="{{route('student.save',['id'=>$user->id])}}" method="post">
            @csrf
            <label>Tên:</label>
            <input type="text" name="name" value="{{$user->name}}"><br>
            <label>Ngày sinh:</label>
            <input type="text" name="birthday" value=" {{$user->birthday}}"><br>
            <label>Mã số sinh viên:</label>
            <input type="text" name="code" value=" {{$user->code}}"><br>
            <label>Lớp:</label>
            <input type="text" name="class" value="{{$user->class}}"><br>
            <label>Giới tính:</label>
            <input style="margin-right: 10px" type="radio" name="gender" value="Nam">Nam
                      <input type="radio" name="gender" value="Nữ">Nữ<br>
            <label>Mật khẩu mới:</label>
            <input type="text" name="password" value=""><br>
            <label>Xác nhận khẩu mới:</label>
            <input type="text" name="password_confirmation" value=""><br>
            <input type="submit" value="Lưu">
        </form>
    </div>
</body>
<style type="text/css">
    label {
        width: 15%;
    }
    input[type=text] {
        width: 50%;
    }
</style>
@endsection
