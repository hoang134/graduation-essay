@extends('home.home')
@section('title', 'báo cáo tuần')

@section('content')
    <head>
        <link rel="stylesheet" href="{{ '/css/admin.css' }}">
        <style type="text/css">
            th,td {
                border-left: 1px solid #dee2e6;
                border-right: 1px solid #dee2e6;
            }
        </style>
    </head>
    <body>
    <center><h1>Báo cáo tuần</h1></center>

    @if(session()->has('empty'))

    @endif
    <div class="table-responsive">
        <table class="table table-striped table-sm">
            <tr style="background-color: #555;">
                <th>Id</th>
                <th>Tiêu đề báo cáo</th>
                <th>tên đề tài</th>
                <th>thời hạn</th>
                <th>thực hện</th>
                <th>Nhận xét</th>
            </tr>
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
                                    <a href="{{route('student.report.create',['topic_id'=>"$topicReport->id"])}}">nộp báo cáo</a>
                                @else
                                    <span style="color: #ff0000"> hết hạn nộp</span>
                                @endif
                            </td>
                        @else
                            <td>
                                @if($isExpireds[$i][$topicReport->id]=='false')
                                    <a style="margin-right: 20px" href="{{route('student.report.edit',[$topicReport->id])}}">sửa</a>
                                @else
                                    <span style="color: #ff0000"> hết hạn nộp</span>
                                @endif
                                <a href="{{route('student.report.download',[$topicReport->id])}}">xem file báo cáo </a>
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
                                            <input name="topic_id" type="hidden" value="{{$topicReport->id}}">
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

        </table>
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
