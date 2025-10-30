<?php
$admin=$_GET['admin'];
$imei=$_GET['imei'];
require 'test_test.php';
if(is_dir('userss/'.$admin)&&$admin!=''){
    if(file_exists('userss/'.$admin.'/imei/'.$imei)){
        $imeitime=file_get_contents('userss/'.$admin.'/imei/'.$imei);
            if($imeitime<time()){
                echo '会员状态:已过期';
            }else{
                echo '会员状态:'.date('Y-m-d H:i',$imeitime);
            }
    }else{echo '会员状态:已过期';}
}else{echo '后台账号不存在';}
?>