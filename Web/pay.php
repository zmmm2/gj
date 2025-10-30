<?php
$user = isset($_GET['user'])?$_GET['user']:null;
echo "<!DOCTYPE html><html><script>let user = '$user';</script></html>";
?>

<html>
<head>
    <meta charset="utf-8" name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <title>易对接后台-缴费</title>
    <style>
        * {
            margin: 0;
            padding: 0;
        }
        body {
            background-color: #fff;
            margin: 0;
            padding: 0;
        }
        #box {
            max-width: 680px;
            min-width: 320px;
            margin: 0 auto;
            text-align: center;
        }
        .logo {
            font-size: 18px;
            margin: 0 0 20px 0;
            font-weight: bold;
            height: 55px;
            background: #2fa5ff;
            line-height: 55px;
            color: #fff;
        }
        .pay {
            width: 100%;
            height: 200px;
            color: #fff;
            font-size: 14px;
        }
        .pay-box1 {
            float: left;
            width: 100%;
            background-color: #5df176;
            box-sizing: border-box;
            background-clip: content-box;
            padding: 5px;
            display: none;
        }
        .pay-box2 {
            float: left;
            width: 100%;
            background-color: #efa462;
            box-sizing: border-box;
            background-clip: content-box;
            padding: 5px;
            display: none;
        }
        .pay-box3 {
            float: left;
            width: 100%;
            background-color: #ee56c8;
            box-sizing: border-box;
            background-clip: content-box;
            padding: 5px;
            display: none;
        }
        .pay-box4 {
            float: left;
            width: 100%;
            background-color: #f35b5b;
            box-sizing: border-box;
            background-clip: content-box;
            padding: 5px;
            display: none;
        }
        .pay-box5 {
            float: left;
            width: 100%;
            background-color: #5b5ef3;
            box-sizing: border-box;
            background-clip: content-box;
            padding: 5px;
            display: none;
        }
        .pay-box6 {
            float: left;
            width: 100%;
            background-color: #686868;
            box-sizing: border-box;
            background-clip: content-box;
            padding: 5px;
            display: none;
        }
        .pay-con1 {
            width: 100%;
            height: 100%;
            box-shadow:2px 2px 5px #5df1b1;
        }
        .pay-con2 {
            width: 100%;
            height: 100%;
            box-shadow:2px 2px 5px #efcc62;
        }
        .pay-con3 {
            width: 100%;
            height: 100%;
            box-shadow:2px 2px 5px #f15dcc;
        }
        .pay-con4 {
            width: 100%;
            height: 100%;
            box-shadow:2px 2px 5px #f15bbf;
        }
        .pay-con5 {
            width: 100%;
            height: 100%;
            box-shadow:2px 2px 5px #7679f3;
        }
        .pay-con6 {
            width: 100%;
            height: 100%;
            box-shadow:2px 2px 5px #443a3a;
        }
        .time {
            box-sizing: border-box;
            padding-top: 2px;
        }
        .pay-content {
            font-size: 12px;
            width: 95%;
            margin: 0 auto;
            padding: 5px 0 5px 0;
            margin-bottom: 5px;
        }
        .money-youhui-box {
            height: 30px;
            width: 100%;
        }
        .money-youhui-left {
            float: left;
            width: 50%;
            box-sizing: border-box;
            background-clip: content-box;
            padding-top: 5px;
            font-size: 12px;
            box-shadow:0 0 0 0 #fff;
        }
        .money-youhui-right {
            float: left;
            width: 50%;
            box-sizing: border-box;
            background-clip: content-box;
            padding-top: 5px;
            font-size: 12px;
        }
    </style>
</head>
<body>
<div id="box">
    <div class="logo">易对接后台-缴费</div>
    <div class="pay">
        <div class="pay-box1">
            <div class="pay-con1">
                <p class="time">缴费一个月</p>
                <div class="pay-content">支付完请立即返回二维码页面等待一小会儿，如果未到账，请联系后台客服</div>
                <div class="money-youhui-box">
                    <p class="money-youhui-left">售价:3RMB</p>
                    <p class="money-youhui-right">优惠:暂无</p>
                </div>
            </div>
        </div>
        <div class="pay-box2">
            <div class="pay-con2">
                <p class="time">缴费一季度</p>
                <div class="pay-content">支付完请立即返回二维码页面等待一小会儿，如果未到账，请联系后台客服</div>
                <div class="money-youhui-box">
                    <p class="money-youhui-left">售价:9RMB</p>
                    <p class="money-youhui-right">优惠:暂无</p>
                </div>
            </div>
        </div>
        <div class="pay-box3">
            <div class="pay-con3">
                <p class="time">缴费一整年</p>
                <div class="pay-content">支付完请立即返回二维码页面等待一小会儿，如果未到账，请联系后台客服</div>
                <div class="money-youhui-box">
                    <p class="money-youhui-left">售价:32RMB</p>
                    <p class="money-youhui-right">优惠:88折</p>
                </div>
            </div>
        </div>
        <div class="pay-box4">
            <div class="pay-con4">
                <p class="time">激活永久版</p>
                <div class="pay-content">支付完请立即返回二维码页面等待一小会儿，如果未到账，请联系后台客服</div>
                <div class="money-youhui-box">
                    <p class="money-youhui-left">售价:52RMB</p>
                    <p class="money-youhui-right">优惠:66折</p>
                </div>
            </div>
        </div>
        <div class="pay-box5">
            <div class="pay-con5">
                <p class="time" id="time1">缴费一整年(免费)</p>
                <div class="pay-content" id="content1">由易对接后台站长提供的免费贴心服务，是不是很感动?还不快来领取？</div>
                <div class="money-youhui-box">
                    <p class="money-youhui-left" id="money1">售价:0RMB</p>
                    <p class="money-youhui-right" id="youhui1">优惠:0折</p>
                </div>
            </div>
        </div>
        <div class="pay-box6">
            <div class="pay-con6">
                <p class="time" id="time2">激活永久版(免费)</p>
                <div class="pay-content" id="content2">由易对接后台站长提供的免费贴心服务，是不是很感动?还不快来领取？</div>
                <div class="money-youhui-box">
                    <p class="money-youhui-left" id="money2">售价:0RMB</p>
                    <p class="money-youhui-right" id="youhui2">优惠:0折</p>
                </div>
            </div>
        </div>
</body>
<script src="./js/pay.js?id=1005"></script>
</html>