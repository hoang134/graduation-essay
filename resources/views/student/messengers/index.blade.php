
@extends('home.home')
@section('title', 'Tin nhắn')

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
        <div>
            <h1>Tin nhắn</h1>

            <table class="table table-striped table-sm">
                <thead>
                    <tr style="background-color: #555;">
                        <th scope="col">người gửi</th>
                        <th scope="col">Nội dung</th>
                        <th scope="col">Người nhận</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach($messengers as $messenger)
                        <tr>

                            <td>{{\App\User::find($messenger->user_id_from)->name}}</td>
                            <td>{{$messenger->content}}</td>
                            <td>{{\App\User::find($messenger->user_id_to)->name}}</td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
            <h3>Trả lời</h3><br>
            <form id="idForm">
                @csrf
                <input type="text" name="messenger">
                <select id="selectId">
                    <option value="{{$assessor->id}}"> {{$assessor->name}}</option>
                    <option value="{{$lecturer->id}}"> {{$lecturer->name}} </option>
                </select>
                <input id="submit" type="submit">
            </form>
        </div>
    </div>
</body>
<script>
    $(document).ready(function () {
        let user_id = $('#selectId').val();
        $('#selectId').change(function () {
            user_id = $('#selectId').val();
        });
        $('#submit').click(function ( e) {
            e.preventDefault();
            $.ajax({
                type:'POST',
                url:"messenger/save/" + user_id,
                data:$("#idForm").serialize(),
                success:function () {
                    setInterval('location.reload()',500);
                }
            })
        });

    });
</script>
@endsection




