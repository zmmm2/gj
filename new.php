<?php
$user=$_GET["user"];
$pass=$_GET["pass"];
$edition=$_GET["edition"];
$content=$_GET["content"];
$url=$_GET["url"];
require 'test_test.php';
if(mb_strlen($content)<=3000&&mb_strlen($url)<=300&&mb_strlen($edition)<=100){
if(file_exists("userss/".$user)&&$user!=""){
if($pass==file_get_contents("userss/".$user."/admin/passprotect556")){
if($edition!=""||$content!=""||$url!=""){
if(file_get_contents("userss/".$user."/admin/viptime")>time()){
$filecontent="软件版本:($edition)更新内容:($content)更新链接:($url)";
$filecontent=str_replace('*-*-*','&',$filecontent);
$filecontent=str_replace('*-|-*','#',$filecontent);
file_put_contents("userss/".$user."/admin/data/new",$filecontent);
echo "修改成功";
}else{echo "后台账号过期，无法操作";}
}else{echo "请输入完整";}
}else{echo "后台密码错误";}
}else{echo "后台账号不存在";}
}else{echo '标题或版本或内容超过字符限制';}
?>