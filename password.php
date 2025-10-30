<?php
$user=$_GET["user"];
$pass=$_GET["pass"];
$password=$_GET["password"];
require 'test_test.php';
if($password!=""){
if(strlen($password)<=12){
if(file_exists("userss/".$user)&&$user!=""){
if($pass==file_get_contents("userss/".$user."/admin/passprotect556")){
if(file_get_contents("userss/".$user."/admin/viptime")>time()){
file_put_contents("userss/".$user."/admin/data/password",$password);
echo "设置成功";
}else{echo "后台账号过期，无法操作";}
}else{echo "后台密码错误";}
}else{echo "后台账号不存在";}
}else{echo "密码长度需小于12位";}
}else{echo "请输入完整";}
?>