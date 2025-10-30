<?php

function if_interact($link,$id,$db){
    $sql_new = "select * from $db where id='$id'";
    $data = mysqli_fetch_assoc($link->query($sql_new));
    if(empty($data)){
        die('该互动不存在');
    }
}

function delay($admin,$link){
    $sql = "select * from discuss_dly where admin='$admin'";
    $data = mysqli_fetch_assoc($link->query($sql));
    if($data['time']+30 > time())die('30秒只能留言一次');
}

function delay_put($admin,$link){
    $time = time();
    $sql_new = "select * from discuss_dly where admin='$admin'";
    $data = mysqli_fetch_assoc($link->query($sql_new));
    if(empty($data)){
        //写入新的行
        $sql_put="insert into discuss_dly(admin,time) values('$admin','1000')";
        if(!$link->query($sql_put))die('写入数据失败，请重试');
    }
    $sql="update discuss_dly SET time='$time' where admin='$admin'";
    if($link->query($sql)){
        return true;
    }else{
        return false;
    }
}

$admin = isset($_GET['admin'])?$_GET['admin']:null;
$pwd = isset($_GET['pwd'])?$_GET['pwd']:null;
$db = isset($_GET['db'])?$_GET['db']:null;
$id = isset($_GET['id'])?$_GET['id']:null;
require '../test_test.php';
if(strpos($admin,'/') !== false)die('后台账号不存在');
if($db != 'code' && $db != 'course' && $db != 'interact' && $db != 'moreCode')die('db参数错误');
if($admin === null || $pwd === null || $id === null)die('参数不完整');
if($admin == "appdoc")die("测试账号永久关闭");
if (!is_dir("../userss/" . $admin))die("后台账号不存在");
if (file_get_contents("../userss/" . $admin . "/admin/passprotect556") != $pwd) die("后台密码错误");
if (file_get_contents("../userss/" . $admin . "/admin/viptime") < time())die("后台账号过期，请先缴费");

$arr = [';', '"', "'", '$', '(', ')', '#', '\\','union','%'];
$newarr = ['[；]', '[＂]', '[＇]', '[￥]', '[（]', '[）]', '[#]', '[/]','unin','百分比'];

$content = isset($_POST['content'])?$_POST['content']:null;
if(strpos($content,'(html)') !== false)die('请不要使用html标签');
if($content === null)die('信息参数不完整');
if(mb_strlen($content) > 500)die('留言内容超出最大长度');
$time = time();
$content= str_replace($arr,$newarr,$content);
$sql="insert into discuss(admin,db,uid,content,time) values('$admin','$db','$id','$content','$time')";

$link= new mysqli("localhost","appdoc","123456","appdoc");
if(!$link)die('数据库连接失败，请联系站长');
delay($admin,$link);
if_interact($link,$id,$db);

if($link->query($sql) && delay_put($admin,$link,$time) === true){
    mysqli_close($link);
    die('留言成功');
}else{
    mysqli_close($link);
    die('留言失败,请重试');
}