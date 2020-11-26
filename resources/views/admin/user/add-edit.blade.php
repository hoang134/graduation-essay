@extends('admin.layout')
@section('title', 'tài khoản')

@section('content')
    <center><h2>@if(isset($user)) Sửa tài khoản @else Thêm tài khoản  @endif </h2></center>
        @if(!isset($user))
            <div class="container">
                <form action="{{route('user.import')}}" enctype="multipart/form-data" method="post">
                    @csrf
                    <input type="file" name="file" value="Thêm tài khoản bằn Excel" accept=".xlsx"><br>
                    <input type="submit" class="btn btn-primary" value="tạo tài khoản">
                </form>
            </div>
        @endif
                 
        <br>
        <form class="form-horizontal bucket-form" action="{{isset($user)? route('user.save',['id'=>$user->id]):route('user.save')}}" method="post">
        @csrf
        <div class="form-group">
            <div class="col-lg-11">
                Họ tên
                <div class="input-group m-bot15">
                    <span class="input-group-addon btn-success">@</span>
                    <input type="text" class="form-control" id="name" name="name"
                    value="{{ old('name', isset($user) ? $user->name : '') }}">
                </div>
                Ngày sinh
                <div class="input-group m-bot15">
                    <span class="input-group-addon btn-success">@</span>
                    <input type="text" class="form-control" id="birthday" placeholder="xx/yy/zzzz" name="birthday"
                    value="{{ old('birthday', isset($user) ? $user->birthday : '') }}">
                </div>
                Mã số sinh viên
                <div class="input-group m-bot15">
                    <span class="input-group-addon btn-success">@</span>
                    <input type="text" class="form-control" id="code" name="code"
                    value="{{ old('code', isset($user) ? $user->code : '') }}">
                </div>
                E-mail
                <div class="input-group m-bot15">
                    <span class="input-group-addon btn-success">@</span>
                    <input type="text" class="form-control" id="email" name="email"
                    value="{{ old('email', isset($user) ? $user->email : '') }}">
                </div>
                Lớp
                <div class="input-group m-bot15">
                    <span class="input-group-addon btn-success">@</span>
                    <input type="text" class="form-control" id="class" name="class"
                    value="{{ old('class', isset($user) ? $user->class: '') }}">
                </div>
                <div class="input-group m-bot15">
                    Nam<input type="radio" name="gender" id="MALE" value="Nam" style="margin-right: 40px;">
                    Nữ<input type="radio" name="gender" id="FEMALE" value="Nữ">
                </div>
                Mật khẩu
                <div class="input-group m-bot15">
                    <span class="input-group-addon btn-success">@</span>
                    <input type="password" class="form-control" id="password" name="password"
                    value="">
                </div>
                Nhập lại mật khẩu
                <div class="input-group m-bot15">
                    <span class="input-group-addon btn-success">@</span>
                    <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" value="">
                </div>
                
                @if(!isset($user))
                <div class="input-group m-bot15">
                    Sinh viên<input type="radio" name="role" id="male" value="USER" style="margin-right: 40px;">
                    Giảng viên<input type="radio" name="role" id="admin" value="ADMIN" style="margin-right: 40px;">
                    Khoa CNTT<input type="radio" name="role" id="male" value="ASSESSOR" style="margin-right: 40px;">
                </div>
                @endif

                <input type="submit" class="btn btn-primary"><br>
            </div>
        </div>
    </form>

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

@endsection

