<?php
$user=$_GET["user"];$file=$_GET["file"];
require 'test_test.php';
if(strpos($file,"/")!==false || strpos($file,"\\")!==false)die("文件名格式错误");
if(file_exists("userss/".$user)&&$user!=""){if(file_exists("userss/".$user."/file/".$file)&&$file!=""){echo file_get_contents("userss/".$user."/file/".$file);}else{echo "文档不存在";}}else{echo "后台账号不存在";}