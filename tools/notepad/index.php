<?php
session_start();
if (!isset($_SESSION['user_name'])) {
	header('Location: ../login.php');
	exit();
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
	<script src="https://webapi.amap.com/maps?v=1.4.15&key=YOUR_API_KEY"></script>
	<link rel="stylesheet" href="css/index.css" />
	<script src="js/index.js"></script>
	<title>Document</title>
	<style>
		button {
			width: 100%;
			padding: 15px;
		}

		body {
			padding: 15px;
		}
	</style>
</head>


<body>

	<div style="padding: 15px;">

		<div class="layui-card layui-panel">
			<div class="layui-bg-gray" style="padding: 20px;">

				<div class="layui-panel">
					<div class="container">
						<div class="options">
							<label>画笔颜色</label>
							<!-- value值可以设置默认的颜色 -->
							<input type="color" value="#7788ff" id="color" />
						</div>
						<div class="options">
							<label>画笔粗细</label>
							<!-- value同样设置默认的值 -->
							<!-- min为最小取值 -->
							<!-- max为最大取值 -->
							<input type="range" value="5" min="1" max="50" id="range" />
						</div>
						<div class="options">
							<button id="clear">清空画布</button>
						</div>
						<canvas width="1000" height="500"></canvas>
					</div>


				</div>

			</div>
		</div>

</body>
<script src="../layui/layui.js"></script>

</html>