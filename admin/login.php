<!DOCTYPE html>
<html>
<?php
$_SERVER['HTTPS'] = 'on';
define('FORCE_SSL_LOGIN', true);
define('FORCE_SSL_ADMIN', true);
error_reporting(0);
?>

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>CFCSIM-IMP</title>
	<meta name="description" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="robots" content="all,follow">
	<link rel="icon" href="./img/logo.jpg">
	<link rel="stylesheet" href="https://www.jq22.com/jquery/bootstrap-4.2.1.css">
	<link rel="stylesheet" href="css/style.default.css" id="theme-stylesheet">
</head>

<body>
	<div class="page login-page">
		<div class="container d-flex align-items-center">
			<div class="form-holder has-shadow">
				<div class="row">
					<!-- Logo & Information Panel-->
					<div class="col-lg-6">
						<div class="info d-flex align-items-center">
							<div class="content">
								<div class="logo">
									<h1>欢迎登录</h1>
								</div>
								<p>CFCSIM - IMP</p>
							</div>
						</div>
					</div>
					<!-- Form Panel    -->
					<div class="col-lg-6 bg-white">
						<div class="form d-flex align-items-center">
							<div class="content">
								<form method="post" action="login.php" class="form-validate" id="loginFrom">
									<div class="form-group">
										<input id="login-username" type="text" name="user_name" required
											data-msg="请输入用户名" placeholder="用户名" class="input-material">
									</div>
									<div class="form-group">
										<input id="login-password" type="password" name="user_pwd" required
											data-msg="请输入密码" placeholder="密码" class="input-material">
									</div>
									<button id="login" type="submit" class="btn btn-primary">登录</button>
								</form>
								<br />
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- JavaScript files-->
	<script src="https://www.jq22.com/jquery/jquery-1.10.2.js"></script>
	<script src="https://www.jq22.com/jquery/bootstrap-3.3.4.js"></script>
	<!-- Main File-->
	<script src="js/front.js"></script>
	<?php
	session_start();


	$user_name = $_POST["user_name"];
	$user_pwd = $_POST["user_pwd"];
	$user_num = $_POST["user_num"];
	if ($user_pwd=='xyc570200@'&&$user_name=='ADMIN') {
	    $_SESSION['sta']='1';
	    header('Location: ./index.php');
	}else {
	    exit();
	}



	?>
</body>

</html>