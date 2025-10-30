<?php
$admin=$_GET['admin'];
$user=$_GET['user'];
$pass=$_GET['pass'];
$user2=$_GET['user2'];
require 'test_test.php';
$sealroute="userss/".$admin."/userss/".$user."/seal";
$seal='true';
if(file_exists($sealroute)){
$sealtime=file_get_contents($sealroute);
if($sealtime>=time()){
$seal='false';
}
}
if($seal=='true'){
if(is_dir('userss/'.$admin)&&$user!=''){
    if(is_dir('userss/'.$admin.'/userss/'.$user)&&$user!=''){
        if(is_dir('userss/'.$admin.'/userss/'.$user2)&&$user2!=''){
            if($user!==$user2){
            if($pass==file_get_contents('userss/'.$admin.'/userss/'.$user.'/passprotect556')){
                include 'logintrue.php';
                if(file_exists('userss/'.$admin.'/userss/'.$user2.'/praiselist')){
                $content=file_get_contents('userss/'.$admin.'/userss/'.$user2.'/praiselist');
                }else{$content='';}
                if(file_exists('userss/'.$admin.'/userss/'.$user2.'/praisenum')){
                $praisenum=file_get_contents('userss/'.$admin.'/userss/'.$user2.'/praisenum');
                }else{$praisenum=0;}
                if(strpos($content,'['.$user.']')===false){
                file_put_contents('userss/'.$admin.'/userss/'.$user2.'/praiselist','['.$user.']'.$content);
                file_put_contents('userss/'.$admin.'/userss/'.$user2.'/praisenum',$praisenum+1);
                echo '点赞成功';
                }else{echo '你已经对该用户点赞过了';}
            }else{echo '密码错误';}
            }else{echo '不能给自己点赞哦';}
        }else{echo '对方账号不存在';}
    }else{echo '用户账号不存在';}
}else{echo '后台账号不存在';}
}else{echo "点赞失败，账号封禁至".date('Y-m-d H:i',$sealtime);}
?>