<?php
$admin=$_GET["admin"];
$pass=$_GET["pass"];
$user=$_GET["user"];
$grade=$_GET["grade"];
require 'test_test.php';
if(file_exists("userss/".$admin)&&$admin!=""){
if($pass==file_get_contents("userss/".$admin."/admin/passprotect556")){
if(file_exists("userss/".$admin."/userss/".$user)&&$user!=""){
if($grade!=""&&strlen($grade)<18&&strlen($grade)>=1){
if(file_get_contents("userss/".$admin."/admin/viptime")>time()){
if(file_exists("userss/".$admin."/userss/".$user."/grade")){
echo "修改成功";
file_put_contents("userss/".$admin."/userss/".$user."/grade",$grade);
}else{echo "设置成功";file_put_contents("userss/".$admin."/userss/".$user."/grade",$grade);}
}else{echo "后台账号过期，无法修改";}
}else{echo "等级长度需在1-18位";}
}else{echo "账号不存在";}
}else{echo "后台密码错误";}
}else{echo "后台账号不存在";}
?>