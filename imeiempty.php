<?php
$admin=$_GET['admin'];
$pass=$_GET['pass'];
require 'test_test.php';
if(is_dir("userss/".$admin)&&$admin!=""){
if($pass==file_get_contents("userss/".$admin."/admin/passprotect556")){
$path = "./userss/".$admin."/imei";//目标文件
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
                    if(is_file($path.'/'.$file)){  //加上父目录再判断
                        showAll($path.'/'.$file);
                        $imei=$file;
                        if($imei==""||!file_exists("userss/".$_GET["admin"]."/imei/".$file)){                        
                        }else{
                     $admin=$_GET["admin"];
                    //这里是获取账号数据
                     unlink("userss/".$admin."/imei/".$imei);                                                           }
                    }
                    }
                //关闭目录句柄
                closedir($handle);
        
            }
          
        }
        //调用函数
        showAll($path);
echo "清空成功";
}else{echo "后台密码错误";}
}else{echo "后台账号不存在";}
?>