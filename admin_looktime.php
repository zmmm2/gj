<?php
/*
$admin = $_GET['admin'];
$pwd= $_GET['pwd'];
require 'test_test.php';
if($admin == '' || $pwd != '789456')exit;
if(file_exists('userss/'.$admin.'/admin/viptime')){
$con = filemtime('userss/'.$admin.'/admin/viptime');
}else{$con = '000';}
echo date('Y-m-d H:i',$con);
exit;