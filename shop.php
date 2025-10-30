<?php
$admin=$_GET["admin"];
$user=$_GET["user"];
$pass=$_GET["pass"];
$id=$_GET["id"];
$name=$_GET["name"];
$money=$_GET["money"];
$vip=$_GET["vip"];
require 'test_test.php';
if(file_exists("userss/".$admin)&&$admin!=""){
if(file_exists("userss/".$admin."/userss/".$user)&&$user!=""){
if($pass==file_get_contents("userss/".$admin."/userss/".$user."/passprotect556")){
    include 'logintrue.php';
if(file_exists("userss/".$admin."/admin/data/shop")){
if(strpos(file_get_contents("userss/".$admin."/admin/data/shop"),"[".$id."#".$name."|".$money."||".$vip."]")!==false){
if(file_get_contents("userss/".$admin."/userss/".$user."/money")>=$money){
if(strpos($vip,"hour")!==false||strpos($vip,"day")!==false||strpos($vip,"month")!==false||strpos($vip,"year")!==false){
//减少金币
$money=file_get_contents("userss/".$admin."/userss/".$user."/money")-$money;
file_put_contents("userss/".$admin."/userss/".$user."/money",$money);
if(file_get_contents("userss/".$admin."/userss/".$user."/viptime")>time()){
//有vip
$viptime=file_get_contents("userss/".$admin."/userss/".$user."/viptime");
file_put_contents("userss/".$admin."/userss/".$user."/viptime",strtotime($vip,$viptime));
}else{
//没vip
file_put_contents("userss/".$admin."/userss/".$user."/viptime",strtotime($vip,time()));
}
echo "兑换成功";
}else{echo "会员时间出错";}
}else{echo "金币不足";}
}else{echo "商品不存在";}
}else{echo "后台无任何商品";}
}else{echo "密码错误";}
}else{echo "账号不存在";}
}else{echo "后台账号不存在";}
?>