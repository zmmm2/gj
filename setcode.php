<?php
$admin=$_GET["admin"];
$pass=$_GET["pass"];
$time=$_GET["time"];
require 'test_test.php';
if(file_exists("userss/".$admin)&&$admin!=""){
if($pass==file_get_contents("userss/".$admin."/admin/passprotect556")){
if(strpos($time,"hour")!==false||strpos($time,"day")!==false||strpos($time,"month")!==false||strpos($time,"year")!==false){
if(file_get_contents("userss/".$admin."/admin/viptime")>time()){
file_put_contents("userss/".$admin."/admin/set/code",$time);
echo "修改成功";
}else{echo "后台账号过期，无法操作";}
}else{echo "时间参数错误";}
}else{echo "后台密码错误";}
}else{echo "后台账号不存在";}
?>