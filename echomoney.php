<?php
$admin=$_GET["admin"];
$user=$_GET["user"];
$pass=$_GET["pass"];
require 'test_test.php';
if(file_exists("userss/".$admin)&&$admin!=""){
if(file_exists("userss/".$admin."/userss/".$user)&&$user!=""){
if($pass==file_get_contents("userss/".$admin."/userss/".$user."/passprotect556")){
    include 'logintrue.php';
$sealroute="userss/".$admin."/userss/".$user."/seal";
$seal='true';
$sealtime=file_get_contents($sealroute);
if(file_exists($sealroute)){
if(file_get_contents($sealroute)>=time()){
$seal='false';
}
}
if($seal=='true'){
echo floor(file_get_contents("userss/".$admin."/userss/".$user."/money"));
}else{echo "查看失败，账号封禁至".date('Y-m-d H:i',$sealtime);}
}else{echo "密码错误";}
}else{echo "账号不存在";}
}else{echo "后台账号不存在";}
?>