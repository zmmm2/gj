<?php 
$user=$_GET['user'];
$pass=$_GET['pass'];
$imei=$_GET['imei'];
require 'test_test.php';
if(is_dir('userss/'.$user)&&$user!=''){
    if($pass==file_get_contents('userss/'.$user.'/admin/passprotect556')){
        if(preg_match("/^([0-9]|[a-z]){8,20}$/i",$imei)){
            if(!file_exists('userss/'.$user.'/imei/'.$imei)){
                if(!is_dir('userss/'.$admin.'/imei')){
                    mkdir('userss/'.$admin.'/imei',0777,true);
                }
                file_put_contents('userss/'.$user.'/imei/'.$imei,time()-1);
                echo '添加成功';
            }else{echo 'IMEI已经存在，无法添加';}
        }else{echo 'IMEI格式错误';}
    }else{echo '后台密码错误';}
}else{echo '后台账号不存在';}
?>