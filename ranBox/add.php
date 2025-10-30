<?php
$admin = isset($_GET['admin'])?$_GET['admin']:null;
$pwd = isset($_GET['pwd'])?$_GET['pwd']:null;
$user = isset($_GET['user'])?$_GET['user']:null;
$sex = isset($_GET['sex'])?$_GET['sex']:null;
$name = isset($_GET['name'])?$_GET['name']:null;
$portrait = isset($_GET['portrait'])?$_GET['portrait']:null;
$introduce = isset($_GET['introduce'])?$_GET['introduce']:null;
$contact = isset($_GET['contact'])?$_GET['contact']:null;

$num = 100; //写入花费

if(strpos($admin,'/') !== false)die('后台账号不存在');
if($admin == null || $pwd == null || $user == null || $sex == null || $name == null || $portrait == null || $introduce == null || $contact == null)die('参数不完整');
if($admin == "appdoc")die("测试账号永久关闭");
if (!is_dir("../userss/" . $admin))die("后台账号不存在");
if (file_get_contents("../userss/" . $admin . "/admin/viptime") < time())die("后台账号过期，请先缴费");
if (!is_dir("../userss/" . $admin . "/userss/" . $user))die("账号不存在");
if (file_get_contents("../userss/" . $admin . "/userss/" . $user ."/passprotect556") != $pwd) die("密码错误");
if($sex != "0" && $sex != "1")die("性别选择错误啦");
if(!preg_match("/^[\x{4e00}-\x{9fa5}]{1,8}$/u",$name))die("姓名格式错误");
if(!preg_match("/http[s]?:\/\/[\w\/.]{3,100}\.jpg/",$portrait))die("图片格式错误");
if(!preg_match("/[\x{4e00}-\x{9fa5}\w]/u",$contact))die("联系方式错误");
$nums = file_get_contents("../userss/" . $admin . "/userss/" . $user ."/money")-$num;
if($nums < 0)die("金币不足".$num."，写入失败啦");

$mysql_kill = ["\\",'"',"'"];
$mysql_new = ["\\\\",'\"',"\'"];
$introduce = str_ireplace($mysql_kill,$mysql_new,$introduce);
$connect = new mysqli("localhost", "appdoc", "123456", "appdoc");
if (!$connect) die('数据库连接失败，请联系站长');

$input = $connect->query("INSERT INTO `ranBox`(`admin`, `user`, `sex`, `name`, `introduce`, `portrait`, `contact`) 
VALUES ('{$admin}','{$user}','{$sex}','{$name}','{$introduce}','{$portrait}','{$contact}')");
if($input && file_put_contents("../userss/" . $admin . "/userss/" . $user ."/money",$nums)){
    die("提交成功");
}else{
    die("提交失败，请重试");
}

