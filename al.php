<?php
if (php_sapi_name() !== "cli") {
    die("gui");
}
$servername = "localhost";
$username = "imp_xfex_cc";
$password = "MNex4DtZyZAEEspR";
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
    $cid = htmlspecialchars($pilot['cid']);
    $callsign = htmlspecialchars($pilot['callsign']);
    $departure = htmlspecialchars($pilot['flight_plan']['departure']);
    $arrival = htmlspecialchars($pilot['flight_plan']['arrival']);
    $aircraft = htmlspecialchars($pilot['flight_plan']['aircraft']);
    $route = htmlspecialchars($pilot['flight_plan']['route']);
    $heading = $pilot['heading'];
    $groundspeed = $pilot['groundspeed'];
    $transponder = htmlspecialchars($pilot['transponder']);
    $altitude = $pilot['altitude'];
    $longitude = $pilot['longitude'];
    $latitude = $pilot['latitude'];
    $time = $pilot['logon_time'];

    // 更新history表
    $sql = $conn->prepare("SELECT * FROM history WHERE cid = ? AND time = ?");
    $sql->bind_param("ss", $cid, $time);
    $sql->execute();
    $result = $sql->get_result();

    if ($result->num_rows > 0) {
        // 表示用户已经连接,更新history表
        $onlineTime = strtotime($time); // 将时间转换为时间戳
        $offlineTime = time() + 28800; // 获取当前时间戳
        $onlineDuration = $offlineTime - $onlineTime;
        $sql = $conn->prepare("UPDATE history SET online_time = ? WHERE cid = ? AND time = ?;");
        $sql->bind_param("sss", $onlineDuration, $cid, $time);
        if ($sql->execute()) {
            echo "记录更新成功";
        } else {
            echo "Error: " . $sql . "\n" . $conn->error;
        }
    } else {
        // 表示用户刚刚连接,插入新记录到history表
        if (isset($departure)) {
            $onlineTime = strtotime($time); // 将时间转换为时间戳
            $offlineTime = time() + 28800; // 获取当前时间戳
            $onlineDuration = $offlineTime - $onlineTime;
            $sql = $conn->prepare("INSERT INTO history (client_name, depairport, destairport, aircraft, cid, time, online_time) VALUES (?,?,?,?,?,?,?)");
<<<<<<< HEAD
            $sql->bind_param("sssssss", $callsign, $departure, $arrival, $aircraft, $cid, $time, $onlineDuration);
=======
            $sql->bind_param("sssssss" ,$callsign, $departure, $arrival, $aircraft, $cid, $time, $onlineDuration);
>>>>>>> be65fa0e2d29a3a732f55e1762d23856705c03ca
            if ($sql->execute()) {
                echo "新记录插入成功";
            } else {
                echo "Error: " . $sql . "\n" . $conn->error;
            }
        }
    }
}
foreach ($data['controllers'] as $atc) {
    $cid = htmlspecialchars($atc['cid']);
    $callsign = htmlspecialchars($atc['callsign']);
    $frequency = $atc['frequency'];
    $time = $atc['logon_time'];

    // 更新history表
    $sql = $conn->prepare("SELECT * FROM history_atc WHERE cid = ? AND logon_time = ?");
    $sql->bind_param("ss", $cid, $time);
    $sql->execute();
    $result = $sql->get_result();

    if ($result->num_rows > 0) {
        // 表示用户已经连接,更新history表
        $onlineTime = strtotime($time); // 将时间转换为时间戳
        $offlineTime = time() + 28800; // 获取当前时间戳
        $onlineDuration = $offlineTime - $onlineTime;
<<<<<<< HEAD
        $sql = "UPDATE history_atc SET online_time = '$onlineDuration' frequency='$frequency' WHERE cid = '$cid' AND logon_time = '$time'";
=======
        $sql = "UPDATE history_atc SET online_time = '$onlineDuration' WHERE cid = '$cid' AND logon_time = '$time'";
>>>>>>> be65fa0e2d29a3a732f55e1762d23856705c03ca
        if ($conn->query($sql) === TRUE) {
            echo "记录更新成功";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    } else {
        // 表示用户刚刚连接,插入新记录到history表
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
<<<<<<< HEAD
?>
=======
?>
>>>>>>> be65fa0e2d29a3a732f55e1762d23856705c03ca
