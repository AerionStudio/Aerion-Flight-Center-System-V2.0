<!DOCTYPE html>
<html lang="en">
<?php
session_start();
$name = htmlspecialchars($_SESSION['num']);
$atc = htmlspecialchars(urldecode($_GET['name']));
$fq = htmlspecialchars(urldecode($_GET['fq']));
$id = htmlspecialchars(urldecode($_GET['id']));
$servername = "localhost";
$username = "imp_xfex_cc";
	$password = "34M3aePXSKYSS3Bi";
	$dbname = "imp_xfex_cc";
$conn = new mysqli($servername, $username, $password, $dbname);
$check_1 = htmlspecialchars($_SESSION['num']);

if (isset($check_1)) {
    // **1012**: 下面的变量好像都没饮用？先注释了
    /*
    $sql = $conn->prepare("SELECT * FROM event_atc WHERE user = ? AND time = ?");
    $sql->bind_param("ss", $check_1, $id);
    $sql->execute();
    $result = $sql->get_result();
     */
    if (isset($atc) && isset($fq)) {
        $insert_sql = $conn->prepare("INSERT INTO event_atc (time,atc_user,atc) VALUES (?, ?, ?);");
        $insert_sql->bind_param("sss", $id, $name, $atc);
        if ($insert_sql->execute()) {
            echo "报名成功";
        } else {
            echo "您已经报过名了~ ";
        }
    }
}
?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link rel="stylesheet" href="/layui/css/layui.css">
    <link rel="stylesheet" href="/css/index.css">
    <link rel="stylesheet" href="/css/bootstrap.css">
    <script src="/js/bootstrap.js"></script>
    <title>Document</title>
    <style>
        a {
            color: #fff;
            text-decoration: none;
        }
    </style>
</head>

<body>

    <div class="layui-card layui-panel">
        <div class="layui-bg-gray" style="padding: 20px;">
            <div class="layui-row layui-col-space15">
                <div class="layui-panel">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="staticBackdropLabel">管制报名</h1>
                    </div>
                    <div class="layui-card">
                        <div class="layui-card-body">
                            <div class="modal-body">
                                <div class="layui-panel">
                                    <blockquote class="layui-elem-quote">
                                        请各管制提前进入TS语音服务器，进行协调。
                                    </blockquote>
                                </div><br>
                                <form action="./view.php?<?php echo $id; ?>" method="post">

                                    <table class="layui-table">
                                        <colgroup>
                                            <col width="150">
                                            <col width="150">
                                            <col>
                                        </colgroup>
                                        <thead>
                                            <tr>
                                                <th>席位名称</th>
                                                <th>席位频率</th>
                                                <th>席位管制</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <?php echo $atc; ?>
                                                </td>
                                                <td>
                                                    <?php echo $fq; ?>
                                                </td>
                                                <td>
                                                    <?php echo htmlspecialchars($_SESSION['num']); ?>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <button type="#" class="layui-btn layui-btn-normal"><a
                                            href="./index.php">确定</a></button>
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

    <script src="https://aip.cfcsim.cn/demo/layui/layui.js"></script>
</body>

</html>
