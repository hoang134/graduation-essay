@extends('admin.layout')
@section('title', 'Quản lý báo cáo')

@section('content')
    <h2>chi tiết báo cáo</h2>

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
                <tr>
                    <td><button class="click" value="{{$report->id}}">Nhận xét</button></td>
                </tr>
                <tr id="{{$report->id}}" class="all">

                    <td>
                        <div class="{{$report->id}}"></div>
                        <br>
                        <form id="form-{{$report->id}}" method="post" action="{{route('comment.create')}}">
                           @csrf
                            <input name="contents" class="contents">
                            <input name="report_id" type=hidden value="{{$report->id}}">
                            <button  class="btn btn-success save-data" value="{{$report->id}}">Gửi</button>
                        </form>
                    </td>
                </tr>

            @endforeach
            </tbody>
        </table>
    </div>
@endsection
@section('script')
    <script>
        $(document).ready(function(){

            $(".all").hide();

            $(".click").click(function(){
                let id =$(this).val()

                $("#"+id).toggle();
                $.ajax({
                    type:'GET',
                    url:"http://127.0.0.1:8000/admin/comment/"+id,
                    success:function (data) {
                      $("."+id).html(data);
                    }
                })

            });
            $(".save-data").click(function (event) {
                event.preventDefault();
                let idForm = $(this).parent().attr('id');
                let idReport = $(this).val();

                $.ajax({
                    url:"http://127.0.0.1:8000/admin/comment/create",
                    type:"POST",
                    data:$("#"+idForm).serialize(),
                    success:function () {
                        $(".contents").val('');

                        $.ajax({
                            type:'GET',
                            url:"http://127.0.0.1:8000/admin/comment/"+idReport,
                            success:function (data) {
                                $("."+idReport).html(data);
                            }
                        })
                    }
                });
            })
        });

    </script>
@endsection
