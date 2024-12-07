<?php
$servername = "localhost";
$username = "imp_xfex_cc";
$password = "MNex4DtZyZAEEspR";
$dbname = "imp_xfex_cc";
$conn = new mysqli($servername, $username, $password, $dbname);
$id = html_entity_decode($_GET['num']);
$sql = $conn->prepare("UPDATE user SET icao = 'CFC' WHERE `user_num` = ?;");
$sql->bind_param("s", $id);
$sql->execute();
header('Location: ./index.php');
?>