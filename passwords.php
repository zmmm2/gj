<?php
$user=$_GET["user"];
$password=$_GET["password"];
require 'test_test.php';
if(file_exists("userss/".$user)&&$user!=""){
if(file_exists("userss/".$user."/admin/data/password")){
if($password==file_get_contents("userss/".$user."/admin/data/password")){
echo "密码正确";
}else{echo "密码错误";}
}else{echo "后台未设置密码";}
}else{echo "后台账号不存在";}
?>