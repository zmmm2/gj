<?php
   $user=$_GET['user'];
   $pass=$_GET['pass'];
   $file=$_GET['file'];
require 'test_test.php';
   //登录系统
if(strpos($file,"/")!==false || strpos($file,"\\")!==false)die("文件名格式错误");
if(is_dir('./userss/'.$user)&&$user!=''){
    if($pass==file_get_contents('./userss/'.$user.'/admin/passprotect556')){
        if(file_get_contents('./userss/'.$user.'/admin/viptime')>time()){
            if(!file_exists('./userss/'.$user.'/admin/data/file_true')){
                $login='登录成功';
            }else{$login='<center>未续费过得账号无权使用</center>';}
        }else{$login='<center>后台账号过期，无法操作</center>';}
    }else{$login='<center>后台密码错误</center>';}
}else{$login='<center>后台账号不存在</center>';}
//登录系统
   if($login=="登录成功"){
       if(is_dir('./file/'.$user)){
           if(file_exists('./file/'.$user.'/'.$file)&&$file!=''){
               unlink('./file/'.$user.'/'.$file);
               echo '删除成功';
           }else{echo '文件不存在';}
       }else{echo '该账号无文件数据';}
   }else{echo $login;}
?>