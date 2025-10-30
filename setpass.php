<?php
$user=$_GET["user"];
$pass=$_GET["pass"];
$newpass=$_GET["newpass"];
require 'test_test.php';
if(file_exists("userss/".$user)&&$user!=""){
if($pass==file_get_contents("userss/".$user."/admin/passprotect556")){
if($user!="appdoc"){
if(preg_match("/[\x7f-\xff]/", $newpass)||strpos($newpass,' ') !==false){
echo "密码格式错误";
}else{
if(strlen($newpass)<6||strlen($newpass)>12){
//小于6位
echo "密码需在6-12位之间";
}else{
file_put_contents("userss/".$user."/admin/passprotect556",$newpass);
echo "修改成功";}}
}else{echo "测试账号不可修改";}
}else{echo "原密码错误";}
}else{echo "后台账号不存在";}
?>