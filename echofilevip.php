<?php
$user=$_GET["user"];
$pass=$_GET["pass"];
require 'test_test.php';
if(file_exists("userss/".$user)&&$user!=""){
if($pass==file_get_contents("userss/".$user."/admin/passprotect556")){
if(file_get_contents("userss/".$user."/admin/viptime")>time()){
$viptime=date("Y-m-d",file_get_contents("userss/".$user."/admin/viptime"));
}else{
$viptime="已过期";
}
echo $viptime."|".file_get_contents("userss/".$user."/admin/data/filenum");
}else{echo "后台密码错误";}
}else{echo "后台账号不存在";}
?>