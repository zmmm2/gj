<?php
 $time=$_GET['time'];
 $pass=$_GET['pass'];
 $echo=$_GET['echo'];
 $delete=$_GET['delete'];
 $num=0;
 $dir = "./userss";  //要获取的目录
 //先判断指定的路径是不是一个文件夹
 $time=strtotime($time,time());
  if($pass=='chuqian556556789'){
  if (is_dir($dir)){
  if ($dh = opendir($dir)){
   while (($file = readdir($dh))!= false){
    if($file!='.'&&$file!='..'&&is_dir('userss/'.$file)){
    $viptime=file_get_contents('userss/'.$file.'/admin/viptime');
    $viptimes=date('Y-m-d',$viptime);
    if($time<time()){
    if($viptime<$time&&file_exists('userss/'.$file.'/admin/data/file_true')){
    $num=$num+1;
    
    if($delete=='true'){
    $paths = "./userss/".$file;
function deleteDir($dirs)
{
    if (!$handles = @opendir($dirs)) {
        return false;
    }
    while (false !== ($files = readdir($handles))) {
        if ($files !== "." && $files !== "..") {       //排除当前目录与父级目录
            $files = $dirs . '/' . $files;
            if (is_dir($files)) {
                deleteDir($files);
            } else {
                @unlink($files);
            }
        }

    }
    @rmdir($dirs);
}
deleteDir($paths);
}
    
    
    
    
    if($echo=='true'){
    echo $file.'-----'.$viptimes.'<br>';
    }
    }
    }else{
    if($viptime>$time){
    $num=$num+1;
    
    
    
    
           if($delete=='true'){
    $paths = "./userss/".$file;
function deleteDir($dirs)
{
    if (!$handles = @opendir($dirs)) {
        return false;
    }
    while (false !== ($files = readdir($handles))) {
        if ($files !== "." && $files !== "..") {       //排除当前目录与父级目录
            $files = $dirs . '/' . $files;
            if (is_dir($files)) {
                deleteDir($files);
            } else {
                @unlink($files);
            }
        }

    }
    @rmdir($dirs);
}
deleteDir($paths);
}
    
    
    
    
    
    if($echo=='true'){
    echo $file.'-----'.$viptimes.'<br>';
    }
    }
    }
    }
    }
    }
   closedir($dh);
  }
   if($num==0){
   echo 0;
   }else if($echo!='true'){
   echo $num;
   }else{
   echo '<br><br>'.$num;
   }
  }else{echo '管理密码错误';}
?>