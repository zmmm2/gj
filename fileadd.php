<?php
$user=$_GET["user"];
$pass=$_GET["pass"];
$file=$_GET["file"];
require 'test_test.php';
if(strpos($file,"/")!==false || strpos($file,"\\")!==false)die("文件名格式错误");
if(file_exists("userss/".$user)&&$user!=""){
if($pass==file_get_contents("./userss/".$user."/admin/passprotect556")){
if($file!=""){
if(!preg_match("/[\x7f-\xff]/", $file)&&!strpos($file,".php")&&!strpos($file,".js")&&!strpos($file,".html")&&strpos($file,'/')===false&&strpos($file,'~')===false&&strpos($file,'\\')===false&&strpos($file,'eval()')===false){
if(strlen($file)<=12){
$filename=$file.".txt";
if(file_get_contents("./userss/".$user."/admin/data/filenum")>=1){
if(!file_exists("./userss/".$user."/file/".$filename)){
file_put_contents("./userss/".$user."/file/".$filename,"感谢使用文档系统");
$filenum=file_get_contents("./userss/".$user."/admin/data/filenum");
$filenum=$filenum-1;
file_put_contents("./userss/".$user."/admin/data/filenum",$filenum);
echo "创建成功";
}else{echo "文档已经存在";}
}else{echo "剩余文档数不足";}
}else{echo "文档名不可超过12个字符";}
}else{echo "文档格式错误";}
}else{echo "请输入文档名";}
}else{echo "后台密码错误";}
}else{echo "后台账号不存在";}
?>