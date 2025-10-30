<?php
$admin=$_GET["admin"];
$pass=$_GET["pass"];
$user=$_GET["user"];
$name=$_GET["name"];
require 'test_test.php';
if(file_exists("userss/".$admin)&&$admin!=""){
if($pass==file_get_contents("userss/".$admin."/admin/passprotect556")){
if(file_exists("userss/".$admin."/userss/".$user)&&$user!=""){
if($name!=""&&mb_strlen($name)<=18&&mb_strlen($name)>=1){
if(file_get_contents("userss/".$admin."/admin/viptime")>time()){
if(strpos($name,'[') ===false&&strpos($name,'|') ===false&&strpos($name,']') ===false&&strpos($name,"(html)")===false){
if(file_exists("userss/".$admin."/userss/".$user."/name")){
echo "修改成功";
file_put_contents("userss/".$admin."/userss/".$user."/name",$name);
}else{echo "设置成功"; file_put_contents("userss/".$admin."/userss/".$user."/name",$name);}
}else{echo "昵称包含禁词";}
}else{echo "后台账号过期，无法修改";}
}else{echo "昵称长度需在1-18位";}
}else{echo "账号不存在";}
}else{echo "后台密码错误";}
}else{echo "后台账号不存在";}
?>