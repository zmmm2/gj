<?php
$admin=$_GET['admin'];
$user=$_GET['user'];
$pass=$_GET['pass'];
require 'test_test.php';
if(is_dir('userss/'.$admin)&&$admin!=''){
    if(is_dir('userss/'.$admin.'/userss/'.$user)&&$user!=''){
    if($pass==file_get_contents('userss/'.$admin.'/userss/'.$user.'/passprotect556')){
        include 'logintrue.php';
        if(file_exists('userss/'.$admin.'/userss/'.$user.'/replylist')){
            unlink('userss/'.$admin.'/userss/'.$user.'/replylist');
            echo '清空成功';
        }else{echo '暂无可清空记录';}
    }else{echo '密码错误';}
    }else{echo '账号不存在';}
}else{echo '后台账号不存在';}
?>
