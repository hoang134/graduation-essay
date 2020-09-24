@extends('admin.layout')
@section('title', 'tài khoản')

@section('content')
    <h2>@if(isset($user)) Sửa tài khoản @else Thêm tài khoản  @endif </h2>
        @if(!isset($user))
            <div class="container">
                <form action="{{route('user.import')}}" enctype="multipart/form-data" method="post">
                    @csrf
                    <input type="file" name="file" value="Thêm tài khoản bằn Excel" accept=".xlsx">
                    <input type="submit" value="tạo tài khoản">
                </form>

            </div>
        @endif
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-8">
                <form action="{{isset($user)? route("user.save",['id'=>$user->id]):route('user.save')}}" method="post">
                    @csrf

                    <div class="form-group row">
                        <label for="code" class="col-sm-2 col-form-label">tên</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="name" name="name"
                                   value="{{ old('name', isset($user) ? $user->name : '') }}">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="code" class="col-sm-2 col-form-label">ngày sinh</label>
                        <div class="col-sm-10">
                            <input  type=text class="form-control" id="birthday" placeholder="xx/yy/zzzz" name="birthday"
                                   value="{{ old('birthday', isset($user) ? $user->birthday : '') }}">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="code" class="col-sm-2 col-form-label">code</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="code" name="code"
                                   value="{{ old('code', isset($user) ? $user->code : '') }}">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="code" class="col-sm-2 col-form-label">email</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="email" name="email"
                                   value="{{ old('email', isset($user) ? $user->email : '') }}">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="quantity" class="col-sm-2 col-form-label">Lớp</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="class" name="class"
                                   value="{{ old('class', isset($user) ? $user->class: '') }}">
                        </div>
                    </div>

                    <div>

                        <span style="font-size: 15px;margin-left: 200px;" >Name</span>
                        <input type="radio" name="gender" id="MALE" value="Nam" >
                        <span style="font-size: 15px;">Nữ</span>
                        <input type="radio" name="gender" id="FEMALE" value="Nữ">
                    </div>

                    <div class="form-group row">
                        <label for="quantity" class="col-sm-2 col-form-label">Mật khẩu{{isset($user) ? ' mới':''}}</label>
                        <div class="col-sm-10">
                            <input type="password" class="form-control" id="password" name="password"
                                   value="">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="quantity" class="col-sm-2 col-form-label"> nhập lại mật khẩu</label>
                        <div class="col-sm-10">
                            <input type="password" class="form-control" id="password_confirmation" name="password_confirmation"
                                   value="">
                        </div>
                    </div>

                    @if(!isset($user))
                        <div>
                            <span style="font-size: 15px;margin-left: 200px;" >Sinh viên</span>
                            <input type="radio" name="role" id="male" value="user" >
                            <span style="font-size: 15px;">giảng viên</span>
                            <input type="radio" name="role" id="admin" value="admin">
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
    </div>

@endsection

