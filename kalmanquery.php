<?php
$admin=$_GET["admin"];
$pass=$_GET["pass"];
$mods=$_GET["mods"];
require 'test_test.php';
if($mods!='imei'){
if($admin!=""&&$pass!=""&&$_GET["query"]!=""){
//获取key
if(!file_exists("userss/".$admin)){
//账号不存在
echo "后台账号不存在";
}else{
$ipass=file_get_contents("userss/".$admin."/admin/passprotect556");
if($pass==$ipass){
//密码正确
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
                     $admin=$_GET["admin"];
                    //这里是获取账号数据
                    $time=file_get_contents("userss/".$admin."/kalman/".$kalman);
                    $filemtime=filemtime("userss/".$admin."/kalman/".$file);
                    if($admin!=""&&$kalman!=""){
					//账号存在
    				$kalmanlist= $kalmanlist."卡密:".$kalman."<br>时间:".$time."<br>创建时间:".date("Y-m-d",$filemtime)."<br>-----<br>";
					}
                    //这里是获取账号数据
                    }
                    }
                echo substr($kalmanlist,"0","-9");
                //关闭目录句柄
                closedir($handle);
            }
          
        }
        //调用函数
        showAll($path);
        }else{echo "后台密码错误";}
      }
    }else{echo "参数不完整";}
}else{
    if($admin!=""&&$pass!=""&&$_GET["query"]!=""){
//获取key
if(!file_exists("userss/".$admin)){
//账号不存在
echo "后台账号不存在";
}else{
$ipass=file_get_contents("userss/".$admin."/admin/passprotect556");
if($pass==$ipass){
//密码正确
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
                    if(is_file($path.'/'.$file)&&strlen(preg_replace("/\\d+/",'', $kalmantime))==1&&strpos($kalmantime,$_GET["query"])!==false){  //加上父目录再判断
                        showAll($path.'/'.$file);
                        $kalman=$file;
                     $admin=$_GET["admin"];
                    //这里是获取账号数据
                    $time=file_get_contents("userss/".$admin."/kalman/".$kalman);
                    $filemtime=filemtime("userss/".$admin."/kalman/".$file);
                    if($admin!=""&&$kalman!=""){
					//账号存在
    				$kalmanlist= $kalmanlist."卡密:".$kalman."<br>时间:".$time."<br>创建时间:".date("Y-m-d",$filemtime)."<br>-----<br>";
					}
                    //这里是获取账号数据
                    }
                    }
                echo substr($kalmanlist,"0","-9");
                //关闭目录句柄
                closedir($handle);
            }
          
        }
        //调用函数
        showAll($path);
        }else{echo "后台密码错误";}
      }
    }else{echo "参数不完整";}
}
?>