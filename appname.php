<?php
$user=$_GET['user'];
$pass=$_GET['pass'];
$app=$_GET['app'];
require 'test_test.php';
if(strlen($app)<=60){
if(is_dir('userss/'.$user)&&$user!=''){
if($pass==file_get_contents('userss/'.$user.'/admin/passprotect556')){
if(file_get_contents('userss/'.$user.'/admin/viptime')>time()){
if($app!=''){
if(!is_dir('userss/'.$user.'/page')){
mkdir('userss/'.$user.'/page',0777,true);
}
file_put_contents('userss/'.$user.'/page/app',$app);
echo "设置成功";
}else{echo '请输入软件名';}
}else{echo '后台账号过期，无法设置';}
}else{echo '后台密码错误';}
}else{echo '后台账号不存在';}
}else{echo '软件名过长';}
?>