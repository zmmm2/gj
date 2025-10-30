<?php
$admin=$_GET['admin'];
$user=$_GET['user'];//自己账号
$user2=$_GET['user2'];//别人账号
$content=$_GET['content'];
require 'test_test.php';
if(file_exists("userss/".$admin."/admin/set/userchattrue")){
if(file_get_contents("userss/".$admin."/admin/set/userchattrue")=="否"){
$userchattrue="否";
}else{
$userchattrue="是";
}
}else{
$userchattrue="是";
}

if(file_exists('userfrozen/'.$admin.'-'.$user)){
$timesss=file_get_contents('userfrozen/'.$admin.'-'.$user);
if($timesss>time()-3){
$frozen='true';
$timesss=$timesss-time()+3;//剩余多久可操作
}else{$frozen=='false';}
}else{$frozen=='false';}

//屏蔽铭感词
$content=str_replace("傻逼","**",$content);
$content=str_replace("弱智","**",$content);
$content=str_replace("举报","**",$content);
$content=str_replace("求举报","***",$content);
$content=str_replace("刷钻","**",$content);
$content=str_replace("游戏币","***",$content);
$content=str_replace("代刷","**",$content);
$content=str_replace("求打","**",$content);
$content=str_replace("滚","*",$content);
$content=str_replace("滚蛋","**",$content);
$content=str_replace("傻子","**",$content);
$content=str_replace("小学生","***",$content);
$content=str_replace("干你妈","***",$content);
$content=str_replace("干尼玛","***",$content);
$content=str_replace("草泥马","***",$content);
$content=str_replace("操你妈","***",$content);
$content=str_replace("废物","**",$content);
$content=str_replace("蠢逼","**",$content);
$content=str_replace("我是你爸","****",$content);
$content=str_replace("我是你爹","****",$content);
$content=str_replace("儿子","**",$content);
$content=str_replace("孙子","**",$content);
$content=str_replace("赛尼姆","***",$content);
$content=str_replace("返利","**",$content);
$content=str_replace("狗比","**",$content);
$content=str_replace("狗逼","**",$content);
$content=str_replace("垃圾","**",$content);
$content=str_replace("狗屎","**",$content);
$content=str_replace("辣鸡","**",$content);
//屏蔽铭感词
if($frozen!='true'){
if(strlen($content)<=3000){
if($userchattrue!="否"){
if(is_dir('userss/'.$admin)&&$admin!=''){
if(is_dir('userss/'.$admin.'/userss/'.$user)&&$user!=''){
if($pass==file_get_contents('userss/'.$admin.'/userss'.$user.'/passprotect556')){
    include 'logintrue.php';
if(is_dir('userss/'.$admin.'/userss/'.$user2)&&$user2!=''){
if($content!=''){
if(strpos($content,'[')===false&&strpos($content,']')===false&&strpos($content,'|')===false){
if($user!=$user2){
if(file_get_contents('userss/'.$admin.'/admin/viptime')>time()){

if(file_exists('chat/'.$admin.'-'.$user.'-'.$user2)){$contents=file_get_contents('chat/'.$admin.'-'.$user.'-'.$user2);}else{$contents='';}
$content='['.$user.'|'.$content.'||'.date('Y-m-d H:i',time()).']';
$content=$contents.$content;
file_put_contents('chat/'.$admin.'-'.$user.'-'.$user2,$content);
file_put_contents('chat/'.$admin.'-'.$user2.'-'.$user,$content);
file_put_contents('userfrozen/'.$admin.'-'.$user,time());
echo '发言成功';

}else{echo '后台账号过期，无法操作';}
}else{echo '请不要和自己对话';}
}else{echo '发送内容包含禁词';}
}else{echo '请输入内容';}
}else{echo '对方账号不存在';}
}else{echo '发言账号密码错误';}
}else{echo '发言账号不存在';}
}else{echo '后台账号不存在';}}else{echo '私聊功能已经关闭';}
}else{echo '内容长度不可超过3000字符';}
}else{echo '频繁发言，请'.$timesss.'秒后重试';}
//文件格式:123456-1234567
//发言格式:[123456|内容||时间]
?>