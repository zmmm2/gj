<?php
$admin=$_GET['admin'];
$user=$_GET['user'];
$user2=$_GET['user2'];
$pass=$_GET['pass'];
require 'test_test.php';
if(is_dir('userss/'.$admin)&&$admin!=''){
if(is_dir('userss/'.$admin.'/userss/'.$user)&&$user!=''){
if($pass==file_get_contents('userss/'.$admin.'/userss/'.$user.'/passprotect556')){
    include 'logintrue.php';
if(file_exists('chat/'.$admin.'-'.$user.'-'.$user2)||file_exists('chat/'.$admin.'-'.$user2.'-'.$user)){
if(file_exists('chat/'.$admin.'-'.$user.'-'.$user2)){
unlink('chat/'.$admin.'-'.$user.'-'.$user2);
}
if(file_exists('chat/'.$admin.'-'.$user2.'-'.$user)){
unlink('chat/'.$admin.'-'.$user2.'-'.$user);
}
echo '删除成功';
}else{echo '消息记录不存在';}
}else{echo '密码错误';}
}else{echo '账号不存在';}
}else{echo '后台账号不存在';}
?>