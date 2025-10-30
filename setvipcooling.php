<?php
$user=$_GET['user'];
$pass=$_GET['pass'];
$time=$_GET['time'];
require 'test_test.php';
if($user!=''&&is_dir('userss/'.$user)){
if($pass==file_get_contents('userss/'.$user.'/admin/passprotect556')){
if($time>=0&&$time<=31536000&&is_numeric($time)){
file_put_contents('userss/'.$user.'/admin/set/vipcooling',$time);
echo '设置成功';
}else{echo '请输入0-31536000之间的时间';}
}else{echo '后台密码错误';}
}else{echo '后台账号不存在';}
?>