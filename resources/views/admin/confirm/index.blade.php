@extends('admin.layout')
@section('title', 'Duyệt Khóa luận')

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
      Duyệt khóa luận
    </div>
    <select id="post">
        @foreach($posts as $post)
            <option  value="{{$post->id}}">{{$post->title}}</option>
        @endforeach
    </select>
    <form id="idForm">
        @csrf
    <div class="table-responsive">
      <table class="table table-striped b-t b-light">
        <thead>
          <tr>
            <th>Id</th>
            <th>Tên đề tài</th>
            <th>Giảng viên</th>
            <th>Tên sinh viên</th>
            <th>Báo cáo tuần</th>
            <th>Nhận xét của giảng viên</th>
            <th>Duyệt đề tài</th>
          </tr>
        </thead>
        <tbody id="content">

        </tbody>
      </table>
    </div>
    <button  style="float: right;margin-right: 60px " type="submit" class="btn-success submit">Xác nhận</button>
</form>
  </div>
</div>
@endsection

@section('script')
    <script>

        $(".submit").click(function (e) {
            e.preventDefault();
            $.ajax({
                type:'POST',url: "/admin/confirm/evaluate",
                data:$("#idForm").serialize(),
                success:function () {

                    let idPost = $('#post').val();
                    $.ajax({
                        type:'GET',
                        url: "/admin/confirm/list/" + idPost,
                        success:function (data) {
                            $("#content").html(data);
                        }
                    });
                }
            });
        });

        $(document).ready(function () {
            let idPost = $('#post').val();
            $.ajax({
                type:'GET',
                url: "/admin/confirm/list/" + idPost,
                success:function (data) {
                    $("#content").html(data);
                }
            });

            $('#post').change(function () {

                idPost = $('#post').val();
                $.ajax({
                    type:'GET',
                    url: "/admin/confirm/list/" + idPost,
                    success:function (data) {
                        $("#content").html(data);
                    }
                });
            });

            $(document).on('click','.verify',function (e) {
                e.preventDefault()
                let id = $(this).data('id');

                $.ajax({
                    type:'GET',
                    url: "/admin/confirm/evaluate/" + id,
                    success:function () {
                        idPost = $('#post').val();
                        $.ajax({
                            type:'GET',
                            url: "/admin/confirm/list/" + idPost,
                            success:function (data) {
                                $("#content").html(data);
                            }
                        });
                    }
                });
            });
        })
    </script>

@endsection
