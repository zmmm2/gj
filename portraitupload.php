<?php
$admin=$_GET['admin'];
$user=$_GET['user'];
$pass=$_GET['pass'];
require 'test_test.php';
if(is_dir('userss/'.$admin)&&$admin!=''){
if(is_dir('userss/'.$admin.'/userss/'.$user)&&$user!=''){
if($pass==file_get_contents('userss/'.$admin.'/userss/'.$user.'/passprotect556')){
if(file_get_contents('userss/'.$admin.'/admin/viptime')>time()){
if($_FILES["file"]["name"]!=""){
if($_FILES["file"]["size"]>201800){
echo "<center>头像不能大于200KB</center>";
}else{
$filename= substr(strrchr($_FILES['file']['name'], '.'), 1);
if($filename=='jpg'||$filename=='png'){
if(!is_dir('userss/'.$admin.'/portrait')){
mkdir('userss/'.$admin.'/portrait',0777,true);
}
move_uploaded_file($_FILES["file"]["tmp_name"],'userss/'.$admin.'/portrait/'.$user.'.png');
echo "<center>上传成功</center>";
}else{echo '<center>请上传图片文件</center>';}
}
}else{
echo "<center>请选择文件</center>";
}
}else{echo '<center>后台账号过期，无法上传</center>'; }
}else{echo '<center>密码错误</center>';}
}else{echo '<center>用户账号不存在</center>';}
}else{echo '<center>后台账号不存在</center>';}
?>