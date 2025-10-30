<?php
$admin=$_GET["admin"];
$pass=$_GET["pass"];
require 'test_test.php';
if($admin!=""&&file_exists("userss/".$admin)){
if($pass==file_get_contents("userss/".$admin."/admin/passprotect556")){
//全部通过
    //用来统计一个目录下的文件和目录的个数
        $dirn = 0; //目录数
        $dayregister=0;//今日注册
        $daylogins=0;//今日登陆
    function getdirnum($file) {
        global $dirn;
        global $dayregister;
        global $daylogins;
        $file="./userss/".$_GET["admin"]."/userss/";
        $dir = opendir($file);
        while($filename = readdir($dir)) {
            if($filename!="." && $filename !="..") {
                $filename = $file."/".$filename;
 
 
                if(is_dir($filename)){
                 //登陆时间截取
                if(file_exists($filename.'/logintime')){
                $logintimes=file_get_contents($filename.'/logintime');
                }else{$logintimes='2003-08-13 8:00';}
                $poss=strpos($logintimes,' ');
                $logintimes=substr($logintimes,0,$poss);
                //登陆时间截取
                //注册时间截取
                $registertime=file_get_contents($filename.'/registertime');
                $pos=strpos($registertime,' ');
                $registertime=substr($registertime,0,$pos);
                //注册时间截取
                if($logintimes==date('Y-m-d',time())){
                $daylogins++;
                     }
                if($registertime==date('Y-m-d',time())){
                $dayregister++;
                     }
                    $dirn++;
                }
           }
        }
    }
    getdirnum("./code");
    //用来统计一个目录下的文件和目录的个数
        $filen = 0; //文件数
    function getfilenum($file) {
        global $dirn;
        global $filen;
        $file="./userss/".$_GET["admin"]."/kalman/";
        $dir = opendir($file);
        while($filename = readdir($dir)) {
            if($filename!="." && $filename !="..") {
                $filename = $file."/".$filename;
 
 
                if(is_file($filename)) {
                    $filen++;
                }
           }
        }
    }
    getfilenum("./code");
if(file_exists('userss/'.$admin.'/admin/data/income')){
$income=file_get_contents('userss/'.$admin.'/admin/data/income');
}else{$income='0.00';}

if(!is_dir('./userss/'.$admin))die('后台账号不存在');
$time = time()-60*5;
$link = new mysqli("localhost","appdoc","leimu520","appdoc");
$sql = "SELECT COUNT(*) FROM `online` WHERE admin = '{$admin}' and time > '{$time}'";
$online_num = mysqli_fetch_array($link->query($sql))["COUNT(*)"];
mysqli_close();

    echo "用户总数:".$dirn.'<br>今日登录:'.$daylogins.'<br>今日注册:'.$dayregister."<br>卡密总数:".$filen."<br>启动总数:".file_get_contents("userss/".$admin."/admin/data/startnum")."<br>收入总数:".$income.'<br>在线人数:'.$online_num.'<br>';
    exit;
    
}else{echo "后台密码错误";}
}else{echo "后台账号不存在";}
