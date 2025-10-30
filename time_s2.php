<?php
$time = isset($_GET['time']) ? $_GET['time'] : null;
$time = strtotime($time);
if(is_numeric($time)){
    if($time > time()){die('还没有到开始计算的时间呢');}
    $times = time() - $time;
    $day = floor($times / 60 / 60 / 24);
    $hour = floor($times % (60*60*24) / 60 / 60);
    $minutes = floor($times % (60*60) / 60);
    $s = floor($times % 60);
    die("已经过了:".$day."天".$hour."小时".$minutes."分钟".$s."秒");
}else{die('请输入正确的时间格式');}