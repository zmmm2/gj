<?php
$user=$_GET["user"];
$pass=$_GET["pass"];
require 'test_test.php';
$commenttrue="true";
if(file_exists("userss/".$user)&&$user!=""){
if($pass==file_get_contents("userss/".$user."/admin/passprotect556")){
if(file_get_contents("userss/".$user."/admin/viptime")>time()){
if(file_exists("userss/".$user."/admin/set/commenttrue")){
if(file_get_contents("userss/".$user."/admin/set/commenttrue")=="否"){
$commenttrue="false";
//目前是关闭状态
}
}
if($commenttrue=="false"){
//改成开启
file_put_contents("userss/".$user."/admin/set/commenttrue","是");
echo "切换成功，论坛评论开启";
}
else{
//改成关闭
file_put_contents("userss/".$user."/admin/set/commenttrue","否");
echo "切换成功，论坛评论关闭";
}
}else{echo "后台账号过期，无法操作";}
}else{echo "后台密码错误";}
}else{echo "后台账号不存在";}
?>