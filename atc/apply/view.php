<!DOCTYPE html>
<html lang="en">

<?php
$id = htmlspecialchars(urldecode($_GET['id']));
session_start();
?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/layui/css/layui.css">
    <link rel="stylesheet" href="/css/index.css">
    <script src="https://webapi.amap.com/maps?v=2.0&key=68a8e76c24efbfb6116710882ba665d3"></script>
    <title>Document</title>
</head>

<body>
    <div style="padding: 15px;">
        <div class="layui-card layui-panel">
            <div class="layui-bg-gray" style="padding: 20px;">
                <table class="layui-table">
                    <colgroup>
                        <col width="150">
                        <col width="150">
                        <col>
                    </colgroup>
                    <thead>
                        <tr>
                            <th>席位名称</th>
                            <th>席位频率</th>
                            <th>席位管制</th>
                            <th>操作</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $servername = "localhost";
$username = "imp_xfex_cc";
	$password = "34M3aePXSKYSS3Bi";
	$dbname = "imp_xfex_cc";
                        $local_time = date("Y-m-d");
                        $current_user = "current_user"; // 替换为当前用户的值
                        $conn = new mysqli($servername, $username, $password, $dbname);
                        $sql = $conn->prepare("SELECT * FROM event WHERE time = ?;");
                        $sql->bind_param("s", $id);
                        $sql->execute();
                        $result = $sql->get_result();
                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                $atc = $row['atc'];
                                $arr = explode(',', $atc);
                                $atc_fqs = $row['atc_fq'];
                                $arr_fqs = explode(',', $atc_fqs);
                                $hasAttendee = false; // 是否有人报名
                                for ($i = 0; $i < count($arr); $i++) {
                                    echo '<tr>';
                                    echo '<td>' . $arr[$i] . '</td>';
                                    echo '<td>' . $arr_fqs[$i] . '</td>';

                                    $sql_atc = $conn->prepare("SELECT * FROM event_atc WHERE time = ? AND atc = ?;");
                                    $sql_atc->bind_param("ss", $row["time"], $arr[$i]);
                                    $sql_atc->execute();
                                    $result_atc = $sql_atc->get_result();
                                    if ($result_atc->num_rows > 0) {
                                        while ($row_atc = $result_atc->fetch_assoc()) {
                                            echo '<td>' . $row_atc['atc_user'] . '</td>';

                                            if ($row_atc['atc_user'] == $_SESSION['num']) {
                                                echo "<td>";
                                                echo '<div class="layui-btn-group">';
                                                echo '<button type="submit" class="layui-btn layui-btn-xs" data-bs-toggle="#" data-bs-target="#staticBackdrop" name="cancel"><a href="./cancel.php?id=' . urlencode($row['time']) . '">取消报名</a></button>';
                                                echo "</div>";
                                                echo "</td>";
                                            } else {
                                                echo "<td></td>";
                                            }

                                            $hasAttendee = true; // 标记有人报名
                                        }
                                    } else {
                                        echo '<td>' . '暂无' . '</td>';
                                        echo "<td>";
                                                echo '<div class="layui-btn-group">';
                                                echo '<button type="submit" class="layui-btn layui-btn-xs" data-bs-toggle="#" data-bs-target="#staticBackdrop" name="watch"><a href="./apply.php?id=' . urlencode($row['time']) . '&name=' . urlencode($arr[$i]) . '&fq=' . urlencode($arr_fqs[$i]) . '">申请</a></button>';
                                                echo "</div>";
                                                echo "</td>";
                                        
                                    }
                                    echo '</tr>';
                                }
                                if (!$hasAttendee) {
                                    echo '<tr>';
                                    echo '<td colspan="4" align="center">没有人报名</td>';
                                    echo '</tr>';
                                }
                            }
                        } else {
                            echo '<tr>';
                            echo '<td colspan="4" align="center">没有人报名</td>';
                            echo '</tr>';
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <script src="../layui/layui.js"></script>
</body>

</html>
