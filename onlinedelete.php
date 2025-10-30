<?php
$admin=$_GET['admin'];
$user=$_GET['user'];
$pass=$_GET['pass'];
require 'test_test.php';
if(is_dir('userss/'.$admin)&&$admin!=''){
    if($pass==file_get_contents('userss/'.$admin.'/admin/passprotect556')){
        if(file_exists('onlines/'.$admin.'-'.$user)&&$user!=''){
            unlink('onlines/'.$admin.'-'.$user);
            echo '清除成功';
        }else{echo '暂无可清除记录';}
    }else{echo '后台密码错误';}
}else{echo '后台账号不存在';}
?>