@extends('admin.layout')
@section('title', 'đề tài')

@section('content')
    <h2>Sửa thời gian đăng ký</h2>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-8">
                <form action="" method="post">
                    @csrf

                    <div class="form-group row">
                        <label for="code" class="col-sm-2 col-form-label">Tên đề tài</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="title" name="title"
                                   value="{{ old('address', isset($post) ? $post->title : '') }}">
                            @if ($errors->has('address'))
                                <small class="form-text text-danger">{{ $errors->first('address') }}</small>
                            @endif
                        </div>
                    </div>


                </form>
            </div>
        </div>
    </div>

@endsection

