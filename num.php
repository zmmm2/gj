<?php
$num1=$_GET["num1"];
$num2=$_GET["num2"];
if($num1<=$num2&&$num1!=""&&$num2!=""){
echo rand($num1,$num2);
}else{echo "最大值必须大于最小值";}
?>