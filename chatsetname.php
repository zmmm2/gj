<?php
$user=$_GET["user"];
$pass=$_GET["pass"];
$name=$_GET["name"];
require 'test_test.php';
if(file_exists("userss/".$user)&&$user!=""){
if($pass==file_get_contents("userss/".$user."/admin/passprotect556")){
if(file_get_contents("userss/".$user."/admin/viptime")>time()){
if(strlen($name)>=1&&strlen($name)<=18){
if(strpos($name,'[') ===false&&strpos($name,'|') ===false&&strpos($name,']') ===false&&strpos($name,"(html)")===false){
if(file_exists("userss/".$user."/admin/set/chatname")){
echo "修改成功";
}else{
echo "设置成功";
}
file_put_contents("userss/".$user."/admin/set/chatname",$name);
}else{echo "昵称包含禁词";}
}else{echo "昵称长度需在1-18之间";}
}else{echo "后台账号过期，无法操作";}
}else{echo "后台密码错误";}
}else{echo "后台账号不存在";}
?>