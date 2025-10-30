<?php
$pwd = isset($_GET['pwd'])?$_GET['pwd']:null;
$pwds = isset($_GET['pwds'])?$_GET['pwds']:null;
$op = isset($_GET['op'])?$_GET['op']:null;
$db = isset($_GET['db'])?$_GET['db']:null;
$id = isset($_GET['id']) && is_numeric($_GET['id'])?$_GET['id']:null;
$check = isset($_GET['check'])?$_GET['check']:0;
if($pwd != '12345' || $pwds != '456789')die('管理密码错误');
if($db === null)die('信息错误');
if($db != 'interact' && $db != 'code' && $db != 'moreCode' && $db != 'course')die('信息错误');
$link = new mysqli("localhost", "appdoc", "123456", "appdoc");
if (!$link) die('数据库连接失败，请联系站长');
if($op == 'check'){
    if($id === null)die('id错误');
    if($check == '1'){
        $time = time();
        $sql="update $db SET `check`=1,`time`=$time where `check`=0 and `id`=$id";
    }else{
        $sql="delete from $db where id=$id";
        $sql_discuss="delete from discuss where `uid`=$id AND `db`='$db'";
    }
    if($link->query($sql) && ($link->query($sql_discuss) || $check == 1)){
        echo '审核成功';
    }else{
        echo '发生了一个错误';
    }
}else{
    $sql = "SELECT * FROM $db WHERE `check` =0 ORDER BY id DESC";
    $see = $link->query($sql);
    while($new_see = mysqli_fetch_assoc($see)){
        echo '["]'.json_encode($new_see);
    }
}
mysqli_close($link);
exit;