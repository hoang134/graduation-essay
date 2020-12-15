@extends('admin.layout')
@section('title', 'tài khoản')

@section('content')

<div class="table-agile-info">
    <div class="panel-heading">
      @if(isset($user)) Sửa tài khoản @else Thêm tài khoản  @endif
    </div>
    <br>
    @if(!isset($user))
    <div class="table-responsive">
        <form action="{{route('user.import')}}" enctype="multipart/form-data" method="post">
            @csrf
            <input type="file" name="file" value="Thêm tài khoản bằn Excel" accept=".xlsx">
            <input type="submit" value="tạo tài khoản">
        </form>
    </div>
    @endif
      <form action="{{isset($user)? route('user.save',['id'=>$user->id]):route('user.save')}}" method="post">
        @csrf

        <div class="form-group row">
            <label for="code" class="col-sm-2 col-form-label">Tên</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="name" name="name"
                       value="{{ old('name', isset($user) ? $user->name : '') }}">
            </div>
        </div>

        <div class="form-group row">
            <label for="code" class="col-sm-2 col-form-label">Ngày sinh</label>
            <div class="col-sm-10">
                <input  type=text class="form-control" id="birthday" placeholder="xx/yy/zzzz" name="birthday"
                       value="{{ old('birthday', isset($user) ? $user->birthday : '') }}">
            </div>
        </div>

        <div class="form-group row">
            <label for="code" class="col-sm-2 col-form-label">Mã số</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="code" name="code"
                       value="{{ old('code', isset($user) ? $user->code : '') }}">
            </div>
        </div>

        <div class="form-group row">
            <label for="code" class="col-sm-2 col-form-label">E-mail</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="email" name="email"
                       value="{{ old('email', isset($user) ? $user->email : '') }}">
            </div>
        </div>

        <div class="form-group row">
            <label for="quantity" class="col-sm-2 col-form-label">Lớp/Nơi công tác</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="class" name="class"
                       value="{{ old('class', isset($user) ? $user->class: '') }}">
            </div>
        </div>

        <div class="form-group row">
            <label for="quantity" class="col-sm-2 col-form-label">Giới tính</label>
            <div class="col-sm-10">
                Nam<input type="radio"  name="gender" id="MALE" value="Nam" >
                Nữ<input type="radio"  name="gender" id="FEMALE" value="Nữ">
            </div>
        </div>

        <!-- <div>
            
            <div class="col-sm-10">
                Nam<input type="radio" name="gender" id="MALE" value="Nam" >
                
                Nữ<input type="radio" name="gender" id="FEMALE" value="Nữ">
            <div class="col-sm-10">
        </div> -->

        <div class="form-group row">
            <label for="quantity" class="col-sm-2 col-form-label">Mật khẩu{{isset($user) ? ' mới':''}}</label>
            <div class="col-sm-10">
                <input type="password" class="form-control" id="password" name="password"
                       value="">
            </div>
        </div>

        <div class="form-group row">
            <label for="quantity" class="col-sm-2 col-form-label"> Nhập lại mật khẩu</label>
            <div class="col-sm-10">
                <input type="password" class="form-control" id="password_confirmation" name="password_confirmation"
                       value="">
            </div>
        </div>

        @if(!isset($user))
            <div>
                <span style="font-size: 15px;margin-left: 200px;" >Sinh viên</span>
                <input type="radio" name="role" id="male" value="USER" >

                <span style="font-size: 15px;">Giảng viên</span>
                <input type="radio" name="role" id="admin" value="ADMIN">

                <span style="font-size: 15px;" >Khoa CNTT</span>
                <input type="radio" name="role" id="male" value="ASSESSOR" >

            </div>
        @endif
        <div class="form-group row justify-content-end">
            <button type="submit" class="btn btn-primary">Lưu</button>
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
    </div>
</div>
@endsection