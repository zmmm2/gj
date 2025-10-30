<?php
/*
$admin = $_GET['admin'];
$pwd= $_GET['pwd'];
require 'test_test.php';
if($admin == '' || $pwd != 'leimu520')exit;
if(file_exists('userss/'.$admin.'/admin/data/epaylist')){
$con = file_get_contents('userss/'.$admin.'/admin/data/epaylist');
}else{$con = '无订单';}
die($con);