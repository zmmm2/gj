<?php
$admin = isset($_GET['admin'])?$_GET['admin']:null;
include './test_test.php';
if(!is_dir('./userss/'.$admin))die('后台账号不存在');
$time = time()-60*5;
$link = new mysqli("localhost","appdoc","123456","appdoc");
$sql = "SELECT COUNT(*) FROM `online` WHERE admin = '{$admin}' and time > '{$time}'";
echo '当前在线人数:'.mysqli_fetch_array($link->query($sql))["COUNT(*)"];
mysqli_close();
exit;