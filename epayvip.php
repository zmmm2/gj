<?php
$admin = isset($_GET["admin"])?$_GET["admin"]:"";
header("Location: appdoc_vip_use.php?admin=$admin");
die("
<h1><center>因为码支付出了点问题，充值请联系QQ3399769530</center></h1>
"); 
?>


<?php
exit("
<script>
alert('为了保证订单实时到账，将跳转到代刷网进行缴费');
window.location.replace('http://talds.top/?cid=83');
</script>
");
?>




<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<title>易对接后台</title>
</head>
<?php
session_start();
/* *
 * 功能：即时到账交易接口接入页
 * 
 * 以下代码只是为了方便商户测试而提供的样例代码，商户可以根据自己网站的需要，按照技术文档编写,并非一定要使用该代码。
 * 该代码仅供学习和研究支付宝接口使用，只是提供一个参考。
 */

$moneyset=1;//金额倍数

$admin=$_GET["admin"];
$time=$_GET["time"];
require 'test_test.php';
session_start();
$_SESSION['admin_api']=$admin;
setcookie("MYQQ",3399769530,time()+86400);
//格式:[id#标题|价格||开通时间]
if(file_exists("userss/".$admin)&&$admin!=""){
//逻辑判断
if($time=='1month'||$time=='3month'||$time=='1year'||$time=='100year'){
require_once("epay.config.php");
require_once("lib/epay_submit.class.php");
//****************获取时间
$SESSION['time_api']=$time;
//****************获取时间
//---------------------**************************///////////////////////...............`````````````````/////////////////获取价格
if($time=='1month'){
$money=3;
}
if($time=='3month'){
$money=9*$moneyset;
}
if($time=='1year'){
$money=32*$moneyset;
}
if($time=='100year'){
$money=52*$moneyset;
}
$_SESSION['time_api']=$time;
//---------------------**************************///////////////////////...............`````````````````/////////////////获取价格

//--获取商品名
if($time=='1month'){
$name=$admin.'|续费一个月';
}
if($time=='3month'){
$name=$admin.'|续费三个月';
}
if($time=='1year'){
$name=$admin.'|续费一整年';
}
if($time=='100year'){
$name=$admin.'|续费永久版';
}
//--获取商品名

/**************************请求参数**************************/
        $notify_url = "http://appdoc.top/notify_url.php";
        //需http://格式的完整路径，不能加?id=123这类自定义参数

        //页面跳转同步通知页面路径
        $return_url = "http://appdoc.top/return_url_api.php";
        //需http://格式的完整路径，不能加?id=123这类自定义参数，不能写成http://localhost/

        //商户订单号
$_POST["WIDtotal_fee"]=rand(100000000000,9999999999999);
        $out_trade_no = $_POST['WIDtotal_fee'];
        //商户网站订单系统中唯一订单号，必填


		//支付方式
$_POST["WIDsubject"]=$name;
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
}else{echo '开通时间错误';}
}else{echo "后台账号不存在";}
?>	
</body>
</html>