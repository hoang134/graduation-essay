@extends('admin.layout')
@section('title', 'Xác nhận bảo vệ khóa luận')

@section('content')
    <h2>Xác nhận bảo vệ khóa luận</h2>

    <div class="table-responsive">
        <select id="post">
        @foreach($posts as $post)
                <option  value="{{$post->id}}">{{$post->title}}</option>
        @endforeach
            </select>
        <form id="idForm">
            @csrf
            <table class="table table-striped table-sm">
                <thead>
                <tr>
                    <th>Id</th>
                    <th>tên đề tài</th>
                    <th>giảng viên</th>
                    <th>Tên sinh viên</th>
                    <th>đánh giá</th>
                    <th>Nhắn tin</th>
                    <th>Xác nhận bảo đề tài</th>
                </tr>
                </thead>

                    <tbody id="content">

                    </tbody>

            </table>
            <button  style="float: right;margin-right: 60px " type="submit" class="btn-success submit">Xác nhận</button>
        </form>
    </div>

    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Dánh giá</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="form-modal">
                        @csrf
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Nhập nội dung:</label>
                            <input type="text" class="form-control" id="recipient-name" name="note">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary save-data">lưu</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">đóng</button>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('script')
    <script>

        $(".submit").click(function (e) {
            e.preventDefault();
            $.ajax({
                type:'POST',url: "/admin/protect/post/evaluate/",
                data:$("#idForm").serialize(),
                success:function () {

                    let idPost = $('#post').val();
                    $.ajax({
                        type:'GET',
                        url: "/admin/protect/post/list/" + idPost,
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
                url: "/admin/protect/post/list/" + idPost,
                success:function (data) {
                    $("#content").html(data);
                }
            });

            $('#post').change(function () {

                idPost = $('#post').val();
                $.ajax({
                    type:'GET',
                    url: "/admin/protect/post/list/" + idPost,
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
                    url: "/admin/protect/post/evaluate/" + id,
                    success:function () {
                        idPost = $('#post').val();
                        $.ajax({
                            type:'GET',
                            url: "/admin/protect/post/list/" + idPost,
                            success:function (data) {
                                $("#content").html(data);
                            }
                        });
                    }
                });
            });

            $(window).keydown(function(event){
                if(event.keyCode == 13) {
                    event.preventDefault();
                    return false;
                }
            });

            let idUserPost;
            $(document).on('click','.data-id',function () {
                idUserPost = $(this).attr('id');

            });

            $('.save-data').click(function (e) {

                $.ajax({
                    type:'POST',
                    url: "/admin/protect/post/note/" +idUserPost,
                    data:$('#form-modal').serialize(),
                    success:function () {
                        setInterval('location.reload()',500);
                    }
                });
            });

        });
    </script>

@endsection
