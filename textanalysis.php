<?php
$text=$_GET['text'];
if(strpos($text,'eval(') !== false)die('验证失败');
if($text!=''){
echo '文本字符大小:'.strlen($text);
echo '<br>文本所占长度:'.mb_strlen($text);
$str = "$text";
preg_match_all("/[0-9]{1}/",$str,$arrNum);
preg_match_all("/[a-zA-Z]{1}/",$str,$arrAl);
preg_match_all("/([\x{4e00}-\x{9fa5}]){1}/u",$str,$arrCh);
echo "<br>文本中数字个数:".count($arrNum[0])."<br>";
echo "文本中字母个数:".count($arrAl[0])."<br>";
echo "文本中中文个数:".count($arrCh[0]);
echo '<br>----------';
echo '<br>MD5加密后:'.md5($text);
}else{echo '参数不能为空';}