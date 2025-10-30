<?php
$user=$_GET["user"];
$pass=$_GET["pass"];
$file=$_GET["file"];
require 'test_test.php';
if(strpos($file,"/")!==false || strpos($file,"\\")!==false)die("文件名格式错误");
if(file_exists("userss/".$user)&&$user!=""){
if($pass==file_get_contents("userss/".$user."/admin/passprotect556")){
if(file_exists("./userss/".$user."/file/".$file)&&$file!=""&&strpos($file,'userss/')===false){
unlink("userss/".$user."/file/".$file);
echo "删除成功";
}else{echo "文档不存在";}
}else{echo "后台密码错误";}
}else{echo "后台账号不存在";}
?>