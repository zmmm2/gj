<?php
$admin=$_GET['admin'];
$user=$_GET['user'];
$pass=$_GET['pass'];
$id=$_GET['id'];
$shopname=$_GET['shopname'];
$price=floor($_GET['price']);
require 'test_test.php';
if(!is_numeric($price)){die('价格不正确');}
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

if(strlen($value1)>300){echo '参数1字符长度不能超过300'; exit;}
if(strlen($value2)>300){echo '参数2字符长度不能超过300'; exit;}
if(strlen($value3)>300){echo '参数3字符长度不能超过300'; exit;}
if(strlen($value4)>300){echo '参数4字符长度不能超过300'; exit;}
if(strlen($value5)>300){echo '参数5字符长度不能超过300'; exit;}

$sealroute="userss/".$admin."/userss/".$user."/seal";
$seal='false';
if(file_exists($sealroute)){
$sealtime=file_get_contents($sealroute);
if(file_get_contents($sealroute)>=time()){
$seal='true';
}
}

if(is_dir('userss/'.$admin)&$admin!=''){
	if(is_dir('userss/'.$admin.'/userss/'.$user)&&$user!=''){
		if($pass==file_get_contents('userss/'.$admin.'/userss/'.$user.'/passprotect556')){
			if($seal!='true'){
				if($id!=''&&$shopname!=''&&$price!=''){
					if($value1!='未填写'||$value2!='未填写'||$value3!='未填写'||$value4!='未填写'||$value5!='未填写'){
					$content="{(id):$id,(shopname):$shopname,(price):$price}";
					if(file_exists('userss/'.$admin.'/admin/data/customshop')){
					$contents=file_get_contents('userss/'.$admin.'/admin/data/customshop');
					}else{$contents='';}
					$usermoney=file_get_contents('userss/'.$admin.'/userss/'.$user.'/money');
					if($usermoney>=$price&&$usermoney-$price>=0){
					if(strpos($contents,$content)!==false){
						$ids=rand(100000000,999999999);
						$shopok="{(id):$ids,(shopname):$shopname,(price):$price,(value1):$value1,(value2):$value2,(value3):$value3,(value4):$value4,(value5):$value5}";
						if(file_exists('userss/'.$admin.'/admin/data/customshoplist')){
					        $shoplist=file_get_contents('userss/'.$admin.'/admin/data/customshoplist');
					        }else{$shoplist='';}
						file_put_contents('userss/'.$admin.'/admin/data/customshoplist',$shopok.$shoplist);
						//发送通知
                                               $ass='您购买的《'.$shopname.'》订单已提交成功，请耐心等待处理';
                                               $ass='['.$ass.'|'.date('Y-m-d H:i',time()).']';
                                               if(file_exists('userss/'.$admin.'/userss/'.$user.'/newscontents')){
                                               $bss=file_get_contents('userss/'.$admin.'/userss/'.$user.'/newscontents');
                                                }else{
                                                $bss='';
                                                }
                                                file_put_contents('userss/'.$admin.'/userss/'.$user.'/newscontents',$ass.$bss);
                                                //发送通知
                                               //扣除金币
                                              file_put_contents('userss/'.$admin.'/userss/'.$user.'/money',$usermoney-$price);
                                              //扣除金币
                                              //添加销量
                                              $num=file_get_contents('userss/'.$admin.'/admin/data/customshop-'.$id);
					      file_put_contents('userss/'.$admin.'/admin/data/customshop-'.$id,$num+1);
                                              //添加销量
						echo '购买成功';
					}else{echo '商品不存在';}
					}else{echo '金币不足';}
					}else{echo '参数值至少需要提交一个';}
				}else{echo '参数不完整';}
			}else{echo "购买失败，账号被封禁至".date("Y-m-d H:i",$sealtime);}
		}else{echo '密码错误';}
	}else{echo '账号不存在';}
}else{echo '后台账号不存在';}
?>