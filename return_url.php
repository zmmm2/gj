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
/////----------获取支付参数
session_start();
$admin=$_SESSION['admin'];
$user=$_SESSION['user'];
$id=$_SESSION['id'];
require 'test_test.php';
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
$time=$vip;
$a= stripos($s,"|||");
$b= stripos($s,"]");
$c=$a+3;
$d=$b-$a-3;
$admin= substr($s,$c,$d);

////-----------获取支付参数
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

//订单格式:[订单号|商品名||价格]
$a="[".$trade_no."|".$name."||".$_GET['money'].'---充值账号:'.$user."|||".date("Y-m-d H:i",time())."]";
//if(empty($_GET['money'])&&empty($_COOKIE["name_set"])&&empty($_COOKIE["vip_set"])&&empty($_COOKIE["user_set"])&&empty($_SESSION['admin'])){
//全部COOKIE存在
if(!file_exists("userss/".$_SESSION['admin']."/admin/data/epaylist")&&isset($_SESSION['admin'])){

if(file_exists('userss/'.$_SESSION['admin'].'/admin/data/income')){
$income=file_get_contents('userss/'.$_SESSION['admin'].'/admin/data/income')+$_GET['money'];
}else{$income=$_GET['money'];}
file_put_contents('userss/'.$_SESSION['admin'].'/admin/data/income',$income);


//发送通知
$ass='[您充值的会员已到账，感谢支持|'.date('Y-m-d H:i',time()).']';
if(file_exists('userss/'.$admin.'/userss/'.$user.'/newscontents')){
$bss=file_get_contents('userss/'.$admin.'/userss/'.$user.'/newscontents');
}else{
$bss='';
}
file_put_contents('userss/'.$admin.'/userss/'.$user.'/newscontents',$ass.$bss);
//发送通知


    echo $_SESSION["admin_set"]."支付成功<br />恭喜，你是该软件第一笔交易哦";
    file_put_contents("userss/".$_SESSION['admin']."/admin/data/epaylist",$a);
    if(file_exists("userss/".$_SESSION['admin']."/admin/money")){
    //余额文件存在
    $moneys=file_get_contents("userss/".$_SESSION['admin']."/admin/money")+$_GET['money'];
    file_put_contents("userss/".$_SESSION['admin']."/admin/money",$moneys);
    }else{
    //余额为0
    file_put_contents("userss/".$_SESSION['admin']."/admin/money",$_GET['money']);
    }
//这里加首次逻辑


//--//这里加逻辑
$viptime=file_get_contents("userss/".$admin."/userss/".$user."/viptime");
//这个是用户会员时间戳
if($viptime>time()){
//有VIP

if(strtotime($time,$viptime)<strtotime("1000year",time())){
//时间正确
//echo "操作成功";
file_put_contents("userss/".$admin."/userss/".$user."/viptime",strtotime($time,$viptime));
}else{
//时间错误
echo "<br>会员时间达到最大值";
file_put_contents("userss/".$admin."/userss/".$user."/viptime",strtotime("1000year",time()));
}

}else{
//没有VIP

if(strtotime($time,$viptine)<strtotime("1000year",time())){
//时间正确
//echo "操作成功";
file_put_contents("userss/".$admin."/userss/".$user."/viptime",strtotime($time,time()));
}else{
//时间错误
echo "<br>会员时间达到最大值";
file_put_contents("userss/".$admin."/userss/".$user."/viptime",strtotime("1000year",time()));
}
}
  unset($_SESSION['name']);
  unset($_SESSION['user']);
  unset($_SESSION['id']);
  unset($_SESSION['admin']);
//-//这里逻辑结束


//这里首次逻辑结束
}else{
$b=file_get_contents("userss/".$_SESSION['admin']."/admin/data/epaylist");
if(strpos($b,"[".$trade_no)===false&&isset($_SESSION['admin'])){
//成功

if(file_exists('userss/'.$_SESSION['admin'].'/admin/data/income')){
$income=file_get_contents('userss/'.$_SESSION['admin'].'/admin/data/income')+$_GET['money'];
}else{$income=$_GET['money'];}
file_put_contents('userss/'.$_SESSION['admin'].'/admin/data/income',$income);


//发送通知
$ass='[您充值的会员已到账，感谢支持|'.date('Y-m-d H:i',time()).']';
if(file_exists('userss/'.$admin.'/userss/'.$user.'/newscontents')){
$bss=file_get_contents('userss/'.$admin.'/userss/'.$user.'/newscontents');
}else{
$bss='';
}
file_put_contents('userss/'.$admin.'/userss/'.$user.'/newscontents',$ass.$bss);
//发送通知


echo "支付成功";
$a=$a.$b;
file_put_contents("userss/".$_SESSION['admin']."/admin/data/epaylist",$a);
   if(file_exists("userss/".$_SESSION['admin']."/admin/money")){
    //余额文件存在
    $moneys=file_get_contents("userss/".$_SESSION['admin']."/admin/money")+$_GET['money'];
    file_put_contents("userss/".$_SESSION['admin']."/admin/money",$moneys);
    }else{
    //余额为0
    file_put_contents("userss/".$_SESSION['admin']."/admin/money",$_GET['money']);
    }
//--//这里加逻辑
$viptime=file_get_contents("userss/".$admin."/userss/".$user."/viptime");
//这个是用户会员时间戳
if($viptime>time()){
//有VIP

if(strtotime($time,$viptime)<strtotime("1000year",time())){
//时间正确
//echo "操作成功";
file_put_contents("userss/".$admin."/userss/".$user."/viptime",strtotime($time,$viptime));
}else{
//时间错误
echo "<br>会员时间达到最大值";
file_put_contents("userss/".$admin."/userss/".$user."/viptime",strtotime("1000year",time()));
}

}else{
//没有VIP

if(strtotime($time,$viptine)<strtotime("1000year",time())){
//时间正确
//echo "操作成功";
file_put_contents("userss/".$admin."/userss/".$user."/viptime",strtotime($time,time()));
}else{
//时间错误
echo "<br>会员时间达到最大值";
file_put_contents("userss/".$admin."/userss/".$user."/viptime",strtotime("1000year",time()));
}
}
  unset($_SESSION['name']);
  unset($_SESSION['user']);
  unset($_SESSION['id']);
  unset($_SESSION['admin']);
//-//这里逻辑结束
}else{
echo '该订单已经完成';}
}
}

	//——请根据您的业务逻辑来编写程序（以上代码仅作参考）——
	
	/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
 else {
    //验证失败
    //如要调试，请看alipay_notify.php页面的verifyReturn函数
    echo "支付失败";
  unset($_SESSION['name']);
  unset($_SESSION['user']);
  unset($_SESSION['id']);
  unset($_SESSION['admin']);
}
?>
        <title>彩虹易支付即时到账交易接口</title>
	</head>
    <body>
    </body>
</html>