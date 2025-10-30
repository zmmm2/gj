<?php
//格式:{(id):1000,(shopname):商品名称,(price):售价}

$admin=$_GET['admin'];
$pass=$_GET['pass'];
$shopname=$_GET['shopname'];
$price=floor($_GET['price']);
require 'test_test.php';

if(file_exists('adminfrozen/'.$admin)){
$timesss=file_get_contents('adminfrozen/'.$admin);
if($timesss>time()-3){
$frozen='true';
$timesss=$timesss-time()+3;//剩余多久可操作
}else{$frozen=='false';}
}else{$frozen=='false';}
if($frozen!='true'){

if(is_dir('userss/'.$admin)&&$admin!=''){
	if($pass==file_get_contents('userss/'.$admin.'/admin/passprotect556')){
		if($shopname!=''&&$price!=''){
			if(strlen($shopname)<=500){
				if(is_numeric($price)&&$price>=1&&$price<=100000){
					if(strpos($shopname,'(id):')===false&&strpos($shopname,'(shopname):')===false&&strpos($shopname,'(price):')===false){
					if(file_get_contents('userss/'.$admin.'/admin/viptime')>time()){
					$id=rand(100000000,9999999999);
					$content="{(id):$id,(shopname):$shopname,(price):$price}";
					if(file_exists('userss/'.$admin.'/admin/data/customshop')){
					$contents=file_get_contents('userss/'.$admin.'/admin/data/customshop');
					}else{$contents='';}
			                file_put_contents('userss/'.$admin.'/admin/data/customshop',$content.$contents);
					file_put_contents('userss/'.$admin.'/admin/data/customshop-'.$id,'0');
					file_put_contents('adminfrozen/'.$admin,time());
					echo '添加成功';
					}else{echo '后台账号过期，无法操作';}
					}else{echo '商品名包含禁词';}
				}else{echo '售价需在1-100000之间';}
			}else{echo '商品名称不可超过500字符';}
		}else{echo '参数不完整';}
	}else{echo '后台密码错误';}
}else{echo '后台账号不存在';}
	
}else{echo '频繁操作，请'.$timesss.'秒后重试';}
?>