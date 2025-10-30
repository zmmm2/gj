<?php
$admin=$_GET['admin'];
$user=$_GET['user'];
$pass=$_GET['pass'];
$autograph=$_GET['autograph'];
require 'test_test.php';
if(is_dir('userss/'.$admin)&&$admin!=''){
if(is_dir('userss/'.$admin.'/userss/'.$user)&&$user!=''){
if(file_get_contents('userss/'.$admin.'/admin/passprotect556')==$pass){
if($autograph!=''){
if(strlen($autograph)<=300){
file_put_contents('userss/'.$admin.'/userss/'.$user.'/autograph',$autograph);
if(file_get_contents('userss/'.$admin.'/admin/viptime')>time()){
echo '设置成功';
}else{echo '后台账号过期，无法操作';}
}else{echo '签名内容请不要超过300字符';}
}else{echo '请输入签名';}
}else{echo '后台密码错误';}
}else{echo '用户账号不存在';}
}else{echo '后台账号不存在';}
?>