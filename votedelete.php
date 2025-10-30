<?php
$admin=$_GET['admin'];
$pass=$_GET['pass'];
$votetitle=$_GET['votetitle'];
$option1=$_GET['option1'];
$option2=$_GET['option2'];
$option3=$_GET['option3'];
$option4=$_GET['option4'];
$option5=$_GET['option5'];
$id=$_GET['id'];
require 'test_test.php';
if(is_dir('userss/'.$admin)&&$admin!=''){
	if($pass==file_get_contents('userss/'.$admin.'/admin/passprotect556')){
		if($votetitle!=''&&$option1!=''&&$option2!=''&&$id!=''){
			
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
		
		//数据获取
		$data="{(id):$id,(votetitle):$votetitle,(option1):$option1,(option2):$option2,(option3):$option3,(option4):$option4,(option5):$option5}";
		if(file_exists('userss/'.$admin.'/admin/data/votelist')){
		$datas=file_get_contents('userss/'.$admin.'/admin/data/votelist');
		}else{$datas='';}
		//数据获取*
		
		if(strpos($datas,$data)!==false){
		//执行替换删除
		$data=str_replace($data,'',$datas);
		file_put_contents('userss/'.$admin.'/admin/data/votelist',$data);
		unlink('userss/'.$admin.'/admin/data/vote-'.$id);
		//执行替换删除*
		echo '删除成功';
		}else{echo '投票项目不存在';}
			
		}else{echo '参数不完整';}
	}else{echo '后台密码错误';}
}else{echo '后台账号不存在';}
?>