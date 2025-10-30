<?php
$admin=$_GET['admin'];
$user=$_GET['user'];
$pass=$_GET['pass'];
$name=$_GET['name'];
$money=$_GET['money'];
$mini=$_GET['mini'];
$max=$_GET['max'];
$id=$_GET['id'];
$time=$_GET['time'];
require 'test_test.php';
if(file_exists('userss/'.$admin.'/admin/set/vipcooling')){
$coolingtime=file_get_contents('userss/'.$admin.'/admin/set/vipcooling');
}else{$coolingtime='3600';}
if(file_exists('userfrozen/'.$admin.'-'.$user.'-vipcooling')){
$timesss=file_get_contents('userfrozen/'.$admin.'-'.$user.'-vipcooling');
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
if($name!=''&&$money!=''&&$mini!=''&&$max!=''&&$id!=''&&$time!=''){
if(file_exists('userss/'.$admin.'/admin/data/luckvip')){
$a='['.$id.'#'.$name.'|'.$money.'||'.$mini.'|||'.$max.'||||'.$time.']';
$b=file_get_contents('userss/'.$admin.'/admin/data/luckvip');
if(strpos($b,$a)!==false){
if($money<=file_get_contents('userss/'.$admin.'/userss/'.$user.'/money')&&file_get_contents('userss/'.$admin.'/userss/'.$user.'/money')>=$money){
$moneys=file_get_contents('userss/'.$admin.'/userss/'.$user.'/money')-$money;
if($moneys>=0&&is_numeric($moneys)){
file_put_contents('userss/'.$admin.'/userss/'.$user.'/money',$moneys);

if(file_get_contents('userss/'.$admin.'/userss/'.$user.'/viptime')>time()){$userviptime=file_get_contents('userss/'.$admin.'/userss/'.$user.'/viptime');}else{$userviptime=time();}
$luckvip=rand($mini,$max);
$viptime=strtotime($luckvip.$time,$userviptime);
file_put_contents('userss/'.$admin.'/userss/'.$user.'/viptime',$viptime);
$time=str_replace('day','天',$time);
$time=str_replace('month','月',$time);
$time=str_replace('year','年',$time);
file_put_contents('userfrozen/'.$admin.'-'.$user.'-vipcooling',time());
echo '抽奖完毕，获得'.$luckvip.$time.'会员时间';
}else{echo '运算出错，请重试';}
}else{echo '金币不足，无法抽奖';}
}else{echo '商品不存在';}
}else{echo '后台无抽奖商品';}
}else{echo '请输入完整';}
}else{echo '密码错误';}
}else{echo '账号不存在';}
}else{echo '后台账号不存在';}
}else{echo '抽奖冷却，请'.$timesss.$date.'后重试';}
//格式:[ID#商品名|抽奖花费||最小奖励|||最大奖励||||时间单位]
?>