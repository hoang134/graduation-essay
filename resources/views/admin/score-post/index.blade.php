@extends('admin.layout')
@section('title', 'Điểm  Khóa luận')

@section('content')
    <h2>Điểm  Khóa luận</h2>

    <div class="table-responsive">
        <form action="/admin/score/post/save" method="post">
            @csrf
            <table class="table table-striped table-sm">
                <thead>
                <tr>
                    <th>Id</th>
                    <th>tên đề tài</th>
                    <th>Tên sinh viên</th>
                    <th>Đánh giá của khoa</th>
                    <th>Điểm</th>
                    <th>Thực hiện</th>
                </tr>
                </thead>


                    <tbody>
                    @foreach($userPosts as $userPost)
                        <tr>
                            <td>{{$userPost->id}}</td>
                            <td>{{\Illuminate\Support\Facades\DB::table('posts')->where('id',$userPost->post_id)->get()->first()->title }}</td>
                            <td>{{\Illuminate\Support\Facades\DB::table('users')->where('id',$userPost->user_id)->get()->first()->name}}</td>
                            <td>{{$userPost->note_2}}</td>
                            <td>{{$userPost->scores}}</td>
                            <td><input id="{{$userPost->id}}" type="number" name="scores[]" value="{{$userPost->scores}}" step="0.1"></td>
                            <td><input id="" type="hidden" name="idUserPost[]" value="{{$userPost->id}}" ></td>
                        </tr>
                    @endforeach

                    </tbody>

            </table>
            <input style="float: right;margin-right: 50px" type="submit" class="btn-success" value="xác nhận">
        </form>
    </div>


@endsection

@section('script')
    <script>

    </script>

@endsection
