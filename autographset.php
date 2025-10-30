<?php
$admin=$_GET['admin'];
$user=$_GET['user'];
$pass=$_GET['pass'];
$autograph=$_GET['autograph'];
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
if(is_dir('userss/'.$admin)&&$admin!=''){
if(is_dir('userss/'.$admin.'/userss/'.$user)&&$user!=''){
if(file_get_contents('userss/'.$admin.'/userss/'.$user.'/passprotect556')==$pass){
    include 'logintrue.php';
if($autograph!=''){
if(strlen($autograph)<=300){
file_put_contents('userss/'.$admin.'/userss/'.$user.'/autograph',$autograph);
echo '设置成功';
}else{echo '签名内容请不要超过300字符';}
}else{echo '请输入签名';}
}else{echo '密码错误';}
}else{echo '用户账号不存在';}
}else{echo '后台账号不存在';}
}else{echo "设置失败，账号封禁至".date('Y-m-d H:i',$sealtime);}
?>