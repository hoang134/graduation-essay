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
    </style>
    <!-- Custom styles for this template -->
    <link rel="stylesheet" href="{{ '/css/admin.css' }}">
</head>
<body>
<nav class="navbar navbar-dark fixed-top bg-dark flex-md-nowrap p-0 shadow">
    <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="{{route('post')}}">Home Page</a>
    <input class="form-control form-control-dark w-100" type="text" placeholder="Search" aria-label="Search">
    <ul class="navbar-nav px-3">
        <li class="nav-item text-nowrap">
            <a class="nav-link" href="{{route('logout')}}">Sign out</a>
        </li>
    </ul>
</nav>

<div class="container-fluid">
    <div class="row">
        <nav class="col-md-2 d-none d-md-block bg-light sidebar">
            <div class="sidebar-sticky">
                <ul class="nav flex-column">

                    <li class="nav-item">
                        <a class="nav-link post-menu" href="/admin/post">
                            <span data-feather="airplay"></span>
                            Đề Tài
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link user-menu" href="/admin/user">
                            <span data-feather="airplay"></span>
                            Tài khoản
                        </a>
                    </li>
                    @can('viewReport',\App\User::class)
                        <li class="nav-item">
                            <a class="nav-link topicReport-menu" href="/admin/report">
                                <span data-feather="airplay"></span>
                                Báo cáo
                            </a>
                        </li>
                    @endcan
                    @can('viewany',\App\UserPost::class)
                        <li class="nav-item">
                            <a class="nav-link list-post-menu" href="/admin/list">
                                <span data-feather="airplay"></span>
                                Danh sách sinh viên đăng ký
                            </a>
                        </li>
                    @endcan


                    @can('lecturers',\App\User::class)
                        <li class="nav-item">
                            <a class="nav-link verify-menu" href="/admin/verify">
                                <span data-feather="airplay"></span>
                                Xác nhận khóa luận
                            </a>
                        </li>
                    @endcan

                    @can('assessor',\App\User::class)
                        <li class="nav-item">
                            <a class="nav-link confirm-menu" href="/admin/confirm">
                                <span data-feather="airplay"></span>
                                Duyệt khóa luận
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link deadline-menu" href="/admin/post/deadline">
                                <span data-feather="airplay"></span>
                                Thời gian đăng ký khóa luận
                            </a>
                        </li>
                    @endcan

                </ul>

                <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
                    <span>Saved reports</span>
                    <a class="d-flex align-items-center text-muted" href="#">
                        <span data-feather="plus-circle"></span>
                    </a>
                </h6>
                <ul class="nav flex-column mb-2">
                    <li class="nav-item">
                        <a class="nav-link" href="/">
                            <span data-feather="file-text"></span>
                            Current month
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

{{--    @if(session('error'))--}}
{{--    toastr.error('123');--}}
{{--    @endif--}}

</script>
@yield('script')
</body>
</html>


<!DOCTYPE html>
<head>
<title>@yield('title')</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="csrf-token" content="{{ csrf_token() }}">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>

<link rel="stylesheet" href="{{asset('css/libs2/bootstrap.min.css')}}" >
<link href="{{asset('css/libs2/style.css')}}" rel='stylesheet' type='text/css' />
<link href="{{asset('css/libs2/style-responsive.css')}}" rel="stylesheet"/>
<link href='//fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
<link rel="stylesheet" href="{{asset('css/libs2/font.css')}}" type="text/css"/>
<link href="{{asset('css/libs2/font-awesome.css')}}" rel="stylesheet"> 
<link rel="stylesheet" href="{{asset('css/libs2/morris.css')}}" type="text/css"/>
<link href="{{ asset('/css/fontawesome/css/all.css') }}" rel="stylesheet"> 
<link rel="stylesheet" href="{{asset('css/libs2/monthly.css')}}">

<script src="{{asset('js/libs2/jquery2.0.3.min.js')}}"></script>
<script src="{{asset('js/libs2/raphael-min.js')}}"></script>
<script src="{{asset('js/libs2/morris.js')}}"></script>


</style>
</head>
<body>
<section id="container">
<header class="header fixed-top clearfix">
<div class="brand">
    <a href="/student/viewpost" class="logo">
        Trang chủ
    </a>
    <div class="sidebar-toggle-box">
        <div class="fa fa-bars"></div>
    </div>
</div>
<div class="nav notify-row" id="top_menu">
    <ul class="nav top-menu">
        <li id="header_inbox_bar" class="dropdown">
            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                <i class="fa fa-envelope"></i>
            </a>
            <ul class="dropdown-menu extended inbox">
                <li>
                </li>
            </ul>
        </li>
    </ul>
</div>
<div class="top-nav clearfix">
    <ul class="nav pull-right top-menu">
        <li>
            <input type="text" class="form-control search" placeholder=" Search">
        </li>
        <li class="dropdown">
            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                <img alt="" src="{{ asset('images/2.png') }}">
                <span class="username">{{\Illuminate\Support\Facades\Auth::user()->name}}</span>
                <b class="caret"></b>
            </a>
            <ul class="dropdown-menu extended logout">
                <li><a href="#"><i class=" fa fa-suitcase"></i>Thông tin tài khoản</a></li>
                <li><a href="{{route('logout')}}"><i class="fa fa-key"></i>Đăng xuất</a></li>
            </ul>
        </li>
    </ul>
</div>
</header>

<aside>
    <div id="sidebar" class="nav-collapse">
        <div class="leftside-navigation">
            <ul class="sidebar-menu" id="nav-accordion">
                <li>
                    <a href="{{ URL::to('/student/viewpost') }}">
                        <i class="fa fa-th"></i>
                        <span>Đề tài</span>
                    </a>
                </li>
                
                <li class="sub-menu">
                    <a href="/student/post">
                        <i class="fa fa-check-circle"></i>
                        <span>Đề tài đã đăng ký</span>
                    </a>
                </li>
                <li class="sub-menu">
                    <a href="/student/report">
                        <i class="fa fa-file-text"></i>
                        <span>Báo cáo tuần</span>
                    </a>
                </li>
            </ul>    
        </div>
    </div>
</aside>

<section id="main-content">
    <section class="wrapper">
        @yield('content')
    </section>
    <div class="footer">
        <div class="wthree-copyright">
            <p><center><a href="#" style="color: white;">Đại học công nghệ</a></center></p>
        </div>
    </div>
</section>

</section>
<script src="{{asset('js/libs2/bootstrap.js')}}"></script>
<script src="{{asset('js/libs2/jquery.dcjqaccordion.2.7.js')}}"></script>
<script src="{{asset('js/libs2/scripts.js')}}"></script>
<script src="{{asset('js/libs2/jquery.slimscroll.js')}}"></script>
<script src="{{asset('js/libs2/jquery.nicescroll.js')}}"></script>
</body>
</html>