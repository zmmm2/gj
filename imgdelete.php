<?php
$user=$_GET['user'];
$pass=$_GET['pass'];
$img=$_GET['img'];
require 'test_test.php';
if($user!=""&&is_dir("userss/".$user)){
if($pass==file_get_contents("userss/".$user."/admin/passprotect556")){
if($img=='icon'||$img=='img1'||$img=='img2'){

if($img=='icon'){
if(file_exists('userss/'.$user.'/page/icon.png')){
unlink('userss/'.$user.'/page/icon.png');
echo '删除成功';
}else{echo '还未上传图标';}
}

if($img=='img1'){
if(file_exists('userss/'.$user.'/page/1.jpg')){
unlink('userss/'.$user.'/page/1.jpg');
echo '删除成功';
}else{echo '还未上传介绍图1';}
}

if($img=='img2'){
if(file_exists('userss/'.$user.'/page/2.jpg')){
unlink('userss/'.$user.'/page/2.jpg');
echo '删除成功';
}else{echo '还未上传介绍图2';}
}

}else{echo '删除图片错误';}
}else{echo '后台密码错误';}
}else{echo '后台账号不存在';}
?>