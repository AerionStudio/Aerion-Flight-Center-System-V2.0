<?php
session_start();
if (isset($_POST['route'])) {
	$route = htmlspecialchars($_POST['route']);
	$aircraft = htmlspecialchars($_POST['aircraft']);
	$time = htmlspecialchars($_POST['time']);
	$time = date("Y-m-d H:i:s"); // 修改为大写的 H，以24小时制显示时间
	$activity_time = htmlspecialchars($_POST['activity_time']);
	$servername = "localhost";
	$username = "imp_xfex_cc";
	$password = "34M3aePXSKYSS3Bi";
	$dbname = "imp_xfex_cc";
	$conn = new mysqli($servername, $username, $password, $dbname);
	$check_1 = htmlspecialchars($_SESSION['num']);
	$check_2 = $activity_time;
	if (isset($check_1) && isset($check_2)) {
		$sql = $conn->prepare("SELECT * FROM activity_user WHERE user = ? AND activity_time = ?");
		$sql->bind_param("ss", $check_1, $check_2);
		$sql->execute();
		$result = $sql->get_result();
		if ($result->num_rows == 0) { // 检查查询结果的行数是否为零
			if (isset($aircraft) && isset($time)) {
				$insert_sql = $conn->prepare("INSERT INTO activity_user (user, route, aircraft, time, activity_time) VALUES (?, ?, ?, ?, ?);");
				$insert_sql->bind_param("sssss", $check_1, $route, $aircraft, $time, $activity_time);
				if ($insert_sql->execute()) {
					//echo "报名成功";
					echo "<script>alert('报名成功')</script>";
				} else {
					//echo "报名失败";
					echo "<script>alert('报名失败')</script>";
				}
			} else {
				//echo "请填写完整信息";
				echo "<script>alert('请填写完整信息')</script>";
			}
		} else {
			//echo "您已经报过名了";
			echo "<script>alert('您已经报过名了')</script>";
		}
	}
	$conn->close();
}
?>
<!DOCTYPE html>
<html lang="en">


<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="/layui/css/layui.css">
	<link rel="stylesheet" href="/css/index.css">
	<link rel="stylesheet" href="/css/bootstrap.css">
	<script src="/js/bootstrap.js"></script>
	<link rel="stylesheet" href="./index.css">
	<title>Document</title>
	<style>
		a {
			color: #fff;
			text-decoration: none;
		}
	</style>
</head>

<body>

	<div class="layui-bg" style="padding: 20px;">

		<div class="layui-row">
			<div class="layui-col-xs6 layui-col-md12">
				<div class="grid-demo grid-demo-bg2">
					<div class="layui-card">
						<div class="tittle">
							<h1 class="apply">活动报名</h1>
						</div>
						<div class="body">
							<br>
							<div class="layui-row">
								<div class="layui-col-xs6 layui-col-md12">
									<div class="grid-demo grid-demo-bg2">

										<form action="./apply_user.php" method="post">
											<?php
												$servername = "localhost";
    $username = "imp_xfex_cc";
	$password = "34M3aePXSKYSS3Bi";
	$dbname = "imp_xfex_cc";
											# Not used?
											#$local_time = date("Y-m-d");
											$conn = new mysqli($servername, $username, $password, $dbname);
											$sql = "SELECT * FROM event ORDER BY time DESC";
											$result = $conn->query($sql);
											if ($result->num_rows > 0) {
												while ($row = $result->fetch_assoc()) {
													$dep = $row['dep'];
													$app = $row['app'];
													$state = $row['state'];
													# Not used?
													# $local_time = strtotime($local_time);
													$row_time = strtotime($row['time']);
													if ($row['state'] == 1) {
														echo '<div class="layui-crad activity_view">';


														echo '<h1 class="name">官方活动 "' . $row['dep'] . ' ~ ' . $row['app'] . '"</h1>';

														echo '<h1 class="time">' . $row['time'] . '</h1>';
														echo '<button class="apply" name="search" value=\'' . $row['time'] . '\'>申请</button>';
														echo '<button class="view" name="watch"><a href="./activity_display.php?id=' . urlencode($row['time']) . '">查看</a></button>';
														echo '</div>';
														echo '<br>';
													} else {
														echo '<div class="layui-crad activity_view">';


														echo '<h1 class="name">官方活动 "' . $row['dep'] . ' ~ ' . $row['app'] . '"</h1>';

														echo '<h1 class="time">' . $row['time'] . '</h1>';
														echo '<button class="view" name="watch"><a href="./activity_display.php?id=' . urlencode($row['time']) . '">查看</a></button>';
														echo '</div>';
														echo '<br>';
													}
												}
											} ?>




										</form>


									</div>
								</div>
							</div>

						</div>
					</div>
				</div>
			</div>
		</div>

	</div>
	<script src="js/layui.js"></script>
</body>

</html>