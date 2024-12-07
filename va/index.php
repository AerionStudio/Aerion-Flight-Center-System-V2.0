<?php
session_start();
$val = htmlspecialchars($_SESSION['num']);
$servername = "localhost";
$username = "efb";
$password = "MNex4DtZyZAEEspR";
$dbname = "efb";
$icao = urldecode($_GET['icao']);
$conn = new mysqli($servername, $username, $password, $dbname);
$sql = $conn->prepare("SELECT * FROM user WHERE icao = ?;");
$sql->bind_param("s", $icao);
$sql->execute();
$count_user = 0;
$result = $sql->get_result();
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $count_user++;
    }
} else {
    echo "未找到匹配的数据";
}
$sql = "SELECT * FROM history ORDER BY time DESC;";
$result = $conn->query($sql);
$flight_icao = array();
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $flight_icao[] = substr($row['client_name'], 0, 3);
        $flight_time[] = $row['online_time'];
        $client_name[] = $row['client_name'];
        $time[] = $row['time'];
        $depairport[] = $row['depairport'];
        $destairport[] = $row['destairport'];
        $aircraft[] = $row['aircraft'];
        $cid[] = (strlen($row['cid']) === 7) ? substr($row['cid'], -4) : $row['cid'];

    }
} else {
    echo "未找到匹配的数据";
}
$count_flight = 0;
$seconds = 0;
$seconds_all = 0;
$flight_plan = []; // 添加这一行，初始化空数组
for ($i = 0; $i < count($flight_icao); $i++) {
    if ($icao == $flight_icao[$i]) {
        $count_flight++;
        $seconds = intval($flight_time[$i]); // 先累加flight_time
        $hours = floor($seconds / 3600);
        $minutes = floor(($seconds % 3600) / 60);
        $str = $time[$i];
        $substring = strstr($str, 'T', true);
        $flight_plan[] = [
            'client_name' => $client_name[$i],
            'depairport' => $depairport[$i],
            'destairport' => $destairport[$i],
            'aircraft' => $aircraft[$i],
            'cid' => $cid[$i],
            'time' => $substring,
            'flight_time_hour' => $hours,
            'flight_time_minutes' => $minutes
        ];
        $seconds_all += intval($flight_time[$i]);
    }
}
$hours = 0; // 移动到for循环之外
$minutes = 0;
$hours = floor($seconds_all / 3600);
$minutes = floor(($seconds_all % 3600) / 60);

