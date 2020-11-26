<!DOCTYPE html>
<head>
<title>Trang đăng nhập</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Visitors Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- bootstrap-css -->
<link rel="stylesheet" href="{{('css/libs2/bootstrap.min.css')}}" >
<!-- //bootstrap-css -->
<!-- Custom CSS -->
<link href="{{('css/libs2/style.css')}}" rel='stylesheet' type='text/css' />
<link href="{{('css/libs2/style-responsive.css')}}" rel="stylesheet"/>
<!-- font CSS -->
<link href='//fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
<!-- font-awesome icons -->
<link rel="stylesheet" href="{{('css/libs2/font.css')}}" type="text/css"/>
<link href="{{ asset('/css/fontawesome/css/all.css') }}" rel="stylesheet"> 
<!-- //font-awesome icons -->
<script src="{{ 'js/libs2/jquery2.0.3.min.js' }}"></script>

<style type="text/css">
    html,body {
        background: #2b3137 no-repeat;
    }
    .w3layouts-main {
        background-color: #aabaca
    }
    .w3layouts-main input[type="submit"] {
        background-color: #337ab7;
    }
</style>
</head>
<body id="login">
<div class="log-w3">
<div class="w3layouts-main">
    <h2>Đăng nhập</h2>
        <form action="{{route('login')}}"  method="post">
            @csrf
            <label for="email">Email</label>
            <input type="email" autocomplete="username" class="ggg" id="email" name="email" placeholder="Nhập email">
            <label for="password">Password</label>
            <input type="password" autocomplete="current-password" class="ggg" id="password" name="password" placeholder="Nhập password">
            <span><input type="checkbox" />Nhớ tài khoản</span>
            <h6><a href="#">Quên mật khẩu?</a></h6>
            <input type="submit" class="btn btn-primary" value="Đăng nhập" name="login">
        </form>
</div>
</div>
<script src="{{ 'js/libs2/bootstrap.js' }}"></script>
<script src="{{ 'js/libs2/jquery.dcjqaccordion.2.7.js' }}"></script>
<script src="{{ 'js/libs2/scripts.js' }}"></script>
<script src="{{ 'js/libs2/jquery.slimscroll.js' }}"></script>
<script src="{{ 'js/libs2/jquery.nicescroll.js' }}"></script>
<script src="{{ 'js/libs2/jquery.scrollTo.js' }}"></script>
</body>
</html>
