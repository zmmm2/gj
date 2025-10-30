<?php
$admin=$_GET['admin'];
$user=$_GET['user'];
$pass=$_GET['pass'];
$QQ=$_GET['QQ'];
require 'test_test.php';
$sealroute="userss/".$admin."/userss/".$user."/seal";
$seal='true';
if(file_exists($sealroute)){
$sealtime=file_get_contents($sealroute);
if($sealtime>=time()){
$seal='false';
}
}
if($seal=='true'){
if(is_dir('userss/'.$admin)&&$admin!=''){
if(is_dir('userss/'.$admin.'/userss/'.$user)&&$user!=''){
if(file_get_contents('userss/'.$admin.'/userss/'.$user.'/passprotect556')==$pass){
    include 'logintrue.php';
if(strlen($QQ)<=10&&strlen($QQ)>=5&&is_numeric($QQ)&&$QQ!=''){
file_put_contents('userss/'.$admin.'/userss/'.$user.'/QQ',$QQ);
echo '绑定成功';
}else{echo '请输入正确的QQ';}
}else{echo '密码错误';}
}else{echo '用户账号不存在';}
}else{echo '后台账号不存在';}
}else{echo "绑定失败，账号封禁至".date('Y-m-d H:i',$sealtime);}
?>