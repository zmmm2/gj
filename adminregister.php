<?php
$admin=$_GET['admin'];
$pass=$_GET['pass'];
$user=$_GET['user'];
$password=$_GET['password'];
require 'test_test.php';
if(is_dir('userss/'.$admin)&&$admin!=''){
    if($pass==file_get_contents('userss/'.$admin.'/admin/passprotect556')){
        if(file_get_contents('userss/'.$admin.'/admin/viptime')>time()){
        if($user!=''&&$password!=''){
        if(preg_match("/[\x7f-\xff]/", $user)||strpos($user,'.') !==false||strpos($user,':') !==false||strpos($user,'-') !==false||strpos($user,' ') !==false||strpos($user,'[')!==false||strpos($user,'|')!==false||strpos($user,']')!==false||strpos($user,'A')!==false||strpos($user,'B')!==false||strpos($user,'C')!==false||strpos($user,'D')!==false||strpos($user,'E')!==false||strpos($user,'F')!==false||strpos($user,'G')!==false||strpos($user,'H')!==false||strpos($user,'I')!==false||strpos($user,'J')!==false||strpos($user,'K')!==false||strpos($user,'L')!==false||strpos($user,'M')!==false||strpos($user,'N')!==false||strpos($user,'O')!==false||strpos($user,'P')!==false||strpos($user,'Q')!==false||strpos($user,'R')!==false||strpos($user,'S')!==false||strpos($user,'T')!==false||strpos($user,'U')!==false||strpos($user,'V')!==false||strpos($user,'W')!==false||strpos($user,'X')!==false||strpos($user,'Y')!==false||strpos($user,'Z')!==false){
            echo '账号格式错误';}else if(preg_match("/[\x7f-\xff]/", $password)||strpos($password,' ') !==false){
            echo "密码格式错误";
          }else{
            if(strlen($user)>=6&&strlen($password)>=6&&strlen($user)<=16&&strlen($password)<=16){
                if(!is_dir('userss/'.$admin.'/userss/'.$user)){
        if(!file_exists('adminfrozen/'.$admin.'-register-'.date('Ymd',time()))){
            $num=0;
        }else{
            $num=file_get_contents('adminfrozen/'.$admin.'-register-'.date('Ymd',time()));
        }
        if($num<10){
             $num=$num+1;
             file_put_contents('adminfrozen/'.$admin.'-register-'.date('Ymd',time()),$num);
             //注册代码*************************
            file_put_contents('admin/userIP',$a.$fileip);
            $money=file_get_contents("userss/".$admin."/admin/set/money");
            $viptimes=file_get_contents("userss/".$admin."/admin/set/viptime");
            mkdir("userss/".$admin."/userss/".$user,0777,true);//创建账号文件夹
            file_put_contents("userss/".$admin."/userss/".$user."/passprotect556",$password);//写入密码文件
            file_put_contents("userss/".$admin."/userss/".$user."/viptime",strtotime($viptimes,time()));//写入会员文件
            file_put_contents("userss/".$admin."/userss/".$user."/money",$money);//写入金币文件
            file_put_contents("userss/".$admin."/userss/".$user."/registertime",date("Y-m-d H:i"));//写入注册时间文件
            echo '添加成功';
             //注册代码*************************
        }else{echo '您一天只能注册10个用户';}
                }else{echo '账号已经存在';}
            }else{echo '账号密码长度需在6-16之间';}
        }
        }else{echo '请输入完整';}
        }else{echo '后台账号过期，无法操作';}
    }else{echo '后台密码错误';}
}else{echo '后台账号不存在';}
?>