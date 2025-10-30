<?php
$file=$_GET["file"];
require 'test_test.php';
if($file!='codeIP'&&$file!='IP'&&$file!='userIP'&&$file!='codeIP'&&$file!='sign'&&$file!='api'){
echo file_get_contents("./admin/".$file);
}else{echo 'No access';}
?>