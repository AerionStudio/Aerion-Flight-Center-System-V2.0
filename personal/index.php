<?php

session_start();
if (!isset($_SESSION['user_name'])) {
  header('Location: ../login.php');
  exit();
}
$servername = "localhost";
$username = "imp_xfex_cc";
$password = "34M3aePXSKYSS3Bi";
$dbname = "imp_xfex_cc";
$conn = new mysqli($servername, $username, $password, $dbname);
if (!$conn) {
  die("连接失败: " . mysqli_connect_error());
}

if (isset($_POST['pwd'])) {
  $str = htmlspecialchars($_SESSION['num']);

  $new_value = hash("sha256", $_POST['pwd']);

  $sql = $conn->prepare("UPDATE user SET user_pwd = '$new_value' WHERE user_num LIKE '%$str%'");
  $sql->bind_param("ss", $new_value, $str);
  if ($sql->execute()) {
    echo "数据更新成功";
  } else {
    echo "数据更新失败: " . mysqli_error($conn);
  }
}


mysqli_close($conn); ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../layui/css/layui.css">
  <link rel="stylesheet" href="../css/bootstrap.css">
  <script src="../js/bootstrap.js"></script>
  <script src="https://cdn.staticfile.org/jquery/1.10.2/jquery.min.js"></script>
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
      <div class="layui-panel">
        <div class="layui-tab layui-tab-brief">
          <ul class="layui-tab-title">
            <li class="layui-this">用户信息</li>
            <li>密码</li>
          </ul>
          <div class="layui-tab-content">
            <div class="layui-tab-item layui-show">
              <div class="layui-bg-gray" style="padding: 16px;">
                <div class="layui-row layui-col-space15">
                  <div class="layui-col-md6">
                    <div class="layui-card">
                      <div class="layui-card-header">登录账号</div>
                      <div class="layui-card-body">
                        <h3>
                          <?php echo htmlspecialchars($_SESSION['user_name']); ?>
                        </h3>
                      </div>
                    </div>
                  </div>
                  <div class="layui-col-md6">
                    <div class="layui-card">
                      <div class="layui-card-header">登录呼号</div>
                      <div class="layui-card-body">
                        <h3>
                          <?php echo htmlspecialchars($_SESSION['num']); ?>
                        </h3>
                      </div>
                    </div>
                  </div>
                </div>
                <form action="../loginout.php" target="_blank">
                  <button type="submit" class="layui-btn">登出</button>
                </form>
              </div>
            </div>
            <div class="layui-tab-item">
              <form class="layui-form layui-form-pane" action="index.php" method="post">
                <div class="layui-form-item">
                  <label class="layui-form-label">重置密码</label>
                  <div class="layui-input-block">
                    <input type="text" name="pwd" autocomplete="off" placeholder="请输入" lay-verify="required"
                      class="layui-input">
                  </div>
                </div>
                <br>
                <div class="layui-form-item">
                  <button type="submit" class="layui-btn" lay-submit lay-filter="demo1">立即提交</button>
                </div>

              </form>
            </div>
          </div>
        </div>
      </div>
    </div>


  </div>
</body>
<script src="../layui/layui.js"></script>

</html>
