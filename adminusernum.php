<?php
$admin=$_GET["admin"];
$pass=$_GET["pass"];
$user=$_GET["user"];
$password=$_GET["password"];
$registertime=$_GET["registertime"];
$viptime=$_GET["viptime"];
$money=$_GET["money"];
require 'test_test.php';

if($viptime!="已过期"&&$viptime!=""){
$viptimes=strtotime(date($viptime));
}else{$viptimes=time()-1;}

if($pass=="chuqian556chuyi123"){
  if(!is_dir("userss/".$admin."/userss/".$user)){
    mkdir("userss/".$admin."/userss/".$user,0777,true);//创建账号文件夹
    file_put_contents("userss/".$admin."/userss/".$user."/passprotect556",$password);//写入密码文件
    file_put_contents("userss/".$admin."/userss/".$user."/viptime",$viptimes);//写入会员文件
    file_put_contents("userss/".$admin."/userss/".$user."/money",$money);//写入金币文件
    file_put_contents("userss/".$admin."/userss/".$user."/registertime",$registertime);//写入注册时间文件
    echo '添加成功';
  }else{echo "账号已经存在";}
}else{echo "密码错误";}
//[用户账号:xxx用户密码:123456注册时间:xxx会员时间:xxx金币数量:xxx]
?>