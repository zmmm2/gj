<?php
$docking = file_get_contents('./admin/docking');

$notice = file_get_contents('./admin/notice');

$exchange = file_get_contents('./admin/exchange');

$str=file_get_contents('./admin/random');
$str=(explode("|",$str));
$arraynum=count($str);
$arraynum=$arraynum-1;
$num=rand(0,$arraynum);
$random = $str[$num];

$data = [
    "docking"=>$docking,
    "notice"=>$notice,
    "exchange"=>$exchange,
    "random"=>$random
];

die(json_encode($data));