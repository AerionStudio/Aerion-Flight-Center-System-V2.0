<?php
session_start();
$id = htmlspecialchars(urldecode($_GET['id']));
$name = htmlspecialchars($_SESSION['num']);

$servername = "localhost";
$username = "imp_xfex_cc";
	$password = "34M3aePXSKYSS3Bi";
	$dbname = "imp_xfex_cc";
if (isset($id)) {
    $conn = new mysqli($servername, $username, $password, $dbname);
    $sql = $conn->prepare("DELETE FROM `activity_user` WHERE user = ? AND time = ?");
    $sql->bind_param("ss", $name, $id);
    if ($sql->execute()) {
        echo "删除成功";
    } else {
        echo "删除失败: " . mysqli_error($conn);
    }
}

header('Location: ./apply.php');
?>
