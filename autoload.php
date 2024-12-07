<?php

$servername = "localhost";
$username = "imp_xfex_cc";
$password = "34M3aePXSKYSS3Bi";
$dbname = "imp_xfex_cc";
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("数据库连接失败: " . $conn->connect_error);
} else {
    echo '连接成功';
}

$jsonUrl = 'http://185.239.84.173:6067/whazzup.json';
$jsonData = file_get_contents($jsonUrl);
$data = json_decode($jsonData, true);

foreach ($data['pilot'] as $pilot) {
    $cid = $pilot['cid'];
    $callsign = $pilot['callsign'];
    $departure = $pilot['flight_plan']['departure'];
    $arrival = $pilot['flight_plan']['arrival'];
    $aircraft = $pilot['flight_plan']['aircraft'];
    $route = $pilot['flight_plan']['route'];
    $heading = $pilot['heading'];
    $groundspeed = $pilot['groundspeed'];
    $transponder = $pilot['transponder'];
    $altitude = $pilot['altitude'];
    $longitude = $pilot['longitude'];
    $latitude = $pilot['latitude'];
    $time = $pilot['logon_time'];

    // 更新history表
    $sql = "SELECT * FROM history WHERE cid = '$cid' AND time = '$time'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // 表示用户已经连接，更新history表
        $onlineTime = strtotime($time); // 将时间转换为时间戳
        $offlineTime = time() + 28800; // 获取当前时间戳
        $onlineDuration = $offlineTime - $onlineTime;
        $sql = "UPDATE history SET online_time = '$onlineDuration' WHERE cid = '$cid' AND time = '$time'";
        if ($conn->query($sql) === TRUE) {
            echo "记录更新成功";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    } else {
        // 表示用户刚刚连接，插入新记录到history表
        if (isset($departure)) {
            $onlineTime = strtotime($time); // 将时间转换为时间戳
            $offlineTime = time() + 28800; // 获取当前时间戳
            $onlineDuration = $offlineTime - $onlineTime;
            $sql = "INSERT INTO history (client_name, depairport, destairport, aircraft, cid, time, online_time) VALUES ('$callsign', '$departure', '$arrival', '$aircraft', '$cid', '$time', '$onlineDuration')";
            if ($conn->query($sql) === TRUE) {
                echo "新记录插入成功";
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        }
    }
}
foreach ($data['controllers'] as $atc) {
    $cid = $atc['cid'];
    $callsign = $atc['callsign'];
    $frequency = $atc['frequency'];
    $time = $atc['logon_time'];

    // 更新history表
    $sql = "SELECT * FROM history_atc WHERE cid = '$cid' AND logon_time = '$time'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // 表示用户已经连接，更新history表
        $onlineTime = strtotime($time); // 将时间转换为时间戳
        $offlineTime = time() + 28800; // 获取当前时间戳
        $onlineDuration = $offlineTime - $onlineTime;
        $sql = "UPDATE history_atc SET online_time = '$onlineDuration' frequency='$frequency' WHERE cid = '$cid' AND logon_time = '$time'";
        $sql = "UPDATE history_atc SET online_time = '$onlineDuration' WHERE cid = '$cid' AND logon_time = '$time'";
        if ($conn->query($sql) === TRUE) {
            echo "记录更新成功";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    } else {
        // 表示用户刚刚连接，插入新记录到history表
        if (isset($frequency)) {
            $onlineTime = strtotime($time); // 将时间转换为时间戳
            $offlineTime = time() + 28800; // 获取当前时间戳
            $onlineDuration = $offlineTime - $onlineTime;
            $sql = "INSERT INTO history_atc (cid,callsign,frequency,logon_time,online_time) VALUES ('$cid', '$callsign', '$frequency', '$time ','$onlineDuration')";
            if ($conn->query($sql) === TRUE) {
                echo "新记录插入成功";
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        }
    }
}
$conn->close();
?>
