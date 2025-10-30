<?php 
$user=$_GET['user'];
$pass=$_GET['pass'];
$num=$_GET['num'];
require 'test_test.php';
if(is_dir('userss/'.$user)&&$user!=''){
    if($pass==file_get_contents('userss/'.$user.'/admin/passprotect556')){
        if($num!=''){
            if($num>=1&&$num<=10){
                $num=number_format($num,2);
                file_put_contents('userss/'.$user.'/admin/set/vipmoney',$num);
                echo '设置成功';
            }else{echo '倍数需在1.00-10.00之间';}
        }else{echo '请输入倍数';}
    }else{echo '后台密码错误';}
}else{echo '后台账号不存在';}
?>