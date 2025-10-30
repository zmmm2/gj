<?php
$admin=$_GET['admin'];
$user=$_GET['user'];
require 'test_test.php';
if(is_dir('userss/'.$admim)&&$admin!=''){
    if(is_dir('userss/'.$admin.'/userss/'.$user)&&$user!=''){
        if(file_exists('userss/'.$admin.'/portrait/'.$user.'.png')){
            $url='./userss/'.$admin.'/portrait/'.$user.'.png?sid='.rand(10000,99999);
        }else{
            $url='./img/user.png';
        }
header("Location:$url");
    }else{echo '用户账号不存在';}
}else{echo '后台账号不存在';}
?>