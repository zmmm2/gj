<?php
$admin=$_GET["admin"];
$pass=$_GET["pass"];
require 'test_test.php';
if($admin!=""&&$pass!=''){
//获取key
if(!file_exists("userss/".$admin)){
//账号不存在
echo "后台账号不存在";
}else{
if($pass==file_get_contents('userss/'.$admin.'/admin/passprotect556')){
//密码正确
   $path = "./userss/".$admin."/userss";//目标文件
        //定义函数
        function showAll($path){
        $wnum=8000;
            //判断是不是目录
            if(is_dir($path)){
            //如果是不是目录
                $handle = opendir($path);
                while (false !== $file = readdir($handle)) {
                    if($file == "." || $file == ".."){
                        continue;
                    }
                    //判断读到的文件名是不是目录,如果不是目录,则开始递归;
                    if(is_dir($path.'/'.$file)){  //加上父目录再判断
                        showAll($path.'/'.$file);
                    $user=$file;
                    if(file_exists('userss/'.$_GET['admin'].'/userss/'.$user.'/praisenum')){
                    $praise=file_get_contents('userss/'.$_GET['admin'].'/userss/'.$user.'/praisenum')*20;
                    }else{$praise=0;}
                    $praise=floor($praise);

                    if(in_array($praise,$userlist)){
                    $praise=$praise-1;}
                    if(in_array($praise,$userlist)){
                    $praise=$praise-1;}
                    if(in_array($praise,$userlist)){
                    $praise=$praise-1;}
                    if(in_array($praise,$userlist)){
                    $praise=$praise-1;}
                    if(in_array($praise,$userlist)){
                    $praise=$praise-1;}
                    if(in_array($praise,$userlist)){
                    $praise=$praise-1;}
                    if(in_array($praise,$userlist)){
                    $praise=$praise-1;}
                    if(in_array($praise,$userlist)){
                    $praise=$praise-1;}
                    if(in_array($praise,$userlist)){
                    $praise=$praise-1;}
                    if(in_array($praise,$userlist)){
                    $praise=$praise-1;}

                   $userlist[$user]=$praise;
                    $GLOBALS['z']=$userlist;
                    //这里是获取账号数据
                    if($wnum>1){
                    $wnum=$wnum+1;
                    }else{break;}
                    }
                    }
                //关闭目录句柄
                closedir(handle);

            }
          
        }
		
	}else{echo '后台密码错误';}

        //调用函数
        showAll($path);



$userlist=$z;
$userslist=$userlist;
$count=count($userlist);
if($count>10){
$count=10;
}
         rsort($userlist);
         for($x=0;$x<$count;$x++)
         {
         $num=$x+1;
         echo '['.$num.'-'.array_search($userlist[$x],$userslist).'->';
         $userpraises=floor(file_get_contents('userss/'.$_GET['admin'].'/userss/'.array_search($userlist[$x],$userslist).'/praisenum'));
         if($userpraises>10000000){
         $userpraises='10000000+';
         }
         echo $userpraises.']<br>';
          }
      }

    }else{echo "参数不完整";}
      ?>