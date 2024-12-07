<?php
error_reporting(0);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Flight Map</title>

    <link rel="stylesheet" href="./layui/css/layui.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.0-beta1/css/bootstrap.min.css">
    <style>
        #map {

            width:100%;
            height: 1000px;

        }

        .airplane {
            margin: 10px 0;
            padding: 5px;
            background-color: #f0f0f0;
        }
    </style>
    <script src="https://webapi.amap.com/maps?v=2.0&key=68a8e76c24efbfb6116710882ba665d3"></script>
</head>

<body>

<div id="map"></div>
<script src="./layui/layui.js"></script>
<script>
<?php
$jsonUrl = 'http://185.239.84.173:6067/whazzup.json';
$jsonData = file_get_contents($jsonUrl);
$data = json_decode($jsonData, true);

$map = [];

if (isset($data['pilot'])) {
    foreach ($data['pilot'] as $pilot) {
        $map[] = [
            'cid' => $pilot['cid'],
            'callsign' => $pilot['callsign'],
            'departure' => $pilot['flight_plan']['departure'],
            'arrival' => $pilot['flight_plan']['arrival'],
            'aircraft' => $pilot['flight_plan']['aircraft'],
            'route' => $pilot['flight_plan']['route'],
            'heading' => $pilot['heading'],
            'groundspeed' => $pilot['groundspeed'],
            'altitude' => $pilot['altitude'],
            'longitude' => $pilot['longitude'],
            'latitude' => $pilot['latitude'],
        ];
    }
}
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
    var center = [116.397428, 39.90923];
    var airplaneIcon = new AMap.Icon({
        image: './plane.png',
        size: new AMap.Size(20, 20),
        imageSize: new AMap.Size(20, 20)
    });

    const map = new AMap.Map('map', {
        viewMode: '2D',
        zoom: 5,
        center: center
    });

    var markers = [];

    <?php foreach ($map as $marker) : ?>
    var marker = new AMap.Marker({
        position: [<?php echo $marker['longitude']; ?>, <?php echo $marker['latitude']; ?>],
        rotate: <?php echo $marker['heading']; ?>,
        title: '<?php echo $marker['callsign']; ?>',
        icon: airplaneIcon,
        offset: new AMap.Pixel(-10, -10)
    });

    marker.cid = '<?php echo $marker['cid']; ?>';

    // 添加点击事件监听器
    marker.on('click', function(e) {
        map.setCenter(marker.getPosition());
        var content = '<strong>飞行员CID：</strong>' + e.target.cid +
            '<br><strong>呼号：</strong>' + '<?php echo $marker['callsign']; ?>' +
            '<br><strong>起飞机场：</strong>' + '<?php echo $marker['departure']; ?>' +
            '<br><strong>到达机场：</strong>' + '<?php echo $marker['arrival']; ?>' +
            '<br><strong>飞机：</strong>' + '<?php echo $marker['aircraft']; ?>' +
            '<br><strong>航线：</strong>' + '<?php echo $marker['route']; ?>' +
            '<br><strong>航向：</strong>' + '<?php echo $marker['heading']; ?>' +
            '<br><strong>地速：</strong>' + '<?php echo $marker['groundspeed']; ?>' +
            '<br><strong>高度：</strong>' + '<?php echo $marker['altitude']; ?>' +
            '<br><strong>经度：</strong>' + '<?php echo $marker['longitude']; ?>' +
            '<br><strong>纬度：</strong>' + '<?php echo $marker['latitude']; ?>';

        // 创建弹窗
        var infoWindow = new AMap.InfoWindow({
            content: content,
            offset: new AMap.Pixel(0, 0)
        });

        // 展示弹窗
        infoWindow.open(map, e.target.getPosition());
    });

    markers.push(marker);
    <?php endforeach; ?>

    map.add(markers);
    var atcicon = new AMap.Icon({
        image: './atc.png',
        size: new AMap.Size(10, 25),
        imageSize: new AMap.Size(10, 25)
    });
    <?php
    for ($i = 0; $i < count($atc); $i++) {
        echo 'var atcMarker' . $atc[$i]['cid'] . ' = new AMap.Marker({';
        echo 'position: [' . $atc[$i]['longitude'] . ', ' . $atc[$i]['latitude'] . '],';
        echo 'offset: new AMap.Pixel(-10, -10),';
        echo 'icon: atcicon,';
        echo 'title: "' . $atc[$i]['callsign'] . '"';
        echo '});';
        echo 'atcMarker' . $atc[$i]['cid'] . '.setMap(map);';

        echo 'var circle' . $atc[$i]['cid'] . ' = new AMap.Circle({';
        echo 'center: new AMap.LngLat(' . $atc[$i]['longitude'] . ',' . $atc[$i]['latitude'] . '),';
        echo 'radius:' . $atc[$i]['visual_range'] . ',';
        echo 'fillColor:"#93b5cf",';
        echo '});';
        echo 'map.add(circle' . $atc[$i]['cid'] . ');';
        echo 'map.add(atcMarker' . $atc[$i]['cid'] . ');';
        echo 'atcMarker' . $atc[$i]['cid'] . '.on("click", function (e) {';
        echo 'var infoWindow = new AMap.InfoWindow({';
        echo '    content: \'<div><h4>席位：' . $atc[$i]['callsign'] . '</h4><p>频率：' . $atc[$i]['frequency'] . '</p><p>管制人员：' . $atc[$i]['cid'] . '</p></div>\',';
        echo '    offset: new AMap.Pixel(0, -30)';
        echo '});';
        echo 'infoWindow.open(map, e.target.getPosition());';
        echo '});';
    }
    ?>
</script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.0-beta1/js/bootstrap.bundle.min.js"></script>
</body>

</html>