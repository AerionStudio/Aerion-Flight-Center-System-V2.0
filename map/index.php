
<?php
error_reporting(0);
?>
<?php
error_reporting(0);
$jsonUrl = 'http://185.239.84.173:6067/whazzup.json';
$jsonData = file_get_contents($jsonUrl);
$data = json_decode($jsonData, true);
$map = [];
for ($i = 0; $i < count($data['pilot']); $i++) {
    $cid = $data['pilot'][$i]['cid'];
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
?>
<?php
$atc = [];
for ($i = 0; $i < count($data['controllers']); $i++) {
    $cid = $data['controllers'][$i]['cid'];
    $atc[] = [
        'cid' => $data['controllers'][$i]['cid'],
        'callsign' => $data['controllers'][$i]['callsign'],
        'longitude' => $data['controllers'][$i]['longitude'],
        'latitude' => $data['controllers'][$i]['latitude'],
        'frequency' => $data['controllers'][$i]['frequency'],
        'visual_range' => $data['controllers'][$i]['visual_range'] * 1000,
    ];
}
?>
<!DOCTYPE html>
<html lang="en">
<?php
session_start();
?>

<head>
    <meta charset="UTF-8">
        <meta http-equiv="refresh" content="10">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../layui/css/layui.css">
    <link rel="stylesheet" href="../css/index.css">
    <title>连飞地图</title>
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
                        <div class="layui-colla-title">在线机组</div>
                        <div class="layui-colla-content">
                            <table class="layui-table">
                                <colgroup>
                                    <col width="150">
                                    <col width="150">
                                    <col>
                                </colgroup>
                                <thead>
                                    <tr>
                                        <th>呼号</th>
                                        <th>起飞机场</th>
                                        <th>落地机场</th>
                                        <th>应答机</th>
                                        <th>飞行高度</th>
                                        <th>地速</th>
                                        <th>机型</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php

                                    for ($i = 0; $i < count($map); $i++) {
                                        echo '<tr>';
                                        echo '<td><h4>' . $map[$i]['callsign'] . '</h4></td>';
                                        echo '<td><h4>' . $map[$i]['departure'] . '</h4></td>';
                                        echo '<td><h4>' . $map[$i]['arrival'] . '</h4></td>';
                                        echo '<td><h4>' . $map[$i]['transponder'] . '</h4></td>';
                                        echo '<td><h4>' . $map[$i]['altitude'] . '</h4></td>';
                                        echo '<td><h4>' . $map[$i]['groundspeed'] . '</h4></td>';
                                        echo '<td><h4>' . $map[$i]['aircraft'] . '</h4></td>';
                                        echo '</tr>';
                                    }


                                    ?>

                                </tbody>
                            </table>

                        </div>
                    </div>
                    <div class="layui-colla-item">
                        <div class="layui-colla-title">在线管制</div>
                        <div class="layui-colla-content">
                            <table class="layui-table">
                                <colgroup>
                                    <col width="150">
                                    <col width="150">
                                    <col>
                                </colgroup>
                                <thead>
                                    <tr>
                                        <th>席位</th>
                                        <th>频率</th>
                                        <th>管制人员</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php

                                    for ($i = 0; $i < count($atc); $i++) {
                                        echo '<tr>';
                                        echo '<td><h4>' . $atc[$i]['callsign'] . '</h4></td>';
                                        echo '<td><h4>' . $atc[$i]['frequency'] . '</h4></td>';
                                        echo '<td><h4>' . $atc[$i]['cid'] . '</h4></td>';
                                        echo '</tr>';
                                    }


                                    ?>
                                </tbody>
                            </table>
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