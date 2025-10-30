<?php
$user=$_GET['user'];
$pass=$_GET['pass'];
$title=$_GET['title'];
require 'test_test.php';
if(strlen($title)<=300){
if(is_dir('userss/'.$user)&&$user!=''){
if($pass==file_get_contents('userss/'.$user.'/admin/passprotect556')){
if(file_get_contents('userss/'.$user.'/admin/viptime')>time()){
if($title!=''){
if(!is_dir('userss/'.$user.'/page')){
mkdir('userss/'.$user.'/page',0777,true);
}
file_put_contents('userss/'.$user.'/page/title',$title);
echo "设置成功";
}else{echo '请输入网页标题';}
}else{echo '后台账号过期，无法设置';}
}else{echo '后台密码错误';}
}else{echo '后台账号不存在';}
}else{echo '标题长度不可大于300字符';}
?>