<?php
session_start();
if (!isset($_SESSION['user_name'])) {
    header('Location: /login.php');
    exit();
} ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/layui/css/layui.css">
    <link rel="stylesheet" href="/css/index.css">
    <script src="https://webapi.amap.com/maps?v=1.4.15&key=YOUR_API_KEY"></script>
    <title>Document</title>
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
                    <h1>
                        <?php echo $_SESSION['num'] ?>
                    </h1>
                    <br>
                    <table class="layui-table">
                        <colgroup>
                            <col width="150">
                            <col width="150">
                            <col>
                        </colgroup>
                        <thead>
                            <tr>
                                <th>呼号</th>
                                <th>席位</th>
                                <th>频率</th>
                                <th>开始时间</th>
                                <th>管制时长</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $servername = "localhost";
$username = "imp_xfex_cc";
	$password = "34M3aePXSKYSS3Bi";
	$dbname = "imp_xfex_cc";
                            $conn = new mysqli($servername, $username, $password, $dbname);
                            $value = htmlspecialchars($_SESSION['num']);
                            $sql = $conn->prepare("SELECT * FROM history_atc WHERE cid = ? ORDER BY logon_time DESC");
                            $sql->bind_param("s", $value);
                            $sql->execute();
                            $result = $sql->get_result();
                            $count = 0;
                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                                    echo '<tr>';
                                    echo '<td>' . $row['cid'] . '</td>';
                                    echo '<td>' . $row['callsign'] . '</td>';
                                    echo '<td>' . $row['frequency'] . '</td>';
                                    echo '<td>' . $row['logon_time'] . '</td>';
                                    $seconds = $row['online_time'];
                                    $seconds-=28800;
                                    $hours = floor($seconds / 3600);
                                    $minutes = floor(($seconds % 3600) / 60);
                                    echo '<td>' . "{$hours}小时 {$minutes}分钟" . '</td>';
                                    $count++;
                                }
                            } else {
                                echo '<tr>';
                                echo '<td>0 results</td>';
                                echo '<td>0 results</td>';
                                echo '<td>0 results</td>';
                                echo '<td>0 results</td>';
                                echo '<td>0 results</td>';
                                echo '</tr>';
                            }

                            ?>
                        </tbody>
                    </table>
                    <br>
                    <div class="layui-panel">
                        <div style="padding: 32px;">
                            <h1>一共
                                <?php echo $count; ?> 次
                            </h1>
                        </div>
                    </div>
                </div>

            </div>
        </div>
</body>

</html>
