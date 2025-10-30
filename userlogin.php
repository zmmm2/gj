<?php

//清除昨日数据
$signdatasize=filesize('admin/sign');
if($signdatasize>5120){
$delete1='true';
}
if(date('Hi',time())=='0000'||date('Hi',time())=='0001'||date(Hi,time())=='0002'||date('Hi',time())=='0003'||date('Hi',time())=='0004'||date('Hi',time())=='0005'){
$delete2='true';
}
if($delete1=='true'&&$delete2=='true'){
file_put_contents('admin/sign','');
}
//清除昨日数据

//清除昨日数据-注册
$useripdatasize=filesize('admin/userIP');
if($useripdatasize>5120){
$delete1s='true';
}
if(date('Hi',time())=='0000'||date('Hi',time())=='0001'||date('Hi',time())=='0002'||date('Hi',time())=='0003'||date('Hi',time())=='0004'||date('Hi',time())=='0005'){
$delete2s='true';
}
if($delete1s=='true'&&$delete2s=='true'){
//file_put_contents('admin/userIP','');
}
//清除昨日数据-注册

//清除昨日数据-后台注册
$ipsize=filesize('admin/IP');
if($ipsize>1024){
$delete1ss='true';
}
if(date('Hi',time())=='0000'||date('Hi',time())=='0001'||date('Hi',time())=='0002'||date('Hi',time())=='0003'||date('Hi',time())=='0004'||date('Hi',time())=='0005'){
$delete2ss='true';
}
if($delete1ss=='true'&&$delete2ss=='true'){
file_put_contents('admin/IP','');
}
//清除昨日数据-后台注册

$admin=$_GET["admin"];
$user=$_GET["user"];
$pass=$_GET["pass"];
require 'test_test.php';
if(!file_exists("userss/".$admin)||$admin==""){
//后台账号不存在
echo "后台账号不存在";
}else{
if(file_get_contents('userss/'.$admin.'/admin/viptime')<time())die('后台账号已经过期，无法操作');
if($user==""||$pass==""){
//未输入
echo "请输入完整";
}else{
if(file_exists("userss/".$admin."/userss/".$user)){
//账号存在
$ipass=file_get_contents("userss/".$admin."/userss/".$user."/passprotect556");
if($pass==$ipass){
//密码正确
if(file_exists("userss/".$admin."/userss/".$user."/seal")){
//封号文件存在
$seal=file_get_contents("userss/".$admin."/userss/".$user."/seal");
if($seal>time()){
//账号封禁
echo "登陆失败，账号封禁至".date('Y-m-d H:i',$seal);
}else{
//获取登陆奖励
if(file_exists('userss/'.$admin.'/admin/set/vipmoney')&&file_get_contents('userss/'.$admin.'/userss/'.$user.'/viptime')>time()){
$vipmoney=file_get_contents('userss/'.$admin.'/admin/set/vipmoney');
}else{$vipmoney='1.00';}
if(file_get_contents('userss/'.$admin.'/userss/'.$user.'/logintime')){
$logintimes=file_get_contents('userss/'.$admin.'/userss/'.$user.'/logintime');
$as=stripos($logintimes,' ');
$logintimes=substr($logintimes,0,$as);
}else{$logintimes='2013-08-13';}
if(file_exists('userss/'.$admin.'/admin/set/loginmoney')){
$loginmoney=file_get_contents('userss/'.$admin.'/admin/set/loginmoney')*$vipmoney;
if($loginmoney>=0&&is_numeric($loginmoney)){
}else{$loginmoney='0';}
}else{$loginmoney='0';}
if(date('Y-m-d',time())!=$logintimes){
$usermoney=file_get_contents('userss/'.$admin.'/userss/'.$user.'/money');
file_put_contents('userss/'.$admin.'/userss/'.$user.'/money',$usermoney+$loginmoney);
}
//获取登陆奖励
if(file_exists('userss/'.$admin.'/admin/data/maintain')){
	$maintain=file_get_contents('userss/'.$admin.'/admin/data/maintain');
if(strpos($maintain,'维护开关:开<br>维护通知:')!==false){
	$maintaintrue='false';
}
}
	if($maintaintrue!='false'){
if(file_exists("userss/".$admin."/admin/set/viplogin")){
if(file_get_contents("userss/".$admin."/admin/set/viplogin")=="是"){
$viplogin="是";
}else{
$viplogin="否";
}
}else{
$viplogin="否";
}
if($viplogin=='否'||file_get_contents('userss/'.$admin.'/userss/'.$user.'/viptime')>time()){
echo "登录成功";
}else{echo '会员才可以登录软件';}
	}else{echo '软件维护中，无法登录';}
file_put_contents('userss/'.$admin.'/userss/'.$user.'/logintime',date('Y-m-d H:i',time()));
}
}else{
//获取登陆奖励
if(file_exists('userss/'.$admin.'/admin/set/vipmoney')&&file_get_contents('userss/'.$admin.'/userss/'.$user.'/viptime')>time()){
$vipmoney=file_get_contents('userss/'.$admin.'/admin/set/vipmoney');
}else{$vipmoney='1.00';}
if(file_get_contents('userss/'.$admin.'/userss/'.$user.'/logintime')){
$logintimes=file_get_contents('userss/'.$admin.'/userss/'.$user.'/logintime');
$as=stripos($logintimes,' ');
$logintimes=substr($logintimes,0,$as);
}else{$logintimes='2013-08-13';}
if(file_exists('userss/'.$admin.'/admin/set/loginmoney')){
$loginmoney=file_get_contents('userss/'.$admin.'/admin/set/loginmoney')*$vipmoney;
if($loginmoney>=0&&is_numeric($loginmoney)){
}else{$loginmoney='0';}
}else{$loginmoney='0';}
if(date('Y-m-d',time())!=$logintimes){
$usermoney=file_get_contents('userss/'.$admin.'/userss/'.$user.'/money');
file_put_contents('userss/'.$admin.'/userss/'.$user.'/money',$usermoney+$loginmoney);
}
//获取登陆奖励
if(file_exists('userss/'.$admin.'/admin/data/maintain')){
	$maintain=file_get_contents('userss/'.$admin.'/admin/data/maintain');
if(strpos($maintain,'维护开关:开<br>维护通知:')!==false){
	$maintaintrue='false';
}
}
	if($maintaintrue!='false'){
if(file_exists("userss/".$admin."/admin/set/viplogin")){
if(file_get_contents("userss/".$admin."/admin/set/viplogin")=="是"){
$viplogin="是";
}else{
$viplogin="否";
}
}else{
$viplogin="否";
}
if($viplogin=='否'||file_get_contents('userss/'.$admin.'/userss/'.$user.'/viptime')>time()){
echo "登录成功";
}else{echo '会员才可以登录软件';}
	}else{echo '软件维护中，无法登录';}
file_put_contents('userss/'.$admin.'/userss/'.$user.'/logintime',date('Y-m-d H:i',time()));
}
}else{
echo "密码错误";
}
}else{
//账号不存在
echo "账号不存在";
}
}
}
?>