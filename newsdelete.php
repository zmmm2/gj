<?php
$admin=$_GET["admin"];
$pass=$_GET["pass"];
$user=$_GET["user"];
require 'test_test.php';
if(is_dir('userss/'.$admin)&&$admin!=""){
if($pass==file_get_contents('userss/'.$admin.'/admin/passprotect556')){
if(is_dir('userss/'.$admin.'/userss/'.$user)&&$user!=''){
if(file_exists('userss/'.$admin.'/userss/'.$user.'/newscontents')){
unlink('userss/'.$admin.'/userss/'.$user.'/newscontents');
echo '清空成功';
}else{echo '暂无可清理的私信';}
}else{echo '账号不存在';}
}else{echo '密码错误';}
}else{echo "后台账号不存在";}
?>