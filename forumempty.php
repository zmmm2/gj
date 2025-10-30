<?php
$admin=$_GET["admin"];
$pass=$_GET["pass"];
require 'test_test.php';
if(file_exists("userss/".$admin)&&$admin!=""){
if($pass==file_get_contents("userss/".$admin."/admin/passprotect556")){
if(is_dir('userss/'.$admin.'/forum')&&$admin!=''){
$path = "./userss/".$_GET['admin'].'/forum';//路径
function deleteDir($dir)
{
    if (!$handle = @opendir($dir)) {
        return false;
    }
    while (false !== ($file = readdir($handle))) {
        if ($file !== "." && $file !== "..") {       //排除当前目录与父级目录
            $file = $dir . '/' . $file;
            if (is_dir($file)) {
                deleteDir($file);
            } else {
                @unlink($file);
            }
        }

    }
    @rmdir($dir);
}
deleteDir($path);
echo "清空成功";
}else{echo '暂无板块数据';}
}else{echo "密码错误";}
}else{echo "后台账号不存在";}
?>