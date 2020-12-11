@extends('admin.layout')
@section('title', 'Tin nhắn')

@section('content')
    <h2>Tin nhắn</h2>

    <div class="table-responsive">
            <table class="table table-striped table-sm">
                <thead>
                <tr>

                    <th>Người gửi</th>
                    <th>nội dung</th>
                    <th>người nhận</th>

                </tr>
                </thead>
                    @foreach($messengers as $messenger)
                    <tr>

                        <td>{{\App\User::find($messenger->user_id_from)->name}}</td>
                        <td>{{$messenger->content}}</td>
                        <td>{{\App\User::find($messenger->user_id_to)->name}}</td>
                    </tr>
                    @endforeach
                <tbody>

                </tbody>

            </table>

        <h3>Trả lời</h3><br>
        <form id="idForm">
            @csrf
            <input type="text" name="messenger">
            <input id="{{$idStudent}}" class="submit"  type="submit">
        </form>
    </div>

@endsection

@section('script')
    <script>
        $(document).ready(function () {

            $('.submit').click(function ( e) {
                e.preventDefault();
                let user_id = $(this).attr('id');
                $.ajax({
                    type:'POST',
                    url:"/admin/messenger/assessor/save/" + user_id,
                    data:$("#idForm").serialize(),
                    success:function () {
                        setInterval('location.reload()',500);
                    }
                })
            });

        });
    </script>

@endsection
