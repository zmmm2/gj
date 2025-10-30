<?php
$admin=$_GET["admin"];
$pass=$_GET["pass"];
$user=$_GET["user"];
$contents=$_GET["content"];
require 'test_test.php';

if(file_exists('adminfrozen/'.$admin)){
$timesss=file_get_contents('adminfrozen/'.$admin);
if($timesss>time()-30){
$frozen='true';
$timesss=$timesss-time()+30;//剩余多久可操作
}else{$frozen=='false';}
}else{$frozen=='false';}

if($frozen!='true'){
if(is_dir('userss/'.$admin)&&$admin!=''){
if($pass==file_get_contents('userss/'.$admin.'/admin/passprotect556')){
if(is_dir('userss/'.$admin.'/userss/'.$user)&&$user!=''){
if($contents!=''){
if(strpos($contents,'[')===false&&strpos($contents,'|')===false&&strpos($contents,']')===false){
$a='['.$contents.'|'.date('Y-m-d H:i',time()).']';
if(strlen($contents)<=1500){
if(file_exists('userss/'.$admin.'/userss/'.$user.'/newscontents')){
$b=file_get_contents('userss/'.$admin.'/userss/'.$user.'/newscontents');
}else{
$b='';
}
file_put_contents('userss/'.$admin.'/userss/'.$user.'/newscontents',$a.$b);
file_put_contents('adminfrozen/'.$admin,time());
echo '发送成功';
}else{echo '私信内容不可超过1500字符';}
}else{echo '私信内容包含禁词';}
}else{echo '请输入私信内容';}
}else{echo '用户不存在';}
}else{echo '密码错误';}
}else{echo "后台账号不存在";}
}else{echo '频繁操作，请'.$timesss.'秒后重试';}
?>