<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<title>易对接后台</title>
</head>
<?php
/* *
 * 功能：即时到账交易接口接入页
 * 
 * 以下代码只是为了方便商户测试而提供的样例代码，商户可以根据自己网站的需要，按照技术文档编写,并非一定要使用该代码。
 * 该代码仅供学习和研究支付宝接口使用，只是提供一个参考。
 */
$id=$_GET["id"];
$user=$_GET["user"];
$admin=$_GET["admin"];
$id="epaymoney-".$id;
require 'test_test.php';
session_start();
$_SESSION['admin']=$admin;
$_SESSION['user']=$user;
$_SESSION['id']=$id;
if(file_exists("userss/".$admin."/admin/set/MyService")){
setcookie("MYQQ",$admin,time()+86400);
}
//格式:[id#标题|价格||开通时间]
if(file_exists("userss/".$admin)&&$admin!=""){
//$a="[".$id."#".$name."|".$money."||".$vip."|||".$admin."]";
//完美格式
if(file_exists("userss/".$admin."/admin/data/".$id)){
if(file_exists("userss/".$admin."/userss/".$user)&&$user!=""){
require_once("epay.config.php");
require_once("lib/epay_submit.class.php");


/////----------获取支付参数

$s=file_get_contents("userss/".$admin."/admin/data/".$id);
$b= stripos($s,"|");
$c=1;
$d=$b-$a-1;
$name= substr($s,$c,$d);
$a= stripos($s,"|");
$b= stripos($s,"||");
$c=$a+1;
$d=$b-$a-1;
$money= substr($s,$c,$d);
$a= stripos($s,"||");
$b= stripos($s,"|||");
$c=$a+2;
$d=$b-$a-2;
$vip= substr($s,$c,$d);
$a= stripos($s,"|||");
$b= stripos($s,"]");
$c=$a+3;
$d=$b-$a-3;
$admin= substr($s,$c,$d);

////-----------获取支付参数


/**************************请求参数**************************/
        $notify_url = "http://appdoc.top/notify_url.php";
        //需http://格式的完整路径，不能加?id=123这类自定义参数

        //页面跳转同步通知页面路径
        $return_url = "http://appdoc.top/return_url_money.php";
        //需http://格式的完整路径，不能加?id=123这类自定义参数，不能写成http://localhost/

        //商户订单号
$_POST["WIDtotal_fee"]=rand(100000000000,9999999999999);
        $out_trade_no = $_POST['WIDtotal_fee'];
        //商户网站订单系统中唯一订单号，必填


		//支付方式
$_POST["WIDsubject"]=$name.'('.$admin.')';
$_POST["WIDtotal_fee"]=$money;
        //$type = $_POST['type'];
        //商品名称
        $name = $_POST['WIDsubject'];
//$_SESSION['naem']=$name;
		//付款金额
        $money = $_POST['WIDtotal_fee'];
		//站点名称
        $sitename = '易对接后台系统';
        //必填

        //订单描述


/************************************************************/

//构造要请求的参数数组，无需改动
$parameter = array(
		"pid" => trim($alipay_config['partner']),
		"type" => $type,
		"notify_url"	=> $notify_url,
		"return_url"	=> $return_url,
		"out_trade_no"	=> $out_trade_no,
		"name"	=> $name,
		"money"	=> $money,
		"sitename"	=> $sitename
);

//建立请求
$alipaySubmit = new AlipaySubmit($alipay_config);
$html_text = $alipaySubmit->buildRequestForm($parameter);
echo $html_text;
}else{echo "账号不存在";}
}else{echo "支付商品不存在";}
}else{echo "后台账号不存在";}
?>	
</body>
</html>