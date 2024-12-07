<?php
error_reporting(0);
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
    <link rel="stylesheet" href="https://cdn.staticfile.org/font-awesome/4.7.0/css/font-awesome.css">
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
            <fieldset class="layui-elem-field layui-field-title">
                <br>
                <legend>管制权限</legend>

            </fieldset>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">图标</th>
                        <th scope="col">权限</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><i class="fa fa-check"></td>
                        <td>拥有权限</td>
                    </tr>
                    <tr>
                        <td><i class="fa fa-exclamation-circle"></td>
                        <td>实习权限</td>
                    </tr>
                    <tr>
                        <td><i class="fa fa-exclamation-triangle"></td>
                        <td>见习权限</td>
                    </tr>
                    <tr>
                        <td><i class="fa fa-close"></td>
                        <td>无权限</td>
                    </tr>
                </tbody>
                <br>
                <div class="layui-panel">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">呼号</th>
                                <th scope="col">权限</th>
                                <th scope="col">放行席</th>
                                <th scope="col">地面席</th>
                                <th scope="col">塔台席</th>
                                <th scope="col">塔台席（程序）</th>
                                <th scope="col">离场席</th>
                                <th scope="col">进场席</th>
                                <th scope="col">区域席</th>
                                <th scope="col">教员</th>
                                <th scope="col">管理员</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $servername = "localhost";
