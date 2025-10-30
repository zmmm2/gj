<?php
$admin=$_GET["admin"];
$pass=$_GET["pass"];
$newpass=$_GET["newpass"];
$user=$_GET["user"];
require 'test_test.php';
$notpassword = file_exists('userss/'.$admin.'/admin/set/notpassword') ? explode('-',file_get_contents('userss/'.$admin.'/admin/set/notpassword')) : Array();
if(file_exists('./userss/'.$admin.'/admin/set/notpasswords')){die('后台已禁止修改密码');}
if(in_array($user,$notpassword)){die('该账号禁止修改密码');}
if(file_exists("userss/".$admin)&&$admin!=""){
if(file_exists("userss/".$admin."/userss/".$user)&&$user!=""){
if($pass==file_get_contents("userss/".$admin."/userss/".$user."/passprotect556")){
    include 'logintrue.php';
if($pass!=$newpass){
if(strlen($newpass)>=6&&strlen($newpass)<=12){
if(!preg_match("/[\x7f-\xff]/", $newpass)&&strpos($newpass,' ') ===false){
$sealroute="userss/".$admin."/userss/".$user."/seal";
$seal='true';
$sealtime=file_get_contents($sealroute);
if(file_exists($sealroute)){
if(file_get_contents($sealroute)>=time()){
$seal='false';
}
}
if($seal=='true'){
file_put_contents("userss/".$admin."/userss/".$user."/passprotect556",$newpass);
echo "修改成功";
}else{echo "修改失败，账号封禁至".date('Y-m-d H:i',$sealtime);}
}else{echo "密码格式错误";}
}else{echo "新密码长度需在6-12位之间";}
}else{echo '不可一致';}
}else{echo "原密码错误";}
}else{echo "账号不存在";}
}else{echo "后台账号不存在";}
?>