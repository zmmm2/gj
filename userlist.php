<?php
session_start();
$admin=$_GET["admin"];
$pass=$_GET["pass"];
require 'test_test.php';
if(floor($_GET['num'])==$_GET['num']&&$_GET['num']>0&&$_GET['num']!=''&&$_GET['num']<=1000&&is_numeric($_GET['num'])){
$_SESSION['num']=$_GET['num'];
}else{
$_SESSION['num']=20;
}

if($admin!=""&&$pass!=""){
//获取key
if(!file_exists("userss/".$admin)){
//账号不存在
echo "后台账号不存在";
}else{
$ipass=file_get_contents("userss/".$admin."/admin/passprotect556");
if($pass==$ipass){
//密码正确
   $path = "./userss/".$admin."/userss";//目标文件
        //定义函数
        function showAll($path){
            //判断是不是目录
            if(is_dir($path)){
            //如果是目录,则打开目录,返回目录句柄
                $handle = opendir($path);
                $nums=1;
                $num=$_SESSION['num'];
                while (false !== $file = readdir($handle)) {
                    if($file == "." || $file == ".."){
                        continue;
                    }
                    //判断读到的文件名是不是目录,如果是目录,则开始递归;
                    if(is_dir($path.'/'.$file)){  //加上父目录再判断
                        showAll($path.'/'.$file);
                        $user=$file;
                     $admin=$_GET["admin"];
                    //这里是获取账号数据
                    if($admin!=""&&$user!=""){
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
$seal=date("Y-m-d H:i",$seal);
}else{
$seal="未封禁";
}
}else{
$seal="未封禁";
}
$registertime=file_get_contents("userss/".$admin."/userss/".$user."/registertime");
$money=file_get_contents("userss/".$admin."/userss/".$user."/money");
if($money>100000){
$money="100000+";
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
//获取最后登陆时间
if(file_exists('userss/'.$admin.'/userss/'.$user.'/logintime')){
$logintime=file_get_Contents('userss/'.$admin.'/userss/'.$user.'/logintime');
}else{$logintime='无数据';}
//获取最后登陆时间
if(file_exists("userss/".$admin."/userss/".$user."/praisenum")){
$praisenum=file_get_contents("userss/".$admin."/userss/".$user."/praisenum");
}else{
$praisenum=0;
}
$userlist= $userlist."用户账号:".$user."<br>用户QQ:".$QQ."<br>账号昵称:".$name."<br>账号等级:".$grade."<br>封禁状态:".$seal."<br>注册时间:".$registertime.'<br>登陆时间:'.$logintime."<br>会员状态:".$vip.'<br>获赞数量:'.$praisenum."<br>金币数量:".$money."<br>用户签名:".$autograph."<br>-----<br>";
if($nums<$num){
$nums=$nums+1;
}else{
break;
unset( $_SESSION['num']);
}
}
                    //这里是获取账号数据
                    }
                    }
                //关闭目录句柄
                closedir($handle);
            }
          echo substr($userlist,"0","-9");
          
        }
        //调用函数
        showAll($path);
        }else{echo "后台密码错误";}
      }
    }else{echo "参数不完整";}
      ?>