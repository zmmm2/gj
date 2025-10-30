<?php
$admin=$_GET['admin'];
require 'test_test.php';
if(is_dir('userss/'.$admin)&&$admin!=''){
if(file_exists('userss/'.$admin.'/forum/forum')){
if(file_get_contents('userss/'.$admin.'/forum/forum')!=''){
echo file_get_contents('userss/'.$admin.'/forum/forum');
}else{echo '后台无任何帖子';}
}else{echo '后台无任何帖子';}
}else{echo '后台账号不存在';}
?>