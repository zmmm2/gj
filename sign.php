<?php
$admin=$_GET["admin"];
$user=$_GET["user"];
$pass=$_GET["pass"];
require 'test_test.php';
if(file_exists("userss/".$admin."/admin/set/signtrue")){
if(file_get_contents("userss/".$admin."/admin/set/signtrue")=="否"){
$signtrue="否";
}else{
$signtrue="是";
}
}else{
$signtrue="是";
}
//获取是否开启注册
if($signtrue!='否'){
if(file_exists("userss/".$admin)&&$admin!=""){
if(file_exists("userss/".$admin."/userss/".$user)&&$user!=""){
if($pass==file_get_contents("userss/".$admin."/userss/".$user."/passprotect556")){
    include 'logintrue.php';
$sealroute="userss/".$admin."/userss/".$user."/seal";
$seal='true';
$sealtime=file_get_contents($sealroute);
if(file_exists($sealroute)){
if(file_get_contents($sealroute)>=time()){
$seal='false';
}
}
if($seal=='true'){
if(strpos(file_get_contents("admin/sign"),"[".$admin."|".$user."||".date("Y-m-d",time())."]")===false){
//没签到

if(file_exists('userss/'.$admin.'/admin/set/vipmoney')&&file_get_contents('userss/'.$admin.'/userss/'.$user.'/viptime')>time()){
$vipmoney=file_get_contents('userss/'.$admin.'/admin/set/vipmoney');
}else{$vipmoney='1.00';}

$a=file_get_contents("admin/sign");
file_put_contents("admin/sign","[".$admin."|".$user."||".date("Y-m-d",time())."]".$a);
$b=file_get_contents("userss/".$admin."/userss/".$user."/money");
$c=file_get_contents("userss/".$admin."/admin/set/sign")*$vipmoney;
$d=$b+$c;
file_put_contents("userss/".$admin."/userss/".$user."/money",$d);
echo "签到成功";
}else{
//已经签到
echo "今日已经签到";
}
}else{echo "签到失败，账号封禁至".date('Y-m-d H:i',$sealtime);}
}else{echo "密码错误";}
}else{echo "账号不存在";}
}else{echo "后台账号不存在";}
}else{echo '后台已关闭签到功能';}
?>