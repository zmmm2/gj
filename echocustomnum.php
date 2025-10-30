<?php
$admin=$_GET['admin'];
$id=$_GET['id'];
require 'test_test.php';
if(is_dir('userss/'.$admin)&&$admin!=''){
	if(file_exists('userss/'.$admin.'/admin/data/customshop-'.$id)&&$id!=''){
		echo file_get_contents('userss/'.$admin.'/admin/data/customshop-'.$id);
	}else{echo '商品ID不存在';}
}else{echo '后台账号不存在';}
?>