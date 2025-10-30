<?php
$admin=$_GET["admin"];
$user=$_GET["user"];
$num=$_GET["num"];
$key=$_GET["key"];
$mods=$_GET["mods"];
require 'test_test.php';
if($mods=="增加"){
//增加
if(file_exists("userss/".$admin)&&$admin!=""){
if($key==file_get_contents("userss/".$admin."/admin/keyprotect556")){
if(file_get_contents("userss/".$admin."/admin/viptime")>time()){
if(file_exists("userss/".$admin."/userss/".$user)&&$user!=""){
if($num>=1&&$num<=100000){
if($money>=0){
$money=$num+file_get_contents("userss/".$admin."/userss/".$user."/money");
file_put_contents("userss/".$admin."/userss/".$user."/money",$money);
echo "操作成功";
}else{echo "运算结果错误";}
}else{echo "操作数量需在1-100000之间";}
}else{echo "账号不存在";}
}else{echo "后台账号过期，无法操作";}
}else{echo "后台密钥错误";}
}else{echo "后台账号不存在";}
}else if($mods=="减少"){
//减少
if(file_exists("userss/".$admin)&&$admin!=""){
if($key==file_get_contents("userss/".$admin."/admin/keyprotect556")){
if(file_get_contents("userss/".$admin."/admin/viptime")>time()){
if(file_exists("userss/".$admin."/userss/".$user)&&$user!=""){
if($num>=1&&$num<=100000){
$money=file_get_contents("userss/".$admin."/userss/".$user."/money")-$num;
if($money>=0){
file_put_contents("userss/".$admin."/userss/".$user."/money",$money);
echo "操作成功";
}else{
echo "金币不足";
}
}else{echo "操作数量需在1-100000之间";}
}else{echo "账号不存在";}
}else{echo "后台账号过期，无法操作";}
}else{echo "后台密钥错误";}
}else{echo "后台账号不存在";}
}else{echo "运算模式错误";}
?>