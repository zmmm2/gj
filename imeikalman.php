<?php
$admin=$_GET['admin'];
$imei=$_GET['imei'];
$kalman=$_GET['kalman'];
require 'test_test.php';
if(is_dir('userss/'.$admin)&&$admin!=''){
    if(mb_strlen($imei)>=8&&mb_strlen($imei)<=20){
        if(file_exists('userss/'.$admin.'/kalman/'.$kalman)&&$kalman!=''){
            $kalmancontent=file_get_contents('userss/'.$admin.'/kalman/'.$kalman);
            if(substr($kalmancontent,-1,1)=='h'||substr($kalmancontent,-1,1)=='d'||substr($kalmancontent,-1,1)=='m'||substr($kalmancontent,-1,1)=='y'){
            if(strlen(preg_replace("/\\d+/",'', $kalmancontent))==1){
                if(!is_dir('userss/'.$admin.'/imei')){
                    mkdir('userss/'.$admin.'/imei',0777,true);
                }
                if(file_exists('userss/'.$admin.'/imei/'.$imei)){
                    if(file_get_contents('userss/'.$admin.'/imei/'.$imei)>time()){
                        $imeitime=file_get_contents('userss/'.$admin.'/imei/'.$imei);
                    }else{$imeitime=time();}
                }else{$imeitime=time();}
                if(strpos($kalmancontent,'h')!==false){
                $vip=str_replace('h','hour',$kalmancontent);
                }
                if(strpos($kalmancontent,'d')!==false){
                $vip=str_replace('d','day',$kalmancontent);
                }
                if(strpos($kalmancontent,'m')!==false){
                $vip=str_replace('m','month',$kalmancontent);
                }
                if(strpos($kalmancontent,'y')!==false){
                $vip=str_replace('y','year',$kalmancontent);
                }
                $imeitimes=strtotime($vip,$imeitime);
                file_put_contents('userss/'.$admin.'/imei/'.$imei,$imeitimes);
                unlink('userss/'.$admin.'/kalman/'.$kalman);
                echo '使用成功';
                }else{echo '卡密类型错误';}
            }else{echo '卡密类型错误';}
        }else{echo '卡密不存在';}
    }else{echo 'IMEI格式错误';}
}else{echo '后台账号不存在';}
?>