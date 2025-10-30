<?php
$admin = isset($_GET['admin']) ? $_GET['admin'] : null;
$pass = isset($_GET['pass']) ? $_GET['pass'] : null;
require 'test_test.php';
if($admin == null || $pass == null){die('参数不完整');}
if(!is_dir('./userss/'.$admin)){die('后台账号不存在');}
if(!$pass == file_get_contents('./userss/'.$admin.'/admin/passprotect556')){dir('后台密码错误');}
if(file_get_contents('./userss/'.$admin.'/admin/viptime') < time()){die('后台账号过期，无法操作');}
if(file_exists('./userss/'.$admin.'/admin/set/notpasswords')){
    unlink('./userss/'.$admin.'/admin/set/notpasswords');
    die('设置成功:已允许');
}else{
    file_put_contents('./userss/'.$admin.'/admin/set/notpasswords','true');
    die('设置成功:已禁止');
}