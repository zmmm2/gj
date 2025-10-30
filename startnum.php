<?php
$user=$_GET["user"];
require 'test_test.php';
if(file_exists("userss/".$user)&&$user!=""){
$nums=file_get_contents("userss/".$user."/admin/data/startnum");
$num=$nums+1;
if($num!=''&&$num==$nums+1&&$nums!=''){
file_put_contents("userss/".$user."/admin/data/startnum",$num);
echo "启动数+1<br>启动总数:".file_get_contents("userss/".$user."/admin/data/startnum");
}else{echo '运算出错，请重试';}
}else{echo "后台账号不存在";}
?>