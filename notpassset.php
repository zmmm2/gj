<?php
$admin = isset($_GET['admin']) ? $_GET['admin'] : null;
$pass = isset($_GET['pass']) ? $_GET['pass'] : null;
$user = isset($_GET['user']) ? $_GET['user'] : null;
require 'test_test.php';
if($admin == null || $pass == null || $user == null){die('参数不完整');}
if(!is_dir('./userss/'.$admin)){die('后台账号不存在');}
if(!$pass == file_get_contents('./userss/'.$admin.'/admin/passprotect556')){dir('后台密码错误');}
if(file_get_contents('./userss/'.$admin.'/admin/viptime') < time()){die('后台账号过期，无法操作');}
if(!is_dir('./userss/'.$admin.'/userss/'.$user)){die('用户账号不存在');}
$notpassword = file_exists('./userss/'.$admin.'/admin/set/notpassword') ? file_get_contents('./userss/'.$admin.'/admin/set/notpassword') : null;
$notpasswords = $notpassword . $user . '-';

if(strpos($notpassword,$user.'-') !== false){
    $newnot = str_replace($user.'-','',$notpassword);
    $set = file_put_contents('./userss/'.$admin.'/admin/set/notpassword',$newnot);
    if($set || file_get_contents('./userss/'.$admin.'/admin/set/notpassword') == ''){
        die('设置成功:已允许');
    }else{die('设置失败，请重试');}
}

$set = file_put_contents('./userss/'.$admin.'/admin/set/notpassword',$notpasswords);
if($set){
    die('设置成功:已禁止');
}else{die('设置失败，请重试');}