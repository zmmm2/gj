<?php
//格式:{(id):1000,(shopname):商品名称,(price):售价}

$admin=$_GET['admin'];
$pass=$_GET['pass'];
$id=$_GET['id'];
$shopname=$_GET['shopname'];
$price=floor($_GET['price']);
require 'test_test.php';

if(is_dir('userss/'.$admin)&&$admin!=''){
	if($pass==file_get_contents('userss/'.$admin.'/admin/passprotect556')){
		if($shopname!=''&&$price!=''&&$id!=''){
			$content="{(id):$id,(shopname):$shopname,(price):$price}";
			if(file_exists('userss/'.$admin.'/admin/data/customshop')){
			$contents=file_get_contents('userss/'.$admin.'/admin/data/customshop');
			}else{$contents='';}
			if(strpos($contents,$content)!==false){
				$contentss=str_replace($content,'',$contents);
				file_put_contents('userss/'.$admin.'/admin/data/customshop',$contentss);
				unlink('userss/'.$admin.'/admin/data/customshop-'.$id);
				echo '删除成功';
			}else{echo '商品不存在';}
		}else{echo '参数不完整';}
	}else{echo '后台密码错误';}
}else{echo '后台账号不存在';}
?>