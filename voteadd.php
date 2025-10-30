<?php
$admin=$_GET['admin'];
$pass=$_GET['pass'];
$votetitle=$_GET['votetitle'];
$option1=$_GET['option1'];
$option2=$_GET['option2'];
$option3=$_GET['option3'];
$option4=$_GET['option4'];
$option5=$_GET['option5'];
require 'test_test.php';

if(file_exists('adminfrozen/'.$admin)){
$timesss=file_get_contents('adminfrozen/'.$admin);
if($timesss>time()-3){
$frozen='true';
$timesss=$timesss-time()+3;//剩余多久可操作
}else{$frozen=='false';}
}else{$frozen=='false';}
if($frozen!='true'){

$options3='0';
$options4='0';
$options5='0';

if(is_dir('userss/'.$admin)&&$admin!=''){
	if($pass==file_get_contents('userss/'.$admin.'/admin/passprotect556')){
		if($votetitle!=''){
			if(strlen($votetitle)>=1&&strlen($votetitle)<=30){
				if(file_get_contents('userss/'.$admin.'/admin/viptime')<time()){
				echo '后台账号过期，无法操作';
				exit;
				}
				if(strpos($option1,',(')===false&&strpos($option2,',(')===false&&strpos($option3,',(')===false&&strpos($option4,',(')===false&&strpos($option5,',(')===false&&strpos($option1,'):')===false&&strpos($option2,'):')===false&&strpos($option3,'):')===false&&strpos($option4,'):')===false&&strpos($option5,'):')===false){}else{
				echo '投票字符包含禁词，请更换';
				exit;
				}
				if($option1!=''){
				if($option2!=''){
				if(strlen($option1)<=30&&strlen($option2)<=30&&strlen($option3)<=30&&strlen($option4)<=30&&strlen($option5)<=30){
				
				//补充空白选项
				if($option3==''){
					$option3='无';
					$options3='无';
				}
				if($option4==''){
					$option4='无';
					$options4='无';
				}
				if($option5==''){
					$option5='无';
					$options5='无';
				}
				//补充空白选项*
				
				//设置数据
				//投票标题选项
				$id=rand(1000000,9999999);
				$data="{(id):$id,(votetitle):$votetitle,(option1):$option1,(option2):$option2,(option3):$option3,(option4):$option4,(option5):$option5}";
				if(file_exists('userss/'.$admin.'/admin/data/votelist')){
				$datas=file_get_contents('userss/'.$admin.'/admin/data/votelist');
				}else{$datas='';}
				$data=$data.$datas;//最终列表变量
				//设置数据*	
					
				//设置数据
				//设置投票数量
				$array=array(
					'option1'=>'0',
					'option2'=>'0',
					'option3'=>$options3,
					'option4'=>$options4,
					'option5'=>$options5,
				);
				$json=json_encode($array,JSON_UNESCAPED_UNICODE);//最终票数变量
				//设置数据*
				
				//最终数据处理
				file_put_contents('userss/'.$admin.'/admin/data/votelist',$data);
				file_put_contents('userss/'.$admin.'/admin/data/vote-'.$id,$json);
				file_put_contents('adminfrozen/'.$admin,time());
				//最终数据处理
				echo '添加成功';
					
				}else{echo '选项长度不可超过30字符';}
				}else{echo '选项2不可为空';}
				}else{echo '选项1不可为空';}
			}else{echo '投票标题长度需在1-30个字符';}
		}else{echo '请输入投票标题';}
	}else{echo '后台密码错误';}
}else{echo '后台账号不存在';}
}else{echo '频繁操作，请'.$timesss.'秒后重试';}
?>