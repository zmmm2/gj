<?php
$admin=$_GET["user"];
$pass=$_GET["pass"];
require 'test_test.php';
if(file_exists("userss/".$admin)&&$admin!=""){
if($pass==file_get_contents("userss/".$admin."/admin/passprotect556")){
$vip=file_get_contents("userss/".$admin."/admin/viptime");
//VIP就是会员时间戳
if($vip>time()){
//是VIP
echo "缴费时间:".date("Y-m-d",$vip);
}else{echo "后台账号过期";}
}else{echo "后台密码错误";}
}else{echo "后台账号不存在";}
?>