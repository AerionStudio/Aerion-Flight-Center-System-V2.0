<?php
session_start();
if (!isset($_SESSION['user_name'])) {
    header('Location: ./login.php');
    exit();
} ?>
<!DOCTYPE html>
<html lang="en">
<?php
error_reporting(0);
$id = urldecode($_GET['id']);
echo $id;
?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/layui/css/layui.css">
     <link rel="stylesheet" href="/layui/css/layui.css">
    <link rel="stylesheet" href="/css/index.css">
    <link rel="stylesheet" href="/css/bootstrap.css">
    <script src="/js/bootstrap.js"></script>
    <title>Document</title>
    <style>

        body {
            background-color: #343a40;
        }


    body{
    background-color: #343a40;
}

        a {
            color: #fff;
            text-decoration: none;
        }
    </style>
</head>

<body>
    <div class="layui-card layui-panel">
        <div class="layui-bg-gray" style="padding: 20px;">
            <fieldset class="layui-elem-field layui-field-title">
                <br>
                <legend>活动时刻</legend>
            </fieldset>

            <div class="layui-panel">


                <?php
                $servername = "localhost";
$username = "imp_xfex_cc";
	$password = "34M3aePXSKYSS3Bi";
	$dbname = "imp_xfex_cc";
                # not used?
                # $local_time = date("Y-m-d");
                $conn = new mysqli($servername, $username, $password, $dbname);

                // 查询数据库中包含关键字的表
                $sql = $conn->prepare("SELECT * FROM activity_user WHERE activity_time=?");
                $sql->bind_param("s", $id);
                $sql->execute();

                $result = $sql->get_result();


                if (isset($id)) {
                    echo '<table class="table table-striped">';
                    echo '<tr><th>用户</th><th>航线</th><th>飞机</th><th>时间</th><th>操作</th></tr>';
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo '<tr>';
                            echo '<td>' . $row['user'] . '</td>';
                            echo '<td>' . $row['route'] . '</td>';
                            echo '<td>' . $row['aircraft'] . '</td>';
                            echo '<td>' . $row['time'] . '</td>';
                            if ($_SESSION['num'] == $row['user']) {
                                echo "<td>";
                                echo '<div class="layui-btn-group">';
                                echo '<button type="submit" class="layui-btn layui-btn-xs" data-bs-toggle="#" data-bs-target="#staticBackdrop" name="cancel"><a href="./cancel.php?id=' . urlencode($row['time']) . '">取消报名</a></button>';
                                echo "</div>";
                                echo "</td>";
                            } else {
                                echo "<td></td>";
                            }
                            echo '</tr>';
                        }
                    } else {
                        echo '<tr><td colspan="4">还没有人报名</td></tr>';
                    }
                    echo '</table>';
                }
                $conn->close();
                ?>

            </div>
        </div>
    </div>
</body>

</html>
</html>
