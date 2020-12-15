@extends('admin.layout')
@section('title', 'Đề xuất khóa luận')

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
      Xác nhận đăng ký khóa luận
    </div>
    <select id="post">
        @foreach($posts as $post)
        <option  value="{{$post->id}}">{{$post->title}}</option>
        @endforeach
    </select>
    <div class="table-responsive">
      <table class="table table-striped b-t b-light">
        <thead>
          <tr>
            <th>Id</th>
            <th>Tên đề tài</th>
            <th>Giảng viên</th>
            <th>Tên sinh viên</th>
            <th>Duyệt đề tài</th>
          </tr>
        </thead>
        <tbody id="content">

        </tbody>
      </table>
    </div>
  </div>
</div>
@endsection

@section('script')
    <script>
        $(document).ready(function () {
            let idPost = $('#post').val();
            $.ajax({
                type:'GET',
                url: "/admin/post/verify/register/list/" + idPost,
                success:function (data) {
                    $("#content").html(data);
                }
            });

            $('#post').change(function () {

                idPost = $('#post').val();
                $.ajax({
                    type:'GET',
                    url: "/admin/post/verify/register/list/" + idPost,
                    success:function (data) {
                        $("#content").html(data);
                    }
                });
            });

            $(document).on('click','.verify',function () {
                let id = $(this).data('id');

                $.ajax({
                    type:'GET',
                    url: "/admin/post/verify/register/evaluate/" + id,
                    success:function () {
                        idPost = $('#post').val();
                        $.ajax({
                            type:'GET',
                            url: "/admin/post/verify/register/list/" + idPost,
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
