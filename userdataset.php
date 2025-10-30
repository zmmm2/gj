<?php
$user=$_GET['user'];
$pass=$_GET['pass'];
$mods=$_GET['mods'];
require 'test_test.php';
if(is_dir('userss/'.$user)&&$user!=''){
    if($pass==file_get_contents('userss/'.$user.'/admin/passprotect556')){
        if(file_exists('userss/'.$user.'/admin/set/userdata')){
            $userdataset=file_get_contents('userss/'.$user.'/admin/set/userdata');
        }else{$userdataset='';}
        if(file_get_contents('userss/'.$user.'/admin/viptime')>time()){
            if($mods=='user'){
                
                if(strpos($userdataset,'[User]')===false){
                //修改为:不显示
                file_put_contents('userss/'.$user.'/admin/set/userdata','[User]'.$userdataset);
                echo '切换成功，该属性隐藏';
                }else{
                //修改为:显示
                file_put_contents('userss/'.$user.'/admin/set/userdata',str_replace('[User]','',$userdataset));
                echo '切换成功，该属性显示';
                }
                
            }else if($mods=='QQ'){
                
                if(strpos($userdataset,'[QQ]')===false){
                //修改为:不显示
                file_put_contents('userss/'.$user.'/admin/set/userdata','[QQ]'.$userdataset);
                echo '切换成功，该属性隐藏';
                }else{
                //修改为:显示
                file_put_contents('userss/'.$user.'/admin/set/userdata',str_replace('[QQ]','',$userdataset));
                echo '切换成功，该属性显示';
                }
                
            }else if($mods=='name'){
                
                if(strpos($userdataset,'[Name]')===false){
                //修改为:不显示
                file_put_contents('userss/'.$user.'/admin/set/userdata','[Name]'.$userdataset);
                echo '切换成功，该属性隐藏';
                }else{
                //修改为:显示
                file_put_contents('userss/'.$user.'/admin/set/userdata',str_replace('[Name]','',$userdataset));
                echo '切换成功，该属性显示';
                }
                
            }else if($mods=='nagrade'){
                
                if(strpos($userdataset,'[Nagrade]')===false){
                //修改为:不显示
                file_put_contents('userss/'.$user.'/admin/set/userdata','[Nagrade]'.$userdataset);
                echo '切换成功，该属性隐藏';
                }else{
                //修改为:显示
                file_put_contents('userss/'.$user.'/admin/set/userdata',str_replace('[Nagrade]','',$userdataset));
                echo '切换成功，该属性显示';
                }
                
            }else if($mods=='grade'){
                
                if(strpos($userdataset,'[Grade]')===false){
                //修改为:不显示
                file_put_contents('userss/'.$user.'/admin/set/userdata','[Grade]'.$userdataset);
                echo '切换成功，该属性隐藏';
                }else{
                //修改为:显示
                file_put_contents('userss/'.$user.'/admin/set/userdata',str_replace('[Grade]','',$userdataset));
                echo '切换成功，该属性显示';
                }
                
            }else if($mods=='seal'){
                
                if(strpos($userdataset,'[Seal]')===false){
                //修改为:不显示
                file_put_contents('userss/'.$user.'/admin/set/userdata','[Seal]'.$userdataset);
                echo '切换成功，该属性隐藏';
                }else{
                //修改为:显示
                file_put_contents('userss/'.$user.'/admin/set/userdata',str_replace('[Seal]','',$userdataset));
                echo '切换成功，该属性显示';
                }
                
            }else if($mods=='registertime'){
                
                if(strpos($userdataset,'[Registertime]')===false){
                //修改为:不显示
                file_put_contents('userss/'.$user.'/admin/set/userdata','[Registertime]'.$userdataset);
                echo '切换成功，该属性隐藏';
                }else{
                //修改为:显示
                file_put_contents('userss/'.$user.'/admin/set/userdata',str_replace('[Registertime]','',$userdataset));
                echo '切换成功，该属性显示';
                }
                
            }else if($mods=='logintime'){
                
                if(strpos($userdataset,'[Logintime]')===false){
                //修改为:不显示
                file_put_contents('userss/'.$user.'/admin/set/userdata','[Logintime]'.$userdataset);
                echo '切换成功，该属性隐藏';
                }else{
                //修改为:显示
                file_put_contents('userss/'.$user.'/admin/set/userdata',str_replace('[Logintime]','',$userdataset));
                echo '切换成功，该属性显示';
                }
                
            }else if($mods=='viptime'){
                
                if(strpos($userdataset,'[Viptime]')===false){
                //修改为:不显示
                file_put_contents('userss/'.$user.'/admin/set/userdata','[Viptime]'.$userdataset);
                echo '切换成功，该属性隐藏';
                }else{
                //修改为:显示
                file_put_contents('userss/'.$user.'/admin/set/userdata',str_replace('[Viptime]','',$userdataset));
                echo '切换成功，该属性显示';
                }
                
            }else if($mods=='money'){
                
                if(strpos($userdataset,'[Money]')===false){
                //修改为:不显示
                file_put_contents('userss/'.$user.'/admin/set/userdata','[Money]'.$userdataset);
                echo '切换成功，该属性隐藏';
                }else{
                //修改为:显示
                file_put_contents('userss/'.$user.'/admin/set/userdata',str_replace('[Money]','',$userdataset));
                echo '切换成功，该属性显示';
                }
                
            }else if($mods=='autograph'){
                
                if(strpos($userdataset,'[Autograph]')===false){
                //修改为:不显示
                file_put_contents('userss/'.$user.'/admin/set/userdata','[Autograph]'.$userdataset);
                echo '切换成功，该属性隐藏';
                }else{
                //修改为:显示
                file_put_contents('userss/'.$user.'/admin/set/userdata',str_replace('[Autograph]','',$userdataset));
                echo '切换成功，该属性显示';
                }
                
            }else if($mods=='praise'){
                
                if(strpos($userdataset,'[Praise]')===false){
                //修改为:不显示
                file_put_contents('userss/'.$user.'/admin/set/userdata','[Praise]'.$userdataset);
                echo '切换成功，该属性隐藏';
                }else{
                //修改为:显示
                file_put_contents('userss/'.$user.'/admin/set/userdata',str_replace('[Praise]','',$userdataset));
                echo '切换成功，该属性显示';
                }
                
            }else{echo '参数错误';}
        }else{echo '后台账号过期，无法操作';}
    }else{echo '后台密码错误';}
}else{echo '后台账号不存在';}

/*对应表:
[User]
[QQ]
[Name]
[Grade]
[Seal]
[Registertime]
[Logintime]
[Viptime]
[Money]
[Autograph]
[Araise]
*/对应表
?>