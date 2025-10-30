<?php
$user=$_GET["user"];
$title=$_GET["title"];
$content=$_GET["content"];
$pass=$_GET["pass"];
require 'test_test.php';

if(file_exists('adminfrozen/'.$user)){
$timesss=file_get_contents('adminfrozen/'.$user);
if($timesss>time()-10){
$frozen='true';
$timesss=$timesss-time()+10;//剩余多久可操作
}else{$frozen=='false';}
}else{$frozen=='false';}

if($frozen!='true'){
if(strlen($notice)<=3000&&strlen($title)<=300){
if(file_exists("userss/".$user)&&$user!=""){
if($pass==file_get_contents("userss/".$user."/admin/passprotect556")){
if(file_get_contents("userss/".$user."/admin/viptime")>time()){
if($title!=""||$content!=""){
if(strpos($title,"[")===false&&strpos($content,"[")===false&&strpos($title,"]")===false&&strpos($content,"]")===false&&strpos($title,"#")===false&&strpos($title,"|")===false&&strpos($content,"|")===false){
if(file_exists("userss/".$user."/admin/data/notices")){
$filecontent="[".rand(1000,9999)."#".$title."|".$content."]".file_get_contents("userss/".$user."/admin/data/notices");
}else{
$filecontent="[".rand(1000,9999)."#".$title."|".$content."]";
}
//格式:[1000#标题|内容]
file_put_contents("userss/".$user."/admin/data/notices",$filecontent);
file_put_contents('adminfrozen/'.$user,time());
echo "发布成功";
}else{echo "标题或内容包含禁符";}
}else{echo "请输入完整";}
}else{echo "后台账号过期，无法操作";}
}else{echo "后台密码错误";}
}else{echo "后台账号不存在";}
}else{echo '标题或内容达上限';}
}else{echo '频繁操作，请'.$timesss.'秒后重试';}
?>