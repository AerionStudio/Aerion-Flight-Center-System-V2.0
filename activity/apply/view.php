<?php
session_start();
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
    <title>Document</title>
</head>

<body>

    <div style="padding: 15px;">
        <div class="layui-card layui-panel">
            <div class="layui-timeline" style="padding: 15px;">

                <?php
                	$servername = "localhost";
    $username = "imp_xfex_cc";
	$password = "34M3aePXSKYSS3Bi";
	$dbname = "imp_xfex_cc";
                $conn = new mysqli($servername, $username, $password, $dbname);
                if ($conn->connect_error) {
                    die("连接失败: " . $conn->connect_error);
                }
                $sql = "SELECT * FROM event ORDER BY time DESC";
                $result = mysqli_query($conn, $sql);
                if (!$result) {
                    die("查询失败: " . mysqli_error($conn));
                }
                while ($row = mysqli_fetch_assoc($result)) {
                    echo '<div class="layui-timeline-item">';
                    echo '<i class="layui-icon layui-timeline-axis"></i>';
                    echo '<div class="layui-timeline-content layui-text">';
                    $temp = 0;
                    switch ($row['state']) {
                        case '1':
                            $temp = '  <button type="button" class="layui-btn layui-btn-normal layui-btn-radius">正在进行</button>';
                            break;
                        case '0':
                            $temp = '  <button type="button" class="layui-btn layui-btn-warm layui-btn-radius">已结束</button>';
                            break;
                        case '3':
                            $temp = '    <button type="button" class="layui-btn layui-btn-danger layui-btn-radius">取消</button>';
                            break;
                        default:
                            $temp = '    <button type="button" class="layui-btn layui-btn-danger layui-btn-radius">取消</button>';
                    }
                    echo '<h3 class="layui-timeline-title">' . $row['time'] . ' ' . $row['dep_icao'] . ' ~ ' . $row['app_icao'] . $temp . '</h3>';
                    echo '<p>';
                    echo '<div class="layui-font-red">活动航路：<br>';
                    echo $row['dep'] . ' ~ ' . $row['app'] . '<br>';
                    echo $row['route'];
                    echo '</div>';
                    switch ($row['direction']) {
                        case 1:
                            echo '向西飞行,请选择双数高度层';
                            break;
                        case 2:
                            echo '向东飞行,请选择单数高度层';
                            break;
                        default:
                            echo '发布人员未填入飞行方向,请转告管理人员';
                    }
                    echo '</p>';
                    echo '</div>';
                    echo '</div>';
                }
                mysqli_close($conn);
                ?>
            </div>
        </div>
    </div>
</body>
<script src="../layui/layui/layui.js"></script>

</html>


<br><br>

</div>
</div>