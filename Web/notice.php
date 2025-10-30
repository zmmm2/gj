<?php
require './log_test.php';
if(file_exists('../userss/'.$user.'/admin/data/notice')){
    $notice = file_get_contents('../userss/'.$user.'/admin/data/notice');
    $notice = str_replace('<br>','&#10',$notice);
}else{
    $notice = '';
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <script src="https://cdn.staticfile.org/jquery/2.1.4/jquery.min.js"></script>
    <title>易对接后台-公告</title>

    <style>
        body {
            background-color: #fff;
            margin: 0;
            padding: 0;
        }
        #box {
            max-width: 680px;
            min-width: 300px;
            margin: 0 auto;
            text-align: center;
        }
        .logo {
            font-size: 18px;
            margin: 0 0 30px 0;
            font-weight: bold;
            height: 55px;
            background: #2fa5ff;
            line-height: 55px;
            color: #fff;
        }
        textarea {
            width: 90%;
            height: 250px;
            padding: 3px;
            border: 0px;
            border-radius: 5px;
            box-shadow:0px 0px 2px #666;
            outline: none;
        }
        button {
            width: 92%;
            height: 42px;
            background-color: #008aff;
            color: #fff;
            font-size: 15px;
            border: 0px;
            border-radius: 5px;
            margin-top: 10px;
            margin-bottom: 10px;
            outline: none;
        }
        #value {
            width: 100%;
            position:fixed;
            top: 100px;
            font-size: 12px;
            text-align: center;
        }
        .text {
            padding: 10px;
            color: #fff;
            background-color: #0087ff;
            border-radius: 5px;
            box-shadow: 0 0 2px #006ac9;
        }
    </style>

</head>
<body>
<div id="value"></div>
<div id="box">
    <div class="logo">易对接后台-公告</div>
    <textarea placeholder="请输入后台公告" onclick="not_text()"><?php echo $notice; ?></textarea>
    <button onclick="notice()">确认修改</button>
    <p style="width:90%;margin: 0 auto;text-align:left;color:#888;font-size:12px;margin-top:-8px;margin-bottom:10px;">使用更多功能请下载<a href="../">客户端后台</a></p>
</div>
</div>
</body>
<script src="./js/notice.js?a=1005"></script>
</html>