<?php
$admin=$_GET["admin"];
$key=$_GET["key"];
$time=$_GET["time"];
$user=$_GET["user"];
require 'test_test.php';
if(file_exists("userss/".$admin)&&$admin!=""){
if($key==file_get_contents("userss/".$admin."/admin/keyprotect556")){
if(file_get_contents('userss/'.$admin.'/admin/viptime')>time()){
if(file_exists("userss/".$admin."/userss/".$user)&&$user!=""){
if(strpos($time,"hour") !==false||strpos($time,"day") !==false||strpos($time,"month") !==false||strpos($time,"year") !==false){
$viptime=file_get_contents("userss/".$admin."/userss/".$user."/viptime");
//这个是用户会员时间戳
if($viptime>time()){
//有VIP

if(strtotime($time,$viptime)<strtotime("1000year",time())){
//时间正确
echo "操作成功";
file_put_contents("userss/".$admin."/userss/".$user."/viptime",strtotime($time,$viptime));
}else{
//时间错误
echo "会员时间达到最大值";
file_put_contents("userss/".$admin."/userss/".$user."/viptime",strtotime("1000year",time()));
}

}else{
//没有VIP

if(strtotime($time,$viptine)<strtotime("1000year",time())){
//时间正确
echo "操作成功";
file_put_contents("userss/".$admin."/userss/".$user."/viptime",strtotime($time,time()));
}else{
//时间错误
echo "会员时间达到最大值";
file_put_contents("userss/".$admin."/userss/".$user."/viptime",strtotime("1000year",time()));
}

}
}else{echo "时间参数错误";}
}else{echo "账号不存在";}
}else{echo '后台账号过期，无法操作';}
}else{echo "后台密钥错误";}
}else{echo "后台账号不存在";}
?>