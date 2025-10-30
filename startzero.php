<?php
$user=$_GET['user'];
$pass=$_GET['pass'];
require 'test_test.php';
if(is_dir('userss/'.$user)&&$user!=''){
    if($pass==file_get_contents('userss/'.$user.'/admin/passprotect556')){
        file_put_contents('userss/'.$user.'/admin/data/startnum',0);
        echo '清零成功';
    }else{echo '后台密码错误';}
}else{echo '后台账号不存在';}
?>