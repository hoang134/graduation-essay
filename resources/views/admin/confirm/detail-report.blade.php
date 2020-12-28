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
      Danh sách báo cáo
    </div>
    <div class="table-responsive">
      <table class="table table-striped b-t b-light">
        <thead>
          <tr>
            <th>Id</th>
            <th>Tên báo cáo</th>
            <th>Nội dung</th>
            <th>Tên sinh viên</th>
            <th>File báo cáo</th>
          </tr>
        </thead>
        <tbody>
          @foreach($reports as $report)
            <tr>
                <td>{{$report->id}}</td>
                <td>{{$report->title}}</td>
                <td>{{$report->content}}</td>
                <td>{{$report->user()->first()->name}}</td>
                <td><a href="{{route('topic.report.download',['id'=>$report->id])}}">{{$report->title}}</a></td>
            </tr>
            @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>
@endsection

