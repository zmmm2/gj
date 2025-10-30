<?php
$user=$_GET['user'];
$pass=$_GET['pass'];
$time=$_GET['time'];
require 'test_test.php';
if(file_exists('userss/'.$user)&&$user!=''){
if($user!='appdoc'){
if($pass==file_get_contents('userss/'.$user.'/admin/passprotect556')){
if($time=='1month'||$time=='3month'||$time=='1year'||$time=='100year'){
if($time=='1month'){
//配置信息
$money=3;
}
if($time=='3month'){
//配置信息
$money=9;
}
if($time=='1year'){
//配置信息
$money=32;
}
if($time=='100year'){
//配置信息 
$money=52;
}
//配置好价格后判断余额
if(file_exists('userss/'.$user.'/admin/money')){
if(file_get_contents('userss/'.$user.'/admin/money')>=$money){
//进行购买
if(file_get_contents('userss/'.$user.'/admin/viptime')>time()){
//目前有vip
$newtime=strtotime($time,file_get_contents('userss/'.$user.'/admin/viptime'));
file_put_contents('userss/'.$user.'/admin/viptime',$newtime);
if(file_exists("userss/".$user."/admin/data/file_true")){
unlink("userss/".$admin."/admin/data/file_true");
}
echo '兑换成功';
}else{
//目前没有vip
$newtime=strtotime($time,time());
file_put_contents('userss/'.$user.'/admin/viptime',$newtime);
if(file_exists("userss/".$user."/admin/data/file_true")){
unlink("userss/".$admin."/admin/data/file_true");
}
echo '兑换成功';
}
//减少余额
$newmoney=file_get_contents('userss/'.$user.'/admin/money')-$money;
file_put_contents('userss/'.$user.'/admin/money',$newmoney);
}else{echo '余额不足';}
}else{echo '该账号还没有余额';}
}else{echo'开通时间输入错误';}
}else{echo '后台密码错误';}
}else{echo '测试账号不可兑换';}
}else{echo '后台账号不存在';}
?>