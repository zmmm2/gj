<?php
function exitx($value,$user){
    setcookie("user","",time()-30*86400);
    setcookie("pwd","",time()-30*86400);
    $url = './login.html';
    if($value == "后台账号过期，请先缴费")$url = './pay.php?user='.$user;
    exit("<script>alert('$value'); window.location.replace('$url');</script>");
}
$user = isset($_COOKIE["user"])?$_COOKIE["user"]:null;
$pwd = isset($_COOKIE["pwd"])?$_COOKIE["pwd"]:null;
require '../test_test.php';
if($user === null || $pwd === null)exitx("请先登录");
if(!is_dir("../userss/".$user))exitx("身份验证失败，请重新登录");
if(file_get_contents("../userss/".$user."/admin/passprotect556") != $pwd)exitx("身份验证失败，请重新登录");
if(file_get_contents("../userss/".$user."/admin/viptime") < time())exitx("后台账号过期，请先缴费",$user);