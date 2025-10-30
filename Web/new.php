<?php
require './log_test.php';
if(file_exists('../userss/'.$user.'/admin/data/new')){
    $new = file_get_contents('../userss/'.$user.'/admin/data/new');
    $new = str_replace('<br>','&#10',$new);
}else{
    $new = '软件版本:()更新内容:()更新链接:()';
}

$num1 = strripos($new,')更新内容:(');
$num2 = strripos($new,')更新链接:(');

$bb = substr($new,0,$num1);
$bb = substr($bb,14);

$tz = substr($new,0,$num2);
$tz = substr($tz,$num1+15);

$lj = substr($new,$num2+15);
$lj = substr($lj,0,-1);
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <script src="https://cdn.staticfile.org/jquery/2.1.4/jquery.min.js"></script>
    <title>易对接后台-更新</title>

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
        #bb {
            width: 90%;
            height: 22px;
            padding: 3px;
            border: 0;
            border-bottom: 1px solid #999;
            margin-bottom:15px;
            outline: none;
        }
        #lj {
            width: 90%;
            height: 22px;
            padding: 3px;
            border: 0;
            border-bottom: 1px solid #999;
            margin-bottom: 20px;
            outline: none;
        }
        #tz {
            width: 90%;
            height: 200px;
            padding: 3px;
            border: 0px;
            box-shadow: 0px 0px 2px #666;
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
    <div class="logo">易对接后台-更新</div>
    <input type="text" id="bb" placeholder="版本号" onclick="not_text()" value="<?php echo $bb; ?>" />
    <input type="text" id="lj" placeholder="下载链接" onclick="not_text()" value="<?php echo $lj; ?>" />
    <textarea id="tz" placeholder="更新通知" onclick="not_text()"><?php echo $tz; ?></textarea>
    <button onclick="news()">确认修改</button>
    <p style="width:90%;margin: 0 auto;text-align:left;color:#888;font-size:12px;margin-top:-8px;margin-bottom:10px;">使用更多功能请下载<a href="../">客户端后台</a></p>
</div>
</div>
</body>
<script src="./js/new.js?a=1005"></script>
</html>