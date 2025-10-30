<?php
$admin=$_GET['admin'];
$user=$_GET['user'];
$pass=$_GET['pass'];
$name=$_GET['name'];
$money=$_GET['money'];
$mini=$_GET['mini'];
$max=$_GET['max'];
$id=$_GET['id'];
require 'test_test.php';

if(file_exists('userss/'.$admin.'/admin/set/moneycooling')){
$coolingtime=file_get_contents('userss/'.$admin.'/admin/set/moneycooling');
}else{$coolingtime='3600';}
if(file_exists('userfrozen/'.$admin.'-'.$user.'-moneycooling')){
$timesss=file_get_contents('userfrozen/'.$admin.'-'.$user.'-moneycooling');
if($timesss>time()-$coolingtime){
$frozen='true';
$timesss=$timesss-time()+$coolingtime;//剩余多久可操作
}else{$frozen=='false';}
}else{$frozen=='false';}

//时间转换
if($frozen!='false'){
if($timesss<60){
$date='秒';
}else if($timesss>=60&&$timesss<3600){
$date='分钟';
$timesss=round($timesss/60);
if($timesss==60){
$date='小时';
$timesss='1';
}
}else if($timesss>=3600&&$timesss<86400){
$date='小时';
$timesss=round($timesss/3600);
if($timesss==24){
$date='天';
$timesss='1';
}
}else if($timesss>=86400){
$date='天';
$timesss=round($timesss/86400);
}
}
//时间转换


if($frozen!='true'){
if(is_dir('userss/'.$admin)&&$admin!=''){
if(is_dir('userss/'.$admin.'/userss/'.$user)&&$user!=''){
if($pass==file_get_contents('userss/'.$admin.'/userss/'.$user.'/passprotect556')){
    include 'logintrue.php';
if($name!=''&&$money!=''&&$mini!=''&&$max!=''&&$id!=''){
if(file_exists('userss/'.$admin.'/admin/data/luckmoney')){
$a='['.$id.'#'.$name.'|'.$money.'||'.$mini.'|||'.$max.']';
$b=file_get_contents('userss/'.$admin.'/admin/data/luckmoney');
if(strpos($b,$a)!==false){
if($money<=file_get_contents('userss/'.$admin.'/userss/'.$user.'/money')&&file_get_contents('userss/'.$admin.'/userss/'.$user.'/money')>=$money){
$moneys=file_get_contents('userss/'.$admin.'/userss/'.$user.'/money')-$money;
if($moneys>=0&&is_numeric($moneys)){
$moneysss=rand($mini,$max);
$moneyss=$moneys+$moneysss;
file_put_contents('userss/'.$admin.'/userss/'.$user.'/money',$moneyss);
file_put_contents('userfrozen/'.$admin.'-'.$user.'-moneycooling',time());
echo '抽奖完毕，获得'.$moneysss.'个金币';
}else{echo '运算出错，请重试';}
}else{echo '金币不足，无法抽奖';}
}else{echo '商品不存在';}
}else{echo '后台无抽奖商品';}
}else{echo '请输入完整';}
}else{echo '密码错误';}
}else{echo '账号不存在';}
}else{echo '后台账号不存在';}
}else{echo '抽奖冷却，请'.$timesss.$date.'后重试';}
//格式:[ID#商品名|抽奖花费||最小奖励|||最大奖励]
?>