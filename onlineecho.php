<?php
$mods=$_GET['mods'];
$admin=$_GET['admin'];
$user=$_GET['user'];
$pass=$_GET['pass'];
require 'test_test.php';
if($mods=='admin'){
if(is_dir('userss/'.$admin)&&$admin!=''){
    if($pass==file_get_contents('userss/'.$admin.'/admin/passprotect556')){
        if(file_exists('onlines/'.$admin.'-'.$user)&&$user!=''){
            echo file_get_contents('onlines/'.$admin.'-'.$user);
        }else{echo '未查找到记录';}
    }else{echo '后台密码错误';}
}else{echo '后台账号不存在';}
}else{
    if(is_dir('userss/'.$admin)&&$admin!=''){
    if($pass==file_get_contents('userss/'.$admin.'/userss/'.$user.'/passprotect556')){
        if(file_exists('onlines/'.$admin.'-'.$user)&&$user!=''){
            echo file_get_contents('onlines/'.$admin.'-'.$user);
        }else{echo '暂无咨询记录';}
    }else{echo '密码错误';}
}else{echo '后台账号不存在';}
}
?>