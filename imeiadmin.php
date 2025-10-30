<?php
$admin=$_GET["admin"];
$pass=$_GET["pass"];
$time=$_GET["time"];
$imei=$_GET["imei"];
require 'test_test.php';
if(is_dir('userss/'.$admin)&&$admin!=''){
    if($pass==file_get_contents('userss/'.$admin.'/admin/passprotect556')){
        if(file_exists('userss/'.$admin.'/imei/'.$imei)&&$imei!=''){
            $imeitime=file_get_contents('userss/'.$admin.'/imei/'.$imei);
            if($imeitime<time()){
                $imeitime=time();
            }
            if(strpos($time,'hour')!==false||strpos($time,'day')!==false||strpos($time,'month')!==false||strpos($time,'year')!==false){
                if(file_get_contents('userss/'.$admin.'/admin/viptime')>time()){
                $imeitime=strtotime($time,$imeitime);
                if($imeitime<strtotime("1000year",time())){
                //时间正确
                echo "操作成功";
                file_put_contents('userss/'.$admin.'/imei/'.$imei,$imeitime);   
                }else{
                //时间错误
                echo "会员时间达到最大值";
                file_put_contents('userss/'.$admin.'/imei/'.$imei,strtotime("1000year",time()));
                }
                }else{echo '后台账号过期，无法操作';}
            }else{echo '时间参数错误';}
        }else{echo 'IMEI不存在';}
    }else{echo '后台密码错误';}
}else{echo '后台账号不存在';}
?>