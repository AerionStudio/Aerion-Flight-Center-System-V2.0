<!DOCTYPE html>
<html lang="en">
<?php session_start();
?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./layui/css/layui.css">
    <link rel="stylesheet" href="./css/index.css">
    <link rel="icon" href="./res/logo.jpg">
    <title>CFCSIM-飞控系统后台</title>
</head>

<body>
    <div class="layui-layout layui-layout-admin">
        <div class="layui-header">
            <div class="layui-logo layui-hide-xs layui-bg-black">CFCSIM-飞控系统后台管理</div>
            <!-- 头部区域（可配合layui 已有的水平导航） -->
        </div>
        <div class="layui-side layui-bg-black">
            <div class="layui-side-scroll">
                <!-- 左侧导航区域（可配合layui已有的垂直导航） -->
                <ul class="layui-nav layui-nav-tree" lay-filter="test">
                    <li class="layui-nav-item layui-nav-itemed">
                    <li class="layui-nav-item">
                        <a href="javascript:;">活动</a>
                        <dl class="layui-nav-child">
                            <dd><a href="./activitly_pus.php" target="view">活动发布</a></dd>
                            <dd><a href="./activitly_edit/activitly_edit.php" target="view">活动编辑</a></dd>
                        </dl>
                    </li>
                    <li class="layui-nav-item layui-nav-itemed">
                        <a href="./notice" target="view">发布通知</a>
                    </li>
                    <li class="layui-nav-item layui-nav-itemed">
                        <a href="./user" target="view">用户权限</a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="layui-body">
            <!-- 内容主体区域 -->
            <div id="view" class="viewer">
                <iframe src="./activitly_pus.php" frameborder="0" name="view"></iframe>
            </div>
            <div class="layui-footer">
                <!-- 底部固定区域 -->
                Copyright 2020-2023 CFCSIM All Rights Reserved <br>

            </div>
        </div>
        <script src="./layui/layui.js"></script>
        <script>
            //JS
            layui.use(['element', 'layer', 'util'], function () {
                var element = layui.element;
                var layer = layui.layer;
                var util = layui.util;
                var $ = layui.$;
                //头部事件
                util.event('lay-header-event', {
                    menuLeft: function (othis) { // 左侧菜单事件
                        layer.msg('展开左侧菜单的操作', { icon: 0 });
                    },
                    menuRight: function () {  // 右侧菜单事件
                        layer.open({
                            type: 1
                            , title: '更多'
                            , content: '<div style="padding: 15px;">处理右侧面板的操作</div>'
                            , area: ['260px', '100%']
                            , offset: 'rt' //右上角
                            , anim: 'slideLeft'
                            , shadeClose: true
                            , scrollbar: false
                        });
                    }
                });
            });
        </script>
</body>

</html>