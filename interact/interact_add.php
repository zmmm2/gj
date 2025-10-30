<?php

function delay($admin,$link){
    $sql = "select * from delay where admin='$admin'";
    $data = mysqli_fetch_assoc($link->query($sql));
    if($data['time']+60 > time())die('一分钟只能发布一次');
}

function delay_put($admin,$link){
    $time = time();
    $sql_new = "select * from delay where admin='$admin'";
    $data = mysqli_fetch_assoc($link->query($sql_new));
    if(empty($data)){
        //写入新的行
        $sql_put="insert into delay(admin,time) values('$admin','1000')";
        if(!$link->query($sql_put))die('写入数据失败，请重试');
    }
    $sql="update delay SET time='$time' where admin='$admin'";
    if($link->query($sql)){
        return true;
    }else{
        return false;
    }
}

$admin = isset($_GET['admin'])?$_GET['admin']:null;
$pwd = isset($_GET['pwd'])?$_GET['pwd']:null;
$db = isset($_GET['db'])?$_GET['db']:null;
if(strpos($admin,'/') !== false)die('后台账号不存在');
if($db != 'code' && $db != 'course' && $db != 'interact' && $db != 'moreCode')die('db参数错误');
if($admin === null || $pwd === null)die('账号参数不完整');
if($admin == "appdoc")die("测试账号永久关闭");
if (!is_dir("../userss/" . $admin))die("后台账号不存在");
if (file_get_contents("../userss/" . $admin . "/admin/passprotect556") != $pwd) die("后台密码错误");
if (file_get_contents("../userss/" . $admin . "/admin/viptime") < time())die("后台账号过期，请先缴费");

$arr = [';', '"', "'", '$', '(', ')', '#', '\\','union','%'];
$newarr = ['[；]', '[＂]', '[＇]', '[￥]', '[（]', '[）]', '[#]', '[/]','unin','百分比'];

$title = isset($_POST['title'])?$_POST['title']:null;
$content = isset($_POST['content'])?$_POST['content']:null;
if(strpos($title,'(html)') !== false || strpos($content,'(html)') !== false)die('请不要使用html标签');
if($title === null || $content === null)die('信息参数不完整');
if(mb_strlen($title) > 20 ||mb_strlen($content) > 2000)die('标题或内容超出最大长度');
$time = time();
$title= str_replace($arr,$newarr,$title);
$content= str_replace($arr,$newarr,$content);
$sql="insert into $db(admin,title,content,time) values('$admin','$title','$content','$time')";

$link = new mysqli("localhost", "appdoc", "123456", "appdoc");
if(!$link)die('数据库连接失败，请联系站长');
delay($admin,$link);

if($link->query($sql) && delay_put($admin,$link,$time) === true){
    mysqli_close($link);
    $die = '发布成功';
    die($die);
}else{
    mysqli_close($link);
    die('发布失败,请重试');
}