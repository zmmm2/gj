<?php
$admin=$_GET['admin'];
$kalman=$_GET['kalman'];
require 'test_test.php';
if(is_dir('userss/'.$admin)&&$admin!=''){
if(file_exists('userss/'.$admin.'/kalman/'.$kalman)&&$kalman!=''){
$kalmancontent=file_get_contents('userss/'.$admin.'/kalman/'.$kalman);
if(strpos($kalmancontent,'hous')!==false||strpos($kalmancontent,'monts')!==false||strpos($kalmancontent,'das')!==false||strpos($kalmancontent,'yeas')!==false||strpos($kalmancontent,'second')!==false||is_numeric($kalmancontent)){
if(strpos($kalmancontent,'hour')===false&&strpos($kalmancontent,'month')===false&&strpos($kalmancontent,'day')===false&&strpos($kalmancontent,'year')===false&&strpos($kalmancontent,'money')===false){
//这里判断是不是时间格式，如果是就写入时间戳
if(strpos($kalmancontent,'hous')!==false||strpos($kalmancontent,'monts')!==false||strpos($kalmancontent,'das')!==false||strpos($kalmancontent,'yeas')!==false||strpos($kalmancontent,'second')!==false){
$kalmancontent=str_replace('hous','hour',$kalmancontent);
$kalmancontent=str_replace('das','day',$kalmancontent);
$kalmancontent=str_replace('monts','month',$kalmancontent);
$kalmancontent=str_replace('yeas','year',$kalmancontent);
$kalmancontent=strtotime($kalmancontent,time());
file_put_contents('userss/'.$admin.'/kalman/'.$kalman,$kalmancontent);
}
//这里判断是不是时间格式，如果是就写入时间戳
if($kalmancontent>time()){


echo '目前状态:激活|过期时间:'.date('Y-m-d H:i',$kalmancontent);


}else{echo '该卡密已经过期';}
}else{echo '卡密类型错误';}
}else{echo '卡密类型错误';}
}else{echo '卡密不存在';}
}else{echo '后台账号不存在';}
?>