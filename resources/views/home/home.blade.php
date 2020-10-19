<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title')</title>
    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="{{ '/css/libs/bootstrap.min.css' }}">
    <link rel="stylesheet" href="{{ '/css/libs/bootstrap-select.css' }}">
    <link rel="stylesheet" href="{{ '/css/libs/toastr.min.css' }}">
    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }
        a{
            margin-right: 20px;
        }
        ul.droplinemenu {
            position: relative;
            padding-top: 5px;
            padding-bottom:5px;
            color: white;
        }
        ul.droplinemenu > li {
            display: inline;
            height: 20px;
            padding: 5px 10px;
            list-style-type: none;
            cursor:pointer;
        }
        ul.droplinemenu  > li > ul {
            display: none;
            position:absolute;
            top:29px;
            left:0px;
            padding-top: 5px;
            padding-bottom:5px;
            background:#343a40;
        }
        ul.droplinemenu  > li:hover > ul  {
            display: block;
        }
        ul.droplinemenu  > li > ul > li {
            display: inline;
            cursor:pointer;
            list-style-type: none;
        }
        .droplinemenu li ul li:hover {
            background-color: darkblue;
        }
    </style>
    <!-- Custom styles for this template -->
    <link rel="stylesheet" href="{{ '/css/admin.css' }}">
</head>
<body>
<nav class="navbar navbar-dark fixed-top bg-dark flex-md-nowrap p-0 shadow">
    <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="{{route('post')}}">Trang chủ</a>
    <a class="col-sm-3 col-md-4 mr-0" style="color:white;">Hệ thống quản lý khóa luận tốt nghiệp</a>
    <ul class="navbar-nav px-3">
        <ul class="droplinemenu">
            <li>
                <a>Chức năng</a>
                <ul>
                    <li>
                        <a active href="{{route('student.information')}}" style="color: white;text-decoration: none;"><span data-feather="user"></span> {{\Illuminate\Support\Facades\Auth::user()->name}}</a>
                    </li>
                    <li>
                        <a href="/login" style="color: white;text-decoration: none;"><span data-feather="power"></span> Logout</a>
                    </li>
                </ul>
            </li>
        </ul>
    </ul>
</nav>

<div class="container-fluid">
    <div class="row">
        <nav class="col-md-2 d-none d-md-block bg-light sidebar">
            <div class="sidebar-sticky">
                <ul class="nav flex-column">

                    <li class="nav-item">
                        <a class="nav-link post-menu" href="/student/viewpost">
                            <span data-feather="airplay"></span>
                            Đề Tài
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link user-menu" href="/student/post">
                            <span data-feather="airplay"></span>
                            Đề tài đã đăng ký
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link topicReport-menu" href="/student/report">
                            <span data-feather="airplay"></span>
                            Báo cáo tuần
                        </a>
                    </li>
                </ul>
            </div>
        </nav>

        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
            @yield('content')
        </main>
    </div>
</div>
<script src="{{ '/js/libs/jquery-3.4.1.min.js' }}"></script>
<script src="{{ '/js/libs/bootstrap.bundle.min.js' }}"></script>
<script src="{{ '/js/libs/feather.min.js' }}"></script>
<script src="{{ '/js/libs/toastr.min.js' }}"></script>
<script>
    feather.replace();

    @if(isset($activeMenu))
    $('.{{ $activeMenu }}').addClass('active');
    @endif

    @if(session('success'))
    toastr.success('{{ session('success') }}');
    @endif

    @if(isset($error))
    toastr.error('{{ $error }}');
    @endif

</script>
@yield('script')
</body>
</html>