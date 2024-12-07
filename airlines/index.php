<?php
session_start();
$val = htmlspecialchars($_SESSION['num']);
$servername = "localhost";
$username = "imp_xfex_cc";
$password = "MNex4DtZyZAEEspR";
$dbname = "imp_xfex_cc";
$conn = new mysqli($servername, $username, $password, $dbname);
$sql = $conn->prepare("SELECT * FROM user WHERE user_num = ?;");
$sql->bind_param("s", $val);
$sql->execute();
$result = $sql->get_result();
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $icao = (!isset($row['icao'])) ? 'CFC' : $row['icao'];
    }
} else {
    echo "未找到匹配的数据";
    return;
}
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
    <link rel="stylesheet" href="./layui/css/layui.css">
    <link rel="stylesheet" href="./index.css">
    <title>Document</title>
</head>

<body style="padding: 20px;">

    <div class="layui-row">
        <div class="layui-col-xs6" style="padding: 20px;">
            <div class="grid-demo grid-demo-bg1">
                <div class="user" style="background: url(./1.png);">
                    <img src="<?php echo $img; ?>" alt="" class="airlines_user">
                    <div class="user_airlines_num">
                        <h1 class="user_num_1">用户名:
                            <?php echo $_SESSION['user_name'] ?>
                        </h1>
                        <h1 class="user_num_2">呼号:
                            <?php echo $_SESSION['num'] ?>
                        </h1>
                    </div>
                    <div class="user_airlines_chinese">
                        <?php echo $chinese; ?>
                    </div>
                    <div class="user_airlines_english">
                        <?php echo $english; ?>
                    </div>
                    <div class="user_airlines_icao">
                        <h1 class="icao">ICAO:
                            <?php echo $icao; ?>
                        </h1>
                    </div>
                    <div class="user_airlines_iata">
                        <h1 class="iata">IATA:
                            <?php echo $iata; ?>
                        </h1>
                    </div>
                </div>
            </div>
        </div>
        <div class="layui-col-xs6" style="padding: 20px;">
            <div class="grid-demo">
                <?php
                $sql = "SELECT * FROM airlines ";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo '<a href="./introduce.php?icao=' . $row['airlines_icao'] . '">';
                        echo '<div class="airlines_detailed"
                        style="background: linear-gradient(257.51deg,' . $row['color_1'] . ', ' . $row['color_2'] . ' 100%);">';
                        echo '<img src="' . $row['airlines_img'] . '" alt="" class="airlines">';
                        echo '<h1 class="airlines_chinese_name">' . $row['airlines_chinese_name'] . '</h1>';
                        echo '<h1 class="airlines_english_name">' . $row['airlines_english_name'] . '</h1>';
                        echo '<h1 class="airlines_icao">' . $row['airlines_icao'] . '</h1>';
                        echo ' </div>';
                        echo '</a>';
                        echo '<br>';
                    }
                } else {
                    echo "未找到匹配的数据";
                }
                ?>
            </div>
        </div>
    </div>
</body>
<script src="./layui/layui.js"></script>

</html>
