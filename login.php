<?php
$user=$_GET["user"];
$pass=$_GET["pass"];
require 'test_test.php';
if($user=="appdoc")die("测试账号永久关闭，因为某些人类素质太低");
if($user==""||$pass==""){
//未输入
echo "请输入完整";
}else{
if(file_exists("userss/".$user)){
//账号存在
$ipass=file_get_contents("userss/".$user."/admin/passprotect556");
if($pass==$ipass){
//密码正确
$viptime=file_get_contents("userss/".$user."/admin/viptime");
if($viptime>time()){
echo "登录成功";
}else{
echo "后台账号过期，无法登录";
}
}else{
//密码错误
echo "密码错误";
}
}else{
//账号不存在
echo "账号不存在";
}
}
?>