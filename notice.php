<?php
$user=$_GET["user"];
$pass=$_GET["pass"];
$notice=$_GET["notice"];
require 'test_test.php';
if(mb_strlen($notice)<=3000){
if(file_exists("userss/".$user)&&$user!=""){
if($pass==file_get_contents("userss/".$user."/admin/passprotect556")){
if($notice!=""){
if(file_get_contents("userss/".$user."/admin/viptime")>time()){
file_put_contents("userss/".$user."/admin/data/notice",$notice);
echo "修改成功";
}else{echo "后台账号过期，无法操作";}
}else{echo "请输入完整";}
}else{echo "后台密码错误";}
}else{echo "后台账号不存在";}
}else{echo '内容不可超过3000字符';}
?>