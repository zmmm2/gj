<!DOCTYPE html>
<html>
<title>后台统计</title>
</html>
<?php
if($_GET['pass']=='chuqian556'){
function getdirnum($file) {
$dirn = 0; //目录数
    global $dirn;
    global $filen;
    $file="./userss/";
    $dir = opendir($file);
    while($filename = readdir($dir)) {
      if($filename!="." && $filename !="..") {
        $filename = $file."/".$filename;
        if(is_dir($filename)) {
          $dirn++;
        }
      }
    }
  }
  getdirnum("./code");
echo '后台用户总数:'.$dirn;
}else{echo '管理密码错误';}
?>