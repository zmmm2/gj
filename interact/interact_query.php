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

$arr = [';', '"', "'", '$', '(', ')', '#', '\\','union'];
$newarr = ['[；]', '[＂]', '[＇]', '[￥]', '[（]', '[）]', '[#]', '[/]','unin'];

//分页
$db = isset($_GET['db'])?$_GET['db']:null;
$text = isset($_GET['text'])?$_GET['text']:null;
$type = isset($_GET['type'])?$_GET['type']:null;
if($text === null)die('额.我不知道你要查什么');
$text = str_replace($arr,$newarr,$text);
if($type != 'user')$text = "%$text%";
if($db != 'interact' && $db != 'code' && $db != 'moreCode' && $db != 'course')die('db参数错误');
$page = isset($_GET['page']) && is_numeric($_GET['page'])  && $_GET['page'] > 1 ? floor($_GET['page']) : 1;
if($type == 'user'){
    if(preg_match("/[\x7f-\xff]/", $text))die('请输入正确的账号');
    $text = str_replace($arr,$newarr,$text);
    $counts="select count(*) as count from $db WHERE `check`=1 AND `admin`='$text'";
}else{
    $counts="select count(*) as count from $db WHERE `check`=1 AND `title` LIKE '$text'";
}
$countss=mysqli_query($link,$counts);
$count=mysqli_fetch_assoc($countss);
$count=$count['count'];
if($count <= ($page-1)*20){
    mysqli_close($link);
    die('该页还没有数据哦');
}
//分页

$startPage = ($page-1)*20;
if($type == 'user'){
    if(preg_match("/[\x7f-\xff]/", $text))die('请输入正确的账号');
    $sql_see = "select * from $db WHERE `check`=1 AND `admin`='$text' ORDER BY id DESC LIMIT $startPage , 20";
}else{
    $sql_see = "select * FROM $db WHERE `check`=1 AND `title` LIKE '$text' ORDER BY id DESC LIMIT $startPage , 20";
}
$see = $link->query($sql_see);

while($new_see = mysqli_fetch_assoc($see)){
    $new_see['time'] = new_time($new_see['time']);
    echo '["]'.json_encode($new_see);
}
mysqli_close($link);