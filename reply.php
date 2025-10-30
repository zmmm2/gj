<?php
//获取变量
$problem=$_GET['problem'];
$admin=$_GET['admin'];
$user=$_GET['user'];
$pass=$_GET['pass'];
$prnum=strlen($problem);
require 'test_test.php';
//获取变量


if(file_exists('userfrozen/'.$admin.'-'.$user)){
$timesss=file_get_contents('userfrozen/'.$admin.'-'.$user);
if($timesss>time()-2){
$frozen='true';
$timesss=$timesss-time()+2;//剩余多久可操作
}else{$frozen=='false';}
}else{$frozen=='false';}

if($frozen!='true'){
if($prnum<=300){
if(is_dir('userss/'.$admin)&&$admin!=''){
if(is_dir('userss/'.$admin.'/userss/'.$user)&&$user!=''){
if($pass==file_get_contents('userss/'.$admin.'/userss/'.$user.'/passprotect556')){
    include 'logintrue.php';
if($problem!=''){

//机器人词库获取
$json=file_get_contents('userss/'.$admin.'/admin/data/thesaurus');//用户自行设置的词库
$Thesaurus=json_decode($json,true);//自动转化为数组
//机器人词库获取

//查询词库
if($Thesaurus!=''&&array_key_exists($problem,$Thesaurus)){
    $chats=$Thesaurus[$problem];
}else{
    $chats='你说的问题系统未能找到答案';
}
//查询词库

//自动将聊天记录写入
if(file_exists('userss/'.$admin.'/userss/'.$user.'/replylist')){
$chatjilu=file_get_contents('userss/'.$admin.'/userss/'.$user.'/replylist');
}else{$chatjilu='';}
$chatss=$chatjilu.'[(My)'.$problem.'(My)|(Ai)'.$chats.'(Ai)]';
file_put_contents('userss/'.$admin.'/userss/'.$user.'/replylist',$chatss);
file_put_contents('userfrozen/'.$admin.'-'.$user,time());
echo '提问成功';
//自动将聊天记录写入

}else{echo '至少提个问题吧';}
}else{echo '密码错误';}
}else{echo '账号不存在';}
}else{echo '后台账号不存在';}
}else{echo '问题不可超过300字符';}
}else{echo '频繁操作，请'.$timesss.'秒后重试';}
?>