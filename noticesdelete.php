<?php
$user=$_GET["user"];
$title=$_GET["title"];
$content=$_GET["content"];
$id=$_GET["id"];
require 'test_test.php';
if(file_exists("userss/".$user)&&$user!=""){
if($title!=""||$content!=""||$id==""){
if(file_exists("userss/".$user."/admin/data/notices")){
if(strpos(file_get_contents("userss/".$user."/admin/data/notices"),"[".$id."#".$title."|".$content."]")!==false){
$notices=file_get_contents("userss/".$user."/admin/data/notices");
$notices=str_replace("[".$id."#".$title."|".$content."]","",$notices);
file_put_contents("userss/".$user."/admin/data/notices",$notices);
echo "删除成功";
}else{echo "通知不存在";}
}else{echo "无任何通知";}
}else{echo "请输入完整";}
}else{echo "后台账号不存在";}
?>