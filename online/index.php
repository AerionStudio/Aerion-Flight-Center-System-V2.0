<?php
$jsonUrl = 'https://www.kookapp.cn/api/guilds/2067499757220503/widget.json';
$jsonData = file_get_contents($jsonUrl);
$data = json_decode($jsonData, true);
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/layui/css/layui.css">
    <title>Document</title>
</head>
<body style="padding: 20px">
<div class="layui-panel" style="padding: 20px">
    <div class="layui-row">
        <div class="layui-col-xs6">
            <div class="grid-demo grid-demo-bg1">
                <div class="grid-demo">


                    <?php
                    for ($i = 0; $i < count($data['channels']); $i++) {
                        echo '<div class="layui-timeline-item">';
                        echo ' <i class="layui-icon layui-timeline-axis layui-icon-face-smile"></i>';
                        echo '<i class="layui-icon layui-timeline-axis"></i>';
                        echo '<div class="layui-timeline-content layui-text">';
                        echo ' <div class="layui-timeline-title">' . $data['channels'][$i]['name'] . '</div>';
                        echo '<blockquote class="layui-elem-quote">';
                        if (isset($data['channels'][$i]['users'])) {
                            for ($j = 0; $j < count($data['channels'][$i]['users']); $j++) {
                                echo '<p>' . $data['channels'][$i]['users'][$j]['username'] . '</p>';
                            }
                        } else
                            echo '</blockquote>';
                        echo ' </div>';
                        echo ' </div>';
                    }
                    ?>
                </div>
            </div>
        </div>
        <div class="layui-col-xs6" style="padding-left: 20px">
            <blockquote class="layui-elem-quote" style="background-color: #0a53be;color: #fff9ec">
                <h1> 服务器名称：<?php echo $data['name']; ?><br></h1>
                <h1> 在线人数：<?php echo $data['online_count']; ?></h1>
            </blockquote>
            <blockquote class="layui-elem-quote layui-quote-nm">
                <h1>在线用户:</h1>
                <?php
                for ($i = 0; $i < count($data['members']); $i++) {
                    echo '<div class="layui-timeline-item">';
                    echo ' <i class="layui-icon layui-timeline-axis layui-icon-face-smile"></i>';
                    echo '<i class="layui-icon layui-timeline-axis"></i>';
                    echo '<div class="layui-timeline-content layui-text">';
                    echo ' <div class="layui-timeline-title">' . $data['members'][$i]['nickname'] . '</div>';
                    echo ' </div>';
                    echo ' </div>';
                }
                ?>
            </blockquote>

        </div>
    </div>
</div>


</body>
<script src="/layui/layui.js"></script>
</html>
