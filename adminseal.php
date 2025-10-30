<?php
$admin=$_GET["admin"];
$pass=$_GET["pass"];
$user=$_GET["user"];
$time=$_GET["time"];
$mods=$_GET["mods"];
require 'test_test.php';
if($mods==1){
//封号
if(file_exists("userss/".$admin)&&$admin!=""){
if($pass==file_get_contents("userss/".$admin."/admin/passprotect556")){
if(file_exists("userss/".$admin."/userss/".$user)){
if(file_get_contents("userss/".$admin."/admin/viptime")>time()){
if(strpos($time,"day") !==false||strpos($time,"hour") !==false||strpos($time,"month") !==false||strpos($time,"year") !==false){
if(file_exists("userss/".$admin."/userss/".$user."/seal")){
if(file_get_contents("userss/".$admin."/userss/".$user."/seal")>time()){
//被封禁
$sealtime=file_get_contents("userss/".$admin."/userss/".$user."/seal");
if(strtotime($time,$sealtime)<strtotime("1000year",time())){
//正常
$times=file_get_contents("userss/".$admin."/userss/".$user."/seal");
file_put_contents("userss/".$admin."/userss/".$user."/seal",strtotime($time,$times));
echo "操作成功";
}else{
//超出
$times=file_get_contents("userss/".$admin."/userss/".$user."/seal");
file_put_contents("userss/".$admin."/userss/".$user."/seal",strtotime("1000year",time()));
echo "封禁时间达到最大值";
}
}else{
//没封禁
if(strtotime($time,file_get_contents["userss/".$admin."/userss/".$user."/seal"])<strtotime("1000year",time())){
//正常
file_put_contents("userss/".$admin."/userss/".$user."/seal",strtotime($time,time()));
echo "操作成功";
}else{
//超出
@$times=file_get_contents("userss/".$admin."/userss/".$user."/seal");
file_put_contents("userss/".$admin."/userss/".$user."/seal",strtotime("1000year",time()));
echo "封禁时间达到最大值";
}
}
}else{
//没封禁
@$timess=file_get_contents("userss/".$admin."/userss/".$user."/seal");
if(strtotime($time,$timess)<strtotime("1000year",time())){
//正常
file_put_contents("userss/".$admin."/userss/".$user."/seal",strtotime($time,time()));
echo "操作成功";
}else{
//超出
$times=file_get_contents("userss/".$admin."/userss/".$user."/seal");
file_put_contents("userss/".$admin."/userss/".$user."/seal",strtotime("1000year",time()));
echo "封禁时间达到最大值";
}
}
}else{echo "时间参数错误";}
}else{echo "后台账号过期，无法操作";}
}else{echo "账号不存在";}
}else{echo "后台密码错误";}
}else{echo "后台账号不存在";}
}else if($mods==2){
//解封
if(file_exists("userss/".$admin)&&$admin!=""){
if($pass==file_get_contents("userss/".$admin."/admin/passprotect556")){
if(file_exists("userss/".$admin."/userss/".$user)){
if(file_get_contents("userss/".$admin."/admin/viptime")>time()){
if(file_exists("userss/".$admin."/userss/".$user."/seal")){
if(file_get_contents("userss/".$admin."/userss/".$user."/seal")>time()){
//被封禁
unlink("userss/".$admin."/userss/".$user."/seal");
echo "操作成功";
}else{
//没封禁
echo "账号未封禁";
}
}else{
//没封禁
echo "账号未封禁";
}
}else{echo "后台账号过期，无法操作";}
}else{echo "账号不存在";}
}else{echo "后台密码错误";}
}else{echo "后台账号不存在";}
}else{echo "操作模式错误";}
?>