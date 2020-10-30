@extends('admin.layout')
@section('title', 'Quản lý báo cáo')

@section('content')
    <h2>Quản báo cáo</h2>
    <a href="{{route('topic.report.create')}}">Tạo báo cáo</a>
    @if($topicReports->isEmpty())
        <h6>Bạn chưa tạo chủ đề báo cáo nào</h6>
        @endif
    <div class="table-responsive">
        <table class="table table-striped table-sm">
            <thead>
            <tr>
                <th>Id</th>
                <th>tên báo cáo</th>
                <th>tên đề tài</th>
                <th>thời hạn</th>
                <th>giảng viên</th>
                <th>thực hiện</th>
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
                            <a href="{{route('topic.report.edit',['id'=>$topicReport->id])}}">Sửa</a>
                            <a href="{{route('topic.report.delete',['id'=>$topicReport->id])}}">xóa</a>
                            <a href="{{route('topic.report.detailReport',['id'=>$topicReport->id])}}">xem các báo</a>
                    </td>


                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
