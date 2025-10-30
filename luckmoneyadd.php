<?php
$user=$_GET['user'];
$pass=$_GET['pass'];
$name=$_GET['name'];
$money=$_GET['money'];
$mini=$_GET['mini'];
$max=$_GET['max'];
require 'test_test.php';

if(file_exists('adminfrozen/'.$user)){
$timesss=file_get_contents('adminfrozen/'.$user);
if($timesss>time()-3){
$frozen='true';
$timesss=$timesss-time()+3;//剩余多久可操作
}else{$frozen=='false';}
}else{$frozen=='false';}
if($frozen!='true'){

if(is_dir('userss/'.$user)&&$user!=''){
if($pass==file_get_contents('userss/'.$user.'/admin/passprotect556')){
if(file_get_contents('userss/'.$user.'/admin/viptime')>time()){
if($name!=''&&$money!=''&&$mini!=''&&$max!=''){
if(strpos($name,'[')===false&&strpos($name,']')===false&&strpos($name,'|')===false&&strpos($name,'#')===false){
if(is_numeric($money)&&is_numeric($mini)&&is_numeric($max)){
if($max>$mini){
if($money<$max){
$a='['.rand(10000,99999).'#'.$name.'|'.$money.'||'.$mini.'|||'.$max.']';
if(file_exists('userss/'.$user.'/admin/data/luckmoney')){
$b=file_get_contents('userss/'.$user.'/admin/data/luckmoney');
}else{$b=='';}
file_put_contents('userss/'.$user.'/admin/data/luckmoney',$a.$b);
file_put_contents('adminfrozen/'.$user,time());
echo '添加成功';
}else{echo '抽奖花费必须小于最大奖励';}
}else{echo '最大奖励必须大于最小奖励';}
}else{echo '请输入正确的数字参数';}
}else{echo '商品名包含禁词';}
}else{echo '请输入完整';}
}else{echo '后台账号过期，无法操作';}
}else{echo '密码错误';}
}else{echo '后台账号不存在';}
}else{echo '频繁操作，请'.$timesss.'秒后重试';}
//格式:[ID#商品名|抽奖花费||最小奖励|||最大奖励]
?>