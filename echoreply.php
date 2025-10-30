<?php
$admin=$_GET['admin'];
$user=$_GET['user'];
$pass=$_GET['pass'];
require 'test_test.php';
if(is_dir('userss/'.$admin)&&$admin!=''){
    if(is_dir('userss/'.$admin.'/userss/'.$user)&&$user!=''){
        if($pass==file_get_contents('userss/'.$admin.'/userss/'.$user.'/passprotect556')){
            if(file_exists('userss/'.$admin.'/userss/'.$user.'/replylist')){
                echo file_get_contents('userss/'.$admin.'/userss/'.$user.'/replylist');
            }else{echo '暂无问题记录';}
        }else{echo '密码错误';}
    }else{echo '账号不存在';}
}else{echo '后台账号不存在';}
?>