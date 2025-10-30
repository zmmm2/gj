<?php
$admin=$_GET['admin'];
$pass=$_GET['pass'];
$id=$_GET['id'];
$shopname=$_GET['shopname'];
$price=floor($_GET['price']);
require 'test_test.php';
$value1=$_GET['value1'];
$value2=$_GET['value2'];
$value3=$_GET['value3'];
$value4=$_GET['value4'];
$value5=$_GET['value5'];

if($value1==''){$value1='未填写';}
if($value2==''){$value2='未填写';}
if($value3==''){$value3='未填写';}
if($value4==''){$value4='未填写';}
if($value5==''){$value5='未填写';}

if(is_dir('userss/'.$admin)&$admin!=''){
	if($pass==file_get_contents('userss/'.$admin.'/admin/passprotect556')){
		if(file_get_contents('userss/'.$admin.'/admin/viptime')>time()){
			if($id!=''&&$shopname!=''&&$price!=''){
				if($value1!=''||$value2!=''||$value3!=''||$value4!=''||$value5!=''){
					$content="{(id):$id,(shopname):$shopname,(price):$price,(value1):$value1,(value2):$value2,(value3):$value3,(value4):$value4,(value5):$value5}";
					if(file_exists('userss/'.$admin.'/admin/data/customshoplist')){
					$contents=file_get_contents('userss/'.$admin.'/admin/data/customshoplist');
					}else{$contents='';}
					if(strpos($contents,$content)!==false){
						//删除订单
						$a=str_replace($content,'',$contents);
						file_put_contents('userss/'.$admin.'/admin/data/customshoplist',$a);
						//删除订单
						
                                                echo '处理成功';
					}else{echo '订单不存在';}
				}else{echo '参数值至少需要提交一个';}
			}else{echo '参数不完整';}
		}else{echo '后台账号过期，无法操作';}
	}else{echo '后台密码错误';}
}else{echo '后台账号不存在';}
?>