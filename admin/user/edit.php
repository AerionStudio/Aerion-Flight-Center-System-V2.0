<!DOCTYPE html>
<html lang="en">
<?php
error_reporting(0);
$id = $_POST['search'];
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
                                            <h4 style="text-align: center">用户编辑</h4>
                                            <br>
                                            <div class="layui-col-md6">
                                                <label class="layui-form-label">权限</label>
                                                <div class="layui-input-block">
                                                    <select name="option">
                                                        <option value="">请选择</option>
                                                        <option value="0">停飞</option>
                                                        <option value="1">机组</option>
                                                        <option value="2">STU1</option>
                                                        <option value="3">STU2</option>
                                                        <option value="4">STU3</option>
                                                        <option value="5">CTR1</option>
                                                        <option value="6">CTR2</option>
                                                        <option value="7">CTR3</option>
                                                        <option value="8">INS1</option>
                                                        <option value="9">INS2</option>
                                                        <option value="10">INS3</option>
                                                        <option value="11">SUP</option>
                                                        <option value="12">ADM</option>
                                                    </select> <br>
                                                </div>
                                            </div>

                                            <button type="submit" class="layui-btn layui-btn-normal"
                                                style="text-align: center;" name="id"
                                                value="<?php echo $id; ?>">提交</button>
                                        </div>
                                    </form>
                                    <br>
                                    <form action="./index.php" method="post" class="layui-form layui-form-pane">
                                        <div class="layui-form">
                                            <button type="submit" class="layui-btn layui-btn-danger"
                                                style="text-align: center;" name="delete"
                                                value="<?php echo $id; ?>">删除</button><br><br>
                                        </div>
                                    </form>
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