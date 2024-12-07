<?php

// session_start();
// if (!isset($_SESSION['user_name'])) {
//     header('Location: ../login.php');
//     exit();
// } 

session_start();
if (!isset($_SESSION['user_name'])) {
    header('Location: ../login.php');
    exit();
} 



?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../layui/css/layui.css">
    <link rel="stylesheet" href="../css/index.css">
    <script src="https://webapi.amap.com/maps?v=1.4.15&key=YOUR_API_KEY"></script>
    <title>Document</title>
    <style>
        button {
            width: 100%;
            padding: 15px;
        }

        body {
            padding: 15px;
        }
    </style>
</head>


<body>

    <div style="padding: 15px;">

        <div class="layui-card layui-panel">
            <div class="layui-bg-gray" style="padding: 20px;">

                <div class="layui-panel">
                    <br>
                    <legend style="text-align: center;">
                        <h1>航路查询</h1>
                    </legend>
                    <br><br><br>
                    <br><br><br>

                    <div class="form-container">
                        <form class="layui-form layui-form-pane" action="./view.php" method="post">
                            <div class="layui-form-item">
                                <label class="layui-form-label">起飞机场</label>
                                <div class="layui-input-block">
                                    <input type="text" name="dep" autocomplete="off" placeholder="机场ICAO代码例如 ZBAA"
                                        lay-verify="required" class="layui-input">
                                </div>
                            </div>
                            <div class="layui-form-item">
                                <label class="layui-form-label">落地机场</label>
                                <div class="layui-input-block">
                                    <input type="text" name="arr" autocomplete="off" placeholder="机场ICAO代码例如 ZBAA"
                                        lay-verify="required" class="layui-input">
                                </div>
                            </div>

                            

                            <div class="layui-form-item">
                                <br>
                                <button class="layui-btn" lay-submit lay-filter="demo2" name="submit">查找</button>
                            </div>
                        </form>
                    </div>
                    <br><br><br><br><br><br>
                    <br><br><br><br><br><br>
                    <br><br><br><br><br><br>
                    <br><br><br><br><br><br>



                </div>

            </div>
        </div>

</body>
<script src="../layui/layui.js"></script>

</html>