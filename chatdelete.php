<?php
$admin=$_GET["admin"];
$user=$_GET["user"];
$pass=$_GET["pass"];
$name=$_GET["name"];
$content=$_GET["content"];
$time=$_GET["time"];
$id=$_GET["id"];
require 'test_test.php';
if(file_exists("userss/".$admin)&&$admin!=""){
if($pass==file_get_contents("userss/".$admin."/admin/passprotect556")){
if(file_exists("userss/".$admin."/admin/data/chat")){
if(strpos(file_get_contents("userss/".$admin."/admin/data/chat"),"[".$id."#".$name."|".$content."||".$time."]")!==false){
$chat=str_replace("[".$id."#".$name."|".$content."||".$time."]","",file_get_contents("userss/".$admin."/admin/data/chat"));
file_put_contents("userss/".$admin."/admin/data/chat",$chat);
echo "删除成功";
}else{echo "消息记录不存在";}
}else{echo "暂无聊天数据";}
}else{echo "后台密码错误";}
}else{echo "后台账号不存在";}
?>