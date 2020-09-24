@extends('admin.layout')
@section('title', 'đề tài')

@section('content')
    <h2>@if(isset($post)) Sửa đề tài @else Thêm đề tài  @endif </h2>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-8">
                <form action="{{isset($post)? route("post.save",['id'=>$post->id]):route('post.save')}}" method="post">
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

                    <div class="form-group row">
                        <label for="quantity" class="col-sm-2 col-form-label">Nội dung</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="contents" name="contents"
                                   value="{{ old('contents', isset($post) ? $post->content: '') }}">

                            @if ($errors->has('phone'))
                                <small class="form-text text-danger">{{ $errors->first('phone') }}</small>
                            @endif
                        </div>
                    </div>

                    <div class="form-group row justify-content-end">
                        <button type="submit" class="btn btn-primary">Lưu</button>
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
                </form>
            </div>
        </div>
    </div>

@endsection

