<?php
if(file_exists('userss/'.$admin.'/admin/data/maintain')){
$maintain=file_get_contents('userss/'.$admin.'/admin/data/maintain');
if(strpos($maintain,'维护开关:开<br>维护通知:')!==false){
echo '登录失败:软件维护中';
exit;
}
}

if(file_exists("userss/".$admin."/admin/set/viplogin")){
if(file_get_contents("userss/".$admin."/admin/set/viplogin")=="是"){
$viplogin="是";//会员才可以登录
}else{
$viplogin="否";
}
}else{
$viplogin="否";
}
if($viplogin=='是'&&file_get_contents('userss/'.$admin.'/userss/'.$user.'/viptime')<time()){
echo '登录失败:会员才可以登录';
exit;
}
?>