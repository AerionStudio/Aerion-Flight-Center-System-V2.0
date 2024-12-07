<!DOCTYPE html>
<html lang="en">
<?php error_reporting(0); ?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../layui/css/layui.css">
    <link rel="stylesheet" href="../css/index.css">
    <link rel="stylesheet" href="https://aip.cfcsim.cn/demo/css/bootstrap.css">
    <script src="https://aip.cfcsim.cn/demo/js/bootstrap.js"></script>
    <title>Document</title>
</head>

<body>
    <div style="padding: 15px;">
        <blockquote class="layui-elem-quote layui-text">
            欢迎来到CFCSIM-EFB 后台管理 保护好密码哦~
        </blockquote>
        <div class="layui-card layui-panel">
            <div class="layui-bg-gray" style="padding: 20px;">
                <br>
                <div class="layui-panel">
                    <fieldset class="layui-elem-field">
                        <legend>发布活动</legend>
                        <!-- 给容器追加 class="layui-form-pane"，即可显示为方框风格 -->
                        <form class="layui-form layui-form-pane" action="./index.php" method="post">
                            <div class="layui-form-item">
                                <div class="layui-inline">
                                    <label class="layui-form-label">标题</label>
                                    <div class="layui-input-block">
                                        <input type="text" name="tittle" autocomplete="off" class="layui-input">
                                    </div>
                                </div>

                                <textarea name="body" placeholder="内容" class="layui-textarea"></textarea>
                                <div class="layui-form">
                                    <div class="layui-form-item">
                                        <div class="layui-inline">
                                            <label class="layui-form-label">日期</label>
                                            <div class="layui-input-inline">
                                                <input type="text" class="layui-input" id="ID-laydate-demo" name="time"
                                                    placeholder="yyyy-MM-dd">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="layui-form-item">
                                    <label class="layui-form-label">发布人</label>
                                    <div class="layui-input-block">
                                        <input type="text" name="push" autocomplete="off" placeholder="请输入"
                                            lay-verify="required" class="layui-input">
                                    </div>
                                </div>

                                <div class="layui-form-item">
                                    <button class="layui-btn" lay-submit lay-filter="demo2">确认</button>
                                    <button type="reset" class="layui-btn layui-btn-primary">重置</button>
                                </div>
                        </form>
                </div>
                </fieldset>
                <br>

            </div>
        </div>
    </div>
    <script src="../layui/layui.js"></script>
    <script>
        layui.use(function () {
            var laydate = layui.laydate;
            // 渲染
            laydate.render({
                elem: '#ID-laydate-demo'
            });
        });
    </script>
    <?php
    $servername = "localhost";
    $username = "efb";
    $password = "MNex4DtZyZAEEspR";
    $dbname = "efb";
    $conn = new mysqli($servername, $username, $password, $dbname);
    $tittle = $_POST['tittle'];
    $body = $_POST['body'];
    $time = $_POST['time'];
    $push = $_POST['push'];
    if (!$conn) {
        die("连接失败: " . mysqli_connect_error());
    }
    // 查询是否已经存在相同的数据
    $sql = "SELECT * FROM notice WHERE tittle='$tittle' AND body='$body' AND time='$time'";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        // 如果已经存在，则更新数据
        $sql = "UPDATE notice SET tittle='$tittle', body='$body', time='$time',push='$push' WHERE tittle='$tittle' ";
        if (mysqli_query($conn, $sql)) {
            echo "更新成功";
        } else {
            echo "更新失败: " . mysqli_error($conn);
        }
    } else {
        // 如果不存在，则插入数据
        if (isset($tittle)) {
            $sql = "INSERT INTO notice (tittle,body,time,push) VALUES ('$tittle','$body','$time','$push')";
            if (mysqli_query($conn, $sql)) {
                echo "插入成功";
            } else {
                echo "插入失败: " . mysqli_error($conn);
            }
        }

    }

    // 关闭连接
    mysqli_close($conn);
    ?>
    </form>
</body>


</html>