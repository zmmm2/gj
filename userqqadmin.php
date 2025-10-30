<?php
$admin=$_GET['admin'];
$user=$_GET['user'];
$pass=$_GET['pass'];
$QQ=$_GET['QQ'];
require 'test_test.php';
if(is_dir('userss/'.$admin)&&$admin!=''){
if(is_dir('userss/'.$admin.'/userss/'.$user)&&$user!=''){
if(file_get_contents('userss/'.$admin.'/admin/passprotect556')==$pass){
if(strlen($QQ)<=10&&strlen($QQ)>=5&&is_numeric($QQ)&&$QQ!=''){
file_put_contents('userss/'.$admin.'/userss/'.$user.'/QQ',$QQ);
if(file_get_contents('userss/'.$admin.'/admin/viptime')>time()){
echo '绑定成功';
}else{echo '后台账号过期，无法操作';}
}else{echo '请输入正确的QQ';}
}else{echo '后台密码错误';}
}else{echo '用户账号不存在';}
}else{echo '后台账号不存在';}
?>