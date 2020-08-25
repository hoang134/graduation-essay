@extends('admin.layout')
@section('title', 'đề tài')

@section('content')
    <h2>@if(isset($user)) Sửa tài khoản @else Thêm tài khoản  @endif </h2>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-8">
                <form action="{{isset($user)? route("post.save",['id'=>$user->id]):route('post.save')}}" method="post">
                    @csrf

                    <div class="form-group row">
                        <label for="code" class="col-sm-2 col-form-label">tên</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="name" name="name"
                                   value="{{ old('address', isset($user) ? $user->title : '') }}">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="code" class="col-sm-2 col-form-label">ngày sinh</label>
                        <div class="col-sm-10">
                            <input type="date" class="form-control" id="birthday" name="birthday"
                                   value="{{ old('address', isset($user) ? $user->title : '') }}">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="code" class="col-sm-2 col-form-label">code</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="code" name="code"
                                   value="{{ old('address', isset($user) ? $user->title : '') }}">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="code" class="col-sm-2 col-form-label">email</label>
                        <div class="col-sm-10">
                            <input type="date" class="form-control" id="email" name="email"
                                   value="{{ old('address', isset($user) ? $user->title : '') }}">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="quantity" class="col-sm-2 col-form-label">Mật khẩu</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="contents" name="contents"
                                   value="{{ old('phone', isset($user) ? $user->content: '') }}">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="quantity" class="col-sm-2 col-form-label">Lớp</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="class" name="class"
                                   value="{{ old('phone', isset($user) ? $user->content: '') }}">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="quantity" class="col-sm-2 col-form-label">Giới tính</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="gender" name="gender"
                                   value="{{ old('phone', isset($user) ? $user->content: '') }}">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="quantity" class="col-sm-2 col-form-label">Mật khẩu</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="contents" name="contents"
                                   value="{{ old('phone', isset($user) ? $user->content: '') }}">
                        </div>
                    </div>

                    <div class="form-group row justify-content-end">
                        <button type="submit" class="btn btn-primary">Lưu</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection

