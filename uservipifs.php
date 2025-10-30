<?php
$admin=$_GET["admin"];
$user=$_GET["user"];
$pass=$_GET["pass"];
require 'test_test.php';
if(file_exists("userss/".$admin)&&$admin!=""){
if(file_exists("userss/".$admin."/userss/".$user)&&$user!=""){
if($pass==file_get_contents("userss/".$admin."/userss/".$user."/passprotect556")){
    include 'logintrue.php';
$sealroute="userss/".$admin."/userss/".$user."/seal";
$seal='true';
@$sealtime=file_get_contents($sealroute);
if(file_exists($sealroute)){
if(file_get_contents($sealroute)>=time()){
$seal='false';
}
}
if($seal=='true'){
$vip=file_get_contents("userss/".$admin."/userss/".$user."/viptime");
//VIP就是会员时间戳
if($vip>time()){
//是VIP
$echo= "会员状态:".date("Y-m-d h:i",$vip);
$echos= "会员状态:".date("Y-m-d h:i",$vip);
}else{
//不是VIP
$echo= "您不是vip用户";
$echos= "您不是vip用户";
}
}else{$echo= "获取失败，账号封禁至".date('Y-m-d H:i',$sealtime);$echos= "获取失败，账号封禁至".date('Y-m-d H:i',$sealtime);}
}else{$echo= "密码错误";$echos= '密码错误';}
}else{$echo= "账号不存在";$echos= '账号不存在';}
}else{$echo= "后台账号不存在";$echos= '后台账号不存在';}
//加密
$echo=str_replace(0,'`#',$echo);
$echo=str_replace(1,'wan',$echo);
$echo=str_replace(2,'@',$echo);
$echo=str_replace(3,'&',$echo);
$echo=str_replace(4,'**s',$echo);
$echo=str_replace(5,'paou',$echo);
$echo=str_replace(6,'_',$echo);
$echo=str_replace(7,'%^',$echo);
$echo=str_replace(8,'~',$echo);
$echo=str_replace(9,'?',$echo);
$echo=str_replace('-','//-+',$echo);
$echo=str_replace(' ','|$',$echo);
$echo=str_replace('会员状态:','#$#',$echo);
$echo=str_replace('您不是vip用户','^￥￥^',$echo);
$echo=str_replace('获取失败，账号封禁至','sealtrue',$echo);
echo $echo.'{'.$echos.'}';
//加密
?>