<?php
$admin=$_GET["admin"];
$file=$_GET["file"];
$pass=$_GET["pass"];
require 'test_test.php';
if($file!='fishing'&&$file!='password'&&$file!='kalmanuserecord'&&$file!='feedback'&&$file!='mail'&&$file!='thesaurus'&&$file!='customlist'&&$file!='
customshoplist'){
    if(is_dir("./userss/".$admin)&&$admin!=""){
        if(file_exists("./userss/".$admin.'/admin/data/'.$file)&&$file!=''){
            echo file_get_contents("./userss/".$admin.'/admin/data/'.$file);
        }else{
            echo '文档不存在';
        }
    }else{echo "后台账号不存在";}
}else{
    if(is_dir("./userss/".$admin)&&$admin!=""){
        if($pass==file_get_contents('./userss/'.$admin.'/admin/passprotect556')){
            if(file_exists("./userss/".$admin.'/admin/data/'.$file)&&$file!=''){
                if($file=='thesaurus'){
                    if(file_get_contents("./userss/".$admin.'/admin/data/'.$file)!=''){
                        echo print_r(json_decode(file_get_contents("./userss/".$admin.'/admin/data/'.$file),true));
                    }
                }else{echo file_get_contents("./userss/".$admin.'/admin/data/'.$file);}
            }else{
                echo '文档不存在';
            }
        }else{echo '后台密码错误';}
    }else{echo "后台账号不存在";}
}
?>