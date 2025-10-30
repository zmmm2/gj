<?php
$user=$_GET["user"];
$title=$_GET["title"];
$content=$_GET["content"];
$id=$_GET["id"];
require 'test_test.php';
if(file_exists("userss/".$user)&&$user!=""){
if($title!=""||$content!=""||$id==""){
if(file_exists("userss/".$user."/admin/data/feedback")){
if(strpos(file_get_contents("userss/".$user."/admin/data/feedback"),"[".$id."#".$title."|".$content."]")!==false){
$feedback=file_get_contents("userss/".$user."/admin/data/feedback");
$feedback=str_replace("[".$id."#".$title."|".$content."]","",$feedback);
file_put_contents("userss/".$user."/admin/data/feedback",$feedback);
echo "删除成功";
}else{echo "反馈不存在";}
}else{echo "无任何反馈";}
}else{echo "请输入完整";}
}else{echo "后台账号不存在";}
?>