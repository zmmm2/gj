<?php
$admin=$_GET['admin'];
$id=$_GET['id'];
require 'test_test.php';
if(is_dir('userss/'.$admin)&&$admin!=''){
if(file_exists('userss/'.$admin.'/forum/'.$id)&&$id!=''&&is_numeric($id)){
if(file_exists('userss/'.$admin.'/forum/'.$id.'-visit')){
echo file_get_contents('userss/'.$admin.'/forum/'.$id.'-visit');
}else{echo '0';}
}else{echo '帖子不存在';}
}else{echo '后台账号不存在';}
?>