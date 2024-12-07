<?php

error_reporting(0);
session_start();
if ($_SESSION['grade'] == '0') {
    header('Location: ../ban/index.php');
    exit();
}
if (!isset($_SESSION['user_name'])) {
    header('Location: ../login.php');
    exit();
} ?>
<?php
$cid = htmlspecialchars($_SESSION['num']);
$servername = "localhost";
$username = "imp_xfex_cc";
	$password = "34M3aePXSKYSS3Bi";
	$dbname = "imp_xfex_cc";
$conn = new mysqli($servername, $username, $password, $dbname);
$sql = "SELECT * FROM user";
$result = $conn->query($sql);
$count = 0;
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $count++;
    }
}
$sql2 = $conn->prepare("SELECT * FROM user WHERE user_num = ?");
$sql2->bind_param("s", $cid);
$sql2->execute();
$result = $sql2->get_result();
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $icao = $row['icao'];
    }
}
$sql = "SELECT * FROM user WHERE user_grade>'1'";
$result = $conn->query($sql);
$count_atc = 0;
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $count_atc++;
    }
}

?>
<?php
$jsonUrl = 'http://185.239.84.173:6067/whazzup.json';
$jsonData = file_get_contents($jsonUrl);
$data = json_decode($jsonData, true);
$map = [];
for ($i = 0; $i < count($data['pilot']); $i++) {
    $cid = $data['pilot'][$i]['cid'];
    $map[] = [
        'cid' => $data['pilot'][$i]['cid'],
        'callsign' => $data['pilot'][$i]['callsign'],
        'departure' => $data['pilot'][$i]['flight_plan']['departure'],
        'arrival' => $data['pilot'][$i]['flight_plan']['arrival'],
        'aircraft' => $data['pilot'][$i]['flight_plan']['aircraft'],
        'route' => $data['pilot'][$i]['flight_plan']['route'],
        'heading' => $data['pilot'][$i]['heading'],
        'groundspeed' => $data['pilot'][$i]['groundspeed'],
        'transponder' => $data['pilot'][$i]['transponder'],
        'altitude' => $data['pilot'][$i]['altitude'],
        'longitude' => $data['pilot'][$i]['longitude'],
        'latitude' => $data['pilot'][$i]['latitude'],
    ];

}
$sta = '未连接';
$sim_css = 'simulator';
for ($i = 0; $i < count($map); $i++) {
    if ($_SESSION['num'] == $map[$i]['cid']) {
        $sta = '已连接';
        $sim_css = 'user_num';
    } else {
        $sta = '未连接';
        $sim_css = 'simulator';
    }
}

$cid = htmlspecialchars($_SESSION['num']);
$sql3 = $conn->prepare("SELECT * FROM history WHERE cid = ? ;");

$sql3 = $conn->prepare("SELECT * FROM history WHERE cid = ?");

$sql3->bind_param("s", $cid);
$sql3->execute();
$result = $sql3->get_result();
$count_flight_po=0;
$hours = 0;
$minutes = 0;
$flight_second = 0;
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $flight_second += intval($row['online_time']);
        $count_flight_po++;
    }
    $seconds = $flight_second;
    $seconds -= ($count_flight_po * 28800);
    $hours = floor($seconds / 3600);
    $minutes = floor(($seconds % 3600) / 60);
}

//mysqli_report(MYSQLI_REPORT_ALL);

$sql4 = $conn->prepare("SELECT * FROM history_atc WHERE cid = ? ;");

$sql4 = $conn->prepare("SELECT * FROM history_atc WHERE cid = ?");

$sql4->bind_param("s", $cid);
$sql4->execute();
$result = $sql4->get_result();
$hours_atc = 0;
$count_flight_atc=0;
$minutes_atc = 0;
$flight_second = 0;
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $flight_second += intval($row['online_time']);
        $count_flight_atc++;
    }
    $seconds = $flight_second;
    $seconds -= ($count_flight_atc * 28800);
    $hours_atc = floor($seconds / 3600);
    $minutes_atc = floor(($seconds % 3600) / 60);
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../layui/css/layui.css">
    <link rel="stylesheet" href="../css/index.css">
    <link rel="stylesheet" href="./index.css">
    <script src="https://webapi.amap.com/maps?v=1.4.15&key=YOUR_API_KEY"></script>
    <title>Document</title>
    <style>
        #map {
            height: 800px;
        }

        .activity {
            height: 500px;
            overflow-y: auto;
        }
    </style>
</head>

<body>

    <div style="padding: 15px;">
        <div class="layui-row">
            <div class="layui-col-xs6">
                <div class="grid-demo grid-demo-bg1">
                    <div class="layui-panel callsign">
                        <div style="padding: 32px;">
                            <h1>呼号</h1>
                            <div class="callsign_num">
                                <?php 
                                echo $_SESSION['num']; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="layui-col-xs6">
                <div class="grid-demo">
                    <div class="grid-demo grid-demo-bg1">
                        <div class="layui-panel <?php echo $sim_css; ?>">
                            <div style="padding: 32px;">
                                <h1>模拟器连接状态</h1>
                                <div class="callsign_num">
                                    <?php

                                    echo $sta;
                                    ?>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <div class="layui-row">
                <div class="layui-col-xs6">
                    <div class="grid-demo ">
                        <div class="layui-panel flighttime">
                            <div style="padding: 32px;">
                                <h1>飞行时长</h1>
                                <div class="flight_atc_time">
                                    <?php echo "{$hours}小时 {$minutes}分钟"; ?>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="layui-col-xs6">
                    <div class="grid-demo">
                        <div class="layui-panel atctime">
                            <div style="padding: 32px;">
                                <h1>管制时长</h1>
                                <div class="flight_atc_time">
                                    <?php if ($_SESSION['grade'] < 2) {
                                        echo '无管制权限';
                                    } else {
                                        echo "{$hours_atc}小时 {$minutes_atc}分钟";
                                    } ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="layui-row">
                <div class="layui-col-xs6">
                    <div class="grid-demo grid-demo-bg1">
                        <div class="layui-panel activity_view">
                            <div style="padding: 32px; width:50px;">
                                 <iframe src="https://imp.xfex.cc/online/" height="500" allowtransparency="true" frameborder="0"></iframe>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="layui-col-xs6">
                    <div class="grid-demo">
                        <div class="layui-panel notice">
                            <div style="padding: 32px;">
                                <?php
                                $sql = "SELECT * FROM notice ORDER BY time DESC ";
                                $result = $conn->query($sql);
                                if ($result->num_rows > 0) {
                                    while ($row = $result->fetch_assoc()) {
                                        echo '<blockquote class="layui-elem-quote">';
                                        echo $row['tittle'] . ' ' . $row['time'] . '<br>';
                                        echo $row['body'] . '<br>';
                                        echo '发布者: ' . $row['push'];
                                        echo '</blockquote>';
                                        echo '<br>';
                                    }
                                } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>



            <div class="layui-row">
                <div class="layui-col-xs6">
                    <div class="grid-demo grid-demo-bg1">
                        <div class="layui-panel user_num">
                            <div style="padding: 32px;">
                                <h1>注册人数</h1>
                                <div class="callsign_num">
                                    <?php echo $count; ?> 人
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="layui-col-xs6">
                    <div class="grid-demo">
                        <div class="layui-panel atc_num">
                            <div style="padding: 32px;">
                                <h1>管制注册人数</h1>
                                <div class="callsign_num">
                                    <?php echo $count_atc; ?> 人
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </div>

    </div>
    <br>

    </div>
</body>
<script src="../layui/layui/layui.js"></script>

</html>


<br><br>

</div>
</div>