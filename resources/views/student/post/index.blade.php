
@extends('home.home')
@section('title', 'Thông tin đề tài')

@section('content')
    <head>
        <style type="text/css">
            th,td {
                border-left: 1px solid #dee2e6;
                border-right: 1px solid #dee2e6;
            }
        </style>
    </head>
    <body>
    <div>
      @if(isset($user))

            @if($userPost->status_register != \App\UserPost::STATUS_REGISTER_FINISH)
                <div>
                    <div>
                        <table class="table table-striped table-sm">
                            <tr style="background-color: #555;">
                                <th scope="col">Tên đề tài</th>
                                <th scope="col"> giảng viên</th>
                                <th scope="col">trạng thái</th>
                                <th scope="col">Thực hiện</th>
                            </tr>
                            <tr>
                                <td>{{$user->posts->first()->title}}</td>
                                <td><a href="/student/lecturer/{{$user->posts->first()->lecturer->first()->id}}">{{$user->posts->first()->lecturer->first()->name}}</a></td>
                                <td>{{$userPost->status_register}}</td>
                                @if($userPost->status_register == \App\UserPost::STATUS_REGISTER_ELIMINATED)
                                    <td><a href="{{route('student.post.delete')}}" onclick="return confirm('Bạn có chắc chắn muốn hủy không?');">Hủy và đăng ký đề tài khác</a></td>
                                @else
                                    <td><a href="{{route('student.post.delete')}}" onclick="return confirm('Bạn có chắc chắn muốn hủy không?');">Hủy đăng ký</a></td>
                                @endif
                            </tr>
                        </table>
                    </div>

                @else
                    <div>
                        <center><h1>Đề tài đã chọn</h1></center>
                        <table class="table table-striped table-sm">
                            <tr style="background-color: #555;">
                                <th scope="col">Tên đề tài</th>
                                <th scope="col">Giảng viên</th>
                                <th scope="col">Nội dung đề tài</th>
                                <th scope="col">Đánh giá của giảng viên</th>
                                <th scope="col">Đánh giá của Khoa</th>
                                <th scope="col">trạng thái</th>
                                <th scope="col">điểm</th>

                            </tr>
                            <tr>
                                <td>{{$user->posts->first()->title}}</td>
                                <td>{{$user->posts->first()->lecturer->first()->name}}</td>
                                <td>{{$user->posts->first()->content}}</td>
                                <td>{{$userPost->note}}</td>
                                <td>{{$userPost->note_2}}</td>
                                <td>{{$userPost->status}}</td>
                                <td>{{$userPost->scores}}</td>
                            </tr>
                        </table>
                    </div>
                @endif
    @else
        <p>Bạn chưa dăng ký khóa luận. <a href="/student/viewpost">Đăng ký</a> </p>
    @endif


</body>
@endsection

