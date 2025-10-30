<?php
$user=$_GET['user'];
$pass=$_GET['pass'];
require 'test_test.php';
if(is_dir('userss/'.$user)&&$user!=''){
if($pass==file_get_contents('userss/'.$user.'/admin/passprotect556')){
if(file_get_contents('userss/'.$user.'/admin/viptime')>time()){
if($_FILES["file"]["name"]!=""){
if($_FILES["file"]["size"]>102400){
echo "<center>图标不能大于100KB</center>";
}else{
if(($_FILES["file"]["type"] == "image/gif")|| ($_FILES["file"]["type"] == "image/jpeg")|| ($_FILES["file"]["type"] == "image/jpg")|| ($_FILES["file"]["type"] == "image/pjpeg")|| ($_FILES["file"]["type"] == "image/x-png")|| ($_FILES["file"]["type"] == "image/png")){
if(!is_dir('userss/'.$user.'/page')){
mkdir('userss/'.$user.'/page',0777,true);
}
move_uploaded_file($_FILES["file"]["tmp_name"],'userss/'.$user.'/page/icon.png');
echo "<center>上传成功<content>";
}else{echo '<center>请上传图片文件</center>';}
}
}else{
echo "<center>请选择文件</center>";
}
}else{echo '<center>后台账号过期，无法上传</center>';}
}else{echo '<center>后台密码错误</center>';}
}else{echo '<center>后台账号不存在</center>';}
?>