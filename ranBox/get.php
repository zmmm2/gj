<?php
$admin = isset($_GET['admin'])?$_GET['admin']:null;
$pwd = isset($_GET['pwd'])?$_GET['pwd']:null;
$user = isset($_GET['user'])?$_GET['user']:null;
$sex = isset($_GET['sex'])?$_GET['sex']:null;

$num = 100; //抽取花费

if(strpos($admin,'/') !== false)die('后台账号不存在');
if($admin == null || $pwd == null || $user == null)die('参数不完整');
if($admin == "appdoc")die("测试账号永久关闭");
if (!is_dir("../userss/" . $admin))die("后台账号不存在");
if (file_get_contents("../userss/" . $admin . "/admin/viptime") < time())die("后台账号过期，请先缴费");
if (!is_dir("../userss/" . $admin . "/userss/" . $user))die("账号不存在");
if (file_get_contents("../userss/" . $admin . "/userss/" . $user ."/passprotect556") != $pwd) die("密码错误");
if($sex != "0" && $sex != "1")die("性别选择错误啦");
$nums = file_get_contents("../userss/" . $admin . "/userss/" . $user ."/money")-$num;
if($nums < 0)die("金币不足".$num."，抽取失败啦");

$connect = new mysqli("localhost", "appdoc", "123456", "appdoc");
if (!$connect) die('数据库连接失败，请联系站长');

$out = mysqli_fetch_assoc($connect->query("SELECT * FROM ranBox WHERE `sex` = {$sex} ORDER BY RAND() LIMIT 1"));
$del = $connect->query("DELETE FROM `ranBox` WHERE `id` = ".$out["id"]);
if($out && file_put_contents("../userss/" . $admin . "/userss/" . $user ."/money",$nums) && $del){
    echo json_encode($out);
}else{
    die("已经没盒子了");
}