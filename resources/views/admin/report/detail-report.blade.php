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
      Chi tiết báo cáo
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
                <tr>
                    <td><button class="click" value="{{$report->id}}">Nhận xét</button></td>
                </tr>
                <tr id="{{$report->id}}" style="display: none" class="all">

                    <td>
                        <div name ="data" class="{{$report->id}}"></div>
                        <br>
                        <form id="form-{{$report->id}}" method="post" action="{{route('comment.create')}}">
                            @csrf
                            <textarea  type="text" name="contents" class="contents form-control"></textarea>
                            <input name="report_id" type=hidden value="{{$report->id}}">
                            <button  class="btn btn-success save-data" value="{{$report->id}}">Gửi</button>
                        </form>
                    </td>
                </tr>

            @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>
@endsection
@section('script')
    <script>
        $(document).ready(function(){
            // $(".all").hide();
            $(".click").click(function() {
                let id =$(this).val();
                $("#"+id).toggle();
                $.ajax({
                    type:'GET',
                    url: "/admin/comment/" +id,
                    success:function (data) {
                        $("."+id).html(data);
                    }
                });
            });
            $(".save-data").click(function (event) {
                event.preventDefault();
                let idForm = $(this).parent().attr('id');
                let idReport = $(this).val();
                $.ajax({
                    url:"/admin/comment/create",
                    type:"POST",
                    data:$("#"+idForm).serialize(),
                    success:function () {
                        $(".contents").val('');
                        $.ajax({
                            type:'GET',
                            url:"/admin/comment/"+ idReport,
                            success:function (data) {
                                $("."+idReport).html(data);
                            }
                        })
                    }
                });
            });
            $(document).on('click', '.delete', function (e) {
                e.preventDefault();
                let idReport =  $(this).data('report');
                let id = $(this).data('id');
                $.ajax({
                    type:'GET',
                    url: "/admin/comment/delete/" + id,
                    success:function () {
                        $.ajax({
                            type:'GET',
                            url: "/admin/comment/" + idReport,
                            success:function (data) {
                                $("."+idReport).html(data);
                            }
                        })
                    }
                })
                console.log(id);
            });
        });
    </script>
@endsection
