@extends('admin.layout')
@section('title', 'thời gian đăng ký đề tài khóa luận')

@section('content')
    <h2>Quản lý thời gian đăng ký đề tài khóa luận</h2>
    <button type="button" class="btn btn-primary edit" data-toggle="modal" data-target="#exampleModal" data-whatever="@fat">tất cả thời hạn</button>
    <div class="table-responsive">
        <table class="table table-striped table-sm">
            <thead>
            <tr>
                <th>Id</th>
                <th>Giảng Viên</th>
                <th>Tên đề tài</th>
                <th>Nội dung</th>
                <th>thời gian đăng ký</th>
                <th>Thực hiện</th>
            </tr>
            </thead>
            <tbody>

            @foreach($posts as $post)
                <tr>
                    <td>{{$post->id}}</td>
                    <td>{{$post->lecturer->first()->name}}</td>
                    <td>{{$post->title}}</td>
                    <td>{{$post->content}}</td>
                    <td>{{$post->deadline}}</td>
                    <td><button id="{{$post->id}}" type="button" class="btn btn-primary edit" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">sửa thời gian</button></td>
                </tr>
            @endforeach
            </tbody>
        </table>

        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">thời hạn</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form id="form-modal">
                            <div class="form-group">
                                <label for="recipient-name" class="col-form-label">Nhập thời gian:</label>
                                <input type="date" class="form-control" id="recipient-name" name="date">
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

    </div>
@endsection
@section('script')

    <script>
        $(document).ready(function(){
            let idPost;
            let url;
            $('.edit').click(function () {

                 idPost = $(this).attr('id');

            });

            $(".save-data").click(function () {

                if(idPost == undefined)
                    url = "/admin/post/saveDeadline";
                else
                    url = "/admin/post/saveDeadline/"+idPost;

                $.ajax({
                    url:url,
                    type:"get",
                    data:$("#form-modal").serialize(),
                    success:function () {
                        $('#exampleModal').css("display","none");
                        setInterval('location.reload()',500);

                        // $('#exampleModal').att;r("class","modal fade");
                        // $('body').attr("class","")
                    }
                });
            });

        });

    </script>
@endsection
