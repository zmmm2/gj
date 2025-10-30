<?php
$admin=$_GET["admin"];
$user=$_GET["user"];
$pass=$_GET["pass"];
require 'test_test.php';
if(is_dir("userss/".$admin)&&$admin!=""){
if($pass==file_get_contents("userss/".$admin."/admin/passprotect556")){
if(file_get_contents("userss/".$admin."/admin/viptime")>time()){
if(is_dir('userss/'.$admin.'/userss/'.$user)&&$user!=''){
if(file_exists('userss/'.$admin.'/admin/data/moderator')){
$a=file_get_contents('userss/'.$admin.'/admin/data/moderator');
}else{$a='';}
if(strpos($a,$user.'|')===false){
file_put_contents('userss/'.$admin.'/admin/data/moderator',$user.'|'.$a);
echo '添加版主成功';
}else{echo '该账号已经是版主';}
}else{echo '账号不存在';}
}else{echo '后台账号过期，无法操作';}
}else{echo '密码错误';}
}else{echo '后台账号不存在';}
?>