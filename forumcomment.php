<?php
$admin=$_GET['admin'];
$pass=$_GET['pass'];
$user=$_GET['user'];
$id=$_GET['id'];
$content=$_GET['content'];
$mods=$_GET['mods'];
require 'test_test.php';
//屏蔽铭感词
$content=str_replace("傻逼","**",$content);
$content=str_replace("弱智","**",$content);
$content=str_replace("举报","**",$content);
$content=str_replace("求举报","***",$content);
$content=str_replace("刷钻","**",$content);
$content=str_replace("Q币","**",$content);
$content=str_replace("q币","**",$content);
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
$content=str_replace("腾讯","**",$content);
$content=str_replace("微信","**",$content);
$content=str_replace("QQ","**",$content);
$content=str_replace("支付宝","***",$content);
$content=str_replace("赛尼姆","***",$content);
$content=str_replace("返利","**",$content);
$content=str_replace("狗比","**",$content);
$content=str_replace("狗逼","**",$content);
$content=str_replace("垃圾","**",$content);
$content=str_replace("狗屎","**",$content);
$content=str_replace("辣鸡","**",$content);
$content=str_replace("王者","**",$content);
$content=str_replace("钻石","**",$content);
$content=str_replace("皮肤","**",$content);
$content=str_replace("外挂","**",$content);
$content=str_replace("点券","**",$content);
$content=str_replace("免流","**",$content);
$content=str_replace("流量","**",$content);
$content=str_replace("话费","**",$content);
//屏蔽铭感词

if($mods=='admin'){

if(file_exists('adminfrozen/'.$admin)){
$timesss=file_get_contents('adminfrozen/'.$admin);
if($timesss>time()-10){
$frozen='true';
$timesss=$timesss-time()+10;//剩余多久可操作
}else{$frozen=='false';}
}else{$frozen=='false';}
}else{

if(file_exists('userfrozen/'.$admin.'-'.$user)){
$timesss=file_get_contents('userfrozen/'.$admin.'-'.$user);
if($timesss>time()-30){
$frozen='true';
$timesss=$timesss-time()+30;//剩余多久可操作
}else{$frozen=='false';}
}else{$frozen=='false';}

}

if($frozen!='true'){
if(strlen($content)<=1500){
$sealroute="userss/".$admin."/userss/".$user."/seal";
$seal='true';
$sealtime=file_get_contents($sealroute);
if(file_exists($sealroute)){
if(file_get_contents($sealroute)>=time()){
$seal='false';
}
}
if($mods=='admin'){
//管理评论-------------------------------------
if(strpos($content,'[-')===false&&strpos($content,'>]')===false&&strpos($content,'-/-')===false&&strpos($content,'-//-')===false){
$m='[-(html)<font color=red>开发者</font>-/-'.$content.'-//-'.date('Y-m-d H:i',time()).'>]'.file_get_contents('userss/'.$admin.'/forum/'.$id);
if(is_dir('userss/'.$admin)&&$admin!=''){
if($pass==file_get_contents('userss/'.$admin.'/admin/passprotect556')){
if($content!=''){
if(file_exists('userss/'.$admin.'/forum/'.$id)&&$id!=''){
file_put_contents('userss/'.$admin.'/forum/'.$id,$m);
file_put_contents('adminfrozen/'.$admin,time());
echo '评论成功';
}else{echo '帖子不存在';}
}else{echo '请输入完整';}
}else{echo '密码错误';}
}else{echo '后台账号不存在';}
}else{echo '内容包含禁词';}
}else{
if(file_exists('userss/'.$admin.'/admin/set/commenttrue')){
$true=file_get_contents('userss/'.$admin.'/admin/set/commenttrue');
}else{$true='是';}
if($true!='否'){
if(file_exists('userss/'.$admin.'/admin/data/moderator')){
$m=file_get_contents('userss/'.$admin.'/admin/data/moderator');
}else{$m='';}
if(strpos($m,$user.'|')===false){
//用户评论-------------------------------------
if(strpos($content,'[-')===false&&strpos($content,'>]')===false&&strpos($content,'-/-')===false&&strpos($content,'-//-')===false){
$m='[-'.$user.'-/-'.$content.'-//-'.date('Y-m-d H:i',time()).'>]'.file_get_contents('userss/'.$admin.'/forum/'.$id);
if(is_dir('userss/'.$admin)&&$admin!=''){
if(is_dir('userss/'.$admin.'/userss/'.$user)&&$user!=''){
if($pass==file_get_contents('userss/'.$admin.'/userss/'.$user.'/passprotect556')){
    include 'logintrue.php';
if($content!=''){
if(file_exists('userss/'.$admin.'/forum/'.$id)&&$id!=''){
if($seal=='true'){
file_put_contents('userss/'.$admin.'/forum/'.$id,$m);
file_put_contents('userfrozen/'.$admin.'-'.$user,time());
echo '评论成功';
}else{echo "评论失败，账号被封禁至".date("Y-m-d H:i",file_get_contents("userss/".$admin."/userss/".$user."/seal"));}
}else{echo '帖子不存在';}
}else{echo '请输入完整';}
}else{echo '密码错误';}
}else{echo '用户不存在';}
}else{echo '后台账号不存在';}
}else{echo '内容包含禁词';}
}else{
//版主评论-------------------------------------
if(strpos($content,'[-')===false&&strpos($content,'>]')===false&&strpos($content,'-/-')===false&&strpos($content,'-//-')===false){
$m='[-(html)<font color=red>'.$user.'</font>-/-'.$content.'-//-'.date('Y-m-d H:i',time()).'>]'.file_get_contents('userss/'.$admin.'/forum/'.$id);
if(is_dir('userss/'.$admin)&&$admin!=''){
if(is_dir('userss/'.$admin.'/userss/'.$user)&&$user!=''){
if($pass==file_get_contents('userss/'.$admin.'/userss/'.$user.'/passprotect556')){
    include 'logintrue.php';
if($content!=''){
if(file_exists('userss/'.$admin.'/forum/'.$id)&&$id!=''){
if($seal=='true'){
file_put_contents('userss/'.$admin.'/forum/'.$id,$m);
file_put_contents('userfrozen/'.$admin.'-'.$user,time());
echo '评论成功';
}else{echo "评论失败，账号被封禁至".date("Y-m-d H:i",file_get_contents("userss/".$admin."/userss/".$user."/seal"));}
}else{echo '帖子不存在';}
}else{echo '请输入完整';}
}else{echo '密码错误';}
}else{echo '用户不存在';}
}else{echo '后台账号不存在';}
}else{echo '内容包含禁词';}
}
}else{echo '后台已关闭评论功能';}
}
}else{echo '内容长度不可超过1500字符';}
}else{echo '频繁操作，请'.$timesss.'秒后重试';}
?>