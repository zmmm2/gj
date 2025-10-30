<?php
$admin=$_GET['admin'];
$user=$_GET['user'];
$pass=$_GET['pass'];
$option=$_GET['option'];
$id=$_GET['id'];
require 'test_test.php';

//判断账号封禁状态
$sealroute="userss/".$admin."/userss/".$user."/seal";
$seal='true';
if(file_exists($sealroute)){
$sealtime=file_get_contents($sealroute);
if($sealtime>=time()){
$seal='false';
}
}
//判断账号封禁状态*

//获取用户投票过的ID
if(file_exists('userss/'.$admin.'/userss/'.$user.'/voteid')){
$uservoteid=file_get_contents('userss/'.$admin.'/userss/'.$user.'/voteid');
}else{$uservoteid='';}
//获取用户投票过的ID*

//判断是否已经投票过
if(strpos($uservoteid,"($id)")!==false){
echo '你已经投过票了';
exit;
}
//判断是否已经投票过

if(is_dir('userss/'.$admin)&&$admin!=''){
	if(is_dir('userss/'.$admin.'/userss/'.$user)&&$user!=''){
		if($pass==file_get_contents('userss/'.$admin.'/userss/'.$user.'/passprotect556')){
                include 'logintrue.php';
			if($seal=='true'){
				if($option!=''&&$id!=''){
					if($option=='option1'||$option=='option2'||$option=='option3'||$option=='option4'||$option=='option5'){
						if(file_exists('userss/'.$admin.'/admin/data/vote-'.$id)){
							
							//获取数据并转化
							$data=file_get_contents('userss/'.$admin.'/admin/data/vote-'.$id);
							$array=json_decode($data,true);
							$option1=$array['option1'];
							$option2=$array['option2'];
							$option3=$array['option3'];
							$option4=$array['option4'];
							$option5=$array['option5'];
							//获取数据并转化
							
							//票数增加
							//第一选项
							if($option=='option1'){
							$option1=$option1+1;
							$arrays=array(
								'option1'=>$option1,
								'option2'=>$option2,
								'option3'=>$option3,
								'option4'=>$option4,
								'option5'=>$option5,
							);
							$jsons=json_encode($arrays,JSON_UNESCAPED_UNICODE);//最终票数变量
							file_put_contents('userss/'.$admin.'/admin/data/vote-'.$id,$jsons);
							file_put_contents('userss/'.$admin.'/userss/'.$user.'/voteid',"($id)".$uservoteid);
							echo '投票成功';
							}
							//第一选项*
							//第二选项
							if($option=='option2'){
							$option2=$option2+1;
							$arrays=array(
								'option1'=>$option1,
								'option2'=>$option2,
								'option3'=>$option3,
								'option4'=>$option4,
								'option5'=>$option5,
							);
							$jsons=json_encode($arrays,JSON_UNESCAPED_UNICODE);//最终票数变量
							file_put_contents('userss/'.$admin.'/admin/data/vote-'.$id,$jsons);
							file_put_contents('userss/'.$admin.'/userss/'.$user.'/voteid',"($id)".$uservoteid);
							echo '投票成功';
							}
							//第二选项*
							//第三选项
							if($option=='option3'){
							if(is_numeric($option3)&&$option3!='无'&&$option3>=0){
							$option3=$option3+1;
							$arrays=array(
								'option1'=>$option1,
								'option2'=>$option2,
								'option3'=>$option3,
								'option4'=>$option4,
								'option5'=>$option5,
							);
							$jsons=json_encode($arrays,JSON_UNESCAPED_UNICODE);//最终票数变量
							file_put_contents('userss/'.$admin.'/admin/data/vote-'.$id,$jsons);
							file_put_contents('userss/'.$admin.'/userss/'.$user.'/voteid',"($id)".$uservoteid);
							echo '投票成功';
							}else{echo '选项不存在，无法投票';}
							}
							//第三选项*
							//第四选项
							if($option=='option4'){
							if(is_numeric($option4)&&$option4!='无'&&$option4>=0){
							$option4=$option4+1;
							$arrays=array(
								'option1'=>$option1,
								'option2'=>$option2,
								'option3'=>$option3,
								'option4'=>$option4,
								'option5'=>$option5,
							);
							$jsons=json_encode($arrays,JSON_UNESCAPED_UNICODE);//最终票数变量
							file_put_contents('userss/'.$admin.'/admin/data/vote-'.$id,$jsons);
							file_put_contents('userss/'.$admin.'/userss/'.$user.'/voteid',"($id)".$uservoteid);
							echo '投票成功';
							}else{echo '选项不存在，无法投票';}
							}
							//第四选项*
							//第五选项
							if($option=='option5'){
							if(is_numeric($option5)&&$option5!='无'&&$option5>=0){
							$option5=$option5+1;
							$arrays=array(
								'option1'=>$option1,
								'option2'=>$option2,
								'option3'=>$option3,
								'option4'=>$option4,
								'option5'=>$option5,
							);
							$jsons=json_encode($arrays,JSON_UNESCAPED_UNICODE);//最终票数变量
							file_put_contents('userss/'.$admin.'/admin/data/vote-'.$id,$jsons);
							file_put_contents('userss/'.$admin.'/userss/'.$user.'/voteid',"($id)".$uservoteid);
							echo '投票成功';
							}else{echo '选项不存在，无法投票';}
							}
							//第五选项*
							//票数增加*
							
						}else{echo '投票项目不存在';}
					}else{echo '选项不存在';}
				}else{echo '参数不完整';}
			}else{echo "投票失败，账号封禁至".date('Y-m-d H:i',$sealtime);}
		}else{echo '密码错误';}
	}else{echo '账号不存在';}
}else{echo '后台账号不存在';}
?>