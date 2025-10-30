<?php
$user=$_GET["user"];
$title=$_GET["title"];
$url=$_GET["url"];
$id=$_GET["id"];
require 'test_test.php';
if(file_exists("userss/".$user)&&$user!=""){
if($title!=""||$content!=""||$id==""){
if(file_exists("userss/".$user."/admin/data/partner")){
if(strpos(file_get_contents("userss/".$user."/admin/data/partner"),"[".$id."#".$title."|".$url."]")!==false){
$partner=file_get_contents("userss/".$user."/admin/data/partner");
$partner=str_replace("[".$id."#".$title."|".$url."]","",$partner);
file_put_contents("userss/".$user."/admin/data/partner",$partner);
echo "删除成功";
}else{echo "广告不存在";}
}else{echo "无任何广告";}
}else{echo "请输入完整";}
}else{echo "后台账号不存在";}
?>