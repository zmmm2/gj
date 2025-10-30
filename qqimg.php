<?php
$qq = $_GET["qq"];
if($qq!=""){
if(strlen($qq)>=5&&strlen($qq)<=10&&is_numeric($qq)){
echo '<img src="'.'http://q1.qlogo.cn/g?b=qq&nk='.$qq.'&s=100&t='. time() .'">';
}else{echo "QQ号码格式错误";}
}else{echo "参数不完整";}
?>
