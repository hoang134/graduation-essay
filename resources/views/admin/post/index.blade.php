@extends('admin.layout')
@section('title', 'Quản lý đề tài khóa luận')

@section('content')
    <h2>Quản lý đề tài khóa luận</h2>
    <a href="{{route('post.create')}}">Thêm đề tài khóa luận</a>
    <div class="table-responsive">
        <table class="table table-striped table-sm">
            <thead>
            <tr>
                <th>Id</th>
                <th>Giảng Viên</th>
                <th>Tên đề tài</th>
                <th>Nội dung</th>
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

                    <td>
                        @can('update',$post)
                            <a href="{{route('post.edit',['id'=>$post->id])}}">Sửa</a></td>
                        @endcan
                    <td>
                        @can('delete',$post)
                            <a href="{{route('post.delete',['id'=>$post->id])}}">Xóa</a>
                        @endcan
                    </td>


                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
