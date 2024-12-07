<?php
session_start();
if (!isset($_SESSION['user_name'])) {
    header('Location: ../login.php');
    exit();
} ?>
<!DOCTYPE html>
<html lang="en">
<?php
error_reporting(0);
$servername = "localhost";
$username = "imp_xfex_cc";
	$password = "34M3aePXSKYSS3Bi";
	$dbname = "imp_xfex_cc";
$conn = new mysqli($servername, $username, $password, $dbname);

$search = htmlspecialchars($_POST['search']);
$sql = $conn->prepare("SELECT * FROM event WHERE time = ?;");

$search = htmlspecialchars($_POST['search']);
$sql = $conn->prepare("SELECT * FROM event WHERE time LIKE ?");

$sql->bind_param("s", $search);
$sql->execute();
$result = $sql->get_result();
if ($result && $result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $dep = $row['dep'];
        $app = $row['app'];
        $takeoff_time = $row['takeoff_time'];
    }
}
?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="/layui/css/layui.css">

 <link rel="stylesheet" href="/layui/css/layui.css">

    <link rel="stylesheet" href="/css/index.css">
    <link rel="stylesheet" href="/css/bootstrap.css">
    <script src="/js/bootstrap.js"></script>
    <title>Document</title>
</head>

<body>

    <div class="layui-card layui-panel">
        <div class="layui-bg-gray" style="padding: 20px;">
            <div class="layui-row layui-col-space15">
                <div class="layui-panel">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="staticBackdropLabel">时刻申请</h1>
                    </div>
                    <div class="layui-card">
                        <div class="layui-card-body">
                            <div class="modal-body">
                                <div class="layui-panel">
                                    <blockquote class="layui-elem-quote">
                                        起飞时刻为北京时间，请于起飞时刻前15分钟申请放行，请自行掌握合适的上线时间，分散流量，减小管制员压力；请在提报飞行计划时，将计划起飞时间填入预计起飞时间一栏（使用CST格式）
                                    </blockquote>
                                </div><br>
                                <form action="./apply.php" method="post">
                                    <div class="layui-form">
                                        <h4>活动航线</h4>
                                        <select name="route">
                                            <option value="<?php echo $dep . ' ~ ' . $app; ?>">
                                                <?php echo $dep . " ~ " . $app; ?>
                                            </option>
                                        </select><br>
                                        <h4>活动时间</h4>
                                        <select name="activity_time">
                                            <option value="<?php echo $search; ?>">
                                                <?php echo $search; ?>
                                            </option>
                                        </select><br>
                                        <div class="layui-form">
                                            <h4>起飞时间</h4>
                                            <select name="time">

                                                <option value=""></option>
                                                <?php
                                                $arr = explode(',', $takeoff_time);
                                                foreach ($arr as $arr_time) {
                                                    echo '<option value="' . $arr_time . '">' . $arr_time . '</option>';
                                                } ?>
                                            </select><br>
                                        </div>
                                        <h4>机型</h4>
                                        <input type="text" name="aircraft" placeholder="机型 例 B738" class="layui-input">
                                        <br>
                                        <button type="submit" class="layui-btn layui-btn-normal">申请</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <br>

        </div>
    </div>


    </div>

    <script src="/layui/layui.js"></script>
</body>


</html>

</html>

