<?php
$user=$_GET['user'];
$pass=$_GET['pass'];
$kalman=$_GET['kalman'];
$time=$_GET['time'];
require 'test_test.php';
if($user!=''&&is_dir('userss/'.$user)){
if($pass==file_get_contents('userss/'.$user.'/admin/passprotect556')){
if(file_exists('userss/'.$user.'/kalman/'.$kalman)&&$kalman!=''){
$kalmancontent=file_get_contents('userss/'.$user.'/kalman/'.$kalman);
if(is_numeric($kalmancontent)){
if(strpos($time,'hour')!==false||strpos($time,'day')!==false||strpos($time,'month')!==false||strpos($time,'year')!==false){

if($kalmancontent<time()){
$kalmancontent=time();
}
$kalmantime=strtotime($time,$kalmancontent);
file_put_contents('userss/'.$user.'/kalman/'.$kalman,$kalmantime);
echo '续费成功';

}else{echo '请输入正确的时间参数';}
}else{echo '该卡密不可续费时间';}
}else{echo '卡密不存在';}
}else{echo '后台密码错误';}
}else{echo '后台账号不存在';}
?>