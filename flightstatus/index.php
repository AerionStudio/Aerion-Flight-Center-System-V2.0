<?php
error_reporting(0);
session_start();
if (!isset($_SESSION['user_name'])) {
    header('Location: ../login.php');
    exit();
}


$jsonUrl = 'http://47.101.52.27:22335/whazzup.json';
$jsonData = file_get_contents($jsonUrl);
$data = json_decode($jsonData, true);
$map = [];
for ($i = 0; $i < count($data['pilot']); $i++) {
    if ($_SESSION['num'] == $data['pilot'][$i]['cid']) {
        $map[] = [
            'cid' => $data['pilot'][$i]['cid'],
            'callsign' => $data['pilot'][$i]['callsign'],
            'departure' => $data['pilot'][$i]['flight_plan']['departure'],
            'arrival' => $data['pilot'][$i]['flight_plan']['arrival'],
            'aircraft' => $data['pilot'][$i]['flight_plan']['aircraft'],
            'route' => $data['pilot'][$i]['flight_plan']['route'],
            'heading' => $data['pilot'][$i]['heading'],
            'groundspeed' => $data['pilot'][$i]['groundspeed'],
            'transponder' => $data['pilot'][$i]['transponder'],
            'altitude' => $data['pilot'][$i]['altitude'],
            'longitude' => $data['pilot'][$i]['longitude'],
            'latitude' => $data['pilot'][$i]['latitude'],
        ];
    }
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
    <title>CFCSIM-连飞地图</title>
    <style>
        .sidebar {
            background-color: #f2f2f2;
            z-index: 1;
            height: 800px;
            overflow-y: auto;
        }

        .iframe-container {
            width: calc(100% - 260px);
            height: 100%;
            z-index: 0;
        }

        .iframe-container iframe {
            width: 100%;
            height: 100%;

        }
    </style>
</head>

<body>

    <div class="iframe-container">
        <iframe src="./map.php" frameborder="0" class="map"></iframe>
    </div>
    <div class="sidebar">
        <div class="layui-bg-gray">
            <div class="layui-panel" style="width: 550px; margin: 16px;">
                <div class="layui-collapse" lay-accordion>
                    <div class="layui-colla-item">
                        <div class="layui-colla-title">我的飞行数据</div>
                        <div class="layui-colla-content">
                            <div class="layui-row">
                                <div class="layui-col-xs6">
                                    <div class="grid-demo grid-demo-bg1">
                                        <fieldset class="layui-elem-field">
                                            <legend>起飞机场</legend>
                                            <div class="layui-field-box">
                                                <div class="layui-panel">
                                                    <div style="padding: 32px;">
                                                        <h3>
                                                            <?php echo $map[0]['departure'] ?>
                                                        </h3>

                                                    </div>
                                                </div>
                                            </div>
                                        </fieldset>

                                    </div>
                                </div>
                                <div class="layui-col-xs6">
                                    <div class="grid-demo">
                                        <fieldset class="layui-elem-field">
                                            <legend>落地机场</legend>
                                            <div class="layui-field-box">
                                                <div class="layui-panel">
                                                    <div style="padding: 32px;">
                                                        <h3>
                                                            <?php echo $map[0]['arrival'] ?>
                                                        </h3>

                                                    </div>
                                                </div>
                                            </div>
                                        </fieldset>
                                    </div>
                                </div>
                            </div>
                            <div class="layui-row">
                                <div class="layui-col-xs3">
                                    <div class="grid-demo grid-demo-bg1">
                                        <fieldset class="layui-elem-field">
                                            <legend>机型</legend>
                                            <div class="layui-field-box">
                                                <div class="layui-panel">
                                                    <div style="padding: 32px;">
                                                        <h3>
                                                            <?php echo $map[0]['aircraft'] ?>
                                                        </h3>

                                                    </div>
                                                </div>
                                            </div>
                                        </fieldset>
                                    </div>
                                </div>
                                <div class="layui-col-xs3">
                                    <div class="grid-demo">
                                        <fieldset class="layui-elem-field">
                                            <legend>应答机</legend>
                                            <div class="layui-field-box">
                                                <div class="layui-panel">
                                                    <div style="padding: 32px;">
                                                        <h3>
                                                            <?php echo $map[0]['transponder'] ?>
                                                        </h3>

                                                    </div>
                                                </div>
                                            </div>
                                        </fieldset>
                                    </div>
                                </div>
                                <div class="layui-col-xs3">
                                    <div class="grid-demo grid-demo-bg1">
                                        <fieldset class="layui-elem-field">
                                            <legend>高度</legend>
                                            <div class="layui-field-box">
                                                <div class="layui-panel">
                                                    <div style="padding: 32px;">
                                                        <h3>
                                                            <?php echo $map[0]['altitude'] ?>
                                                        </h3>

                                                    </div>
                                                </div>
                                            </div>
                                        </fieldset>
                                    </div>
                                </div>
                                <div class="layui-col-xs3">
                                    <div class="grid-demo">
                                        <fieldset class="layui-elem-field">
                                            <legend>地速</legend>
                                            <div class="layui-field-box">
                                                <div class="layui-panel">
                                                    <div style="padding: 32px;">
                                                        <h3>
                                                            <?php echo $map[0]['groundspeed'] ?>
                                                        </h3>

                                                    </div>
                                                </div>
                                            </div>
                                        </fieldset>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <script src="/cdn.staticfile.org/layui/2.8.0/layui.js"></script>
    <script>
        layui.use(function () {
            var dropdown = layui.dropdown;
            var layer = layui.layer;
            var util = layui.util;
            // 菜单点击事件
            dropdown.on('click(demo-menu)', function (options) {
                console.log(this, options);

                // 显示 - 仅用于演示
                layer.msg(util.escape(JSON.stringify(options)));
            });
        });
    </script>

    </div>
    </div>
    <script src="../layui/layui.js"></script>

</body>

</html>