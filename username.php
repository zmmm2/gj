<?php
$admin=$_GET["admin"];
$user=$_GET["user"];
$pass=$_GET["pass"];
$name=$_GET["name"];
require 'test_test.php';
if(file_exists("userss/".$admin)&&$admin!=""){
if(file_exists("userss/".$admin."/userss/".$user)&&$user!=""){
if($pass==file_get_contents("userss/".$admin."/userss/".$user."/passprotect556")){
    include 'logintrue.php';
if(mb_strlen($name)>=1&&mb_strlen($name)<=18){
if(strpos($name,'[') ===false&&strpos($name,'|') ===false&&strpos($name,']') ===false&&strpos($name,"(html)")===false&&strpos($name,'<') ===false&&strpos($name,'>') ===false&&strpos($name,'-') ===false&&strpos($name,'/') ===false){
if(file_exists("userss/".$admin."/userss/".$user."/name")){
$sealroute="userss/".$admin."/userss/".$user."/seal";
$seal='true';
$sealtime=file_get_contents($sealroute);
if(file_exists($sealroute)){
if(file_get_contents($sealroute)>=time()){
$seal='false';
}
}
if($seal=='true'){
echo "修改成功";
file_put_contents("userss/".$admin."/userss/".$user."/name",$name);
}else{echo "修改失败，账号封禁至".date('Y-m-d H:i',$sealtime);}
}else{echo "设置成功"; file_put_contents("userss/".$admin."/userss/".$user."/name",$name);}
}else{echo "昵称包含禁词";}
}else{echo "昵称长度需在1-18位";}
}else{echo "账号密码错误";}
}else{echo "账号不存在";}
}else{echo "后台账号不存在";}
?>