<?php
$admin=$_GET['admin'];
$pass=$_GET['pass'];
$QQ=$_GET['QQ'];
$wx=$_GET['wx'];
require 'test_test.php';
if(is_dir('userss/'.$admin)&&$admin!=''){
if($pass==file_get_contents('userss/'.$admin.'/admin/passprotect556')){
if(strlen($QQ)>=5&&strlen($QQ)<=10){
if(strlen($wx)>=6&&strlen($wx)<=20){
$content='客服QQ:'.$QQ.'<br>客服微信:'.$wx;
file_put_contents('userss/'.$admin.'/admin/set/MyService',$content);
echo '配置成功';
}else{echo '微信号格式错误';}
}else{echo 'QQ号格式错误';}
}else{echo '后台密码错误';}
}else{echo '后台账号不存在';}
?>