<?php
$user=$_GET["user"];
$pass=$_GET["pass"];
$file=$_GET["file"];
require 'test_test.php';
if(substr($file,-4)!='.txt'){
    $file=$file.'.txt';
}
if(strpos($file,"/")!==false || strpos($file,"\\")!==false)die("文件名格式错误");
$content=$_GET["content"];
if(!isset($_GET["content"]))$content = $_POST["content"];
$content=str_replace('*-*-*','&',$content);
$content=str_replace('*-|-*','#',$content);
if(strpos($content,'<html>')===false&&strpos($content,'<!DOCTYPE html>')===false&&strpos($file,'userss/')===false&&strpos($file,'.php')===false&&strpos($file,'~')===false&&strpos($file,'\\')===false&&strpos($file,'eval()')===false&&strpos($content,'eval()')===false){
if(strlen($content)<=30000){
if($content!=''){
if(file_exists("./userss/".$user)&&$user!=""){
if($pass==file_get_contents("./userss/".$user."/admin/passprotect556")){
if(file_get_contents("./userss/".$user."/admin/viptime")>time()){
if(file_exists("./userss/".$user."/file/".$file)&&$file!=""){
$contents=file_get_contents("userss/".$user."/file/".$file);//未修改前内容
file_put_contents("./userss/".$user."/file/".$file,$content);
if(file_get_contents("./userss/".$user."/file/".$file)!=$content){
echo '修改失败，请重试';
file_put_contents("./userss/".$user."/file/".$file,$contents);
}else{echo "修改成功";}
}else{echo "文档不存在";}
}else{echo "后台账号过期，无法操作";}
}else{echo "后台密码错误";}
}else{echo "后台账号不存在";}
}else{echo '请输入文档内容';}
}else{echo '文档内容不可超过30000字符';}
}else{echo '内容或文档名超出文档限制';}
?>