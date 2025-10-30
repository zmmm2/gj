<!DOCTYPE HTML>
<html>
<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0'/>
    <title>文件上传</title>
</head>
</html>

<?php
session_start();
$user=$_GET['user'];
$pass=$_GET['pass'];
require 'test_test.php';
//登录系统
if(is_dir('userss/'.$user)&&$user!=''){
    if($pass==file_get_contents('userss/'.$user.'/admin/passprotect556')){
        if(file_get_contents('userss/'.$user.'/admin/viptime')>time()){
            if(!file_exists('userss/'.$user.'/admin/data/file_true')){
                $login='登录成功';
            }else{$login='<center>续费过的账号才可以使用文件托管</center>';}
        }else{$login='<center>后台账号过期，无法操作</center>';}
    }else{$login='<center>后台密码错误</center>';}
}else{$login='<center>后台账号不存在</center>';}
//登录系统
if($login=='登录成功'){

    
    //获取目前占用量
   $path = 'file/'.$user;//目标文件
        //定义函数
        function showAll($path){
            //判断是不是目录
            if(is_dir($path)){
            //如果是不是目录
                $handle = opendir($path);
                while (false !== $file = readdir($handle)) {
                    if($file == '.' || $file == '..'){
                        continue;
                    }
                    //判断读到的文件名是不是目录,如果不是目录,则开始递归;
                    if(file_exists($path.'/'.$file)){  //加上父目录再判断
                        $files=$path.'/'.$file;
                        if($filesize==''){
                        $filesize=0;
                        }
                        $filesize=filesize($files)+$filesize;
                        $_SESSION['FILESIZE']=$filesize;
                    //这里是获取账号数据
                    }
                    }
                //关闭目录句柄
                @closedir(handle);
            }
        }
    showAll($path);
    if(!isset($_SESSION['FILESIZE'])){
        $_SESSION['FILESIZE']=0;
    }
//获取目前占用量

if(!is_dir('file/'.$user)){
mkdir('file/'.$user,0777,true);//初始化
}
$filename= substr(strrchr($_FILES['file']['name'], '.'), 1);
$_FILES['file']['name']= str_replace('&','_',$_FILES['file']['name']);
$_FILES['file']['name']= str_replace('#','_',$_FILES['file']['name']);
if (!preg_match('/[\x7f-\xff]/', $_FILES['file']['name'])){
if($_FILES['file']['name']!=''){
$maxsize=10;//单次上传最大容量，单位:M
$usermaxsize=50;//一个用户最大容量，单位:M
include 'admin/user_max_size.php';//查看是否有特殊内存加成
$maxsize=$maxsize*1024*1024;
$usermaxsize=$usermaxsize*1024*1024;
if($_FILES['file']['size']+$_SESSION['FILESIZE']<$usermaxsize){
if($_FILES['file']['size']>$maxsize){
echo '<center>单次上传不能大于10M</center>';
}else{
if($filename=='apk'||$filename=='txt'||$filename=='gif'||$filename=='jpg'||$filename=='jpag'||$filename=='png'||$filename=='zip'||$filename=='doc'||$filename=='docx'||$filename=='exe'||$filename=='ppt'||$filename=='iApp'||$filename=='rar'){
if(strpos($filename,'[')===false&&strpos($filename,'|')===false&&strpos($filename,']')===false){
move_uploaded_file($_FILES['file']['tmp_name'],'file/'.$user.'/'.$_FILES['file']['name']);
echo '<center><br /><br />上传成功<content>';
echo '<br><center>文件名:'.$_FILES['file']['name'].'<content>';
echo '<br><center>文件类型:'. $_FILES['file']['type'].'<content>';
}else{echo '<center>文件名错误</center>';}
}else{echo '<center>文件格式错误</center>';}
}
}else{echo '<center>上传失败:存储容量已用完</center>';}
}else{echo '<center>请选择文件</center>';}
}else{echo '<center>文件名不可包含中文</center>';}
}else{echo $login;}
session_destroy();