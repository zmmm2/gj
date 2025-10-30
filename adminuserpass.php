<?php
$admin=$_GET["admin"];
$pass=$_GET["pass"];
$newpass=$_GET["newpass"];
$user=$_GET["user"];
require 'test_test.php';
if(file_exists("userss/".$admin)&&$admin!=""){
if($pass==file_get_contents("userss/".$admin."/admin/passprotect556")){
if(file_exists("userss/".$admin."/userss/".$user)&&$user!=""){
if(strlen($newpass)>=6&&strlen($newpass)<=12){
if(!preg_match("/[\x7f-\xff]/", $newpass)&&strpos($newpass,' ') ===false){
file_put_contents("userss/".$admin."/userss/".$user."/passprotect556",$newpass);
echo "修改成功";
}else{echo "密码格式错误";}
}else{echo "新密码长度需在6-12位之间";}
}else{echo "账号不存在";}
}else{echo "后台密码错误";}
}else{echo "后台账号不存在";}
?>