<?php
$admin=$_GET["admin"];
require 'test_test.php';
if(!file_exists("userss/".$admin)){
//账号不存在
echo "后台账号不存在";
}else{
   $path = "./userss/".$admin."/admin/data";//目标文件
        //定义函数
        function showAll($path){
            //判断是不是目录
            if(is_dir($path)){
            //如果是不是目录
                $handle = opendir($path);
                while (false !== $file = readdir($handle)) {
                    if($file == "." || $file == ".."){
                        continue;
                    }
                    //判断读到的文件名是不是目录,如果不是目录,则开始递归;
                    if(is_file($path.'/'.$file)&&strpos($file,"epay-")!==false){  //加上父目录再判断
                        showAll($path.'/'.$file);
                        $epay=$file;
                     $admin=$_GET["admin"];

/////----------获取支付参数

$s=file_get_contents("userss/".$_GET["admin"]."/admin/data/".$epay);
$b1= stripos($s,"|");
$c1=1;
$d1=$b1-$a-1;
$name= substr($s,$c1,$d1);//商品名
$a2= stripos($s,"|");
$b2= stripos($s,"||");
$c2=$a2+1;
$d2=$b2-$a2-1;
$money= substr($s,$c2,$d2);//售价
$a3= stripos($s,"||");
$b3= stripos($s,"|||");
$c3=$a3+2;
$d3=$b3-$a3-2;
$vip= substr($s,$c3,$d3);//会员时间
$a4= stripos($s,"|||");
$b4= stripos($s,"]");
$c4=$a4+3;
$d4=$b4-$a4-3;
$admin= substr($s,$c3,$d3);//归属后台账号

////-----------获取支付参数
 
                    if(1==1){
					//账号存在




//格式：[商品名|售价||会员时间]

           $epaylist=$epaylist."[".$epay."#".$name."|".$money."||".$vip."]";

}
                    //这里是获取账号数据
                    }
                    }
                echo  $epaylist;
                //关闭目录句柄
                closedir($handle);
            }
          
        }
        //调用函数
        showAll($path);
      }
      ?>