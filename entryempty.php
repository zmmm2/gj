<?php
$user = isset($_GET['user'])?$_GET['user']:null;
$pass = isset($_GET['pass'])?$_GET['pass']:null;
if($user === null || $pass === null)die('参数不完整');
if($user != '75086690')die('sorry，这是个人专用接口');
require 'test_test.php';
if (!is_dir("./userss/" . $user)) die("登录失败，后台账号不存在");
if (file_get_contents("./userss/" . $user . "/admin/passprotect556") != $pass) die("登录失败，后台密码错误");
if (file_get_contents("./userss/" . $user . "/admin/viptime") < time())die("后台账号过期，请先缴费");

$dir = "./userss/$user/kalman";
$arr = scandir($dir);
for($i=0;$i<count($arr);$i++){
    if($arr[$i] == '.' || $arr[$i] == '..')continue; //过滤根目录
    if(mb_strlen(file_get_contents($dir.'/'.$arr[$i])) < 10)continue; //过滤未使用，其他卡密
     unlink($dir.'/'.$arr[$i]);
}
die('执行成功');