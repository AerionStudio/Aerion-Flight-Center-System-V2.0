<?php
//获取token
$icao=html_entity_decode($_POST['icao']);
$token_get_body = [
    'secret' => 'TUlJQlZBSUJBREFOQmdrcWhraUc5dzBCQVFFRkFBU0NBVDR3Z2dFNkFnRUFBa0VBeGRjaHFEdGkrSTNZZjNNcQpuY2prNTlVUERmV28wMU04V2tlMjlYeXRqRGYvWW5hZEFuNHp5dFVIbHBYVDFrL3UvVStjKzlFRG5QU3NzVUZCCk96RjVCd0lEQVFBQkFrQWk2d0IrdjlTTkNBUVJJcE4vKzhnaS91REVWdnB3S2YyNTlYUmVTWjRiNUNwd2hLUEMKbHd3WDdkS0NMUzJKWUU4dVdUOUdnUUJ2N2hvRE1RZ0IxL21oQWlFQStNejY0MHN5YU40ekl6aVJZalltQ00xZwpYWHBYZ3h0MDJuT2tHa1pna3BFQ0lRRExrS2dqV0xzSTVPNnVIemJCamN3dUpVMUFMTnV1TmJVcEZIS1E0ZXB1CkZ3SWhBT3B3YkRCbEdSa0wxMi9teThlWmNubDAzTXI0anlHeGE0aTAwdnNYT2NTaEFpQjRpNFFWMG1DSHB0SDAKaUlWclh1WFBXY1dDUUU0aXZxazExMmIwaHVQRkp3SWdET2pjK1ZjbDNUNHRuV1pUT0xsVVFLWVJuUjdFL21MMgozWHJiRlA2bWI1UT0=',
    'platform' => "cfcsim"
];

$platform = "cfcsim";

$url_token = "http://api.xflysim.com/v1/auth/?secret=" . urlencode($token_get_body['secret']) . "&platform=" . urlencode($token_get_body['platform']);

$token = file_get_contents($url_token);

$token = json_decode($token, true);

$token = $token['msg']['token'];


//获取机场天气
$weather_get_body = [
    'token' => $token,
    'icao' => $icao
];
$url_weather = "http://api.xflysim.com/v1/weather/?icao=" . urlencode($weather_get_body['icao']) . "&token=" . urlencode($weather_get_body['token']);
$weather_json = file_get_contents($url_weather);

$weather_arr = json_decode($weather_json, true);

//获取机场信息
$airport_get_body = [
    'token' => $token,
    'icao' => $icao
];
$url_airport = "http://api.xflysim.com/v1/airport/?icao=" . urlencode($weather_get_body['icao']) . "&token=" . urlencode($weather_get_body['token']);
$airport_json = file_get_contents($url_airport);

$airport_arr = json_decode($airport_json, true);

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="./css/bootstrap.css">
    <link rel="stylesheet" href="./index.css">
    <title>Document</title>
</head>
<body style="padding: 30px;">
<div class="card">
    <div class="card-body">
        <div class="title">气象查询 - <?php echo $airport_arr['msg']['cn_name']; ?>
            #<?php echo $airport_arr['msg']['iso_country'] ?></div>
        <div class="en_name">
            <?php echo $airport_arr['msg']['en_name']; ?>
        </div>
        <div class="come_from">
            数据来源: MISAKA NETWORK
        </div>
        <br>
        <div class="metar">
            <div class="metar_title">METAR</div>
            <div class="metar_un"><code><?php echo $weather_arr['msg']['metar']; ?></code></div>
            <br>
            <div class="metar_decode">
                <div class="time">发布时间： <?php echo $weather_arr['msg']['metar_decode']['time']; ?> </div>
                <div class="wind">风况： <?php echo $weather_arr['msg']['metar_decode']['wind_dir']; ?>
                    °<?php echo $weather_arr['msg']['metar_decode']['wind_speed']; ?><?php echo $weather_arr['msg']['metar_decode']['wind_unit']; ?> </div>
                <div class="visible">
                    能见度： <?php echo $weather_arr['msg']['metar_decode']['visibility']; ?> <?php echo $weather_arr['msg']['metar_decode']['visibility_unit']; ?></div>
                <div class="qnh">
                    修正海压： <?php echo $weather_arr['msg']['metar_decode']['qnh']; ?> <?php echo $weather_arr['msg']['metar_decode']['qnh_unit']; ?></div>
                <div class="tem">温度： <?php echo $weather_arr['msg']['metar_decode']['temperature']; ?> °C</div>
                <div class="dew">露点温度： <?php echo $weather_arr['msg']['metar_decode']['dewpoint']; ?> °C</div>
                <div class="for">预报： <?php echo $weather_arr['msg']['metar_decode']['forcast']; ?>  </div>
            </div>
        </div>
        <br>
        <div class="metar">
            <div class="metar_title">TAF</div>
            <div class="metar_un"><code><?php echo $weather_arr['msg']['taf']; ?></code></div>
        </div>
    </div>
</div>
</body>
<script src="./js/bootstrap.js"></script>
</html>
