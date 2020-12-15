
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
    <div class="table-agile-info">
    <div class="mail-w3agile">
        <div class="row">
            <div class="col-sm-3 com-w3ls">
                <section class="panel">
                    <div class="panel-body">
                        <a onclick="$(this).hide(); $('#selectId').parent().removeClass('hidden'); $('#selectId').focus();$(this).hide(); $('#messenger').parent().removeClass('hidden'); $('#messenger').focus();$(this).hide(); $('#submit').parent().removeClass('hidden'); $('#submit').focus();" href="javascript:;"  class="btn btn-compose">
                            Gửi tin nhắn
                        </a>
                        <ul class="nav nav-pills nav-stacked mail-nav">
                            <li><a href=""> <i class="fa fa-inbox"></i> Tất cả tin nhắn  </a></li>
                            <li><a href="#"> <i class="fa fa-envelope"></i> Tin nhắn đã gửi</a></li>
                        </ul>
                    </div>
                </section>
            </div>
            <div class="col-sm-9 mail-w3agile">
                <section class="panel">
                    <header class="panel-heading wht-bg">
                       <h4 class="gen-case">Tất cả tin nhắn
                        <form action="#" class="pull-right mail-src-position">
                            <div class="input-append">
                                <input type="text" class="form-control " placeholder="Search Mail">
                            </div>
                        </form>
                       </h4>
                    </header>
                    <div class="panel-body minimal">
                        <div class="table-inbox-wrap ">
                            <table class="table table-inbox table-hover">
                                <thead>
                                    <tr>
                                        <th><i class="fa fa-star"></i></th>
                                        <th>Người gửi</th>
                                        <th>Nội dung</th>
                                        <th>Người nhận</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($messengers as $messenger)
                                    <tr class="">
                                        <td class="inbox-small-cells"><i class="fa fa-star"></i></td>
                                        <td class="view-message dont-show"><a href="#">{{\App\User::find($messenger->user_id_from)->name}}</a></td>
                                        <td class="view-message"><a href="#">{{$messenger->content}}</a></td>
                                        <td class="view-message dont-show"><a href="#">{{\App\User::find($messenger->user_id_to)->name}}</a></td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>

    <div>
        <div>
            <h3>Trả lời</h3><br>

                <form id="idForm">
                    @csrf
                    <div class="form-group hidden">
                        <label for="selectId" class="">Người nhận</label>
                        <select id="selectId" class="form-control">
                            <option value="{{$assessor->id}}"> {{$assessor->name}}</option>
                            <option value="{{$lecturer->id}}"> {{$lecturer->name}} </option>
                        </select>
                    </div>

                    <div class="form-group hidden">
                        <label for="messenger" class="">Nội dung</label>
                        <input type="text" tabindex="2" id="messenger" name="messenger" class="form-control">
                    </div>
                    <div class="form-group hidden">
                        <label for="submit" class=""></label>
                        <input id="submit" class="form-control" type="submit">
                    </div>
                    
                </form>
        </div>
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




