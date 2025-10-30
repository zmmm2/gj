<?php
$admin=$_GET['admin'];
$pass=$_GET['pass'];
require 'test_test.php';
if(is_dir('userss/'.$admin)&&$admin!=''){
if($pass==file_get_contents('userss/'.$admin.'/admin/passprotect556')){
if(file_exists('userss/'.$admin.'/admin/set/userdata')){
$userdataset=file_get_contents('userss/'.$admin.'/admin/set/userdata');
}else{$userdataset='';}

                if(strpos($userdataset,'[User]')===false){
                echo '用户账号:显示<br>';
                }else{echo '用户账号:隐藏<br>';}
                if(strpos($userdataset,'[QQ]')===false){
                echo '用户 Q Q:显示<br>';
                }else{echo '用户 Q Q:隐藏<br>';}
                if(strpos($userdataset,'[Name]')===false){
                echo '用户昵称:显示<br>';
                }else{echo '用户昵称:隐藏<br>';}
                if(strpos($userdataset,'[Grade]')===false){
                echo '用户等级:显示<br>';
                }else{echo '用户等级:隐藏<br>';}
                if(strpos($userdataset,'[Seal]')===false){
                echo '封禁状态:显示<br>';
                }else{echo '封禁状态:隐藏<br>';}
                if(strpos($userdataset,'[Registertime]')===false){
                echo '注册时间:显示<br>';
                }else{echo '注册时间:隐藏<br>';}
                if(strpos($userdataset,'[Logintime]')===false){
                echo '登录时间:显示<br>';
                }else{echo '登录时间:隐藏<br>';}
                if(strpos($userdataset,'[Viptime]')===false){
                echo '会员状态:显示<br>';
                }else{echo '会员状态:隐藏<br>';}
                if(strpos($userdataset,'[Money]')===false){
                echo '金币数量:显示<br>';
                }else{echo '金币数量:隐藏<br>';}
                if(strpos($userdataset,'[Praise]')===false){
                echo '获赞数量:显示<br>';
                }else{echo '获赞数量:隐藏<br>';}
                if(strpos($userdataset,'[Autograph]')===false){
                echo '用户签名:显示<br>';
                }else{echo '用户签名:隐藏<br>';}
                
}else{echo '后台密码粗错误';}
}else{echo '后台账号不存在';}
?>