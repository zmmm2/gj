<?php
$admin=$_GET["admin"];
$user=$_GET["user"];
require 'test_test.php';

if($admin!=""&&$user!=""){
//获取key
if(!file_exists("userss/".$admin)){
//账号不存在
echo "后台账号不存在";
}else{
//密码正确
   $path = "chat";//目标文件
        //定义函数
        function showAll($path){
            //判断是不是目录
            if(is_dir($path)){
            //如果是不是目录
                $handle = opendir($path);
                while (false !== $file = readdir($handle)) {
                    $adminnum=stripos($file,'-'.$_GET['user']);
                    $adminsss=substr($file,0,$adminnum+1);
                    if($file == "." || $file == ".."||$adminsss!=$_GET['admin'].'-'){
                        continue;
                    }
                    //判断读到的文件名是不是目录,如果不是目录,则开始递归;
                    if(is_file($path.'/'.$file)){  //加上父目录再判断
                        showAll($path.'/'.$file);
                        $chatlist=$file;

	       if(strpos($file,$usersss.$_GET['user'].'-')!==false){
$chatnum=strlen($_GET['admin'].'-'.$_GET['user'].'-');
$usersnum=strlen($_GET_['user']);
$chatlist=substr($chatlist,$chatnum);
    				echo '['.$chatlist.']';
}
					
                    //这里是获取账号数据
                    }
                    }
                //关闭目录句柄
                closedir($handle);
            }
          
        }
        //调用函数
        showAll($path);
      }
    }else{echo "参数不完整";}
      ?>