<!DOCTYPE html>
<html>
<?php
//error_reporting(0);
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
    <link rel="stylesheet" href="./css/style.default.css" id="theme-stylesheet">
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
                                <h1>欢迎注册</h1>
                            </div>
                            <p>SkyDreamClub-统一账号注册</p>
                        </div>
                    </div>
                </div>
                <!-- Form Panel    -->

                <form action="register.php" method="post" class="col-lg-6 bg-white">
                    <div class="col-lg-12 bg-white">
                        <div class="form d-flex align-items-center">
                            <div class="content">
                                <div class="form-group">
                                    <input id="register-username" class="input-material" type="text" name="user_name"
                                           placeholder="请输入用户名/姓名">
                                    <div class="invalid-feedback">
                                        用户名必须在2~10位之间
                                    </div>
                                </div>
                                <div class="form-group">
                                    <input id="register-password" class="input-material" type="password" name="user_pwd"
                                           placeholder="请输入密码">
                                    <div class="invalid-feedback">
                                        密码必须在6~10位之间
                                    </div>
                                </div>
                                <div class="form-group">
                                    <input id="register-passwords" class="input-material" type="text" name="user_num"
                                           placeholder="呼号(四位数字且三位大于0)">
                                </div>
                                <div class="form-group">
                                    <input id="register-passwords" class="input-material" type="email" name="user_email"
                                           placeholder="邮箱">
                                </div>
                                <div class="form-group">
                                    <input type="submit" value="提交">
                                </div>
                                <small>已有账号?</small><a href="login.php" class="signup">&nbsp;登录</a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- JavaScript files-->
<script src="https://www.jq22.com/jquery/bootstrap-4.2.1.js"></script>
<?php
$servername = "localhost";
$username = "imp_xfex_cc";
$password = "34M3aePXSKYSS3Bi";
$dbname = "imp_xfex_cc";
$conn = new mysqli($servername, $username, $password, $dbname);
if (null !== $_POST["user_num"]) {
    $user_name = htmlspecialchars($_POST["user_name"]);
    $user_pwd = hash("sha256", $_POST['user_pwd']);
    $user_email = htmlspecialchars($_POST["user_email"]);
    $user_num = htmlspecialchars($_POST["user_num"]);
$user_num = (strlen($user_num) === 7) ? substr($user_num, -4) : $user_num ;
    if ($user_name && $user_pwd && $user_email) {

        $callsign = $_POST['user_num'];
        $password = $_POST['user_pwd'];
        $apiEndpoint = 'http://185.239.84.173:6067/users';

// 生成密码的 SHA256 哈希值
        $hashedPassword = hash('sha256', $password);

// 构建请求的 JSON 格式 body
        $body = json_encode([
            'callsign' => $callsign,
            'password' => $hashedPassword
        ]);

// 创建一个新的 cURL 资源
        $ch = curl_init();

// 设置 cURL 的选项
        curl_setopt($ch, CURLOPT_URL, $apiEndpoint);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'PUT');
        curl_setopt($ch, CURLOPT_POSTFIELDS, $body);
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            'Content-Type: application/json',
            'Authorization: Bearer 157fd42534a1a058a8ee3de1104dfbbfee6d37b1a3930157b25b24b8da4d680a'
        ]);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

// 执行请求并获取响应
        $response = curl_exec($ch);
        $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);

// 关闭 cURL 资源
        curl_close($ch);

// 处理响应
       if ($httpCode === 204) {
    $sql = $conn->prepare("INSERT INTO user (user_name, user_pwd, user_email,user_num,user_grade,icao) VALUES (?, ?, ?, ?,'1','DSK')");
    $sql->bind_param("ssss", $user_name, $user_pwd, $user_email, $user_num);
    $sql->execute();

    echo "<script>
              alert('注册成功');
              window.location.href = 'login.php';
          </script>";
} elseif ($httpCode === 409) {
    echo "<script>
              alert('此呼号已存在');
              window.location.href = '#';
          </script>";
} else {
    echo "<script>
              alert('请求出错');
              window.location.href = '#';
          </script>";
}


    } else {
        //echo "Error: " . $conn->error;
        echo "<script>alert('Error: ')</script>" . $conn->error;
    }

}

$conn->close();
?>
</body>

</html>