@extends('admin.layout')
@section('title', 'đề tài')

@section('content')

<head>
    <style type="text/css">
        th,td {
            border-left: 1px solid #dee2e6;
            border-right: 1px solid #dee2e6;
        }
    </style>
</head>

<div class="table-agile-info">
    <div class="panel-heading">
      @if(isset($topicReport)) Sửa chủ đề báo cáo @else Thêm chủ đề báo cáo  @endif
    </div>
    <br>
    <div>
      <form class="form-horizontal bucket-form" action="{{isset($topicReport)? route('topic.report.save',['id'=>$topicReport->id]):route('topic.report.save')}}" method="post">
            @csrf
            <div class="form-group row">
                <label for="code" class="col-sm-2 col-form-label"> Chủ đề báo cáo</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="title" name="title"
                    value="{{ old('title', isset($topicReport) ? $topicReport->title : '') }}">
                </div>
            </div>

            @if(!isset($topicReport))
                <div class="form-group row">
                <label for="code" class="col-sm-2 col-form-label"> Chọn đề tài</label>
                <div class="col-sm-10">
                    <select id ='post_id' name ="post_id" >
                        @foreach($posts as $post)
                             <option value="{{$post->id}}">{{$post->title}}</option>
                         @endforeach
                    </select>
                </div>
                </div>
            @endif

            <div class="form-group row">
                <label for="code" class="col-sm-2 col-form-label"> Hạn đăng ký</label>
                <div class="col-sm-10">
                    <input type="date" class="form-control" id="deadline" name="deadline"
                           value="{{ old('deadline', isset($topicReport) ? ($topicReport->deadline) : '') }}">
                </div>
            </div>

            <div class="form-group row">
                <div class="col-sm-10">
                <button style="margin-left: 10px;" type="submit" class="btn btn-primary">Lưu</button>
            </div>
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
@endsection

