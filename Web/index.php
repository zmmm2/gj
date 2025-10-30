<?php
require 'log_test.php';
function user_data($user){
    $viptime = file_get_contents('../userss/' . $user . '/admin/viptime');
    $vipdata = date('Y-m-d', $viptime);
    echo $vipdata;
    return;
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <title>易对接后台-管理</title>

    <style>
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
        .my {
            width: 90%;
            height: 35px;
            background-image: linear-gradient(to right, #219acd, #69c8ef);
            border-radius: 5px 5px 0 0;
            margin: 0 auto;
            color: #fff;
        }
        .op {
            width: 90%;
            height: 35px;
            background-image: linear-gradient(to right, #058abf, #7ecff1);
            border-radius: 5px 5px 0 0;
            margin: 0 auto;
            color: #fff;
            margin-top: 110px;
            margin-bottom: 240px;
        }
        .title {
            color: #ffffff;
            font-size: 16px;
            line-height: 35px;
            margin: 0;
        }
        .user-data {
            height: 85px;
            background-color: #d4f1ff;
        }
        .user-op {
            height: 225px;
            background-color: #d4f1ff;
        }
        .user {
            margin: 0;
            padding: 3px 0 0 0;
            font-size: 13px;
            color: #454d82;
            font-weight: bold;
        }
        button {
            background-color: #7f86d0;
            border: 0;
            color: #fff;
            width: 80%;
            height: 32px;
            margin-top: 10px;
            border-radius: 5px;
            outline: none;
        }
        input {
            background-color: #78cce5;
            border: 0;
            color: #fff;
            width: 120px;
            height: 30px;
            margin-top: 5px;
            border-radius: 5px;
            outline: none;
        }
    </style>

</head>
<body>
<div id="box">
    <div class="logo">易对接后台-管理</div>
    <div class="my">
        <p class="title">我的后台信息</p>
        <div class="user-data">
            <p class="user">后台账号: <?php echo $user; ?></p>
            <p class="user">缴费日期: <?php user_data($user); ?></p>
            <div>
                <a href="./pay.php?user=<?php echo $user; ?>"><input type="button" value="后台缴费" /></a>
                <a href="javascript:dellog();"><input type="button" value="退出账号" /></a>
            </div>
        </div>
    </div>
    <div class="op">
        <p class="title">后台管理中心</p>
        <div class="user-op">
            <a href="./notice.php"><button>修改远程公告</button></a>
            <a href="./new.php"><button>修改远程更新</button></a>
            <a href="javascript:alert('作者太懒了，还没开发完');"><button>编辑远程文档</button></a>
            <a href="../page.php?sid=<?php echo $user; ?>"><button>我的个人网页</button></a>
            <a href="../"> <button>下载易对接移动端</button></a>
            <p>更多功能请前往移动端</p>
        </div>
    </div>
</div>
</body>
<script>
    function getCookie(name)
    {
        var arr,reg=new RegExp("(^| )"+name+"=([^;]*)(;|$)");

        if(arr=document.cookie.match(reg))

            return unescape(arr[2]);
        else
            return null;
    }
    function delCookie(name)
    {
        var exp = new Date();
        exp.setTime(exp.getTime() - 1);
        var cval=getCookie(name);
        if(cval!=null)
            document.cookie= name + "="+cval+";expires="+exp.toGMTString();
    }
    function dellog() {
        let con = confirm('确认退出账号？');
        if(con === true) {
            delCookie("user");
            delCookie("pwd");
            window.location.replace('./login.html');
        }
    }
</script>
</html>