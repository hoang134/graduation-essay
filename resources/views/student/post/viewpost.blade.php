@extends('home.home')
@section('title', 'Đăng ký đề tài')

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
      Đăng ký đề tài
    </div>
    <div class="table-responsive">
      <table class="table table-striped b-t b-light">
        <thead>
          <tr>
            <th scope="col">Id</th>
            <th scope="col">Giảng viên</th>
            <th scope="col">Tên đề tài</th>
            <th scope="col">Nội dung</th>
            <th scope="col">Số lượng</th>
            <th scope="col">Thời hạn đăng ký</th>
            <th scope="col">Thực hiện</th>
          </tr>
        </thead>
        <tbody>
            @php
            $i = 0;
            @endphp
            @foreach($posts as $post)
          <tr>
            <td>{{$post->id}}</td>
            <td>{{$post->title}}</td>
            <td>{{$post->lecturer->first()->name}}</td>
            <td>{{$post->content}}</td>
            <td> {{$quantityUserPosts[$i][$post->id]}}/{{$post->quantity}}</td>
            <td>{{$post->deadline}}</td>
            @if($date > $post->deadline)
                <td style="color:#ff0000 "><i class="fa fa-times text-danger text"></i>Hết hạn đăng ký</td>

            @elseif($quantityUserPosts[$i][$post->id] >= $post->quantity)
                <td style="color:#ff0000 "><i class="fa fa-times text-danger text"></i>Hết số lượng đăng ký</td>
                @else
                    <td><a style="color:#27b722;" href="{{route('student.register',['user_id'=>\Illuminate\Support\Facades\Auth::user()->id,'post_id'=>$post->id])}}"><i class="fa fa-check text-success text-active"></i>Đăng ký</a></td>
            @endif
          </tr>
            @php
                $i++;
            @endphp
            @endforeach
        </tbody>
      </table>
    </div>
    <footer class="panel-footer">
      <div class="row">
        <div class="col-sm-7 text-right text-center-xs">                
          <ul class="pagination pagination-sm m-t-none m-b-none">
            <li><a href=""><i class="fa fa-chevron-left"></i></a></li>
            <li><a href="">1</a></li>
            <li><a href="">2</a></li>
            <li><a href="">3</a></li>
            <li><a href="">4</a></li>
            <li><a href=""><i class="fa fa-chevron-right"></i></a></li>
          </ul>
        </div>
      </div>
    </footer>
     @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
  </div>
</div>
@endsection
