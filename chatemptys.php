<?php
$pass=$_GET['pass'];
if($pass=='chuqian556chuyi'){
   $path = "chat";//目标文件
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
						$files=$path.'/'.$file;
						$filetime=filemtime($files);
						if($filetime<time()-2592000){
							unlink($files);
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
        echo '清理完毕';
}else{echo '管理密码错误';}
      ?>