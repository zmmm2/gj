<?php
$user=$_GET["user"];
$pass=$_GET["pass"];
require 'test_test.php';
$userchattrue="true";
if(file_exists("userss/".$user)&&$user!=""){
if($pass==file_get_contents("userss/".$user."/admin/passprotect556")){
if(file_get_contents("userss/".$user."/admin/viptime")>time()){
if(file_exists("userss/".$user."/admin/set/userchattrue")){
if(file_get_contents("userss/".$user."/admin/set/userchattrue")=="否"){
$userchattrue="false";
//目前是关闭状态
}
}
if($userchattrue=="false"){
//改成开启
file_put_contents("userss/".$user."/admin/set/userchattrue","是");
echo "切换成功，私聊功能开启";
}
else{
//改成关闭
file_put_contents("userss/".$user."/admin/set/userchattrue","否");
echo "切换成功，私聊功能关闭";
}
}else{echo "后台账号过期，无法操作";}
}else{echo "后台密码错误";}
}else{echo "后台账号不存在";}
?>