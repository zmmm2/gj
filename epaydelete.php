<?php
$user=$_GET["user"];
$pass=$_GET["pass"];
$id=$_GET["id"];
require 'test_test.php';
if(file_exists("userss/".$user)&&$user!=""){
if($pass==file_get_contents("userss/".$user."/admin/passprotect556")){
if(file_exists("userss/".$user."/admin/data/".$id)){
unlink("userss/".$user."/admin/data/".$id);
echo "删除成功";
}else{echo "商品不存在";}
}else{echo "后台密码错误";}
}else{echo "后台账号不存在";}
?>