$username = "imp_xfex_cc";
	$password = "34M3aePXSKYSS3Bi";
	$dbname = "imp_xfex_cc";
                            $local_time = date("Y-m-d");
                            $conn = new mysqli($servername, $username, $password, $dbname);
                            $sql = "SELECT * FROM user WHERE user_grade > 1 ORDER BY user_grade DESC;";
                            $result = $conn->query($sql);
                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                                    echo '<tr>';
                                    echo '<td>' . $row['user_num'] . '</td>';
                                    switch ($row['user_grade']) {
                                        case 2:
                                            echo '<td>STU1</td>';
                                            echo '<td><i class="fa fa-check"></i></td>';
                                            echo '<td><i class="fa fa-check"></i></td>';
                                            echo '<td><i class="fa fa-exclamation-circle"></i></td>';
                                            echo '<td><i class="fa fa-exclamation-circle"></i></td>';
                                            echo '<td><i class="fa fa-close"></i></td>';
                                            echo '<td><i class="fa fa-close"></i></td>';
                                            echo '<td><i class="fa fa-close"></i></td>';
                                            echo '<td><i class="fa fa-close"></i></td>';
                                            echo '<td><i class="fa fa-close"></i></td>';
                                            break;
                                        case 3:
                                            echo '<td>STU2</td>';
                                            echo '<td><i class="fa fa-check"></i></td>';
                                            echo '<td><i class="fa fa-check"></i></td>';
                                            echo '<td><i class="fa fa-check"></i></td>';
                                            echo '<td><i class="fa fa-check"></i></td>';
                                            echo '<td><i class="fa fa-exclamation-circle"></i></td>';
                                            echo '<td><i class="fa fa-exclamation-circle"></i></td>';
                                            echo '<td><i class="fa fa-close"></i></td>';
                                            echo '<td><i class="fa fa-close"></i></td>';
                                            echo '<td><i class="fa fa-close"></i></td>';
                                            break;
                                        case 4:
                                            echo '<td>STU3</td>';
                                            echo '<td><i class="fa fa-check"></i></td>';
                                            echo '<td><i class="fa fa-check"></i></td>';
                                            echo '<td><i class="fa fa-check"></i></td>';
                                            echo '<td><i class="fa fa-check"></i></td>';
                                            echo '<td><i class="fa fa-check"></i></td>';
                                            echo '<td><i class="fa fa-check"></i></td>';
                                            echo '<td><i class="fa fa-close"></i></td>';
                                            echo '<td><i class="fa fa-close"></i></td>';
                                            echo '<td><i class="fa fa-close"></i></td>';
                                            break;
                                        case 5:
                                            echo '<td>CTR1</td>';
                                            echo '<td><i class="fa fa-check"></i></td>';
                                            echo '<td><i class="fa fa-check"></i></td>';
                                            echo '<td><i class="fa fa-check"></i></td>';
                                            echo '<td><i class="fa fa-check"></i></td>';
                                            echo '<td><i class="fa fa-check"></i></td>';
                                            echo '<td><i class="fa fa-check"></i></td>';
                                            echo '<td><i class="fa fa-exclamation-triangle"></i></td>';
                                            echo '<td><i class="fa fa-close"></i></td>';
                                            echo '<td><i class="fa fa-close"></i></td>';
                                            break;
                                        case 6:
                                            echo '<td>CTR2</td>';
                                            echo '<td><i class="fa fa-check"></i></td>';
                                            echo '<td><i class="fa fa-check"></i></td>';
                                            echo '<td><i class="fa fa-check"></i></td>';
                                            echo '<td><i class="fa fa-check"></i></td>';
                                            echo '<td><i class="fa fa-check"></i></td>';
                                            echo '<td><i class="fa fa-check"></i></td>';
                                            echo '<td><i class="fa fa-exclamation-triangle"></i></td>';
                                            echo '<td><i class="fa fa-close"></i></td>';
                                            echo '<td><i class="fa fa-close"></i></td>';
                                            break;
                                        case 7:
                                            echo '<td>CTR3</td>';
                                            echo '<td><i class="fa fa-check"></i></td>';
                                            echo '<td><i class="fa fa-check"></i></td>';
                                            echo '<td><i class="fa fa-check"></i></td>';
                                            echo '<td><i class="fa fa-check"></i></td>';
                                            echo '<td><i class="fa fa-check"></i></td>';
                                            echo '<td><i class="fa fa-check"></i></td>';
                                            echo '<td><i class="fa fa-check"></i></td>';
                                            echo '<td><i class="fa fa-close"></i></td>';
                                            echo '<td><i class="fa fa-close"></i></td>';
                                            break;
                                        case 8:
                                            echo '<td>INS1</td>';
                                            echo '<td><i class="fa fa-check"></i></td>';
                                            echo '<td><i class="fa fa-check"></i></td>';
                                            echo '<td><i class="fa fa-check"></i></td>';
                                            echo '<td><i class="fa fa-check"></i></td>';
                                            echo '<td><i class="fa fa-check"></i></td>';
                                            echo '<td><i class="fa fa-check"></i></td>';
                                            echo '<td><i class="fa fa-close"></i></td>';
                                            echo '<td><i class="fa fa-check"></i></td>';
                                            echo '<td><i class="fa fa-close"></i></td>';
                                            break;
                                        case 9:
                                            echo '<td>INS2</td>';
                                            echo '<td><i class="fa fa-check"></i></td>';
                                            echo '<td><i class="fa fa-check"></i></td>';
                                            echo '<td><i class="fa fa-check"></i></td>';
                                            echo '<td><i class="fa fa-check"></i></td>';
                                            echo '<td><i class="fa fa-check"></i></td>';
                                            echo '<td><i class="fa fa-check"></i></td>';
                                            echo '<td><i class="fa fa-close"></i></td>';
                                            echo '<td><i class="fa fa-check"></i></td>';
                                            echo '<td><i class="fa fa-close"></i></td>';
                                            break;
                                        case 10:
                                            echo '<td>INS3</td>';
                                            echo '<td><i class="fa fa-check"></i></td>';
                                            echo '<td><i class="fa fa-check"></i></td>';
                                            echo '<td><i class="fa fa-check"></i></td>';
                                            echo '<td><i class="fa fa-check"></i></td>';
                                            echo '<td><i class="fa fa-check"></i></td>';
                                            echo '<td><i class="fa fa-check"></i></td>';
                                            echo '<td><i class="fa fa-check"></i></td>';
                                            echo '<td><i class="fa fa-check"></i></td>';
                                            echo '<td><i class="fa fa-close"></i></td>';
                                            break;
                                        case 11:
                                            echo '<td>SUP</td>';
                                            echo '<td><i class="fa fa-check"></i></td>';
                                            echo '<td><i class="fa fa-check"></i></td>';
                                            echo '<td><i class="fa fa-check"></i></td>';
                                            echo '<td><i class="fa fa-check"></i></td>';
                                            echo '<td><i class="fa fa-check"></i></td>';
                                            echo '<td><i class="fa fa-check"></i></td>';
                                            echo '<td><i class="fa fa-check"></i></td>';
                                            echo '<td><i class="fa fa-check"></i></td>';
                                            echo '<td><i class="fa fa fa-close"></i></td>';
                                            break;
                                        case 12:
                                            echo '<td>ADM</td>';
                                            echo '<td><i class="fa fa-check"></i></td>';
                                            echo '<td><i class="fa fa-check"></i></td>';
                                            echo '<td><i class="fa fa-check"></i></td>';
                                            echo '<td><i class="fa fa-check"></i></td>';
                                            echo '<td><i class="fa fa-check"></i></td>';
                                            echo '<td><i class="fa fa-check"></i></td>';
                                            echo '<td><i class="fa fa-check"></i></td>';
                                            echo '<td><i class="fa fa-check"></i></td>';
                                            echo '<td><i class="fa fa-check"></i></td>';
                                            break;

                                    }

                                    echo '</tr>';
                                }
                            } else {
                                echo "没有结果";
                            }
                            $conn->close();
                            ?>
                        </tbody>

                    </table>
                </div>
        </div>
    </div>
    <script src="https://aip.cfcsim.cn/demo/layui/layui.js"></script>
</body>

</html>