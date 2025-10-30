<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
<title>联系客服</title>
</head>
<body>
<h4><center>
<?php
$myqq=$_COOKIE['MYQQ'];
require 'test_test.php';
if($myqq!=''&&$myqq!='FALSE'){
if(file_exists('userss/'.$myqq.'/admin/set/MyService')){
echo '<b>'.file_get_contents('userss/'.$myqq.'/admin/set/MyService').'</b>';
}else{echo '<b>后台暂未配置联系方式</b>';}
}else{echo '<b>后台暂未配置联系方式</b>';}
?>
</h4></center>
</body>
</html>