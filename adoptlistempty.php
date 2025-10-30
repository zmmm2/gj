<?php 
$admin=$_GET['admin'];
$pass=$_GET['pass'];
require 'test_test.php';
if(is_dir('userss/'.$admin)&&$admin!=''){
    if($pass==file_get_contents('userss/'.$admin.'/admin/passprotect556')){
        if(file_exists('userss/'.$admin.'/admin/data/adoptlist')){
            unlink('userss/'.$admin.'/admin/data/adoptlist');
            echo '清空成功';
        }else{echo '暂无可清空的通过信息';}
    }else{echo '后台密码错误';}
}else{echo '后台账号不存在';}
?>
