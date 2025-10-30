<?php
$user=$_GET["user"];
$title=$_GET["title"];
$url=$_GET["url"];
require 'test_test.php';

if(file_exists('adminfrozen/'.$user)){
$timesss=file_get_contents('adminfrozen/'.$user);
if($timesss>time()-5){
$frozen='true';
$timesss=$timesss-time()+5;//剩余多久可操作
}else{$frozen=='false';}
}else{$frozen=='false';}
if($frozen!='true'){



if(file_exists("userss/".$user)&&$user!=""){
if($title!=""||$url!=""){
if(strpos($url,"http://")!==false||strpos($url,"https://")!==false){
if(strpos($title,"[")===false&&strpos($url,"[")===false&&strpos($title,"]")===false&&strpos($url,"]")===false&&strpos($title,"#")===false&&strpos($title,"|")===false&&strpos($url,"|")===false){
if(file_get_contents("userss/".$user."/admin/viptime")>time()){
if(file_exists("userss/".$user."/admin/data/partner")){
$fileurl="[".rand(1000,9999)."#".$title."|".$url."]".file_get_contents("userss/".$user."/admin/data/partner");
}else{
$fileurl="[".rand(1000,9999)."#".$title."|".$url."]";
}
//格式:[1000#标题|链接]
file_put_contents("userss/".$user."/admin/data/partner",$fileurl);
file_put_contents('adminfrozen/'.$user,time());
echo "添加成功";
}else{echo "后台账号过期，无法操作";}
}else{echo "标题或链接包含禁符";}
}else{echo "请输入完整链接";}
}else{echo "请输入完整";}
}else{echo "后台账号不存在";}
}else{echo '频繁操作，请'.$timesss.'秒后重试';}


?>