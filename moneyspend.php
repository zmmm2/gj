<?php
$admin=$_GET['admin'];
$user=$_GET['user'];
$pass=$_GET['pass'];
$num=$_GET['num'];
require 'test_test.php';
if(is_dir('userss/'.$admin)&&$admin!=''){
if(is_dir('userss/'.$admin.'/userss/'.$user)&&$user!=''){
if($pass==file_get_contents('userss/'.$admin.'/userss/'.$user.'/passprotect556')){
    include 'logintrue.php';
$money=file_get_contents('userss/'.$admin.'/userss/'.$user.'/money');
if($num>=1){
if(floor($num)-$num==0){
if($money-$num>=0){
file_put_contents('userss/'.$admin.'/userss/'.$user.'/money',$money-$num);
echo '扣除成功';
}else{echo '金币不足';}
}else{echo '请输入整数';}
}else{echo '请输入数量';}
}else{echo '密码错误';}
}else{echo '账号不存在';}
}else{echo '后台账号不存在';}
?>