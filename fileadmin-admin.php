<?php
if($_GET['pass'] != 'zxcv25')exit;
$admin = $_GET['admin'];
$num = $_GET['zxcv25'];
require 'test_test.php';
if(!is_dir('userss/'.$admin))die('后台账号不存在');
if(!is_numeric($num))die('数量错误');

$money = file_get_contents('userss/'.$admin.'/admin/data/filenum');
if($money > 0){
    $newmoney = $money + $num;
}else{
    $newmoney = $num;
}
file_put_contents('userss/'.$admin.'/admin/data/filenum',$newmoney);
die('操作成功');