@extends('admin.layout')
@section('title', 'Đề xuất khóa luận')

@section('content')
    <h2>Xác nhận đăng ký  khóa luận</h2>

    <div class="table-responsive">
        <select id="post">
        @foreach($posts as $post)
                <option  value="{{$post->id}}">{{$post->title}}</option>
        @endforeach
            </select>
            <table class="table table-striped table-sm">
                <thead>
                <tr>
                    <th>Id</th>
                    <th>tên đề tài</th>
                    <th>giảng viên</th>
                    <th>Tên sinh viên</th>
                    <th>Duyệt đề tài</th>
                </tr>
                </thead>

                <tbody id="content">

                </tbody>

            </table>

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
