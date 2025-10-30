<?php
$admin = isset($_GET["admin"])?$_GET["admin"]:"";
?>

<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>易对接后台缴费中心</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0,user-scalable=no">
    <link type="text/css" media="all"  rel="stylesheet" href="base.css" />
    <script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
    <style>
        /* 手机样式 */
        @media only screen and (max-width: 620px){
            .main,.g {
                width: 90% !important;
                left: 5% !important;
                margin-left: 0 !important;
            }
        }
        /* 手机样式 */
        * {
            margin: 0;
            padding: 0;
        }
        a {
            color: #000;
            text-decoration: none;
            outline: none;
        }
        body {
            background: #f0f0f0;
        }
        .main {
            min-width: 320px;
            position: absolute;
            top: 30%;
            margin-top: -125px;
            left: 50%;
            margin-left: -230px;
            width: 460px;
            height: 250px;
            background: #fff;
            border-radius: 15px;
            overflow:hidden;
            box-shadow: 0 0 10px 0 #ccc;
            text-align: center;
        }
        h1 {
            background: blue;
            text-align: center;
            font-size: 18px;
            color: #fff;
            height: 50px;
            line-height: 50px;
        }
        .km::placeholder,.user::placeholder {
            color: skyblue;
        }
        .km,.user {
            box-sizing: border-box;
            width: 80%;
            margin-top: 20px;
            margin-bottom: -10px;
            height: 32px;
            border: 1px solid skyblue;
            outline: none;
            font-size: 13px;
            padding-left: 10px;
            color: skyblue;
        }
        .shiyong,.goumai {
            display: block;
            width: 80%;
            height: 34px;
            margin: auto;
            margin-top: 20px;
            background-color: transparent;
            outline: none;
            background: skyblue;
            color: #fff;
            border: none;
            margin-bottom: -15px;
            cursor: pointer;
            border-radius: 5px;
        }
        .g {
            position: absolute;
            top: 30%;
            left: 50%;
            margin-left: -230px;
            margin-top: 150px;
            min-width: 320px;
            width: 460px;
            height: 120px;
        }
        .g a, .g img {
            display: block;
            width: 100%;
            height: 100%;
        }
    </style>
</head>
<body>
    <div class="main">
        <h1>卡密缴费</h1>
        <input class="user" value="<?php echo $admin; ?>" placeholder="请输入账号" />
        <input class="km" placeholder="请输入卡密" />
        <button onclick="use_click()" class="shiyong">使用卡密</button>
        <a href="https://fk.lizll.com/"><button class="goumai">购买卡密</button></a>
    </div>
</body>

<script>
    function use_click(){
        let user = document.querySelector('.user').value;
        let km = document.querySelector('.km').value;
        if(user == '' || km == '')alert('请输入完整');
        else
        use(user,km);
    }
    
    function use(user,km){
        $.ajax({
        url: "./appdoc_ajax.php",
        type: "POST",
        data: {"user":user,"km":km},
        dataType: "json",
        error: function(error){
            alert("error");
        },
        success: function(data){
            alert(data.msg);
        }
	    });
    }
</script>

</html>