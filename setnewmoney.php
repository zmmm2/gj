<?php
$admin=$_GET["admin"];
$pass=$_GET["pass"];
$num=$_GET["num"];
require 'test_test.php';
if(file_exists("userss/".$admin)&&$admin!=""){
if($pass==file_get_contents("userss/".$admin."/admin/passprotect556")){
if($num>=0&&$num<=100000&&$num!=''){
file_put_contents("userss/".$admin."/admin/set/money",$num);
echo "修改成功";
}else{echo "操作数量需在0-100000之间";}
}else{echo "后台密码错误";}
}else{echo "后台账号不存在";}
?>