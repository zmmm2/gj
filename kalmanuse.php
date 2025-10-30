<?php
$admin=$_GET["admin"];
$kalman=$_GET["kalman"];
$user=$_GET["user"];
require 'test_test.php';
if(file_exists("userss/".$admin)&&$admin!=""){
//后台账号存在
if(file_exists("userss/".$admin."/userss/".$user)&&$user!=""){
//用户账号存在
if(file_exists("userss/".$admin."/kalman/".$kalman)&&$kalman!=""){
$sealroute="userss/".$admin."/userss/".$user."/seal";
$seal='true';
$sealtime=file_get_contents($sealroute);
if(file_exists($sealroute)){
if(file_get_contents($sealroute)>=time()){
$seal='false';
}
}

$kalmancontent=file_get_contents('userss/'.$admin.'/kalman/'.$kalman);
if(strpos($kalmancontent,'day')!==false||strpos($kalmancontent,'hour')!==false||strpos($kalmancontent,'month')!==false||strpos($kalmancontent,'year')!==false){
//会员卡密
if($seal=='true'){
//卡密存在
//获取卡密时间
$kalmantime=file_get_contents("userss/".$admin."/kalman/".$kalman);
//获取用户VIP时间
$userviptime=file_get_contents("userss/".$admin."/userss/".$user."/viptime");
if($userviptime>time()){
//还有vip
file_put_contents("userss/".$admin."/userss/".$user."/viptime",strtotime($kalmantime,$userviptime));
unlink("userss/".$admin."/kalman/".$kalman);

//写入记录
if(file_exists('userss/'.$admin.'/admin/data/kalmanuserecord')){
$kalmanuserecord=file_get_contents('userss/'.$admin.'/admin/data/kalmanuserecord');
}else{$kalmanuserecord='';}
$kalmanuserecords='['.$kalman.'|'.$kalmantime.'||'.$user.'|||'.date('Y-m-d',time()).']';
file_put_contents('userss/'.$admin.'/admin/data/kalmanuserecord',$kalmanuserecords.$kalmanuserecord);
//格式:[卡密|时间||使用账号|||使用时间]
//写入记录

echo "使用成功";
}else{
//没有VIP
file_put_contents("userss/".$admin."/userss/".$user."/viptime",strtotime($kalmantime,time()));
unlink("userss/".$admin."/kalman/".$kalman);

//写入记录
if(file_exists('userss/'.$admin.'/admin/data/kalmanuserecord')){
$kalmanuserecord=file_get_contents('userss/'.$admin.'/admin/data/kalmanuserecord');
}else{$kalmanuserecord='';}
$kalmanuserecords='['.$kalman.'|'.$kalmantime.'||'.$user.'|||'.date('Y-m-d',time()).']';
file_put_contents('userss/'.$admin.'/admin/data/kalmanuserecord',$kalmanuserecords.$kalmanuserecord);
//格式:[卡密|时间||使用账号|||使用时间]
//写入记录

echo "使用成功";
}
}else{echo "使用失败，账号封禁至".date('Y-m-d H:i',$sealtime);}
}else{
if(strpos($kalmancontent,'money')!==false){
//金币卡密


$kalmancontent=str_replace('money','',$kalmancontent);
$usermoneynum=file_get_contents('userss/'.$admin.'/userss/'.$user.'/money');
file_put_contents('userss/'.$admin.'/userss/'.$user.'/money',$kalmancontent+$usermoneynum);
unlink("userss/".$admin."/kalman/".$kalman);

//写入记录
if(file_exists('userss/'.$admin.'/admin/data/kalmanuserecord')){
$kalmanuserecord=file_get_contents('userss/'.$admin.'/admin/data/kalmanuserecord');
}else{$kalmanuserecord='';}
$kalmanuserecords='['.$kalman.'|'.$kalmancontent."money".'||'.$user.'|||'.date('Y-m-d',time()).']';
file_put_contents('userss/'.$admin.'/admin/data/kalmanuserecord',$kalmanuserecords.$kalmanuserecord);
//格式:[卡密|时间||使用账号|||使用时间]
//写入记录

echo '使用成功';


}else{

if(strpos($kalmancontent,'hous')===false&&strpos($kalmancontent,'das')===false&&strpos($kalmancontent,'monts')===false&&strpos($kalmancontent,'yeas')===false){
echo '卡密类型错误';
}else{echo '卡密类型错误';}

}
}
}else{echo "卡密不存在";}
}else{echo "用户账号不存在";}
}else{echo "后台账号不存在";}
?>