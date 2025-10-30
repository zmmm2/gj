<?php
$user=$_GET["user"];
$pass=$_GET["pass"];
$id=$_GET["id"];
$name=$_GET["name"];
$vip=$_GET["vip"];
$money=$_GET["money"];
require 'test_test.php';
$a="[".$id."#".$name."|".$money."||".$vip."]";
if(file_exists("userss/".$user)&&$user!=""){
if($pass==file_get_contents("userss/".$user."/admin/passprotect556")){
if(strpos(file_get_contents("userss/".$user."/admin/data/shop"),$a)!==false){
file_put_contents("userss/".$user."/admin/data/shop",str_replace($a,"",file_get_contents("userss/".$user."/admin/data/shop")));
echo "删除成功";
}else{echo "商品不存在";}
}else{echo "后台密码错误";}
}else{echo "后台账号不存在";}
?>