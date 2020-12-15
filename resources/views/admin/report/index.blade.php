@extends('admin.layout')
@section('title', 'Quản lý báo cáo')

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
  <div class="panel panel-default">
    <div class="panel-heading">
      Quản lý báo cáo
    </div>
    <a href="{{route('topic.report.create')}}">Tạo báo cáo</a>
    @if($topicReports->isEmpty())
        <h4>Bạn chưa tạo chủ đề báo cáo nào</h4>
    @endif
    <div class="table-responsive">
      <table class="table table-striped b-t b-light">
        <thead>
          <tr>
            <th>Id</th>
            <th>Tên báo cáo</th>
            <th>Tên đề tài</th>
            <th>Thời hạn</th>
            <th>Giảng viên</th>
            <th colspan="3">Thực hiện</th>
          </tr>
        </thead>
        <tbody>
          @foreach($topicReports as $topicReport)
            <tr>
                <td>{{$topicReport->id}}</td>
                <td>{{$topicReport->title}}</td>
                <td>{{\App\Post::find($topicReport->post_id)->title}}</td>
                <td>{{$topicReport->deadline}}</td>
                <td>{{\Illuminate\Support\Facades\Auth::user()->name}}</td>
                <td>
                    <a style="color:#27b722" href="{{route('topic.report.edit',['id'=>$topicReport->id])}}"><i class="fa fa-pencil-square-o"></i> Sửa</a> 
                </td>
                <td>
                    <a style="color: #ff0000" href="{{route('topic.report.delete',['id'=>$topicReport->id])}}"><i class="fa fa-times text-danger text"></i> Xóa</a>
                </td>
                <td>
                    <a href="{{route('topic.report.detailReport',['id'=>$topicReport->id])}}"><i class="fa fa-eye"></i> Xem các báo</a>
                </td>
            </tr>
        @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>
@endsection
