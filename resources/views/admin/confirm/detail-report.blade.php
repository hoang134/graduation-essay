@extends('admin.layout')
@section('title', 'Quản lý báo cáo')

@section('content')
    <h2>danh sách báo cáo</h2>

    <div class="table-responsive">
        <table class="table table-striped table-sm">
            <thead>
            <tr>
                <th>Id</th>
                <th>tên báo cáo</th>
                <th>nội dung</th>
                <th>tên sinh viên</th>
                <th>file báo cáo</th>
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
@endsection

