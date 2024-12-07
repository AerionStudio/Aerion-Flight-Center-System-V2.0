<!DOCTYPE html>
<html lang="en">
<?php
error_reporting(0);
$val = $_POST['option'];
echo $val;
$id = $_POST['id'];
echo $id;
$delete = $_POST['delete'];
echo $deletel;
$servername = "localhost";
$username = "efb";
$password = "MNex4DtZyZAEEspR";
$dbname = "efb";
if (isset($delete)) {
    $conn = new mysqli($servername, $username, $password, $dbname);
    $sql = "DELETE FROM `user` WHERE user_num='$delete'";
    $result = mysqli_query($conn, $sql);
    if (mysqli_query($conn, $sql)) {
        // echo "删除成功";
        echo "<script>alert('删除成功')</script>";
    } else {
        echo "<script>alert('删除失败: ')</script>" . mysqli_error($conn);
    }
}
if (isset($id)) {
    $conn = new mysqli($servername, $username, $password, $dbname);
    $sql = "UPDATE user SET user_grade = '$val' WHERE user_num LIKE '%$id%'";
    $result = mysqli_query($conn, $sql);
    if (mysqli_query($conn, $sql)) {
        //echo "更新成功";
        echo "<script>alert('更新成功')</script>";
    } else {
        echo "<script>alert('更新失败: ')</script>" . mysqli_error($conn);
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
                <legend>用户权限</legend>
            </fieldset>

            <div class="layui-panel">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">用户名</th>
                            <th scope="col">呼号</th>
                            <th scope="col">邮箱</th>
                            <th scope="col">权限</th>
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
                            $conn = new mysqli($servername, $username, $password, $dbname);
                            $sql = "SELECT * FROM user";
                            $result = $conn->query($sql);
                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                                    echo "<tr>";
                                    echo "<td> " . $row['user_name'] . "</td>";
                                    echo "<td>" . $row['user_num'] . "</td>";
                                    echo "<td>" . $row['user_email'] . "</td>";
                                    echo "<td>" . $row['user_grade'] . "</td>";
                                    echo "<td>";
                                    echo '<div class="layui-btn-group">';
                                    echo '<button type="submit" class="layui-btn layui-btn-xs" data-bs-toggle="modal" data-bs-target="#staticBackdrop" name="search" value=\'' . $row['user_num'] . '\'>编辑</button>'; // 修复引号嵌套问题
                                    echo "</div>";
                                    echo "</td>";
                                    echo "</tr>";
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