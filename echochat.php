<?php
$admin=$_GET['admin'];
$user=$_GET['user'];//自己账号
$user2=$_GET['user2'];//别人账号
require 'test_test.php';
if(is_dir('userss/'.$admin)&&$admin!=''){
if(is_dir('userss/'.$admin.'/userss/'.$user)&&$user!=''){
if(is_dir('userss/'.$admin.'/userss/'.$user2)&&$user2!=''){
if($user!=$user2){
if(file_exists('chat/'.$admin.'-'.$user.'-'.$user2)||file_exists('chat/'.$admin.'-'.$user2.'-'.$user)){

if(file_exists('chat/'.$admin.'-'.$user.'-'.$user2)){
echo file_get_contents('chat/'.$admin.'-'.$user.'-'.$user2);
}else{
echo file_get_contents('chat/'.$admin.'-'.$user2.'-'.$user);
}

}else{echo '暂无聊天记录';}
}else{echo '请不要和自己对话';}
}else{echo '对方账号不存在';}
}else{echo '发言账号不存在';}
}else{echo '后台账号不存在';}
//文件格式:123456-1234567
//发言格式:[123456|内容||时间]
?>