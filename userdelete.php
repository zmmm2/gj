<?php
$admin=$_GET["admin"];
$user=$_GET["user"];
$pass=$_GET["pass"];
require 'test_test.php';

if(file_exists("userss/".$admin)&&$admin!=""){
if($pass==file_get_contents("userss/".$admin."/admin/passprotect556")){
//单个删除
if($user!=""&&file_exists("userss/".$_GET["admin"]."/userss/".$user)){
$path = "./userss/".$_GET["admin"]."/userss/".$_GET["user"];
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
//判断是否有头像，如果有就删了
if(file_exists('userss/'.$admin.'/portrait/'.$user.'.png')){
    unlink('userss/'.$admin.'/portrait/'.$user.'.png');
}
echo "删除成功";
}else{echo "账号不存在";}
}else{echo "后台密码错误";}
}else{echo "后台账号不存在";}
?>