@extends('home.home')
@section('title', 'báo cáo tuần')

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
      Báo cáo tuần
    </div>
    @if(session()->has('empty'))
    @endif
    <div class="table-responsive">
      <table class="table table-striped b-t b-light">
        <thead>
          <tr>
            <th>Id</th>
            <th>Tiêu đề báo cáo</th>
            <th>Tên đề tài</th>
            <th>Thời hạn</th>
            <th>Thực hện</th>
            <th>Nhận xét</th>
          </tr>
        </thead>
        <tbody>
            @php
                $i=0;
            @endphp
            @foreach($topicReports as $topicReport)
          <tr>
            <td>{{$topicReport->id}}</td>
            <td> {{$topicReport->title}}</td>
            <td> {{$post->title}}</td>
            <td> {{$topicReport->deadline}}</td>

                @if($isReports[$i][$topicReport->id]=='empty')
                    <td>
                        @if($isExpireds[$i][$topicReport->id]=='false')
                            <a style="color:#27b722;" href="{{route('student.report.create',['topic_id'=>"$topicReport->id"])}}"><i class="fa fa-check text-success text-active"></i> Nộp báo cáo</a>
                        @else
                            <span style="color: #ff0000"><i class="fa fa-times text-danger text"></i> Hết hạn nộp</span>
                        @endif
                    </td>
                @else
                    <td>
                        @if($isExpireds[$i][$topicReport->id]=='false')
                            <a style="margin-right: 20px" href="{{route('student.report.edit',[$topicReport->id])}}"><i class="fa fa-pencil-square-o"></i> Sửa</a>
                        @else
                            <span style="color: #ff0000"><i class="fa fa-times text-danger text"></i> Hết hạn nộp</span>
                        @endif
                        <a href="{{route('student.report.download',[$topicReport->id])}}"><i class="fa fa-eye"></i> Xem file báo cáo </a>
                    </td>

                <td>
                    <button class="click" value="{{$topicReport->id}}">Nhận xét</button>
                    <tr id="{{$topicReport->id}}" class="all" style="display: none">
                        <td>
                            <div class="{{$topicReport->id}}"></div>
                            <br>
                            <form id="form-{{$topicReport->id}}" method="post" action="{{route('comment.create')}}">
                                @csrf
                                <label>
                                    <input name="contents" class="contents">
                                </label>
                                <input tabindex="2" name="topic_id" type="hidden" class="form-control" value="{{$topicReport->id}}">
                                <button  class="btn btn-success save-data" value="{{$topicReport->id}}"> Gửi </button>
                            </form>
                        </td>
                    </tr>
                </td>
            @endif
          </tr>
        @php
            $i++;
        @endphp
        @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>

    <script src="{{ '/js/libs/jquery-3.4.1.min.js' }}"></script>
    <script src="{{ '/js/libs/bootstrap.bundle.min.js' }}"></script>
    <script src="{{ '/js/libs/feather.min.js' }}"></script>
    <script src="{{ '/js/libs/toastr.min.js' }}"></script>

    <script>
        $(document).ready(function(){

            $(".click").click(function(){
                let id = $(this).val();
                $('#'+id).toggle();
                $.ajax({
                    type:'GET',
                    url:"/student/comment/"+id,
                    success:function (data) {
                        $("."+id).html(data);
                    }
                })
            })
            $(".save-data").click(function (event) {
                event.preventDefault();
                let idForm = $(this).parent().attr('id');
                let idReport = $(this).val();
                $.ajax({
                    url:"/student/comment/create",
                    type:"POST",
                    data:$("#"+idForm).serialize(),
                    success:function () {
                        $(".contents").val('');
                        $.ajax({
                            type:'GET',
                            url:"/student/comment/"+idReport,
                            success:function (data) {
                                $("."+idReport).html(data);
                            }
                        })
                    }
                });
            })

            $(document).on('click', '.delete', function (e) {
                e.preventDefault();
                let idTopic =  $(this).data('topic');
                let id = $(this).data('id');
                $.ajax({
                    type:'GET',
                    url: "/student/comment/delete/" + id,
                    success:function () {
                        $.ajax({
                            type:'GET',
                            url:"/student/comment/"+idTopic,
                            success:function (data) {
                                $("."+idTopic).html(data);
                            }
                        })
                    }
                })
                console.log(idTopic );
            });

        });
    </script>
    </body>
@endsection
