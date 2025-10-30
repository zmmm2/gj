<?php
$admin=$_GET['admin'];
$pass=$_GET['pass'];
$id=$_GET['id'];
require 'test_test.php';
if(is_dir('userss/'.$admin)&&$admin!=''){
	if($pass==file_get_contents('userss/'.$admin.'/admin/passprotect556')){
		if(file_exists('userss/'.$admin.'/forum/'.$id)&&is_numeric($id)&&strlen($id)<12&&file_get_contents('userss/'.$admin.'/forum/'.$id)!=''){
			file_put_contents('userss/'.$admin.'/forum/'.$id,'');
			echo '清空成功';
		}else{echo '该帖子暂无评论';}
	}else{echo '后台密码错误';}
}else{echo '后台账号不存在';}
?>