<?php
!empty($_FILES)?:die(json_encode(["code"=>0,"msg"=>"请先选择文件"]));
if(!preg_match("/^[.\w_-]{1,100}\.(jpg|png)$/i",$_FILES["file"]["name"]))die(json_encode(["code"=>0,"msg"=>"文件格式错误"]));
if($_FILES["file"]["size"] > 1024*1024*5)die(json_encode(["code"=>0,"msg"=>"文件大小不能超过5M"]));
$newName = date("YmdHis").rand(1000000,9999999);
$form = preg_match("/[.]/",substr($_FILES["file"]["name"],-4,4))?substr($_FILES["file"]["name"],-4,4):".".substr($_FILES["file"]["name"],-4,4);
if(move_uploaded_file($_FILES["file"]["tmp_name"],"./upload/".$newName.$form)){
    echo "http://".$_SERVER['HTTP_HOST']."/ranBox/upload/".$newName.$form;
}else{
    die(json_encode(["code"=>0,"msg"=>"文件上传失败"]));
}