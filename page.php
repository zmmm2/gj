<?php
$sid=$_GET['sid'];
require 'test_test.php';
if(!is_dir('userss/'.$sid)||$sid==''){header("Location: http://appdoc.top/404-2.html");}
//后台账号正确，获取数据，如果没有则是默认值

//{获取更新内容}
if(file_exists('userss/'.$_GET['sid'].'/admin/data/new')){
    $newcontent=stripos(file_get_contents('userss/'.$_GET['sid'].'/admin/data/new'),'更新内容:(');
    $newcontent=$newcontent+14;
    $newcontents=stripos(file_get_contents('userss/'.$_GET['sid'].'/admin/data/new'),')更新链接');
    $newcontents=$newcontents-$newcontent;
    $newcontent= substr(file_get_contents('userss/'.$_GET['sid'].'/admin/data/new'),$newcontent,$newcontents);
}else{$newcontent='暂无更新内容';}
//{获取完毕}

//{获取下载链接}
if(file_exists('userss/'.$_GET['sid'].'/admin/data/new')){
    $url1=stripos(file_get_contents('userss/'.$_GET['sid'].'/admin/data/new'),'更新链接:(');
    $url1=$url1+14;
    $url=  substr(file_get_contents('userss/'.$_GET['sid'].'/admin/data/new'),$url1,-1);
}else{$url='http://appdoc.top/404-3.html';}
//{获取完毕}

//{获取公告}
if(file_exists('userss/'.$_GET['sid'].'/admin/data/notice')){
    $notice=file_get_contents('userss/'.$_GET['sid'].'/admin/data/notice');
}else{
    $notice='后台还没有公告通知哦!';
}
//{获取软件截图}
if(file_exists('userss/'.$_GET['sid'].'/page/1.jpg')){
    $imga='http://appdoc.top/userss/'.$_GET['sid'].'/page/1.jpg?sid='.rand(1000,9999);
}else{$imga='img/404.jpg';}
if(file_exists('userss/'.$_GET['sid'].'/page/2.jpg')){
    $imgb='http://appdoc.top/userss/'.$_GET['sid'].'/page/2.jpg?sid='.rand(1000,9999);
}else{$imgb='img/404.jpg';}
//{获取完毕}

//{获取软件名}
if(file_exists('userss/'.$_GET['sid'].'/page/app')){
    $appname=file_get_contents('userss/'.$_GET['sid'].'/page/app');
}else{$appname='APP';}
//{获取完毕}

//{获取网页标题}
if(file_exists('userss/'.$_GET['sid'].'/page/title')){
    $title=file_get_contents('userss/'.$_GET['sid'].'/page/title');
}else{$title='易对接后台提供页面';}
//{获取完毕}

//{获取软件图标}
if(file_exists('userss/'.$_GET['sid'].'/page/icon.png')){
    $icon='http://appdoc.top/userss/'.$_GET['sid'].'/page/icon.png';
}else{$icon='/img/icon.png';}
//{获取完毕}
?>


<!DOCTYPE html>
<html>
<head>

    <!-- 所有版权:初陌 转载请留版权 -->
    <!-- 所有版权:初陌 转载请留版权 -->
    <!-- 所有版权:初陌 转载请留版权 -->
    <!-- 所有版权:初陌 转载请留版权 -->
    <!-- 所有版权:初陌 转载请留版权 -->

    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=0.9, maximum-scale=0.9" />
    <title><?php echo $title; ?></title>
    <style type="text/css">

        a {color: #d0d0d0;text-decoration: none;outline: none;}
        body {background-color: #fff;  margin: 0;  padding: 0;}
        #max-box {min-width: 345px;  max-width: 800px;  margin: 0 auto;}
        #max-box .top {width: 95%;  height: 130px;  text-align:center;  background-color: #84dcff;  box-shadow: 0px 5px 20px #7bcced;  padding: 20px 0 20px 0;  border-radius: 680px 680px 150px 150px;  margin: 0 auto;  margin-top: 10px; }
        .top .icon{width: 65px;  height: 65px;  margin-bottom: 0px; border-radius: 8px;}
        .top .AppName {font-weight: normal;  font-size: 16px;  margin-bottom: 2px;  color: #fff;}
        .top .AppInfo {font-size: 12px;  color: #8a878a;  margin-bottom: -5px; }
        #max-box .download {background-color: #fff;  color: #0095bf;  width: 100px;  height: 30px;  margin-top: 5px;  border: 0;  border-radius: 3px;  outline: none;}
        #max-box .content {width: 88%;  background-color: #fff;  margin: 0 auto;  margin-top: 15px;  margin-bottom: 10px;  border-radius: 3px;  box-shadow:0px 0px 10px #B8B8B8;  padding: 10px;}
        .content .titcor {width: 3px;  height: 20px;  background-color: #0095bf;  float: left;  margin-right: 6px;}
        .content .title {line-height: 20px;  color: #222;  font-size: 14px;  color: #0095bf;}
        .content .text {font-size: 12px;  margin: 10px 5px 10px 5px;}
        .content .imgbox {width: 98%;  margin: 0 auto;  border:1px solid #F0F0F0;  margin-top: 5px;}
        .content .appimg {width: 46%; margin: 0 1% 0 1%;  padding: 2% 0 2% 0;}
        #max-box .bottom {height: 30px;  font-size: 12px;  line-height: 30px;  text-align: center;  color: #B8B8B8;}
        #max-box .right {width: 50px;  height: 50px;  position:fixed;  right: 22px;  bottom: 22px;  -webkit-tap-highlight-color: rgba(255, 255, 255, 0);}
        .right .service {width: 48px;  height: 48px;}

    </style>
</head>
<body>
<div id="max-box">

    <div class="top">
        <img src="<?php echo $icon; ?>" class="icon"></img>
        <div class="AppName"><?php echo $appname; ?></div>
        <a href="<?php echo $url; ?>"><button class="download">极速下载</button></a>
    </div>
    <div class="content">
        <div class="titcor"></div><span class="title">应用公告</span>
        <div class="text"><?php echo $notice; ?></div>
        <div class="titcor"></div><span class="title">更新内容</span>
        <div class="text"><?php echo $newcontent; ?></div>
        <div class="titcor"></div><span class="title">应用截图</span>
        <div class="imgbox">
            <a href="<?php echo $imga; ?>"><img class="appimg" src="<?php echo $imga; ?>"></img></a>
            <a href="<?php echo $imgb; ?>"><img class="appimg" src="<?php echo $imgb; ?>"></img></a>
        </div>
    </div>
    <div class="bottom">
        <a href="../">Copyright © 2020 - 2021 易对接后台 All Rights Reserved.</a>
    </div>

</div>
</body>
</html>