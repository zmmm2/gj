<?php
/*
$pass=$_GET["pass"];

if($pass=='456748974653456'){
function deleteDir($dir,$time)
{
    if (!$handle = @opendir($dir)) {
        return false;
    }
    while (false !== ($file = readdir($handle))) {
        if ($file !== "." && $file !== "..") {       //排除当前目录与父级目录
            $file = $dir . '/' . $file;
            if (file_exists($file) && file_get_contents($file)<$time) {
                unlink($file);
            }
        }

    }
}

$time = time()-60*5;
$link = new mysqli("localhost","appdoc","leimu520","appdoc");
$sql = "DELETE FROM `online` WHERE time < $time";
$link->query($sql);

deleteDir("./adminfrozen",time());
deleteDir("./userfrozen",time());

echo "清理成功";
}else{echo '管理密码错误';}
?>