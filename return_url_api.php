<?php
/* * 
 * 功能：彩虹易支付页面跳转同步通知页面
 * 说明：
 * 以下代码只是为了方便商户测试而提供的样例代码，商户可以根据自己网站的需要，按照技术文档编写,并非一定要使用该代码。
 * 该代码仅供学习和研究支付宝接口使用，只是提供一个参考。

 *************************页面功能说明*************************
 * 该页面可在本机电脑测试
 * 可放入HTML等美化页面的代码、商户业务逻辑程序代码
 * 该页面可以使用PHP开发工具调试，也可以使用写文本函数logResult，该函数已被默认关闭，见epay_notify_class.php中的函数verifyReturn
 */
session_start();
require_once("epay.config.php");
require_once("lib/epay_notify.class.php");
?>
<!DOCTYPE HTML>
<html>
    <head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<?php
//计算得出通知验证结果
$alipayNotify = new AlipayNotify($alipay_config);
$verify_result = $alipayNotify->verifyReturn();
if($verify_result) {//验证成功
  
	/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	//请在这里加上商户的业务逻辑程序代码
	
	//——请根据您的业务逻辑来编写程序（以下代码仅作参考）——
    //获取支付宝的通知返回参数，可参考技术文档中页面跳转同步通知参数列表

	//商户订单号

	$out_trade_no = $_GET['out_trade_no'];

	//支付宝交易号

	$trade_no = $_GET['trade_no'];

	//交易状态
	$trade_status = $_GET['trade_status'];

	//支付方式
	$type = $_GET['type'];
$a="[".$trade_no."]";
$b=file_get_contents('admin/api');
if(strpos($b,$a)===false&&isset($_SESSION['admin_api'])){
$a=$a.$b;
file_put_contents("admin/api",$a);
//--//这里加逻辑------------------------------------------------------------------------------
if(strpos($_SESSION['admin_api'],'/') !== false || strpos($_SESSION['admin_api'],'\\') !== false || strpos($_SESSION['admin_api'],'eval(') !== false)die('验证失败');
if(file_get_contents("userss/".$_SESSION['admin_api']."/admin/viptime")>time()){
$times=file_get_contents("userss/".$_SESSION['admin_api']."/admin/viptime");//原本时间
$viptime=strtotime($_SESSION['time_api'],$times);
file_put_contents("userss/".$_SESSION['admin_api']."/admin/viptime",$viptime);
if(file_exists("userss/".$_SESSION['admin_api']."/admin/data/file_true")){
unlink("userss/".$_SESSION['admin_api']."/admin/data/file_true");
}
include 'vipgive.php';
echo "续费成功，请重启软件查看";
}else{
//没VIP
$viptime=strtotime($_SESSION['time_api'],time());
file_put_contents("userss/".$_SESSION['admin_api']."/admin/viptime",$viptime);
if(file_exists("userss/".$_SESSION['admin_api']."/admin/data/file_true")){
unlink("userss/".$_SESSION['admin_api']."/admin/data/file_true");
}
include 'vipgive.php';
echo "续费成功，请重启软件查看";
}
  unset($_SESSION['admin_api']);
  unset($_SESSION['time_api']);
//-//这里逻辑结束-----------------------------------------------------------------------------
}else{
echo '该订单已经完成';
}	//——请根据您的业务逻辑来编写程序（以上代码仅作参考）——
	
	///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
}else {
    //验证失败
    //如要调试，请看alipay_notify.php页面的verifyReturn函数
    echo "支付失败";
  unset($_SESSION['admin_api']);
  unset($_SESSION['time_api']);
}
?>
        <title>彩虹易支付即时到账交易接口</title>
	</head>
    <body>
    </body>
</html>