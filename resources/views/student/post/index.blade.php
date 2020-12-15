
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

<div class="table-agile-info">
  @if(isset($user))
    @if($userPost->status_register != \App\UserPost::STATUS_REGISTER_FINISH)
  <div class="panel panel-default">
    <div class="panel-heading">
      Đề tài đăng ký
    </div>
    <div class="table-responsive">
      <table class="table table-striped b-t b-light">
        <thead>
          <tr>
            <th>Tên đề tài</th>
            <th>Giảng viên</th>
            <th>Trạng thái</th>
            <th>Thực hiện</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>{{$user->posts->first()->title}}</td>
            <td><a href="/student/lecturer/{{$user->posts->first()->lecturer->first()->id}}">{{$user->posts->first()->lecturer->first()->name}}</a></td>
            <td>{{$userPost->status_register}}</td>
            @if($userPost->status_register == \App\UserPost::STATUS_REGISTER_ELIMINATED)
            <td><a style="color: #ff0000;" href="{{route('student.post.delete')}}" onclick="return confirm('Bạn có chắc chắn muốn hủy không?');"><i class="fa fa-times text-danger text"></i> Hủy và đăng ký đề tài khác</a></td>
            @else
            <td><a style="color: #ff0000;" href="{{route('student.post.delete')}}" onclick="return confirm('Bạn có chắc chắn muốn hủy không?');"><i class="fa fa-times text-danger text"></i> Hủy đăng ký</a></td>
            @endif
          </tr>
        </tbody>
      </table>
    </div>
  </div>
  @else
    <div class="panel panel-default">  
        <div class="panel-heading">
          Đề tài đã chọn
        </div>
        <div class="table-responsive">
          <table class="table table-striped b-t b-light">
            <thead>
              <tr>
                <th scope="col">Tên đề tài</th>
                <th scope="col">Giảng viên</th>
                <th scope="col">Nội dung đề tài</th>
                <th scope="col">Đánh giá của giảng viên</th>
                <th scope="col">Đánh giá của Khoa</th>
                <th scope="col">Trạng thái</th>
                <th scope="col">Điểm</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>{{$user->posts->first()->title}}</td>
                <td>{{$user->posts->first()->lecturer->first()->name}}</td>
                <td>{{$user->posts->first()->content}}</td>
                <td>{{$userPost->note}}</td>
                <td>{{$userPost->note_2}}</td>
                <td>{{$userPost->status}}</td>
                <td>{{$userPost->scores}}</td>
              </tr>
            </tbody>
          </table>
        </div>
        @endif
  </div>
   @else
      <p>Bạn chưa dăng ký khóa luận. <a style="color:#27b722" href="/student/viewpost"><i class="fa fa-check text-success text-active"></i> Đăng ký</a> </p>
  @endif
</div>
@endsection