$sql = $conn->prepare("SELECT * FROM airlines WHERE airlines_icao = ?;");
$sql->bind_param("s", $icao);
$sql->execute();
$result = $sql->get_result();
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $tr = $row['tr'];
    }
} else {
    echo "未找到匹配的数据";
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/bootstrap.css">
    <link rel="stylesheet" href="./index.css">
    <link rel="stylesheet" href="https://cdn.staticfile.org/font-awesome/4.7.0/css/font-awesome.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <title>Document</title>
</head>

<body>
    <div class="container text-center">
        <div class="row">
            <div class="col num">
                <div class="icon animate__animated animate__flipInX"><i class="fa fa-user"></i>
                    <?php echo $count_user; ?>人
                </div>
                <div class="little animate__animated animate__rotateInUpLeft">航司人数</div>
            </div>
            <div class="col time">
                <div class="icon animate__animated animate__flipInX"><i class="fa fa-clock-o"></i>
                    <?php echo "{$hours}:{$minutes}"; ?>
                </div>
                <div class="little animate__animated animate__rotateInUpLeft">公司航班总时长</div>
            </div>

            <div class="col flight_num">
                <div class="icon animate__animated animate__flipInX"><i class="fa fa-plane"></i>
                    <?php echo $count_flight; ?>架次
                </div>
                <div class="little animate__animated animate__rotateInUpLeft">公司航班总架次</div>
            </div>

            <div class="col tr">
                <div class="icon animate__animated animate__flipInX"><i class="fa fa-map-marker"></i>
                    <?php echo $tr; ?>
                </div>
                <div class="little animate__animated animate__rotateInUpLeft">基地</div>
            </div>

        </div>
        <div class="row">
            <div class="col-8 list">
                <div class="list_body_title animate__animated animate__flipInX">公司航班</div>
                <div class="list_body">
                    <table class="table animate__animated animate__jackInTheBox">
                        <thead>
                            <tr>
                                <th scope="col">航班号</th>
                                <th scope="col">机长</th>
                                <th scope="col">飞行日期</th>
                                <th scope="col">起飞</th>
                                <th scope="col">落地</th>
                                <th scope="col">机型</th>
                                <th scope="col">注册号</th>
                                <th scope="col">载客</th>
                                <th scope="col">时长</th>
                                <th scope="col">正/晚/取</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            for ($i = 0; $i < count($flight_plan); $i++) {
                                echo '<tr>';
                                echo '<td>' . $flight_plan[$i]['client_name'] . '</td>';
                                echo '<td>' . $flight_plan[$i]['cid'] . '</td>';
                                echo '<td>' . $flight_plan[$i]['time'] . '</td>';
                                echo '<td>' . $flight_plan[$i]['depairport'] . '</td>';
                                echo '<td>' . $flight_plan[$i]['destairport'] . '</td>';
                                echo '<td>' . $flight_plan[$i]['aircraft'] . '</td>';
                                echo '<td>N/A</td>';
                                echo '<td>N/A</td>';
                                echo '<td>' . $flight_plan[$i]['flight_time_hour'] . '小时' . $flight_plan[$i]['flight_time_minutes'] . '分钟</td>';
                                echo '<td><button type="button" class="btn btn-success">正点</button></td>';
                                echo '</tr>';
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="col-4 list_1">
                <div class="list_body_title animate__animated animate__flipInX">排行榜</div>
                <div class="list_body">
                    <table class="table animate__animated animate__jackInTheBox">
                        <thead>
                            <tr>
                                <th scope="col">排名</th>
                                <th scope="col">机长</th>
                                <th scope="col">时长</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $sql = $conn->prepare("SELECT * FROM user WHERE icao = ?");
                            $sql->bind_param("s", $icao);
                            $sql->execute();
                            $user = [];
                            $cid_1 = [];
                            $cid = [];
                            $online_time = 0;
                            $result = $sql->get_result(); // 获取查询结果
                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                                    $cid_1[] = $row['user_num'];
                                }
                            }
                            $cid = array_unique($cid_1);
                            for ($i = 0; $i < count($cid); $i++) {
                                for ($j = 0; $j < count($flight_plan); $j++) {
                                    if ($cid[$i] == $flight_plan[$j]['cid']) {
                                        $hour = $flight_plan[$j]['flight_time_hour'] * 3600;
                                        $minute = $flight_plan[$j]['flight_time_minutes'] * 60;
                                        $seconds = $hour + $minute;
                                        // 检查是否存在相同的user_num
                                        $index = -1;
                                        for ($k = 0; $k < count($user); $k++) {
                                            if ($user[$k]['user_num'] == $cid[$i]) {
                                                $index = $k;
                                                break;
                                            }
                                        }

                                        if ($index !== -1) {
                                            // 如果存在相同的user_num，将时间增加
                                            $user[$index]['time'] += $seconds;
                                        } else {
                                            // 如果不存在相同的user_num，添加新的条目
                                            $user[] = [
                                                'user_num' => $cid[$i],
                                                'time' => $seconds
                                            ];
                                        }
                                    }
                                }
                            }
                            // 对 $user 数组进行降序冒泡排序
                            for ($i = 0; $i < count($user) - 1; $i++) {
                                for ($j = 0; $j < count($user) - $i - 1; $j++) {
                                    if ($user[$j]['time'] < $user[$j + 1]['time']) {
                                        // 交换位置
                                        $temp = $user[$j];
                                        $user[$j] = $user[$j + 1];
                                        $user[$j + 1] = $temp;
                                    }
                                }
                            }
                            ?>
                            <?php
                            for ($i = 0; $i < count($user); $i++) {
                                echo '<tr>';
                                echo '<td>' . ($i + 1) . '</td>';
                                echo '<td>' . $user[$i]['user_num'] . '</td>';
                                $hours = 0;
                                $minutes = 0;
                                $seconds = intval($user[$i]['time']);
                                $hours = floor($seconds / 3600);
                                $minutes = floor(($seconds % 3600) / 60);
                                echo '<td>' . $hours . '小时' . $minutes . '分钟</td>';
                                echo '</tr>';
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</body>
<script src="./js/bootstrap.js"></script>

</html>