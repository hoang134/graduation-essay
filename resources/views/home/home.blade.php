<!DOCTYPE html>
<head>
<title>Trang quản lý khóa luận tốt nghiệp</title>
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
                <li><a href="/student/information"><i class=" fa fa-suitcase"></i>Thông tin tài khoản</a></li>
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
                    <a class="active" href="{{ URL::to('/student/viewpost') }}">
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
<!-- <script src="{{ asset('/js/libs/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('/js/libs/feather.min.js') }}"></script>
<script src="{{ asset('/js/libs/toastr.min.js') }}"></script> -->
</body>
</html>