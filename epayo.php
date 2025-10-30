<?php
$user=$_GET["user"];
$pass=$_GET["pass"];
$mods=$_GET["mods"];
$money=$_GET["money"];
$zh=$_GET["zh"];
require 'test_test.php';
if(file_exists("userss/".$user)&&$user!=""){
if($user!="appdoc"){
if($pass==file_get_contents("userss/".$user."/admin/passprotect556")){
if($money>=10){
if(strpos($money,".")===false){
if($mods=="微信"||$mods=="支付宝"){
if($zh!=""){
if(file_exists("userss/".$user."/admin/money")){
if(file_get_contents("userss/".$user."/admin/money")>=$money){
//格式:[后台账号|后台密码/提现金额_提现日期￥提现方式+账号]
$money=file_get_contents("userss/".$user."/admin/money")-$money;
file_put_contents("userss/".$user."/admin/money",$money);
$moneyo=$_GET["money"]*0.95;
$a="[".$user."|".$pass."/".$moneyo."_".date("Y-m-d",time())."￥".$mods.$zh."]";
$b=file_get_contents("moneyo/moneyo");
file_put_contents("moneyo/moneyo",$a.$b);
echo '提现成功，实际到账:'.$moneyo.'元';
}else{echo "余额不足";}
}else{echo "该账号还没有余额";}
}else{echo "提现账号为空";}
}else{echo "提现方式错误";}
}else{echo "提现金额需是整数";}
}else{echo "一次最低提现10元";}
}else{echo "后台密码错误";}
}else{echo "测试账号不可提现";}
}else{echo "后台账号不存在";}
?>