<?php
$admin=$_GET["admin"];
$pass=$_GET["pass"];
$num=$_GET["num"];
require 'test_test.php';
if(file_exists("userss/".$admin)&&$admin!=""){
if($pass==file_get_contents("userss/".$admin."/admin/passprotect556")){
if($num>=0&&$num<=99&&$num!=''){
file_put_contents("userss/".$admin."/admin/set/turnshouxu",$num);
echo "修改成功";
}else{echo "手续需在0-99之间";}
}else{echo "后台密码错误";}
}else{echo "后台账号不存在";}
?>