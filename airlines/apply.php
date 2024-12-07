<!DOCTYPE html>
<html lang="en">
<?php
session_start();
$num = htmlspecialchars($_SESSION['num']);
$name = htmlspecialchars($_SESSION['user_name']);
$icao = htmlspecialchars($_GET['icao']);
$servername = "localhost";
$username = "imp_xfex_cc";
$password = "MNex4DtZyZAEEspR";
$dbname = "imp_xfex_cc";
$conn = new mysqli($servername, $username, $password, $dbname);
$check_1 = htmlspecialchars($_SESSION['num']);
$time = strval(time());
if (isset($check_1)) {
	if (isset($icao)) {
		$sql = $conn->prepare("INSERT INTO airlines_wait (user,num,icao,time) VALUES (?, ?, ?, ?);");
        $sql->bind_param("ssss", $name, $num, $icao, $time);
		$sql->execute();
	}
}
?>

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="/layui/css/layui.css">
	<link rel="stylesheet" href="/css/index.css">
	<link rel="stylesheet" href="/css/bootstrap.css">
	<script src="/js/bootstrap.js"></script>
	<title>Document</title>
	<style>
		a {
			color: #fff;
			text-decoration: none;
		}
	</style>
</head>

<body>

	<div class="layui-card layui-panel">
		<div class="layui-bg-gray" style="padding: 20px;">
			<div class="layui-row layui-col-space15">
				<div class="layui-panel">
					<div class="modal-header">
						<h1 class="modal-title fs-5" id="staticBackdropLabel">虚航申请</h1>
					</div>
					<div class="layui-card">
						<div class="layui-card-body">
							<div class="modal-body">
								<div class="layui-panel">
									<blockquote class="layui-elem-quote">
										申请成功，等待管理员通过
									</blockquote>
								</div><br>
								<form action="./index.php" method="post">

									<table class="layui-table">
										<colgroup>
											<col width="150">
											<col width="150">
											<col>
										</colgroup>
										<thead>
											<tr>
												<th>用户</th>
												<th>呼号</th>
												<th>航司</th>
											</tr>
										</thead>
										<tbody>
											<tr>
												<td>
													<?php echo $name; ?>
												</td>
												<td>
													<?php echo $num; ?>
												</td>
												<td>
													<?php echo $icao ?>
												</td>
											</tr>
										</tbody>
									</table>
									<button type="#" class="layui-btn layui-btn-normal">确定</button>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
			<br>

		</div>
	</div>


	</div>

	<script src="https://aip.cfcsim.cn/demo/layui/layui.js"></script>
</body>

</html>
