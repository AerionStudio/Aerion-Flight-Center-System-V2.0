<!DOCTYPE html>
<html lang="en">
<?php
error_reporting(0);
$val = $_POST['option'];
echo $val;
$id = $_POST['id'];
$atc = $_POST['atc'];
$atc_fq = $_POST['atc_fq'];
$takeoff_time = $_POST['takeoff_time'];
echo $id;
$delete = $_POST['delete'];
echo $deletel;
$servername = "localhost";
$username = "efb";
$password = "MNex4DtZyZAEEspR";
$dbname = "efb";
if (isset($delete)) {
    $conn = new mysqli($servername, $username, $password, $dbname);
    $sql = "DELETE FROM `event` WHERE time='$delete'";
    $result = mysqli_query($conn, $sql);
    if (mysqli_query($conn, $sql)) {
        echo "删除成功";
    } else {
        echo "删除失败: " . mysqli_error($conn);
    }
}
if (isset($id)) {
    $conn = new mysqli($servername, $username, $password, $dbname);
    $sql = "UPDATE event SET state = '$val' WHERE time LIKE '%$id%'";
    $result = mysqli_query($conn, $sql);
    if (mysqli_query($conn, $sql)) {
        echo "更新成功";
    } else {
        echo "更新失败: " . mysqli_error($conn);
    }

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
                        <form action="./edit.php" method="post">
                            <?php
                            $servername = "localhost";
                            $username = "efb";
                            $password = "MNex4DtZyZAEEspR";
                            $dbname = "efb";
                            $local_time = date("Y-m-d");
                            $conn = new mysqli($servername, $username, $password, $dbname);
                             $sql = "SELECT * FROM event ORDER BY time DESC";
                            $result = $conn->query($sql);
                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                                    $dep = $row['dep'];
                                    $app = $row['app'];
                                    $state = $row['state'];
                                    $local_time = strtotime($local_time);
                                    $row_time = strtotime($row['time']);
                                    echo "<tr>";
                                    echo "<td>[官方活动] " . $row['time'] . ' ' . $row['dep'] . " ~ " . $row['app'] . "</td>";
                                    echo "<td>" . $row['Publisher'] . "</td>";
                                    if ($row['state'] == 1) {
                                        echo '<td><span class="layui-badge layui-bg-blue">正在进行</span></td>';
                                        echo "<td>";
                                        echo '<div class="layui-btn-group">';
                                        echo '<button type="submit" class="layui-btn layui-btn-xs" data-bs-toggle="modal" data-bs-target="#staticBackdrop" name="search" value=\'' . $row['time'] . '\'>编辑</button>'; // 修复引号嵌套问题
                                        echo "</div>";
                                        echo "</td>";
                                        echo "</tr>"; // 将tr元素移动到if语句内部
                                    } elseif ($row['state'] == 0) {
                                        echo '<td><span class="layui-badge layui-bg-orange">已结束</span></td>';
                                        echo "<td>";
                                        echo '<div class="layui-btn-group">';
                                        echo '<button type="submit" class="layui-btn layui-btn-xs" data-bs-toggle="modal" data-bs-target="#staticBackdrop" name="search" value=\'' . $row['time'] . '\'>编辑</button>';
                                        echo "</div>";
                                        echo "</td>";
                                        echo "</tr>"; // 将tr元素移动到if语句内部
                                    } else {
                                        echo '<td><span class="layui-badge layui-btn-danger">取消</span></td>';
                                        echo "<td>";
                                        echo '<div class="layui-btn-group">';
                                        echo '<button type="submit" class="layui-btn layui-btn-xs" data-bs-toggle="modal" data-bs-target="#staticBackdrop" name="search" value=\'' . $row['time'] . '\'>编辑</button>';
                                        echo "</div>";
                                        echo "</td>";
                                        echo "</tr>"; // 将tr元素移动到if语句内部
                                    }

                                }
                            }
                            $search = $_POST['search'];
                            $sql = "SELECT * FROM event WHERE time LIKE '%$search%'";
                            $result = mysqli_query($conn, $sql);
                            if (mysqli_num_rows($result) > 0) {
                                while ($row = mysqli_fetch_assoc($result)) {
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