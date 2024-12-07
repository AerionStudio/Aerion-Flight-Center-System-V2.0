<?php
session_start();
if ($_SESSION['grade']!='0') {
    header('Location: ../index.php');
    exit();
}
if (!isset($_SESSION['user_name'])) {
    header('Location: ../login.php');
    exit();
} ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../layui/css/layui.css">
    <link rel="stylesheet" href="../css/index.css">
    <script src="https://webapi.amap.com/maps?v=1.4.15&key=YOUR_API_KEY"></script>
    <title><?php echo $_SESSION['num'];  ?> 停飞</title>
    <style>
        #map {
            height: 800px;
        }
    </style>
</head>

<body>

    <div class="layui-card layui-panel">
        <div class="layui-bg-gray" style="padding: 20px;">
            <div class="layui-panel">
                <div style="padding: 32px;">
                    <h1 style="padding: 32px;">
                        <img src="https://attachment-1308533719.cos.ap-shanghai.myqcloud.com/logo1.png">  SkyDream Club<br><br><hr>
                        我们非常抱歉。<br>
                        因违反连飞规定，您的账号已被停飞。<br>
                        <br><br>
                        停飞账号：
                        <?php echo htmlspecialchars($_SESSION['user_name']); ?> <br>
                        停飞呼号：
                        <?php echo htmlspecialchars($_SESSION['num']); ?> <br><br><br>
                        如果你要申诉请发邮件至：3208629021@qq.com <br>
                        或者联系QQ：3208629021(技术组-Ariven)。 <br><br><br>
                        祝您生活愉快。 <br><br><br>
                        
                        
                        

                        <button type="button" class="layui-btn layui-btn-normal"> <a href="../loginout.php">点我登出</a> </button>
                    </h1>
                </div>

            </div>
        </div>
</body>

</html>
