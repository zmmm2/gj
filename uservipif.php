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

$vip=file_get_contents("userss/".$admin."/userss/".$user."/viptime");
//VIP就是会员时间戳
if($vip>time()){
//是VIP
echo "会员状态:".date("Y-m-d h:i",$vip);
}else{
//不是VIP
echo "您不是vip用户";
}
}else{echo "获取失败，账号封禁至".date('Y-m-d H:i',$sealtime);}
}else{echo "密码错误";}
}else{echo "账号不存在";}
}else{echo "后台账号不存在";}
?>