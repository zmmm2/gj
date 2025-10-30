﻿<?php
$admin=$_GET["admin"];
$pass=$_GET["pass"];
$user=$_GET["user"];
require 'test_test.php';
if(is_dir('userss/'.$admin)&&$admin!=''){
if($pass==file_get_contents('userss/'.$admin.'/userss/'.$user.'/passprotect556')){
if(is_dir('userss/'.$admin.'/userss/'.$user)&&$user!=''){
if(file_exists('userss/'.$admin.'/userss/'.$user.'/newscontents')){
if(file_get_contents('userss/'.$admin.'/userss/'.$user.'/newscontents')!=''){
echo file_get_contents('userss/'.$admin.'/userss/'.$user.'/newscontents');
}else{echo '暂无私信';}
}else{echo '暂无私信';}
}else{echo '用户不存在';}
}else{echo '密码错误';}
}else{echo "后台账号不存在";}
?>