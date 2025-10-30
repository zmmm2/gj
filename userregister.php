<?php

session_start();
$admin=$_GET["admin"];
$user=$_GET["user"];
$pass=$_GET["pass"];
$code=$_GET["code"];
$name=isset($_GET["name"])?$_GET["name"]:null;
$qq=isset($_GET["qq"])?$_GET["qq"]:null;

$max_admin = ["1641189107","31503391","17407062714","2723843142","1482759914","2723843142","799931576"];
// if(in_array($admin,$max_admin)){
//     die("用户已达上限");
// }

require 'test_test.php';

if(mb_strlen($name) > 18){exit('昵称长度需在18位之内');}
if($qq != null){if(!is_numeric($qq) || strlen($qq) >10 || strlen($qq) < 5){exit('QQ号需在5-10位之间');}}
if(file_exists("userss/".$admin."/admin/set/registertrue")){
if(file_get_contents("userss/".$admin."/admin/set/registertrue")=="否"){
$registertrue="否";
}else{
$registertrue="是";
}
}else{
$registertrue="是";
}
//获取是否开启注册
if($registertrue!='否'){
 function getIP()
{
global $ip;
if (getenv("HTTP_CLIENT_IP")){
$ip = getenv("HTTP_CLIENT_IP");
}else if(getenv("HTTP_X_FORWARDED_FOR")){
$ip = getenv("HTTP_X_FORWARDED_FOR");
}else if(getenv("REMOTE_ADDR")){
$ip = getenv("REMOTE_ADDR");
}else $ip = "Unknow";
return $ip;
}
$fileip=file_get_contents('admin/userIP');
$codeip=file_get_contents('admin/codeIP');
$a='['.getIP().'|'.date('Y-m-d',time()).']';
$b='['.getIP().']';
//获取本机IP
if(strpos($_SERVER['HTTP_USER_AGENT'],'Windows')===false||$admin==vclengfeng){
if(strpos($_SERVER['HTTP_USER_AGENT'],'UNIX')===false){
if(strpos($fileip,$a)===false&&!isset($_COOKIE['user'.date('Y-m-d')])&&!isset($_SESSION['user'.date('Y-m-d')])){
if(!file_exists("userss/".$admin)||$admin==""){
//管理员账号不存在
echo "后台账号不存在";
}else{
if($user==""||$pass==""){
//未输入
echo "请输入完整";
}else{
if(preg_match("/[\x7f-\xff]/", $user)||strpos($user,'.') !==false||strpos($user,':') !==false||strpos($user,'-') !==false||strpos($user,' ') !==false||strpos($user,'[') !==false||strpos($user,'|') !==false||strpos($user,']') !==false||strpos($user,'A')!==false||strpos($user,'B')!==false||strpos($user,'C')!==false||strpos($user,'D')!==false||strpos($user,'E')!==false||strpos($user,'F')!==false||strpos($user,'G')!==false||strpos($user,'H')!==false||strpos($user,'I')!==false||strpos($user,'J')!==false||strpos($user,'K')!==false||strpos($user,'L')!==false||strpos($user,'M')!==false||strpos($user,'N')!==false||strpos($user,'O')!==false||strpos($user,'P')!==false||strpos($user,'Q')!==false||strpos($user,'R')!==false||strpos($user,'S')!==false||strpos($user,'T')!==false||strpos($user,'U')!==false||strpos($user,'V')!==false||strpos($user,'W')!==false||strpos($user,'X')!==false||strpos($user,'Y')!==false||strpos($user,'Z')!==false||strpos($user,'"')!==false||strpos($user,"'")!==false){
//有中文
echo "账号格式错误";
}else if(preg_match("/[\x7f-\xff]/", $pass)||strpos($pass,' ') !==false||strpos($pass,'"') !==false||strpos($pass,"'") !==false){
echo "密码格式错误";
}else{
if(strlen($user)<6||strlen($pass)<6||strlen($user)>16||strlen($pass)>16){
//小于6位
echo "账号密码需在6-16位之间";
}else{
if(file_exists("userss/".$admin."/userss/".$user)){
//账号存在
echo "账号已经存在";
}else{
//账号不存在
$fileroute='adminfrozen/admin-'.$admin.'-register-'.date('Ymd',time());
//读取次数
if(file_exists($fileroute)){
$registernum=file_get_contents($fileroute);
}else{$registernum=0;}
//读取次数
require 'admin/reg_max_num.php';
if($registernum<$reg_max_num){//一天注册上限
$viptime=file_get_contents("userss/".$admin."/admin/viptime");
if($viptime>time()){
if($code==''){
//未填写邀请码
file_put_contents('admin/userIP',$a.$fileip);
$money=file_get_contents("userss/".$admin."/admin/set/money");
$viptimes=file_get_contents("userss/".$admin."/admin/set/viptime");
mkdir("userss/".$admin."/userss/".$user,0777,true);//创建账号文件夹
file_put_contents("userss/".$admin."/userss/".$user."/passprotect556",$pass);//写入密码文件
file_put_contents("userss/".$admin."/userss/".$user."/viptime",strtotime($viptimes,time()));//写入会员文件
file_put_contents("userss/".$admin."/userss/".$user."/money",$money);//写入金币文件
file_put_contents("userss/".$admin."/userss/".$user."/registertime",date("Y-m-d H:i"));//写入注册时间文件
if($name != null){
  file_put_contents("userss/".$admin."/userss/".$user."/name",$name);
}
if($qq != null){
  file_put_contents("userss/".$admin."/userss/".$user."/QQ",$qq);
}

//写入
$_SESSION['user'.date('Y-m-d')]='true';
setcookie('user'.date('Y-m-d'),'true',time()+86400);
//写入

//写如注册数
file_put_contents($fileroute,$registernum+1);
//写入注册数

echo "注册成功";
}else{
if(strpos($codeip,$b)===false){
//该IP未填写过邀请码
if(is_dir('userss/'.$admin.'/userss/'.$code)){
//邀请码存在
//获取设置的奖励
if(file_exists('userss/'.$admin.'/admin/set/code')){
$codevip=file_get_contents('userss/'.$admin.'/admin/set/code');
}else{
$codevip='0day';
}
if(file_exists('userss/'.$admin.'/admin/set/codemoney')){
$codemoney=file_get_contents('userss/'.$admin.'/admin/set/codemoney');
}else{
$codemoney='0';
}


//这里写注册，并且赠送双方奖励
file_put_contents('admin/userIP',$b.$fileip);
file_put_contents('admin/codeIP',$b.$fileip);
$money=file_get_contents("userss/".$admin."/admin/set/money");
$viptimes=file_get_contents("userss/".$admin."/admin/set/viptime");
mkdir("userss/".$admin."/userss/".$user,0777,true);//创建账号文件夹
file_put_contents("userss/".$admin."/userss/".$user."/passprotect556",$pass);//写入密码文件
file_put_contents("userss/".$admin."/userss/".$user."/viptime",strtotime($viptimes,time()));//写入会员文件
file_put_contents("userss/".$admin."/userss/".$user."/money",$money);//写入金币文件
file_put_contents("userss/".$admin."/userss/".$user."/registertime",date("Y-m-d H:i"));//写入注册时间文件
//完成正常注册后，开始奖励
//首先是被邀请用户
$uservip=file_get_contents("userss/".$admin."/userss/".$user."/viptime");
if($uservip<time()){
$uservip=time();
}
file_put_contents("userss/".$admin."/userss/".$user."/viptime",strtotime($codevip,$uservip));//写入会员文件

//赠送金币
$usermoney=file_get_contents("userss/".$admin."/userss/".$user."/money");
file_put_contents("userss/".$admin."/userss/".$user."/money",$codemoney+$usermoney);//写入金币文件

//接着是邀请用户
$uservips=file_get_contents("userss/".$admin."/userss/".$code."/viptime");//用户时间戳
if($uservips<time()){
$uservips=time();
}
file_put_contents("userss/".$admin."/userss/".$code."/viptime",strtotime($codevip,$uservips));//写入会员文件

//赠送金币
$usermoneys=file_get_contents("userss/".$admin."/userss/".$code."/money");
file_put_contents("userss/".$admin."/userss/".$code."/money",$codemoney+$usermoneys);//写入金币文件

//写入
$_SESSION['user'.date('Y-m-d')]='true';
setcookie('user'.date('Y-m-d'),'true',time()+86400);
//写入

//写如注册数
file_put_contents($fileroute,$registernum+1);
//写入注册数0

//写入我的邀请人
file_put_contents("userss/".$admin."/userss/".$user."/MyInvite",$code);

//写入邀请人列表
$InviteList = file_exists("userss/".$admin."/userss/".$code."/InviteList")?file_get_contents("userss/".$admin."/userss/".$code."/InviteList"):"";
$newInviteList ="[{$user}]".$InviteList;
file_put_contents("userss/".$admin."/userss/".$code."/InviteList",$newInviteList);

if($name != null){
  file_put_contents("userss/".$admin."/userss/".$user."/name",$name);
}
if($qq != null){
  file_put_contents("userss/".$admin."/userss/".$user."/QQ",$qq);
}

echo "注册成功";


}else{echo '邀请人不存在';}
}else{echo '你已经填写过一次邀请码了';}
}
}else{echo "后台账号过期，无法注册";}
}else{echo '今日注册数已达上限，请明天再来';}
}
}
}
}
}
}else{echo '您一天只能注册一个账号！';}
}else{echo '请使用手机端注册';}
}else{echo '请使用手机端注册';}
}else{echo '后台已关闭注册功能';}
?>