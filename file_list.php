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
            }else{$login='<center>未续费过的账号无权使用</center>';}
        }else{$login='<center>后台账号过期，无法操作</center>';}
    }else{$login='<center>后台密码错误</center>';}
}else{$login='<center>后台账号不存在</center>';}
//登录系统

   if($login=='登录成功'){
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
                        $filetime=filemtime($files);//创建时间戳
                        $filetime=date('Y-m-d H:i',$filetime);//创建时间
                        $filesize=filesize($files);//文件字节大小
                        $fileunit='B';
                        if($filesize>=1024){
                            //大于1024B，转换为KB
                            $filesize=$filesize/1024;
                            $fileunit='KB';
                            if($filesize>=1024){
                                //大于1024KB，转换为M
                                $filesize=$filesize/1024;
                                $fileunit='M';
                            }
                            $filesize=round($filesize, 2); 
                            echo '['.$file.'|'.$filetime.'||'.$filesize.$fileunit.']';
                        }
                        
                    }
                    }
                //关闭目录句柄
                closedir(handle);

            }
          
        }
    showAll($path);
   }
   }else{echo $login;}
      ?>