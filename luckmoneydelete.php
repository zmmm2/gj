<?php
$user=$_GET['user'];
$pass=$_GET['pass'];
$name=$_GET['name'];
$money=$_GET['money'];
$mini=$_GET['mini'];
$max=$_GET['max'];
$id=$_GET['id'];
require 'test_test.php';
if(is_dir('userss/'.$user)&&$user!=''){
if($pass==file_get_contents('userss/'.$user.'/admin/passprotect556')){
if($name!=''&&$money!=''&&$mini!=''&&$max!=''&&$id!=''){
if(file_exists('userss/'.$user.'/admin/data/luckmoney')){
$a='['.$id.'#'.$name.'|'.$money.'||'.$mini.'|||'.$max.']';
$b=file_get_contents('userss/'.$user.'/admin/data/luckmoney');
if(strpos($b,$a)!==false){
$c=str_replace($a,'',$b);
file_put_contents('userss/'.$user.'/admin/data/luckmoney',$c);
echo '删除成功';
}else{echo '商品不存在';}
}else{echo '后台无抽奖商品';}
}else{echo '请输入完整';}
}else{echo '密码错误';}
}else{echo '后台账号不存在';}
//格式:[ID#商品名|抽奖花费||最小奖励|||最大奖励]
?>