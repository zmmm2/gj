<?php
$user=$_GET["user"];
$pass=$_GET["pass"];
$name=$_GET["name"];
require 'test_test.php';
//屏蔽铭感词
$name=str_replace("傻逼","**",$name);
$name=str_replace("弱智","**",$name);
$name=str_replace("举报","**",$name);
$name=str_replace("求举报","***",$name);
$name=str_replace("刷钻","**",$name);
$name=str_replace("Q币","**",$name);
$name=str_replace("q币","**",$name);
$name=str_replace("游戏币","***",$name);
$name=str_replace("代刷","**",$name);
$name=str_replace("求打","**",$name);
$name=str_replace("滚","*",$name);
$name=str_replace("滚蛋","**",$name);
$name=str_replace("傻子","**",$name);
$name=str_replace("小学生","***",$name);
$name=str_replace("干你妈","***",$name);
$name=str_replace("干尼玛","***",$name);
$name=str_replace("草泥马","***",$name);
$name=str_replace("操你妈","***",$name);
$name=str_replace("废物","**",$name);
$name=str_replace("蠢逼","**",$name);
$name=str_replace("我是你爸","****",$name);
$name=str_replace("我是你爹","****",$name);
$name=str_replace("儿子","**",$name);
$name=str_replace("孙子","**",$name);
$name=str_replace("腾讯","**",$name);
$name=str_replace("微信","**",$name);
$name=str_replace("QQ","**",$name);
$name=str_replace("支付宝","***",$name);
$name=str_replace("赛尼姆","***",$name);
$name=str_replace("返利","**",$name);
$name=str_replace("狗比","**",$name);
$name=str_replace("狗逼","**",$name);
$name=str_replace("垃圾","**",$name);
$name=str_replace("狗屎","**",$name);
$name=str_replace("辣鸡","**",$name);
$name=str_replace("王者","**",$name);
$name=str_replace("钻石","**",$name);
$name=str_replace("皮肤","**",$name);
$name=str_replace("外挂","**",$name);
$name=str_replace("点券","**",$name);
$name=str_replace("免流","**",$name);
$name=str_replace("流量","**",$name);
$name=str_replace("花费","**",$name);
//屏蔽铭感词
$money=$_GET["money"];
$vip=$_GET["vip"];
//格式:[1000#商品名称|商品价格||会员时间]


if(file_exists('adminfrozen/'.$user)){
$timesss=file_get_contents('adminfrozen/'.$user);
if($timesss>time()-3){
$frozen='true';
$timesss=$timesss-time()+3;//剩余多久可操作
}else{$frozen=='false';}
}else{$frozen=='false';}
if($frozen!='true'){


if(file_exists("userss/".$user)&&$user!=""){
if($pass==file_get_contents("userss/".$user."/admin/passprotect556")){
if(file_get_contents("userss/".$user."/admin/viptime")>time()){
if(strlen($name)>=1&&strlen($name)<=36){
if($money>=1&&$money<=10000){
if(strpos($vip,"hour")!==false||strpos($vip,"day")!==false||strpos($vip,"month")!==false||strpos($vip,"year")!==false){
$a="[".rand(1000,99999)."#".$name."|".$money."||".$vip."]";
//完美格式
if(file_exists("userss/".$user."/admin/data/shop")){
//有商品
$b=file_get_contents("userss/".$user."/admin/data/shop");
$a=$a.$b;
file_put_contents("userss/".$user."/admin/data/shop",$a);
file_put_contents('adminfrozen/'.$user,time());
echo "添加成功";
}else{
//没商品
file_put_contents("userss/".$user."/admin/data/shop",$a);
file_put_contents('adminfrozen/'.$user,time());
echo "添加成功";
}
}else{echo "兑换会员时间错误";}
}else{echo "售价需在1-10000之间";}
}else{echo "商品名称需在1-18字符之间";}
}else{echo "后台账号过期，无法操作";}
}else{echo "后台密码错误";}
}else{echo "后台账号不存在";}
}else{echo '频繁操作，请'.$timesss.'秒后重试';}
?>