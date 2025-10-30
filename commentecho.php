<?php
$admin=$_GET['admin'];
$id=$_GET['id'];
require 'test_test.php';
if(is_dir('userss/'.$admin)&&$admin!=''){
if(file_exists('userss/'.$admin.'/forum/'.$id)&&$id!=''&&is_numeric($id)){
//访问量增加
$visitnum=0;
if(file_exists('userss/'.$admin.'/forum/'.$id.'-visit')){
$visitnum=file_get_contents('userss/'.$admin.'/forum/'.$id.'-visit');	
}
if(is_numeric($visitnum)){
	$visitnums=$visitnum+1;
}else{$visitnums=1;}
file_put_contents('userss/'.$admin.'/forum/'.$id.'-visit',$visitnums);
//访问量增加
if(file_get_contents('userss/'.$admin.'/forum/'.$id)!=''){
echo file_get_contents('userss/'.$admin.'/forum/'.$id);
}else{echo '暂无评论';}
}else{echo '帖子不存在';}
}else{echo '后台账号不存在';}
?>