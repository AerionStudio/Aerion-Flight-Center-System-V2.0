<!DOCTYPE html>
<html lang="en">
<?php
session_start();
error_reporting(0);
$val = htmlspecialchars($_SESSION['num']);
$id = htmlspecialchars($_POST['id']);
$servername = "localhost";
$username = "imp_xfex_cc";
	$password = "34M3aePXSKYSS3Bi";
	$dbname = "imp_xfex_cc";
$conn = new mysqli($servername, $username, $password, $dbname);
$sql = $conn->prepare("SELECT * FROM user WHERE user_num = ?;");
$sql->bind_param("s", $val);
$sql->execute();
$result = $sql->get_result();
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $icao = $row['icao'];
    }
}

if (isset($_POST['ok'])) {
    $id = htmlspecialchars($_POST['ok']); // 从表单中获取用户ID并转码避免XSS
    echo $id;
    $sql = $conn->prepare("UPDATE `user` SET `icao` = ? WHERE `user_num` = ?;");
    $sql->bind_param("ss", $icao, $id);
    $sql->execute();
    $result = $sql->get_result();
    // 如果有其他逻辑判断需要删除记录时才执行删除操作
    $sql = $conn->prepare("DELETE FROM `airlines_wait` WHERE `num` = ?;");
    $sql->bind_param("s", $id);
    $sql->execute();
    $result = $sql->get_result();
    $conn->close();
    header('Location: index.php');
    // 根据实际需求进行后续操作，例如显示成功消息或重定向到其他页面
} else if (isset($_POST['no'])) {  // **1012**: 看两个里面都有关闭连接，(正常的话)应该是只有一种情况吧，改成else if了
    $id = htmlspecialchars($_POST['no']); // 从表单中获取用户ID并转码
    $sql = $conn->prepare("DELETE FROM `airlines_wait` WHERE `num` = ?;");
    $sql->bind_param("s", $id);
    $sql->execute();
    $result = $sql->get_result();
    $conn->close();
}

?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../layui/css/layui.css">
    <link rel="stylesheet" href="../css/index.css">
    <link rel="stylesheet" href="../css/bootstrap.css">
    <script src="../js/bootstrap.js"></script>
    <title>Document</title>
</head>

<body>
    <div class="layui-card layui-panel">
        <div class="layui-bg-gray" style="padding: 20px;">
            <fieldset class="layui-elem-field layui-field-title">
                <br>
                <legend>虚航用户</legend>
            </fieldset>

            <div class="layui-panel">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">用户</th>
                            <th scope="col">呼号</th>
                            <th scope="col">日期</th>
                            <th scope="col">操作</th>
                        </tr>
                    </thead>
                    <tbody>
                        <form action="./edit.php" method="post">
                            <?php
                            $servername = "localhost";
                            $username = "efb";
                            $password = "MNex4DtZyZAEEspR";
                            $dbname = "efb";
                            $local_time = date("Y-m-d");
                            $conn = new mysqli($servername, $username, $password, $dbname);
                            $sql = $conn->prepare("SELECT * FROM airlines_wait WHERE icao = ? ORDER BY time DESC");
                            $sql->bind_param("s", $icao);
                            $sql->execute();
                            $result = $sql->get_result();
                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                                    echo "<tr>";
                                    echo "<td>" . $row['user'] . "</td>";
                                    echo "<td>" . $row['num'] . "</td>";
                                    echo "<td>" . $row['time'] . "</td>";
                                    echo "<td>";
                                    echo '<div class="layui-btn-group">';
                                    echo '<button type="submit" class="layui-btn layui-btn-xs" data-bs-toggle="modal" data-bs-target="#staticBackdrop" name="search" value=\'' . $row['num'] . '\'>编辑</button>';
                                    echo '</div>';
                                    echo "</td>";
                                }
                            }
                            $search = "%".htmlspecialchars($_POST['search'])."%";
                            $sql = $conn->prepare("SELECT * FROM event WHERE time LIKE ?");
                            $sql->bind_param("s", $search);
                            $sql->execute();
                            $result = $sql->get_result();
                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc($result)) {
                                    $dep = $row['dep'];
                                    $app = $row['app'];
                                }
                            }
                            $conn->close();
                            ?>
                        </form>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <script src="../layui/layui.js"></script>
</body>

</html>
