<?php
$admin=$_GET["admin"];
$user=$_GET["user"];
require 'test_test.php';
if(file_exists("userss/".$admin)&&$admin!=""){
if($user!=""&&file_exists("userss/".$admin."/userss/".$user)){
//账号存在
if(file_exists("userss/".$admin."/userss/".$user."/name")){
$name=file_get_contents("userss/".$admin."/userss/".$user."/name");
}else{
$name="未设置";
}
if(file_exists("userss/".$admin."/userss/".$user."/grade")){
$grade=file_get_contents("userss/".$admin."/userss/".$user."/grade");
}else{
$grade="普通用户";
}
if(file_get_contents("userss/".$admin."/userss/".$user."/viptime")>time()){
$vip=date("Y-m-d H:i",file_get_contents("userss/".$admin."/userss/".$user."/viptime"));
}else{
$vip="已过期";
}
if(file_exists("userss/".$admin."/userss/".$user."/seal")){
if(file_get_contents("userss/".$admin."/userss/".$user."/seal")>time()){
//被封
$seal=file_get_contents("userss/".$admin."/userss/".$user."/seal");
$seal=date("Y-m-d h:i",$seal);
}else{
$seal="未封禁";
}
}else{
$seal="未封禁";
}
$registertime=file_get_contents("userss/".$admin."/userss/".$user."/registertime");
$money=floor(file_get_contents("userss/".$admin."/userss/".$user."/money"));
if($money>100000000){
$money="100000000+";
}
if(file_exists("userss/".$admin."/userss/".$user."/QQ")){
$QQ=file_get_contents("userss/".$admin."/userss/".$user."/QQ");
}else{
$QQ="未绑定";
}
if(file_exists("userss/".$admin."/userss/".$user."/autograph")){
$autograph=file_get_contents("userss/".$admin."/userss/".$user."/autograph");
}else{
$autograph="这个用户很懒，还没有签名哦!";
}
if(file_exists('userss/'.$admin.'/userss/'.$user.'/logintime')){
$logintime=file_get_contents('userss/'.$admin.'/userss/'.$user.'/logintime');
}else{$logintime='无数据';}
if(file_exists("userss/".$admin."/userss/".$user."/praisenum")){
$praisenum=file_get_contents("userss/".$admin."/userss/".$user."/praisenum");
}else{
$praisenum=0;
}
if(file_exists('userss/'.$admin.'/userss/'.$user.'/MyInvite')){
$invite=file_get_contents('userss/'.$admin.'/userss/'.$user.'/MyInvite');
}else{$invite='无邀请人';}

                if(file_exists('userss/'.$admin.'/admin/set/userdata')){
                $userdataset=file_get_contents('userss/'.$admin.'/admin/set/userdata');
                }else{$userdataset='';}

                if(strpos($userdataset,'[User]')===false){
                echo '用户账号:'.$user.'<br>';
                $true='true';
                }
                if(strpos($userdataset,'[QQ]')===false){
                echo '用户 Q Q:'.$QQ.'<br>';
                $true='true';
                }
                if(strpos($userdataset,'[Name]')===false){
                echo '账号昵称:'.$name.'<br>';
                $true='true';
                }
                if(strpos($userdataset,'[Grade]')===false){
                echo '账号等级:'.$grade.'<br>';
                $true='true';
                }
                if(strpos($userdataset,'[Seal]')===false){
                echo '封禁状态:'.$seal.'<br>';
                $true='true';
                }
                if(strpos($userdataset,'[Registertime]')===false){
                echo '注册时间:'.$registertime.'<br>';
                $true='true';
                }
                if(strpos($userdataset,'[Logintime]')===false){
                echo '登录时间:'.$logintime.'<br>';
                $true='true';
                }
                if(strpos($userdataset,'[Viptime]')===false){
                echo '会员状态:'.$vip.'<br>';
                $true='true';
                }
                if(strpos($userdataset,'[Money]')===false){
                echo '金币数量:'.$money.'<br>';
                $true='true';
                }
                if(strpos($userdataset,'[Praise]')===false){
                echo '获赞数量:'.$praisenum.'<br>';
                $true='true';
                }
                if(strpos($userdataset,'[Autograph]')===false){
                echo '用户签名:'.$autograph.'<br>';
                $true='true';
                }
                echo '邀请人:'.$invite.'<br>';
                
                

}else{echo "账号不存在";}
}else{echo "后台账号不存在";}
?>