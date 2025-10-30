<?php
$route="admin/random";
$str=file_get_contents($route);
$str=(explode("|",$str));
$arraynum=count($str);
$arraynum=$arraynum-1;
$num=rand(0,$arraynum);
echo $str[$num];
?>