@extends('home.home')
@section('title', 'đề tài')

@section('content')
<body>
    
    <div class="table-agile-info">
        <h1>Quản lý báo cáo</h1><br>
        <form class="form-horizontal bucket-form" method="post" action="{{isset($report)? route('student.report.save',['id'=>"$report->id"]) :route('student.report.save')}}"
                      method="post"enctype="multipart/form-data">
                      @csrf
            <div class="form-group">
                <div class="col-lg-6">
                    Tên báo cáo
                    <div class="input-group m-bot15">
                        <span class="input-group-addon btn-success">@</span>
                        <input type="text" class="form-control" name="title" value="{{old('title',isset($report)? $report->title :'')}}">
                    </div>
                    Mô tả
                    <div class="input-group m-bot15">
                        <span class="input-group-addon btn-success">@</span>
                        <input type="text" class="form-control" name="contents"value="{{old('contents',isset($report)? $report->content :'')}}">
                    </div>
                    @if(isset($topic_id))
                    <input type="hidden" value="{{$topic_id}}" name="topicId" class="topicId">
                    @endif
                    @if(isset($report))
                        đổi file báo cáo
                    @else
                        file
                    @endif
                    <input type="file" name="file" accept=".docx"><br>
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
    </div>
</body>
@endsection
