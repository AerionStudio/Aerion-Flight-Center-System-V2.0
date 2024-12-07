<!DOCTYPE html>
<html lang="en">
<?php
error_reporting(0);
$id = htmlspecialchars($_POST['search']);
echo $id;
?>

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
    <div class="layui-card layui-panel">
        <div class="layui-bg-gray" style="padding: 20px;">
            <br>
            <div class="layui-panel">
                <fieldset class="layui-elem-field">

                    <div class="layui-card layui-panel">
                        <div class="modal-dialog">
                            <br>
                            <div class="modal-content">
                                <div class="modal-body">
                                    <form action="./index.php" method="post" class="layui-form layui-form-pane">
                                        <div class="layui-form">
                                            <button type="submit" class="layui-btn layui-btn-normal"
                                                style="text-align: center;" name="ok"
                                                value="<?php echo $id; ?>">同意</button>
                                            <button type="submit" class="layui-btn layui-btn-normal"
                                                style="text-align: center;" name="no"
                                                value="<?php echo $id; ?>">拒绝</button>
                                        </div>
                                    </form>
                                    <br>
                                </div>
                            </div>
                        </div>
                    </div>

                </fieldset>
            </div>
            <br>

        </div>
    </div>




    <script src="../layui/layui.js"></script>
</body>

</html>
