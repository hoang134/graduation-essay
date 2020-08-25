<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>dangnhap</title>
	<!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">

	<!-- Latest compiled JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
</head>
<body>
	<div class="container-fluid bg">
		<div class="row justify-content-center">
			<div class="col-md-4 col-sm-6 col-xs-12 row-container">
				<form method="POST">
					<h1>Trang đăng nhập thông tin</h1>
					<div class="form-group">
						<label for="username">Tên đăng nhập</label>
						<input type="text" class="form-control" id="username" name="username" placeholder="Nhập tên đăng nhập">
						<p class="usernameError"></p>
					</div>
					<div class="form-group">
						<label for="password">Mật khẩu</label>
						<input type="password" class="form-control" id="password" name="password" placeholder="Nhập mật khẩu">
						<p class="passwordError"></p>
					</div>
					<div class="form-check">
						<input type="checkbox" class="form-check-input" id="rememberMe">
						<label class="form-check-label" for="rememberMe">Nhớ tài khoản</label>
					</div>
					<button type="submit" class="btn btn-success btn-block my-3" name="btnsubmit" id="btnsubmit">Đăng nhập</button>
				</form>
			</div>
		</div>
	</div>	
</body>
<style type="text/css">
	html,body {
		width: 100%;
		height: 100%;
		font-weight: bold;
	}
	.bg {
		background: url("image/background.jpg") no-repeat;
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
	}
	label,.form-check-label,h1 {
		text-shadow: 2px 2px 10px white;
	}
	form input[type=text]:hover,input[type=password]:hover {
		background:silver;
	}
	.Error {
		color: red;
	}
</style>
</html>
