<!DOCTYPE html>
<head>
<title>@yield('title')</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
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



</head>
<body>
<section id="container">
<header class="header fixed-top clearfix">
<div class="brand">
    <a href="/admin/post" class="logo">
        Trang chủ
    </a>
    <div class="sidebar-toggle-box">
        <div class="fa fa-bars"></div>
    </div>
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
                <li><a href="/logout"><i class="fa fa-key"></i>Đăng xuất</a></li>
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
                    <a href="/admin/post">
                        <i class="fa fa-th"></i>
                        <span>Đề tài</span>
                    </a>
                </li>

                <li class="sub-menu">
                    <a href="/admin/user">
                        <i class="fa fa-check-circle "></i>
                        <span>Tài khoản</span>
                    </a>
                </li>

                @can('viewReport',\App\User::class)
                <li class="sub-menu">
                    <a href="/admin/report">
                        <i class="fa fa-file-text"></i>
                        <span>Báo cáo tuần</span>
                    </a>
                </li>
                @endcan

                @can('viewany',\App\UserPost::class)
                <li class="sub-menu">
                    <a href="/admin/list">
                        <i class="fa fa-file-text"></i>
                        <span>Danh sách sinh viên đăng ký</span>
                    </a>
                </li>
                @endcan

                @can('assessor',\App\User::class)
                <li class="sub-menu">
                    <a href="/admin/post/deadline">
                        <i class="fa fa-file-text"></i>
                        <span>Thời gian đăng ký khóa luận</span>
                    </a>
                </li>
                @endcan
                @can('lecturers',\App\User::class)
                <li class="sub-menu">
                    <a href="/admin/post/verify/register">
                        <i class="fa fa-file-text"></i>
                        <span>Xác nhận đăng ký khóa luận</span>
                    </a>
                </li>

                <li class="sub-menu">
                    <a href="/admin/verify">
                        <i class="fa fa-file-text"></i>
                        <span>Xác nhận khóa luận</span>
                    </a>
                </li>
                @endcan

                @can('assessor',\App\User::class)
                <li class="sub-menu">
                    <a href="/admin/confirm">
                        <i class="fa fa-file-text"></i>
                        <span>Duyệt khóa luận</span>
                    </a>
                </li>


                <li class="sub-menu">
                    <a href="/admin/protect/post">
                        <i class="fa fa-file-text"></i>
                        <span>Bảo vệ khóa luận</span>
                    </a>
                </li>

                <li class="sub-menu">
                    <a href="/admin/score/post">
                        <i class="fa fa-file-text"></i>
                        <span>Điểm khóa luận</span>
                    </a>
                </li>
                @endcan
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

</script>
@yield('script')
</body>
</html>
