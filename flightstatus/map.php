<?php header('refresh:15'); ?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>地图</title>
    <script src="https://webapi.amap.com/maps?v=2.0&key=68a8e76c24efbfb6116710882ba665d3"></script>
    <style type="text/css">
        #map {
            height: 800px;
        }
    </style>
</head>

<body>
    <?php
    session_start();
if (!isset($_SESSION['user_name'])) {
    header('Location: ../login.php');
    exit();
}


    $jsonUrl = 'http://185.239.84.173:6067/whazzup.json';
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
    <div id="map"></div>
    <script>
        var center = <?php echo '[' . $map[0]['longitude'] . ',' . $map[0]['latitude'] . ']' ?>;
        var airplaneIcon = new AMap.Icon({
            image: 'https://imp.cfcsim.cn/res/plane.png',
            size: new AMap.Size(20, 20),
            imageSize: new AMap.Size(20, 20)
        });
        const map = new AMap.Map('map', {
            viewMode: '2D',  // 默认使用 2D 模式
            zoom: 5,  //初始化地图层级
            center: center  //初始化地图中心点
        });
        const plane = new AMap.Marker({
            position: <?php echo '[' . $map[0]['longitude'] . ',' . $map[0]['latitude'] . '],' ?>
            icon: airplaneIcon,
            rotate: <?php echo $map[0]['heading'] ?>,
            title: '<?php echo $map[0]['callsign'] ?>',
            offset: new AMap.Pixel(-10, -10)

        })
        map.add(plane);

        <?php
        if (isset($map)) {
            for ($i = 0; $i < count($map); $i++) {

                if (isset($map[0]['departure'])) {


                    $dep = $map[0]['departure'];
                    $arr = $map[0]['arrival'];
                    $cycle = 2307;
                    $time = time();

                    // 构造json格式的请求数据
                    $request_data = array(
                        'dep' => $dep,
                        'arr' => $arr,
                        'cycle' => $cycle,
                        'time' => $time
                    );
                    $json_request_data = json_encode($request_data);

                    // 加密请求数据
                    $key = 'CFCSIMIS';
                    $iv = '@241DFS!';
                    $encrypted_request_data = openssl_encrypt($json_request_data, 'DES-CBC', $key, 0, $iv);

                    // 对加密数据进行base64编码
                    $token = base64_encode($encrypted_request_data);

                    // 构造请求链接
                    $url = 'https://bot.lvtenghui.com:233/Api/route.php?token=' . $token . '&platform=CFCSim';


                    $response = file_get_contents($url);
                    $response = json_decode($response);
                    $response_data = $response->data;
                    $encrypted_data = base64_decode($response_data);
                    $decrypted_data = openssl_decrypt($encrypted_data, 'DES-CBC', $iv, 0, $key);
                    $json_data = json_decode($decrypted_data, true);
                    $waypoints = array();
                    foreach ($json_data['waypoints'] as $waypoint) {
                        $latitude = $waypoint['latitude'];
                        $longitude = $waypoint['longitude'];
                        $name = $waypoint['name'];

                        $waypoints[] = array($longitude, $latitude);
                        $center = array($waypoint['longitude'], $waypoint['latitude']);
                    }
                }
                ?>
                <?php foreach ($waypoints as $waypoint): ?>
                    var marker = new AMap.Marker({
                        position: <?php echo json_encode($waypoint); ?>,
                        map: map
                    });
                <?php endforeach; ?>

                // 绘制航路线
                var path = new AMap.Polyline({
                    path: <?php echo json_encode($waypoints); ?>,
                    strokeColor: '#f43e06',
                    strokeOpacity: 2,
                    strokeWeight: 5,
                    strokeStyle: 'solid'
                });

                path.setMap(map);


                <?php
            }
        }
        ?>

    </script>
</body>

</html>