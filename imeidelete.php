<?php
$admin=$_GET["admin"];
$pass=$_GET["pass"];
$imei=$_GET["imei"];
require 'test_test.php';
if(is_dir('userss/'.$admin)&&$admin!=''){
    if($pass==file_get_contents('userss/'.$admin.'/admin/passprotect556')){
        if(file_exists('userss/'.$admin.'/imei/'.$imei)&&$imei!=''){
            unlink('userss/'.$admin.'/imei/'.$imei);
            echo '删除成功';
        }else{echo 'IMEI不存在';}
    }else{echo '后台密码错误';}
}else{echo '后台账号不存在';}
?>