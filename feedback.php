<?php
$user=$_GET["user"];
$users=$_GET['users'];
$title=$_GET["title"];
$content=$_GET["content"];
require 'test_test.php';
if(strlen($content)<=3000){
if(file_exists("userss/".$user."/admin/set/feedbacktrue")){
if(file_get_contents("userss/".$user."/admin/set/feedbacktrue")=="否"){
$feedbacktrue="否";
}else{
$feedbacktrue="是";
}
}else{
$feedbacktrue="是";
}


if(file_exists('adminfrozen/'.$user)){
$timesss=file_get_contents('adminfrozen/'.$user);
if($timesss>time()-3){
$frozen='true';
$timesss=$timesss-time()+3;//剩余多久可操作
}else{$frozen=='false';}
}else{$frozen=='false';}

if($frozen!='true'){
//获取是否开启注册
if($feedbacktrue=='是'){
if(is_dir("userss/".$user)&&$user!=""){
if(is_dir('userss/'.$user.'/userss/'.$users)||$users==''){
if($title!=""&&$content!=""){
if(strpos($title,"[")===false&&strpos($content,"[")===false&&strpos($title,"]")===false&&strpos($content,"]")===false&&strpos($title,"#")===false){
if($_GET['users']==''){
$users='';
}else{$users='||'.$users;}
if(file_exists("userss/".$user."/admin/data/feedback")){
$filecontent="[".rand(1000,9999)."#".$title."|".$content.$users."]".file_get_contents("userss/".$user."/admin/data/feedback");
}else{
$filecontent="[".rand(1000,9999)."#".$title."|".$content.$users."]";
}
//格式:[1000#标题|内容||用户]
file_put_contents("userss/".$user."/admin/data/feedback",$filecontent);
file_put_contents('adminfrozen/'.$user,time());
echo "反馈成功";
}else{echo "标题或内容包含禁符";}
}else{echo "请输入完整";}
}else{echo '用户账号不存在';}
}else{echo "后台账号不存在";}
}else{echo '后台已关闭反馈功能';}
}else{echo '操作频繁，请'.$timesss.'秒后重试';}
}else{echo '反馈内容不可超过3000字符';}
?>