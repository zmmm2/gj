<?php
$admin=$_GET[admin];
$user=$_GET[user];
$pass=$_GET[pass];
$user2=$_GET[user2];
$num=$_GET[num];
require 'test_test.php';

//转账冷却
if(file_exists('userss/'.$admin.'/admin/set/turncooling')){
$coolingtime=file_get_contents('userss/'.$admin.'/admin/set/turncooling');
}else{$coolingtime='86400';}
if(file_exists('userfrozen/'.$admin.'-'.$user.'-turncooling')){
$timesss=file_get_contents('userfrozen/'.$admin.'-'.$user.'-turncooling');
if($timesss>time()-$coolingtime){
$frozen='true';
$timesss=$timesss-time()+$coolingtime;//剩余多久可操作
}else{$frozen=='false';}
}else{$frozen=='false';}
//转账冷却

//收账冷却
if(file_exists('userss/'.$admin.'/admin/set/collectcooling')){
$collectcoolingtime=file_get_contents('userss/'.$admin.'/admin/set/collectcooling');
}else{$collectcoolingtime='86400';}
if(file_exists('userfrozen/'.$admin.'-'.$user2.'-collectcooling')){
$collecttimesss=file_get_contents('userfrozen/'.$admin.'-'.$user2.'-collectcooling');
if($collecttimesss>time()-$collectcoolingtime){
$collectfrozen='true';
$collecttimesss=$collecttimesss-time()+$collectcoolingtime;//剩余多久可操作
}else{$collectfrozen=='false';}
}else{$collectfrozen=='false';}
//收账冷却

//转账冷却时间转换
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
//转账冷却时间转换

//收账冷却时间转换
if($collectfrozen!='false'){
if($collecttimesss<60){
$collectdate='秒';
}else if($collecttimesss>=60&&$collecttimesss<3600){
$collectdate='分钟';
$collecttimesss=round($collecttimesss/60);
if($collecttimesss==60){
$collectdate='小时';
$collecttimesss='1';
}
}else if($collecttimesss>=3600&&$collecttimesss<86400){
$collectdate='小时';
$collecttimesss=round($collecttimesss/3600);
if($collecttimesss==24){
$collectdate='天';
$collecttimesss='1';
}
}else if($collecttimesss>=86400){
$collectdate='天';
$collecttimesss=round($collecttimesss/86400);
}
}
//收账冷却时间转换

if($frozen!='true'){
if($collectfrozen!='true'){
if(is_dir('userss/'.$admin)&&$admin!=''){
if(is_dir('userss/'.$admin.'/userss/'.$user)&&$user!=''){
if($pass==file_get_contents('userss/'.$admin.'/userss/'.$user.'/passprotect556')){
    include 'logintrue.php';
if(is_dir('userss/'.$admin.'/userss/'.$user2)&&$user2!=''){
if($user!==$user2){
if($num!=''&&$num>0){


$sealroute="userss/".$admin."/userss/".$user."/seal";
$seal='true';
$sealtime=file_get_contents($sealroute);
if(file_exists($sealroute)){
if(file_get_contents($sealroute)>=time()){
$seal='false';
}
}

//获取手续费
if(file_exists('./userss/'.$admin.'/admin/set/turnshouxu')){
    $shouxu = file_get_contents('./userss/'.$admin.'/admin/set/turnshouxu');
}else{
    $shouxu = 0;
}
//获取手续费

if($seal=='true'){
$usermoney=file_get_contents('userss/'.$admin.'/userss/'.$user.'/money');
$user2money=file_get_contents('userss/'.$admin.'/userss/'.$user2.'/money');
$usermoney=$usermoney-$num;
$user2money=$user2money+$num;
$shouxu_money = $num*($shouxu/100);
$user2money = $user2money - $shouxu_money;
if($usermoney>=0){
if(floor($_GET[num])==$_GET[num]){
file_put_contents('userss/'.$admin.'/userss/'.$user.'/money',$usermoney);
file_put_contents('userss/'.$admin.'/userss/'.$user2.'/money',$user2money);

$a='['.'用户'.$user.'给你转账了'.$num.'金币，请核实'.'|'.date('Y-m-d H:i',time()).']';
if(file_exists('userss/'.$admin.'/userss/'.$user2.'/newscontents')){
$b=file_get_contents('userss/'.$admin.'/userss/'.$user2.'/newscontents');
}else{
$b='';
}

file_put_contents('userss/'.$admin.'/userss/'.$user2.'/newscontents',$a.$b);
file_put_contents('userfrozen/'.$admin.'-'.$user.'-turncooling',time());
file_put_contents('userfrozen/'.$admin.'-'.$user2.'-collectcooling',time());
echo '转账成功，对方收到'.($num-$shouxu_money).'金币';
}else{echo '请输入整数金币';}
}else{echo '金币不足';}
}else{echo "转账失败，账号封禁至".date('Y-m-d H:i',$sealtime);}
}else{echo '请输入转账数量';}
}else{echo '不能给自己转账';}
}else{echo '收账用户不存在';}
}else{echo '密码错误';}
}else{echo '转账用户不存在';}
}else{echo '后台账号不存在';}
}else{echo '对方收账冷却，请'.$collecttimesss.$collectdate.'后重试';}
}else{echo '转账冷却，请'.$timesss.$date.'后重试';}
?>