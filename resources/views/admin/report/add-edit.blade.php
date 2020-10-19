@extends('admin.layout')
@section('title', 'đề tài')

@section('content')
    <h2>@if(isset($topicReport)) Sửa chủ đề báo cáo @else Thêm chủ đề báo cáo  @endif </h2>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-8">
                <form action="{{isset($topicReport)? route("topic.report.save",['id'=>$topicReport->id]):route('topic.report.save')}}" method="post">
                    @csrf

                    <div class="form-group row">
                        <label for="code" class="col-sm-2 col-form-label">chủ đề báo cáo</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="title" name="title"
                                   value="{{ old('title', isset($topicReport) ? $topicReport->title : '') }}">
                        </div>
                    </div>
                    @if(!isset($topicReport))
                        <div class="form-group row">
                        <label for="code" class="col-sm-2 col-form-label">chọn đề tài</label>

                            <select id ='post_id' name ="post_id" >
                                @foreach($posts as $post)
                                     <option value="{{$post->id}}">{{$post->title}}</option>
                                 @endforeach
                            </select>

                        </div>
                    @endif


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

