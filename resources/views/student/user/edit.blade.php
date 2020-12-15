
@extends('home.home')
@section('title', 'đề tài')

@section('content')

<div class="table-agile-info">
    <h2>Sửa thông tin tài khoản </h2><br>
    
        <form class="form-horizontal bucket-form" action="{{route('student.save',['id'=>$user->id])}}" method="post">
            @csrf
            <div class="form-group row">
                <label for="code" class="col-sm-2 col-form-label">Họ tên</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="name" value="{{$user->name}}">
                </div>
            </div>

            <div class="form-group row">
                <label for="code" class="col-sm-2 col-form-label">Ngày sinh</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="birthday" value=" {{$user->birthday}}">
                </div>
            </div>

            <div class="form-group row">
                <label for="code" class="col-sm-2 col-form-label">Mã số sinh viên</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="name" value="{{$user->code}}">
                </div>
            </div>

            <div class="form-group row">
                <label for="code" class="col-sm-2 col-form-label">Lớp</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="name" value="{{$user->class}}">
                </div>
            </div>

            <div class="form-group row">
                <label for="code" class="col-sm-2 col-form-label">Giới tính</label>
                <div class="col-sm-10">
                    <input style="margin-right: 10px" type="radio" name="gender" value="Nam">Nam
                    <input type="radio" name="gender" value="Nữ">Nữ
                </div>
            </div>

            <div class="form-group row">
                <label for="code" class="col-sm-2 col-form-label">Mật khẩu mới</label>
                <div class="col-sm-10">
                    <input type="password" class="form-control" name="password" value="">
                </div>
            </div>

            <div class="form-group row">
                <label for="code" class="col-sm-2 col-form-label">Nhập lại mật khẩu</label>
                <div class="col-sm-10">
                    <input type="password" class="form-control" name="password_confirmation" value="">
                </div>
            </div>
            

            <input type="submit" class="btn btn-primary"><br>
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
@endsection

