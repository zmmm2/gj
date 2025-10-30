<?php
$pwd = isset($_GET['pwd'])?$_GET['pwd']:null;
$pwds = isset($_GET['pwds'])?$_GET['pwds']:null;
$db = isset($_GET['db'])?$_GET['db']:null;
$title = isset($_GET['title'])?$_GET['title']:null;
$content = isset($_GET['content'])?$_GET['content']:null;
$id = isset($_GET['id']) && is_numeric($_GET['id'])?$_GET['id']:null;
if($pwd != 'chuyi556556' || $pwds != 'leimu520')die('管理密码错误');
if($db === null)die('信息错误');
if($db != 'interact' && $db != 'code' && $db != 'moreCode' && $db != 'course')die('信息错误');
$link = new mysqli("localhost", "appdoc", "123456", "appdoc");
if (!$link) die('数据库连接失败，请联系站长');
$arr = [';', '"', "'", '$', '(', ')', '#', '\\','union'];
$newarr = ['[；]', '[＂]', '[＇]', '[￥]', '[（]', '[）]', '[#]', '[/]','unin'];
$title= str_replace($arr,$newarr,$title);
$content= str_replace($arr,$newarr,$content);
$sql = "update $db SET `title`='$title' where `check`=0 and `id`=$id";
if($link->query($sql)){
    echo '修改成功';
}else{
    echo '发生了一个预期之外的错误';
}
mysqli_close($link);
exit;