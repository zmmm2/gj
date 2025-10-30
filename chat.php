<?php
$admin=$_GET["admin"];
$mods=$_GET["mods"];
$user=$_GET["user"];
$pass=$_GET["pass"];
$content=$_GET["content"];
require 'test_test.php';
if($mods=='admin'){

if(file_exists('adminfrozen/'.$admin)){
$timesss=file_get_contents('adminfrozen/'.$admin);
if($timesss>time()-3){
$frozen='true';
$timesss=$timesss-time()+3;//剩余多久可操作
}else{$frozen=='false';}
}else{$frozen=='false';}

}else{

if(file_exists('userfrozen/'.$admin.'-'.$user)){
$timesss=file_get_contents('userfrozen/'.$admin.'-'.$user);
if($timesss>time()-3){
$frozen='true';
$timesss=$timesss-time()+3;//剩余多久可操作
}else{$frozen=='false';}
}else{$frozen=='false';}

}


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
//屏蔽铭感词
if($frozen!='true'){
if(strlen($content)<=3000){
if($mods!="admin"){
//普通用户发言
if(file_exists("userss/".$admin)&&$admin!=""){
if(file_exists("userss/".$admin."/admin/set/chattrue")){
if(file_get_contents("userss/".$admin."/admin/set/chattrue")=="否"){
$chattrue="false";
//禁止聊天
}
}
if($chattrue!="false"){
if(file_exists("userss/".$admin."/userss/".$user)&&$user!=""){
if($pass==file_get_contents("userss/".$admin."/userss/".$user."/passprotect556")){
if(file_exists("userss/".$admin."/userss/".$user."/seal")){
if(file_get_contents("userss/".$admin."/userss/".$user."/seal")<time()){
include  'logintrue.php';
//这里是全部通过
//格式:[10000#发言者|发言内容||发言时间|||账号]
if($content!=""&&$content!=null){
if(strpos($content,"[")===false&&strpos($content,"]")===false&&strpos($content,"|")===false&&strpos($content,"(html)")===false){
$name=$user;
$chat="[".rand(1000,99999)."#".$name."|".$content."||".data("Y-m-d H:i",time())."]";
if(file_exists("userss/".$admin."/admin/data/chat")){
file_put_contents("userss/".$admin."/admin/data/chat",file_get_contents("userss/".$admin."/admin/data/chat").$chat);
}else{
file_put_contents("userss/".$admin."/admin/data/chat",$chat);
}
echo "发言成功";
}else{echo "发送内容包含禁词";}
}else{echo "发送内容为空";}
//这里是全部通过
}else{echo "发言失败，账号被封禁至".date("Y-m-d H:i",file_get_contents("userss/".$admin."/userss/".$user."/seal"));}
}else{
include  'logintrue.php';
//这里是全部通过
//格式:[10000#发言者|发言内容||发言时间]
if($content!=""){
if(strpos($content,"[")===false&&strpos($content,"]")===false&&strpos($content,"|")===false&&strpos($content,"(html)")===false){
$name=$user;
$chat="[".rand(1000,99999)."#".$name."|".$content."||".date("Y-m-d H:i",time())."]";
if(file_exists("userss/".$admin."/admin/data/chat")){
file_put_contents("userss/".$admin."/admin/data/chat",file_get_contents("userss/".$admin."/admin/data/chat").$chat);
}else{
file_put_contents("userss/".$admin."/admin/data/chat",$chat);
}
file_put_contents('userfrozen/'.$admin.'-'.$user,time());
echo "发言成功";
}else{echo "发送内容包含禁词";}
}else{echo "发送内容为空";}
//这里是全部通过
}
}else{echo "密码错误";}
}else{echo "账号不存在";}
}else{echo "聊天室禁止发言";}
}else{echo "后台账号不存在";}



}else{
//管理员发言
if(file_exists("userss/".$admin)&&$admin!=""){
if($pass==file_get_contents("userss/".$admin."/admin/passprotect556")){
if(file_get_contents("userss/".$admin."/admin/viptime")>time()){
//这里是全部通过
//格式:[10000#发言者|发言内容||发言时间]
if($content!=""&&$content!=null){
if(strpos($content,"[")===false&&strpos($content,"]")===false&&strpos($content,"|")===false&&strpos($content,"(html)")===false){
if(file_exists("userss/".$admin."/admin/set/chatname")){
$name=file_get_contents("userss/".$admin."/admin/set/chatname");
$name="(html)<font color=red>".$name."</font>";
}else{
$name="(html)<font color=red>聊天室管理</font>";
}
$chat="[".rand(1000,99999)."#".$name."|".$content."||".date("Y-m-d H:i",time())."]";
if(file_exists("userss/".$admin."/admin/data/chat")){
file_put_contents("userss/".$admin."/admin/data/chat",file_get_contents("userss/".$admin."/admin/data/chat").$chat);
}else{
file_put_contents("userss/".$admin."/admin/data/chat",$chat);
}
file_put_contents('adminfrozen/'.$admin,time());
echo "发言成功";
}else{echo "发送内容包含禁词";}
}else{echo "发送内容为空";}
//这里是全部通过
}else{echo "后台账号过期，无法操作";}
}else{echo "后台密码错误";}
}else{echo "后台账号不存在";}
}
}else{echo '内容长度不能超过3000字符';}
}else{echo '频繁操作，请'.$timesss.'秒后重试';}
?>
