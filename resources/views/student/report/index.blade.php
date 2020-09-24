<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <style>
       td {
           width: 200px;
           text-align: center;
       }
        h1   {color: blue;}
    </style>
    <title>Báo cáo</title>
</head>
<body>
        <h1>Báo cáo tuần</h1>
        <table>
            <tr>
                <th>Id</th>
                <th>Tiêu đề báo cáo</th>
                <th>tên đề tài</th>
                <th>thực hện</th>
            </tr>

            @php
                $i=0;
            @endphp

        @foreach($topicReports as $topicReport)
                <tr>

                    <td>{{$topicReport->id}}</td>
                    <td> {{$topicReport->title}}</td>
                    <td> {{$post->title}}</td>

                    @if($isReports[$i][$topicReport->id]=='empty')

                        <td>
                            <a href="{{route('student.report.create',['topic_id'=>"$topicReport->id"])}}">nộp báo cáo</a>

                        </td>
                    @else
                        <td>
                            <a style="margin-right: 20px" href="{{route('student.report.edit',[$topicReport->id])}}">sửa</a>
                            <a href="{{route('student.report.download',[$topicReport->id])}}">xem file báo cáo </a>
                        </td>

                </tr>

                <tr>
                    <td><button class="click" value="{{$topicReport->id}}">Nhận xét</button></td>
                </tr>
                <tr id="{{$topicReport->id}}" class="all">

                    <td>
                        <div class="{{$topicReport->id}}"></div>
                        <br>
                        <form id="form-{{$topicReport->id}}" method="post" action="{{route('comment.create')}}">
                            @csrf
                            <input name="contents" class="contents">
                            <input name="topic_id" type=hidden value="{{$topicReport->id}}">
                            <button  class="btn btn-success save-data" value="{{$topicReport->id}}">Gửi</button>
                        </form>
                    </td>
                </tr>
                @endif
                @php
                    $i++;
                @endphp
        @endforeach
        </table>

<script src="{{ '/js/libs/jquery-3.4.1.min.js' }}"></script>
<script src="{{ '/js/libs/bootstrap.bundle.min.js' }}"></script>
<script src="{{ '/js/libs/feather.min.js' }}"></script>
<script src="{{ '/js/libs/toastr.min.js' }}"></script>

    <script>
        $(document).ready(function(){
            $(".all").hide()
            $(".click").click(function(){
               let id = $(this).val();
                $('#'+id).toggle();

                $.ajax({
                    type:'GET',
                    url:"http://127.0.0.1:8000/student/comment/"+id,
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
                    url:"http://127.0.0.1:8000/student/comment/create",
                    type:"POST",
                    data:$("#"+idForm).serialize(),
                    success:function () {
                        $(".contents").val('');

                        $.ajax({
                            type:'GET',
                            url:"http://127.0.0.1:8000/student/comment/"+idReport,
                            success:function (data) {
                                $("."+idReport).html(data);
                            }
                        })
                    }
                });
            })

        });
    </script>

</body>
</html>
