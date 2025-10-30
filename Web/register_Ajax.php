<?php
if($_POST['user'] === null || $_POST['pass']=== null)die(json_encode(array("code"=>false,"msg"=>"Not")));
if(strpos($_SERVER['HTTP_USER_AGENT'],'Windows')===false&&strpos($_SERVER['HTTP_USER_AGENT'],'UNIX')===false){
session_start();
//获取本机IP
 function getIP()
{
global $ip;
if (getenv("HTTP_CLIENT_IP")){
$ip = getenv("HTTP_CLIENT_IP");
}else if(getenv("HTTP_X_FORWARDED_FOR")){
$ip = getenv("HTTP_X_FORWARDED_FOR");
}else if(getenv("REMOTE_ADDR")){
$ip = getenv("REMOTE_ADDR");
}else $ip = "Unknow";
return $ip;
}
$tf = false;
$fileip=file_get_contents('../admin/IP');
$a='['.getIP().'|'.date('Y-m-d',time()).']';
//获取本机IP
if(strpos($fileip,$a)===false&&!isset($_COOKIE['admin'.date('Y-m-d')])&&!isset($_SESSION['admin'.date('Y-m-d')])){
$user=$_POST["user"];
$pass=$_POST["pass"];
if($user==""||$pass==""){
//未输入
$reg = "参数不完整";
}else{
if(preg_match("/[\x7f-\xff]/", $user)||strpos($user,'.') !==false||strpos($user,':') !==false||strpos($user,'-') !==false||strpos($user,' ') !==false||strpos($user,'[') !==false||strpos($user,'|') !==false||strpos($user,']') !==false||strpos($user,'A')!==false||strpos($user,'B')!==false||strpos($user,'C')!==false||strpos($user,'D')!==false||strpos($user,'E')!==false||strpos($user,'F')!==false||strpos($user,'G')!==false||strpos($user,'H')!==false||strpos($user,'I')!==false||strpos($user,'J')!==false||strpos($user,'K')!==false||strpos($user,'L')!==false||strpos($user,'M')!==false||strpos($user,'N')!==false||strpos($user,'O')!==false||strpos($user,'P')!==false||strpos($user,'Q')!==false||strpos($user,'R')!==false||strpos($user,'S')!==false||strpos($user,'T')!==false||strpos($user,'U')!==false||strpos($user,'V')!==false||strpos($user,'W')!==false||strpos($user,'X')!==false||strpos($user,'Y')!==false||strpos($user,'Z')!==false){
//有中文
$reg = "账号格式错误";
}else if(preg_match("/[\x7f-\xff]/", $pass)||strpos($pass,' ') !==false){
$reg = "密码格式错误";
}else{
if(strlen($user)<6||strlen($pass)<6||strlen($user)>12||strlen($pass)>12){
//小于6位
$reg = "账号密码需在6-12位之间";
}else{
if(file_exists("../userss/".$user)){
//账号存在
$reg ="账号已经存在";
}else{
//账号不存在
$fileroute='../adminfrozen/admin-register-'.date('Ymd',time());
//读取次数
if(file_exists($fileroute)){
$registernum=file_get_contents($fileroute);
}else{$registernum=0;}
//读取次数
if($registernum<200){//一天注册上限
file_put_contents('../admin/IP',$a.$fileip);
mkdir("../userss/".$user,0777,true);//创建账号文件夹
mkdir("../userss/".$user."/admin",0777,true);//创建文本文件夹
mkdir("../userss/".$user."/userss",0777,true);//创建用户文件夹
mkdir("../userss/".$user."/kalman",0777,true);//创建卡密文件夹
mkdir("../userss/".$user."/file",0777,true);//创建文件文件夹
mkdir("../userss/".$user."/admin/data",0777,true);//创建文档文件夹
mkdir("../userss/".$user."/admin/set",0777,true);//创建设置文件夹
file_put_contents("../userss/".$user."/admin"."/passprotect556",$pass);//写入密码文件
file_put_contents("../userss/".$user."/admin"."/keyprotect556",substr(md5(rand(10000,99999)),0,10).rand(10000,99999));//写入密钥
file_put_contents("../userss/".$user."/admin"."/viptime",time()+86400);//写入会员文件送一天会员
file_put_contents("../userss/".$user."/admin/set/money",10);//写入设置:用户注册送金币
file_put_contents("../userss/".$user."/admin/set/viptime","0day");//写入设置:用户注册送会员
file_put_contents("../userss/".$user."/admin/set/sign",10);//写入设置:每日签到送金币
file_put_contents("../userss/".$user."/admin/data/startnum",0);//写入启动统计
file_put_contents("../userss/".$user."/admin/data/filenum",3);//写入文件数量文件
file_put_contents("../userss/".$user."/admin/data/file_true","false");//写入文件托管验证文件

//写入
$_SESSION['admin'.date('Y-m-d')]='true';
setcookie('admin'.date('Y-m-d'),'true',time()+86400);
//写入

//写入次数
file_put_contents($fileroute,$registernum+1);
//写入次数

$reg = "注册成功，快去登录试试吧";
$tf = true;
//注册时写入账号基本文件
}else{$reg = '今日注册数已达上限，请明天再来';}
}
}
}
}
}else{$reg = '您一天只能注册一个账号!';}
}else{$reg = '请在手机端注册';}

//die('<center><b>'.$reg.'</b><br/><a href="http://appdoc.top/Web/login.html">点我返回</a>');
die(json_encode(array("code" => $tf, "msg" => "$reg")))
?>