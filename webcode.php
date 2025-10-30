<?php
die('该功能暂时停用');

$url = isset($_GET['url'])?$_GET['url']:null;
if($url === null)die('请输入网站参数');
if(!preg_match("/http[s]?:\/\/[\w.]+[\w\/]*[\w.]*\??[\w=&\+\%]*/is",$url))die('请输入正确的网站');
$html = file_get_contents($url);
if($html === false){die('未查找到该网址');}
echo "
<!DOCTYPE html>
<html style=\"background-color:#fff\">

<textarea style=\"width: 100%; height: 3000px; border: 0;\">$html</textarea>

</html>
";