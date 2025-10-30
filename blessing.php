<?php
$route="./admin/ blessing";
$str=file_get_contents($route);
$str=(explode("|",$str));
$arraynum=count($str);
$arraynum=$arraynum-1;
$num=rand(0,$arraynum);
die($str[$num]);
?>