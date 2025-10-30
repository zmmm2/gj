<?php
$admin=$_GET["admin"];
$pass=$_GET["pass"];
$num=$_GET["num"];
require 'test_test.php';
if(file_exists("userss/".$admin)&&$admin!=""){
if($pass==file_get_contents("userss/".$admin."/admin/passprotect556")){
if($num>=1&&$num<=100000){
if(file_get_contents("userss/".$admin."/admin/viptime")>time()){
file_put_contents("userss/".$admin."/admin/set/sign",$num);
echo "修改成功";
}else{echo "后台账号过期，无法操作";}
}else{echo "操作数量需在1-100000之间";}
}else{echo "后台密码错误";}
}else{echo "后台账号不存在";}
?>