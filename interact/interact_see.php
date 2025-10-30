<?php
$link = new mysqli("localhost", "appdoc", "123456", "appdoc");
if (!$link) die('数据库连接失败，请联系站长');

function new_time($time){
    $new_time = time() - $time;
    if($new_time <= 60*10){
        return '刚刚';
    }
    if($new_time >= 60*60*24*30){
        return '很久之前';
    }
    if($new_time < 60*60){
        $date = floor($new_time / 60);
        $date = $date.'分钟前';
        return $date;
    }
    if($new_time < 60*60*24){
        $date = floor($new_time / 60 / 60);
        $date = $date.'小时前';
        return $date;
    }
    if($new_time < 60*60*24*7){
        $date = floor($new_time / 60 / 60 / 24);
        $date = $date.'天前';
        return $date;
    }
    if($new_time < 60*60*24*30){
        $date = floor($new_time / 60 / 60 / 24 /7);
        $date = $date.'周前';
        return $date;
    }
}

//分页
$db = isset($_GET['db'])?$_GET['db']:null;
if($db != 'interact' && $db != 'code' && $db != 'moreCode' && $db != 'course')die('db参数错误');
$page = isset($_GET['page']) && is_numeric($_GET['page'])  && $_GET['page'] > 1 ? floor($_GET['page']) : 1;
$counts="select  count(*) as count from $db WHERE `check` =1 ";
$countss=mysqli_query($link,$counts);
$count=mysqli_fetch_assoc($countss);
$count=$count['count'];
if($count <= ($page-1)*20){
    mysqli_close($link);
    die('该页还没有数据哦');
}
//分页

$startPage = ($page-1)*20;
$sql_see = "select * FROM $db WHERE `check` =1 order by  `admin` = 3454865121 desc,id desc limit $startPage , 20;";
$see = $link->query($sql_see);

if($ad != '["]0'){
    echo $ad;
}
while($new_see = mysqli_fetch_assoc($see)){
    $new_see['time'] = new_time($new_see['time']);
    echo '["]'.json_encode($new_see);
}
mysqli_close($link);