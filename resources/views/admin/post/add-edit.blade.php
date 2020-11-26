@extends('admin.layout')
@section('title', 'đề tài')

@section('content')
<center><h2>@if(isset($post)) Sửa đề tài @else Thêm đề tài  @endif </h2></center>
    <form class="form-horizontal bucket-form" action="{{isset($post)? route('post.save',['id'=>$post->id]):route('post.save')}}" method="post">
        @csrf
        <div class="form-group">
            <div class="col-lg-11">
                Tên đề tài
                <div class="input-group m-bot15">
                    <span class="input-group-addon btn-success">@</span>
                    <input type="text" class="form-control" id="title" name="title"
                    value="{{ old('address', isset($post) ? $post->title : '') }}">
                    @if ($errors->has('address'))
                        <small class="form-text text-danger">{{ $errors->first('address') }}</small>
                    @endif
                </div>
                Nội dung
                <div class="input-group m-bot15">
                    <span class="input-group-addon btn-success">@</span>
                    <input type="text" class="form-control" id="contents" name="contents"
                    value="{{ old('contents', isset($post) ? $post->content: '') }}">
                    @if ($errors->has('phone'))
                        <small class="form-text text-danger">{{ $errors->first('phone') }}</small>
                    @endif
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
                <input type="submit" class="btn btn-primary"><br>
            </div>
        </div>
    </form>
@endsection

