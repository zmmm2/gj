<?php
if($_GET['pass1'] != 'zxcv25')die('管理密码错误');
$mysql = [
    "host" => "localhost",
    "username" => "appdoc",
    "password" => "123456",
    "dbname" => "appdoc",
]; //数据库信息配置

function mysql_link($host,$username,$password,$dbname) {
    $link = new mysqli($host,$username,$password,$dbname);
    if($link->connect_error)die("数据库连接失败: " . $link->connect_error);
    mysqli_set_charset($link,'utf8');
    return $link;
} //连接数据库

$link = mysql_link($mysql["host"],$mysql["username"],$mysql["password"],$mysql["dbname"]); //连接数据库

for($i=0;$i<$_GET['num'];$i++){
    $time = $_GET['time'];
    $type = $_GET['type'];
    $km = md5(rand(0,10000000000));
    $sql_query = $link->query("INSERT INTO `vip_km`(`km`, `time`, `type`) VALUES ('{$km}','{$time}','{$type}')");
    if($sql_query === true)echo $km.'<br/>';
    else die('一个卡密创建失败<br>');
}