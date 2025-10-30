<?php
$content=$_GET['content'];
if(strpos($content,'eval(') !== false)die('Not');
if($content!=''){
echo 'md5加密结果:'.md5($content);
}else{echo '请输入内容';}
?>