<?php
$icao = htmlspecialchars($_GET['icao']);
session_start();
$servername = "localhost";
$username = "imp_xfex_cc";
$password = "MNex4DtZyZAEEspR";
$dbname = "imp_xfex_cc";
$conn = new mysqli($servername, $username, $password, $dbname);
$sql = $conn->prepare("SELECT * FROM airlines WHERE airlines_icao = ?;");
$sql->bind_param("s", $icao);
$sql->execute();
$result = $sql->get_result();
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $img = $row['airlines_img'];
        $chinese = $row['airlines_chinese_name'];
        $english = $row['airlines_english_name'];
        $icao = $row['airlines_icao'];
        $iata = $row['airlines_iata'];
        $introduce = $row['airlines_introduce'];
        $dir_ma = $row['dir_ma'];
        $as_ma = $row['as_ma'];
        $color_1 = $row['color_1'];
        $color_2 = $row['color_2'];
        $qq = $row['qq'];
    }
} else {
    echo "未找到匹配的数据";
    return;
}

$sql = "SELECT * FROM history;";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $flight_icao[] = substr($row['client_name'], 0, 3);
        $flight_time[] = $row['online_time'];
    }
} else {
    echo "未找到匹配的数据";
}
$count = 0;
$seconds = 0;
for ($i = 0; $i < count($flight_icao); $i++) {
    if ($icao == $flight_icao[$i]) {
        $count++;
        $seconds += intval($flight_time[$i]);
    }
}
$hours = floor($seconds / 3600);
$minutes = floor(($seconds % 3600) / 60);
$user = html_entity_decode($_SESSION['num'])
    ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./layui/css/layui.css">
    <link rel="stylesheet" href="./introduce.css">
    <link rel="stylesheet" href="./index.css">
    <title>Document</title>
</head>

<body style="padding: 20px;">
    <div class="layui-row">
        <div class="layui-col-xs12 layui-col-md8">
            <div class="grid-demo grid-demo-bg1" style="padding: 20px;">
                <div class="airlines_detailed"
                    style="background: linear-gradient(269.87deg, <?php echo $color_1; ?> 0%, <?php echo $color_2; ?> 100%);">
                    <img src="<?php echo $img; ?>" alt="" class="airlines">
                    <h1 class="airlines_chinese_name">
                        <?php echo $chinese; ?>
                    </h1>
                    <h1 class="airlines_english_name">
                        <?php echo $english; ?>
                    </h1>
                    <h1 class="airlines_icao">
                        <?php echo $icao; ?>
                    </h1>
                </div>
            </div>
        </div>
        <div class="layui-col-xs6 layui-col-md4" style="padding: 20px;">
            <div class="grid-demo"><button class="apply">
                    <?php
                    $sql = $conn->prepare("SELECT * FROM user WHERE user_num = ?;");
                    $sql->bind_param("s", $user);
                    $sql->execute();
                    $result = $sql->get_result();
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            $icao_user = (!isset($row['icao'])) ? 'CFC' : $row['icao'];
                            $user_num = $row['user_num'];
                        }
                    } else {
                        echo "未找到匹配的数据";
                        return;
                    }
                    if ($icao_user == $icao) {
                        echo '<a href="./quit.php?num=' . $user_num . '">退出</a>';
                    } elseif ($icao_user != $icao) {
                        echo '<a href="#">你已经是其他航司成员，如要跳槽请先退出当前航司。</a>';
                    } else {
                        echo '<a href="./apply.php?icao=' . $icao . '">申请</a>';
                    }
                    ?>

                </button>
            </div>
        </div>
        <div class="layui-col-xs6 layui-col-md12" style="padding: 20px;">
            <div class="grid-demo grid-demo-bg2 body">
                <div class="layui-row">
                    <div class="layui-col-xs6">
                        <div class="grid-demo grid-demo-bg1" style="padding: 20px;">
                            <div class="user_airlines_chinese">
                                <?php echo $chinese; ?> <br>
                            </div>
                            <div class="user_airlines_english">
                                <?php echo $english; ?> <br>
                            </div>
                            <div class="icao">ICAO代码
                                <?php echo $icao; ?><br>
                            </div>
                            <div class="iata">IATA代码
                                <?php echo $iata; ?><br>
                            </div>
                            <div class="user_num_1">总经理
                                <?php echo $dir_ma; ?><br>
                            </div>
                            <div class="user_num_2">副总经理
                                <?php echo $as_ma; ?><br>
                            </div>
                            <div class="flight_num">总航班数
                                <?php echo $count; ?> 架次<br>
                            </div>
                            <div class="flight_time">总时长
                                <?php echo "{$hours}小时 {$minutes}分钟"; ?><br>
                            </div>
                        </div>
                    </div>
                    <div class="layui-col-xs6">
                        <div class="grid-demo" style="padding: 20px; ">
                            <div class="de">
                                <?php echo $introduce; ?>
                                <hr>
                                嗨！欢迎加入CFC
                                <?php echo $chinese; ?><br>

                                一、入司流程
                                想要加入CFC
                                <?php echo $chinese; ?>，请您遵照如下流程：<br>
                                1、加入官方QQ群
                                <?php echo $qq; ?> <br>
                                2、在IMP提交入司申请后于QQ群内联系管理审核
                            </div>
                            <div class="table-container">
                                <table class="layui-table" lay-even>
                                    <colgroup>
                                        <col width="150">
                                        <col width="150">
                                        <col>
                                    </colgroup>
                                    <thead>
                                        <tr>
                                            <th>用户名</th>
                                            <th>呼号</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $sql = "SELECT * FROM user WHERE icao='$icao' ";
                                        $result = $conn->query($sql);
                                        if ($result->num_rows > 0) {
                                            while ($row = $result->fetch_assoc()) {
                                                echo '<tr>';
                                                echo '<td>' . $row['user_name'] . '</td>';
                                                echo '<td>' . $row['user_num'] . '</td>';
                                            }
                                        } else {
                                            echo "未找到匹配的数据";
                                        }

                                        ?>
                                    </tbody>
                                </table>
                            </div>

                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

</body>
<script src="./layui/layui.js"></script>

</html>