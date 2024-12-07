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
                <legend>活动时刻</legend>
            </fieldset>

            <div class="layui-panel">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">标题</th>
                            <th scope="col">发布人</th>
                            <th scope="col">状态</th>
                            <th scope="col">操作</th>
                        </tr>
                    </thead>
                    <tbody>
                        <form action="#" method="post">
                            <?php
                            $servername = "localhost";
$username = "imp_xfex_cc";
	$password = "34M3aePXSKYSS3Bi";
	$dbname = "imp_xfex_cc";
                            // **1012**: 没用？
                            //$local_time = date("Y-m-d");
                            $conn = new mysqli($servername, $username, $password, $dbname);
                            $sql = "SELECT * FROM event ORDER BY time DESC";
                            $result = $conn->query($sql);
                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                                    $dep = $row['dep'];
                                    $app = $row['app'];
                                    $state = $row['state'];
                                    //$local_time = strtotime($local_time);
                                    $row_time = strtotime($row['time']);
                                    echo "<tr>";
                                    echo "<td>[官方活动] " . $row['time'] . ' ' . $row['dep'] . " ~ " . $row['app'] . "</td>";
                                    echo "<td>" . $row['Publisher'] . "</td>";
                                    if ($row['state'] == 1) {
                                        echo '<td><span class="layui-badge layui-bg-blue">正在进行</span></td>';
                                        echo "<td>";
                                        echo '<div class="layui-btn-group">';
                                        echo '<button type="submit" class="layui-btn layui-btn-xs" data-bs-toggle="#" data-bs-target="#staticBackdrop" name="watch"><a href="./view.php?id=' . urlencode($row['time']) . '">查看</a></button>';
                                        echo "</div>";
                                        echo "</td>";
                                    } elseif ($row['state'] == 0) {
                                        echo '<td><span class="layui-badge layui-bg-orange">已结束</span></td>';
                                        echo "<td>";
                                        echo '<div class="layui-btn-group">';
                                        echo '<button type="submit" class="layui-btn layui-btn-xs" data-bs-toggle="#" data-bs-target="#staticBackdrop" name="watch"><a href="./view.php?id=' . urlencode($row['time']) . '">查看</a></button>';
                                        echo "</div>";
                                        echo "</td>";
                                    } else {
                                        echo '<td><span class="layui-badge layui-btn-danger">取消</span></td>';
                                        echo "<td>";
                                        echo '<div class="layui-btn-group">';
                                        echo '<button type="submit" class="layui-btn layui-btn-xs" data-bs-toggle="#" data-bs-target="#staticBackdrop" name="watch"><a href="./view.php?id=' . urlencode($row['time']) . '">查看</a></button>';
                                        echo "</div>";
                                        echo "</td>";
                                    }
                                    echo "</tr>";
                                }
                            } else {
                                echo "没有结果";
                            }
                            $conn->close();
                            ?>

                        </form>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <script src="https://aip.cfcsim.cn/demo/layui/layui.js"></script>
</body>

</html>
