
@extends('home.home')
@section('title', 'đề tài')

@section('content')
<body>
    <center><h1>Sửa thông tin tài khoản</h1></center>
    <br>
    <div style="font-size: 20px">
            
            <form class="form-horizontal bucket-form" action="{{route('student.save',['id'=>$user->id])}}" method="post">
            @csrf
            <div class="form-group">
                <div class="col-lg-6">
                    Họ tên
                    <div class="input-group m-bot15">
                        <span class="input-group-addon btn-success">@</span>
                        <input type="text" class="form-control" name="name" value="{{$user->name}}">
                    </div>
                    Ngày sinh
                    <div class="input-group m-bot15">
                        <span class="input-group-addon btn-success">@</span>
                        <input type="text" class="form-control" name="birthday" value=" {{$user->birthday}}">
                    </div>
                    Mã số sinh viên
                    <div class="input-group m-bot15">
                        <span class="input-group-addon btn-success">@</span>
                        <input type="text" class="form-control" name="code" value=" {{$user->code}}">
                    </div>
                    Lớp
                    <div class="input-group m-bot15">
                        <span class="input-group-addon btn-success">@</span>
                        <input type="text" class="form-control" name="class" value="{{$user->class}}">
                    </div>
                    Giới tính
                    <div class="input-group m-bot15">
                        <input style="margin-right: 10px" type="radio" name="gender" value="Nam">Nam
                      <input type="radio" name="gender" value="Nữ">Nữ
                    </div>
                    Mật khẩu mới
                    <div class="input-group m-bot15">
                        <span class="input-group-addon btn-success">@</span>
                        <input type="password" class="form-control" name="password" value="">
                    </div>
                    Xác nhận mật khẩu
                    <div class="input-group m-bot15">
                        <span class="input-group-addon btn-success">@</span>
                        <input type="password" class="form-control" name="password_confirmation" value="">
                    </div>

                    <input type="submit" class="btn btn-primary"><br>
                </div>
            </div>
        </form>
    </div>
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

