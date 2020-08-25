<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

	<!-- Latest compiled JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
</head>
<body>
	<div class="container">
		<form method="post">
			<br>
			<div>
				<label>Tên đề tài</label>
				<input type="text" name="tendetai">
				<br>
			</div>
			<div>
				<label>Thông tin đề tài</label>
				<input type="textarea" name="info">
				<br>
			</div>
			<div>
				<label>Ngày hết hạn</label>
				<input type="date" name="exp">
				<br>
			</div>
			<div>
				<br>
				<button>Đăng đề tài</button>
				<button>Hủy bỏ</button>
			</div>
		</form>
	</div>
</body>
</html>
<style type="text/css">
	label {
		width: 140px;
	}
	input[type=textarea] {
		width: 500px;
		height: 70px;
		background-color: #AAC9FF;
		padding: 5px;
		border:1px solid black;
	}
	input[type=text],input[type=date] {
		width: 500px;
		background-color: #AAC9FF;
		padding: 5px;
		border:1px solid black;
	}
	button {
		background-color: #2196F3;
	}

</style>