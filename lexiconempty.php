<?php
$user=$_GET['user'];
$pass=$_GET['pass'];
require 'test_test.php';
if(is_dir('userss/'.$user)&&$user!=''){
    if($pass==file_get_contents('userss/'.$user.'/admin/passprotect556')){
        if(file_exists('userss/'.$user.'/admin/data/thesaurus')){
            unlink('userss/'.$user.'/admin/data/thesaurus');
            echo '清空成功';
        }else{echo '暂无可清空问答';}
    }else{echo '后台密码错误';}
}else{echo '后台账号不存在';}
?>
