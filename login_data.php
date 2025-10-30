<?php
$user = isset($_GET['user'])?$_GET['user']:null;
$pass = isset($_GET['pass'])?$_GET['pass']:null;
require 'test_test.php';
if($user === null || $pass === null)die('请输入完整');
if($user=="appdoc")die("测试账号永久关闭，因为某些人类素质太低");
if(mb_strlen($user) < 6 || mb_strlen($user) > 12)die('请输入6-12位的账号');
if(mb_strlen($pass) < 6 || mb_strlen($pass) > 12)die('请输入6-12位的密码');
if(strpos($user,'/')!==false||strpos($pass,'/')!==false)die('账号或密码格式错误');
if(!is_dir('./userss/'.$user))die('后台账号不存在,请联系QQ3399769530解锁');
if($pass != file_get_contents('./userss/'.$user.'/admin/passprotect556'))die('后台密码错误');
if(file_get_contents('./userss/'.$user.'/admin/viptime')<time())die('后台账号过期，请先缴费');

$new = file_get_contents('./admin/new');
$key = file_get_contents('./userss/'.$user.'/admin/keyprotect556');
$viptime = date('Y-m-d',file_get_contents('./userss/'.$user.'/admin/viptime'));
$money = file_exists('./userss/'.$user.'/admin/money')?file_get_contents('./userss/'.$user.'/admin/money'):'0';
$filenum = file_exists('./userss/'.$user.'/admin/data/filenum')?file_get_contents('./userss/'.$user.'/admin/data/filenum'):'0';
if(floor($money) == $money)$money= $money.'.00';

$data = [
    "login"=>"登录成功",
    "new"=>$new,
    "key"=>$key,
    "viptime"=>$viptime,
    "money"=>$money,
    "filenum"=>$filenum
];

die(json_encode($data));