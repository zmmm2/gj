<?php
   $user=$_GET['user'];
   $pass=$_GET['pass'];
require 'test_test.php';
         //登录系统
if(is_dir('userss/'.$user)&&$user!=''){
    if($pass==file_get_contents('userss/'.$user.'/admin/passprotect556')){
        if(file_get_contents('userss/'.$user.'/admin/viptime')>time()){
            if(!file_exists('userss/'.$user.'/admin/data/file_true')){
                $login='登录成功';
            }else{$login='<center>未续费过得账号无权使用</center>';}
        }else{$login='<center>后台账号过期，无法操作</center>';}
    }else{$login='<center>后台密码错误</center>';}
}else{$login='<center>后台账号不存在</center>';}
//登录系统
   if($login=='登录成功'){
    $usermaxsize=50;//一个用户最大容量，单位:M
    include 'admin/user_max_size.php';//查看是否有特殊内存加成
    $usermaxsize=$usermaxsize.'M';
   if(is_dir('file/'.$user)&&$user!=''){
   $path = "./file/".$user;//目标文件
        //定义函数
        function showAll($path){
            //判断是不是目录
            if(is_dir($path)){
            //如果是不是目录
                $handle = opendir($path);
                while (false !== $file = readdir($handle)) {
                    if($file == "." || $file == ".."){
                        continue;
                    }
                    //判断读到的文件名是不是目录,如果不是目录,则开始递归;
                    if(file_exists($path.'/'.$file)){  //加上父目录再判断
                        $files=$path.'/'.$file;
                        $filesize=filesize($files)+$filesize;
                        $GLOBALS['filesizes']=$filesize;
                    //这里是获取账号数据
                    }
                    }
                //关闭目录句柄
                @closedir(handle);

            }
          
        }
    showAll($path);
    if($filesizes==''){echo '0M/'.$usermaxsize;}else{
    $filesizes=round($filesizes/1024/1024,2);
    echo $filesizes.'M/'.$usermaxsize;}
   }else{echo '0M/'.$usermaxsize;}
   }else{echo $login;}
      ?>