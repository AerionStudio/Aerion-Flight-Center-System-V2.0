<?php
session_start();
if ($_SESSION['grade'] == '0') {
    header('Location: /ban/');
    exit();
}
if (!isset($_SESSION['user_name'])) {
    header('Location: /login.php');
    exit();
}
$name = htmlspecialchars($_SESSION['user_name']);
$servername = "localhost";
$username = "imp_xfex_cc";
$password = "34M3aePXSKYSS3Bi";
$dbname = "imp_xfex_cc";
$conn = new mysqli($servername, $username, $password, $dbname);
$sql = $conn->prepare("SELECT * FROM user WHERE user_name = ?;");
$sql->bind_param("s", $name);
$sql->execute();
$count_user = 0;
$result = $sql->get_result();
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $icao = $row['icao'];
    }
} else {
    //.echo "未找到匹配的数据";
    echo "<script>alert('未找到匹配的数据')</script>";
}
?>
<!DOCTYPE html>
<!-- Coding by CodingNepal || www.codingnepalweb.com -->
<html lang="en" class="layout_collapsed">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <!-- Boxicons CSS -->
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />
    <title>SkyDreamClub-IMP</title>
    <link rel="icon" href="#">
    <link rel="stylesheet" href="style.css" />
</head>

<body>
    <!-- navbar -->
    <nav class="navbar">
        <div class="logo_item">
            <i class="bx bx-menu" id="sidebarOpen"></i>
            <img src="res/logo.jpg" alt=""></i>SkyDreamClub飞控系统
        </div>


        <div class="navbar_content">
            <i class="bi bi-grid"></i>
            <i class='bx bx-sun' id="darkLight"></i>
        </div>
    </nav>

    <!-- sidebar -->
    <nav class="sidebar">
        <div class="menu_content">
            <ul class="menu_items">
                <div class="menu_title "></div>
                <!-- duplicate or remove this li tag if you want to add or remove navlink with submenu -->
                <!-- start -->
                <li class="item">
                    <a href="./home" class="nav_link" target="view">
                        <span class="navlink_icon">
                            <i class="bx bx-home"></i>
                        </span>
                        <span class="navlink">首页</span>
                    </a>
                </li>
                <li class="item">
                    <div href="#" class="nav_link submenu_item">
                        <span class="navlink_icon">
                            <i class="bx bx-collection"></i>
                        </span>
                        <span class="navlink">活动</span>
                        <i class="bx bx-chevron-right arrow-left"></i>
                    </div>

                    <ul class="menu_items submenu">
                        <a href="./activity/apply/apply.php" class="nav_link sublink" target="view">活动报名</a>
                        <a href="./activity/apply/view.php" class="nav_link sublink" target="view">活动详细</a>
                    </ul>
                </li>
                <li class="item">
                    <div href="#" class="nav_link submenu_item">
                        <span class="navlink_icon">
                            <i class="bx bx-broadcast"></i>
                        </span>
                        <span class="navlink">管制</span>
                        <i class="bx bx-chevron-right arrow-left"></i>
                    </div>

                    <ul class="menu_items submenu">
                        <?php if ($_SESSION['grade'] > 1) {
                            echo '<a href="./atc/apply" class="nav_link sublink" target="view">管制报名</a>';
                        } ?>
                        <a href="./atc/view" class="nav_link sublink" target="view">权限公示</a>
                    </ul>
                </li>

               
                </li>
                <li class="item">
                    <a href="./map" class="nav_link" target="view">
                        <span class="navlink_icon">
                            <i class="bx bx-map-alt"></i>
                        </span>
                        <span class="navlink">连飞地图</span>
                    </a>
                </li>
                <li class="item">
                    <a href="./online" class="nav_link" target="view">
                        <span class="navlink_icon">
                            <i class="bx bx-microphone"></i>
                        </span>
                        <span class="navlink">语音在线用户</span>
                    </a>
                </li>
                <li class="item">
                    <a href="./weather/index.php" class="nav_link" target="view">
                        <span class="navlink_icon">
                            <i class="bx bx-cloud"></i>
                        </span>
                        <span class="navlink">气象报文</span>
                    </a>
                </li>
                <li class="item">
                    <a href="./route/index.php" class="nav_link " target="view">
                        <span class="navlink_icon">
                            <i class="bx bxs-plane-take-off"></i>
                        </span>
                        <span class="navlink">航路查询</span>
                    </a>
                </li>
                <li class="item">
                    <div href="#" class="nav_link submenu_item">
                        <span class="navlink_icon">
                            <i class="bx bx-list-ul"></i>
                        </span>
                        <span class="navlink">连线记录</span>
                        <i class="bx bx-chevron-right arrow-left"></i>
                    </div>
                    <ul class="menu_items submenu">
                        <?php if ($_SESSION['grade'] > 0) {
                            echo '<a href="./history/flight" class="nav_link sublink" target="view">飞行记录</a>';
                        } ?>
                        <?php if ($_SESSION['grade'] > 2) {
                            echo '<a href="./history/atc" class="nav_link sublink" target="view">管制记录</a>';
                        } ?>
                    </ul>
                </li>

               
               

                <li class="item">
                    <a href="./personal/index.php" class="nav_link" target="view">
                        <span class="navlink_icon">
                            <i class="bx bxs-cog"></i>
                        </span>
                        <span class="navlink">设置</span>
                    </a>
                </li>
                <!-- end -->
            </ul>


            <!-- Sidebar Open / Close -->
            <div class="bottom_content">
                <div class="bottom expand_sidebar">
                    <span> 展开</span>
                    <i class='bx bx-log-in'></i>
                </div>
                <div class="bottom collapse_sidebar">
                    <span> 收缩</span>
                    <i class='bx bx-log-out'> <a href="./loginout.php"></a></i>
                </div>
            </div>
        </div>
    </nav>
    <div class="container">
        <iframe src="./home" frameborder="0" name="view"></iframe>
    </div>
    <!-- JavaScript -->

    <script src="script.js"></script>
</body>

</html>