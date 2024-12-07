<!DOCTYPE html>
<html>
<?php
error_reporting(0);
?>

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>SkyDreamClub-统一账号登录</title>
	<meta name="description" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="robots" content="all,follow">
	<link rel="icon" href="#">
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
								<p>SkyDreamClub - IMP</p>
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
										<input id="login-username" type="text" name="user_num" required data-msg="请输入呼号"
											placeholder="呼号" class="input-material">
									</div>
									<div class="form-group">
										<input id="login-password" type="password" name="user_pwd" required
											data-msg="请输入密码" placeholder="密码" class="input-material">
									</div>
									<button id="login" type="submit" class="btn btn-primary">登录</button>
								</form>
								<br />
								<small>没有账号?</small><a href="register.php" class="signup">&nbsp;注册</a>
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
	$servername = "localhost";
	$username = "imp_xfex_cc";
	$password = "34M3aePXSKYSS3Bi";
	$dbname = "imp_xfex_cc";
	$conn = new mysqli($servername, $username, $password, $dbname);

	$user_name = htmlspecialchars($_POST["user_name"]);
	$user_pwd = hash("sha256", $_POST["user_pwd"]);
	$user_num = htmlspecialchars($_POST["user_num"]);
    $sql = $conn->prepare("SELECT * FROM user WHERE user_name=? AND user_pwd=? AND user_num=?");
    $sql->bind_param("sss", $user_name, $user_pwd, $user_num);
    $sql->execute();
	$result = $sql->get_result();
	if ($user_name && $user_pwd) {
		
		if ($result->num_rows > 0) {
			$_SESSION['user_name'] = $user_name;
			$_SESSION['num'] = $user_num;
			while ($row = $result->fetch_assoc()) {
				// 输出每行数据
				$_SESSION['grade'] = $row['user_grade'];
			}
			if (isset($_SESSION['grade'])) {
				header('Location: ./index.php');
			}

		} else {
			// 登录失败
			//.echo "邮箱或密码错误！";
			echo "<script>alert('邮箱或密码错误！')</script>";
		}
	}


	$conn->close();
	?>
</body>

</html>
