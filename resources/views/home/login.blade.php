<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
</head>
<body>
        <div>
            <h2>Đăng nhập</h2>
            <form action="{{route('login')}}"  method="post">
                @csrf
                <input type="text" id="email" name="email"><br>
                <input type="password" id="password" name="password"><br>
                <input type="submit"value="dang nhap">
            </form>
        </div>
</body>
</html>
