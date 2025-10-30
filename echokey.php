<?php
$user=$_GET["user"];
$pass=$_GET["pass"];
require 'test_test.php';
if(file_exists("userss/".$user)&&$user!=""){
if($pass==file_get_contents("userss/".$user."/admin/passprotect556")){
echo file_get_contents("userss/".$user."/admin/keyprotect556");
}else{echo "后台密码错误";}
}else{echo "后台账号不存在";}
?>