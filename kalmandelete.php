<?php
$admin=$_GET["admin"];
$kalman=$_GET["kalman"];
$pass=$_GET["pass"];
$query=$_GET["query"];
$mods=$_GET["mods"];
require 'test_test.php';
//单
if($mods==1){
if(file_exists("userss/".$admin)&&$admin!=""){
if($pass==file_get_contents("userss/".$admin."/admin/passprotect556")){
if($kalman!=""&&file_exists("userss/".$_GET["admin"]."/kalman/".$kalman)){
unlink("userss/".$admin."/kalman/".$kalman);
echo "删除成功";
}else{echo "卡密不存在";}
}else{echo "后台密码错误";}
}else{echo "后台账号不存在";}
}else if($mods==2){
//批
if(file_exists("userss/".$admin)&&$admin!=""){
if($pass==file_get_contents("userss/".$admin."/admin/passprotect556")){
$path = "./userss/".$admin."/kalman";//目标文件
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
                    $kalmantime=file_get_contents("userss/".$_GET["admin"]."/kalman/".$file);
                    if(is_file($path.'/'.$file)&&strpos($kalmantime,$_GET["query"]) !==false){  //加上父目录再判断
                        showAll($path.'/'.$file);
                        $kalman=$file;
                        if($kalman==""||!file_exists("userss/".$_GET["admin"]."/kalman/".$file)){                        
                        }else{
                     $admin=$_GET["admin"];
                    //这里是获取账号数据
                     unlink("userss/".$admin."/kalman/".$kalman);                                                           }
                    }
                    }
                //关闭目录句柄
                closedir($handle);
             echo "删除成功";
            }
          
        }
        //调用函数
        showAll($path);
}else{echo "后台密码错误";}
}else{echo "后台账号不存在";}
}else if($mods=="imei"){
//imei
if(file_exists("userss/".$admin)&&$admin!=""){
if($pass==file_get_contents("userss/".$admin."/admin/passprotect556")){
$path = "./userss/".$admin."/kalman";//目标文件
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
                    $kalmantime=file_get_contents("userss/".$_GET["admin"]."/kalman/".$file);
                    if(is_file($path.'/'.$file)&&strpos($kalmantime,$_GET["query"]) !==false&&strlen(preg_replace("/\\d+/",'', $kalmantime))==1){  //加上父目录再判断
                        showAll($path.'/'.$file);
                        $kalman=$file;
                        if($kalman==""||!file_exists("userss/".$_GET["admin"]."/kalman/".$file)){                        
                        }else{
                     $admin=$_GET["admin"];
                    //这里是获取账号数据
                     unlink("userss/".$admin."/kalman/".$kalman);                                                           }
                    }
                    }
                //关闭目录句柄
                closedir($handle);
             echo "删除成功";
            }
          
        }
        //调用函数
        showAll($path);
}else{echo "后台密码错误";}
}else{echo "后台账号不存在";}
}else{echo "删除模式错误";}