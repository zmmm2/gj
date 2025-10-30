<?php
$admin = isset($_GET['admin'])?$_GET['admin']:null;
include './test_test.php';
if(!is_dir('./userss/'.$admin))die('后台账号不存在');
$time = time()-60*5;
$link = new mysqli("localhost","appdoc","123456","appdoc");
$sql = "SELECT user,time FROM `online` WHERE admin = '{$admin}' and time > '{$time}'";
$list = $link->query($sql);
$show = '';
while($list_see = mysqli_fetch_assoc($list)){
    $list_see["time"] = date("H:i",$list_see["time"]);
    $show = '|'.json_encode($list_see).$show;
}
mysqli_close();
if($show == ''){
    echo '还没有用户在线';
}else{
    echo $show;
}
exit;