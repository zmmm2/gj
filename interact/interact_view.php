<?php
$link = new mysqli("localhost", "appdoc", "123456", "appdoc");
if (!$link) die('数据库连接失败，请联系站长');
$db = isset($_GET['db']) ? $_GET['db'] : null;
$id = isset($_GET['id']) && is_numeric($_GET['id']) ? $_GET['id'] : null;
if($id == 0)exit;
if ($db != 'interact' && $db != 'code' && $db != 'moreCode' && $db != 'course') die('db参数错误');
if ($id === null) die('id参数错误');
$sql = "update $db set view=view+1 where `check`=1 and `id` = $id";
$link->query($sql);
mysqli_close($link);