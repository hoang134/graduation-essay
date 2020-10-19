<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <title>Login</title>
</head>
<body>
    <div class="container-fluid bg">
        <div class="row justify-content-center">
            <div class="float-left">
                <div class="container-fluid bgg">
                    <h3>UET</h3>
                    <h4>Hệ thống đăng ký khóa luận tốt nghiệp cho sinh viên Đại học công nghệ</h4>
                </div>
            </div>
        <div class="float-right">
            <div class="col-md-10 col-sm-7 col-xs-12 row-container">
            <center><h2>Đăng nhập</h2></center>
            <form action="{{route('login')}}"  method="post">
                @csrf
                <div>
                    <label for="email">Email</label>
                    <br>
                    <input type="text" id="email" name="email" placeholder="Nhập email">
                    <br>
                </div>
                <div>
                    <label for="password">Password</label>
                    <br>
                    <input type="password" id="password" name="password" placeholder="Nhập password"><br>
                </div>
                <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="rememberMe">
                    <label class="form-check-label" id="ad" for="rememberMe">Nhớ tài khoản</label>
                </div>
                <input type="submit" class="btn btn-primary" value="Đăng nhập">
            </form>
            </div>
        </div>
        </div>
    </div>
</body>
</html>
<style type="text/css">
    html,body {
        width: 100%;
        height: 100%;
        font-weight: bold;
    }
    .bg {
        background: #2b3137 no-repeat;
        background-size: cover;
        width: 100%;
        height: 100%;
    }
    .row-container {
        border: 1px solid gray;
        border-radius: 20px;
        margin-top: 20vh;
        padding: 30px;
        -webkit-box-shadow: 3px 0px 75px -15px rgba(0,0,0,0.75);
        -moz-box-shadow: 3px 0px 75px -15px rgba(0,0,0,0.75);
        box-shadow: 3px 0px 75px -15px rgba(0,0,0,0.75);
        background-color: #aabaca;
    }
    label{
        text-shadow: 2px 2px 10px white;
        width: 20%; 
    }
    input[type=text],input[type=password] {
        width: 100%;
        outline: none;
        padding: 10px 35px 10px 10px;
        border: 1px solid black;
        border-radius: 30px;
        background-color: white;
    }
    #ad {
        width: 200px;
    }
    .float-right {
        width: 40%;
    }
    .float-left {
        width: 60%;
    }
    .bgg {
        margin-top: 30vh;
    }
    h3 {
        font-size: 50px;
        color: green;
    }
    h4 {
        font-size: 40px;
        color: white;
    }
</style>