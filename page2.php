<?php
//这里是防御cc
if(file_exists('admin/pagetime')){
if(file_get_contents('admin/pagetime')<=microtime(time())*10000){
$cc='false';
file_put_contents('admin/pagetime',microtime(time())*10000+3500);
}else{echo '页面访问频繁，请稍后重试';}
}else{echo '页面访问频繁，请稍后重试'; $cc='true';file_put_contents('admin/pagetime',microtime(time())*10000+300000);}
//这里是防御cc



//获取数据
//需要的数据：版本号，图标，公告，更新内容，用户总数，软件启动，下载链接
if($cc=='false'){
$sid=$_GET['sid'];
require 'test_test.php';
if(!file_exists('userss/'.$sid)||$sid==''){header("Location: http://appdoc.top/404-2.html");}else
{
//后台账号正确，获取数据，如果没有则是默认值

//{获取用户总数}
    //用来统计一个目录下的文件和目录的个数
    function getdirnum($file) {
    $dirn = 0; //目录数
    $maxnum=1000;
        global $dirn;
        $file="./userss/".$_GET['sid']."/userss/";
        $dir = opendir($file);
        while($filename = readdir($dir)) {
            if($filename!="." && $filename !="..") {
                $filename = $file."/".$filename;
                if(is_dir($filename)) {
                    if($maxnum>0){
                    $maxnum=$maxnum-1;
                    $dirn++;
                    }else{$dirn='1000+';break;}
                }
           }
        }
    }
    getdirnum("./code");
    if($dirn==''){$dirn=0;}
//{获取完毕}

//{获取软件启动数}
$startnum=file_get_contents('userss/'.$_GET['sid'].'/admin/data/startnum');
}
//{获取完毕}

//{获取软件版本}
if(file_exists('userss/'.$_GET['sid'].'/admin/data/new')){
$stri=stripos(file_get_contents('userss/'.$_GET['sid'].'/admin/data/new'),')');
$stris=stripos(file_get_contents('userss/'.$_GET['sid'].'/admin/data/new'),'(');
$strss=$stri-$stris;
$banben= substr(file_get_contents('userss/'.$_GET['sid'].'/admin/data/new'),$stris+1,$strss-1);
}else{$banben='1.0';}
//{获取完毕}

//{获取更新内容}
if(file_exists('userss/'.$_GET['sid'].'/admin/data/new')){
$newcontent=stripos(file_get_contents('userss/'.$_GET['sid'].'/admin/data/new'),'更新内容:(');
$newcontent=$newcontent+14;
$newcontents=stripos(file_get_contents('userss/'.$_GET['sid'].'/admin/data/new'),')更新链接');
$newcontents=$newcontents-$newcontent;
$newcontent= substr(file_get_contents('userss/'.$_GET['sid'].'/admin/data/new'),$newcontent,$newcontents);
}else{$newcontent='暂无更新内容';}
//{获取完毕}

//{获取下载链接}
if(file_exists('userss/'.$_GET['sid'].'/admin/data/new')){
$url1=stripos(file_get_contents('userss/'.$_GET['sid'].'/admin/data/new'),'更新链接:(');
$url1=$url1+14;
$url=  substr(file_get_contents('userss/'.$_GET['sid'].'/admin/data/new'),$url1,-1);
}else{$url='http://appdoc.top/404-3.html';}
//{获取完毕}

//{获取公告}
if(file_exists('userss/'.$_GET['sid'].'/admin/data/notice')){
$notice=file_get_contents('userss/'.$_GET['sid'].'/admin/data/notice');
}else{
$notice='后台还没有公告通知哦!';
}
//{获取完毕}

//{获取软件截图}
if(file_exists('userss/'.$_GET['sid'].'/page/1.jpg')){
$imga='http://appdoc.top/userss/'.$_GET['sid'].'/page/1.jpg?sid='.rand(1000,9999);
}else{$imga='img/404.jpg';}
if(file_exists('userss/'.$_GET['sid'].'/page/2.jpg')){
$imgb='http://appdoc.top/userss/'.$_GET['sid'].'/page/2.jpg?sid='.rand(1000,9999);
}else{$imgb='img/404.jpg';}
//{获取完毕}

//{获取软件名}
if(file_exists('userss/'.$_GET['sid'].'/page/app')){
$appname=file_get_contents('userss/'.$_GET['sid'].'/page/app');
}else{$appname='APP';}
//{获取完毕}

//{获取网页标题}
if(file_exists('userss/'.$_GET['sid'].'/page/title')){
$title=file_get_contents('userss/'.$_GET['sid'].'/page/title');
}else{$title='易对接后台提供页面';}
//{获取完毕}

//{获取软件图标}
if(file_exists('userss/'.$_GET['sid'].'/page/icon.png')){
$icon='http://appdoc.top/userss/'.$_GET['sid'].'/page/icon.png';
}else{$icon='/img/icon.png';}}else{echo "";}
//{获取完毕}

?>

 <!DOCTYPE html>
  <html>
  <head>
  <title><?php echo $title; ?></title>
  <meta itemprop="name" content="<?php echo $title; ?>">
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
  <meta name="viewport" content="width=device-width; initial-scale=1.0; minimum-scale=1.0; maximum-scale=1.0">
  <meta name="keywords" content="介绍！">
  <meta name="description" content="介绍！">
  <style type="text/css">
  a {
    text-decoration: none
  }

  body {
    margin: 0 auto;
    max-width: 880px;
    box-shadow: 0px 1px 2px rgba(0, 0, 0, 0.2);
    min-width: 320px;
    padding-bottom: 0.1px
  }

  html {
    background: #eee
  }

  * {
    letter-spacing: 1px;
    font-family: 'Helvetica', 'Droidsansfallback', 'Heiti SC';
    box-sizing: border-box;
    outline: none;
    margin: 0;
    padding: 0;
    text-decoration: none;
    -webkit-tap-highlight-color: rgba(0, 0, 0, 0);
    color: #333;
  }

  .icon {
    width: 60px;
    height: 60px;
    margin-top: 15px;
    border-radius: 8px;
  }

  .title {
    font-size: 15px;
    margin-top: 5px;
  }

  p {
    font-size: 12pt;
    color: #4CAF50;
    margin-top: 5px;
  }

  .content {
    margin-top: 10px;
    font-size: 14px;
    color: #757575;
    margin-bottom: 15px;
  }

  .picture {
    overflow-x: scroll;
    width: 100%;
    white-space: nowrap;
    margin-bottom: 25px;
  }

  .child {
    display: inline-block;
    margin-left: 10px;
  }

  .p {
    font-size: 12px;
    color: #939393;
    margin-top: 4px;
  }

  .show {
    background: #fff;
    box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.2);
    border-radius: 2px;
    font-size: 14px;
    color: #616161;
    word-wrap: break-word;
    padding-top: 10px;
  }

  .down {
    border-top-left-radius: 0.5em;
    border-top-right-radius: 0.5em;
    border-bottom-left-radius: 0.5em;
    border-bottom-right-radius: 0.5em;
    border-top-width: 0px;
    border-right-width: 0px;
    border-bottom-width: 0px;
    border-left-width: 0px;
    margin-top: 10px;
    color: #ffffff;
    background: #4CAF50;
    width: 100px;
    height: 30px;
    margin-bottom: 20px;
  }

  .review {
    margin: 15px;
    font-size: 14px;
    color: #424242
  }

  .user {
    margin-left: 15px;
    margin-top: 10px;
  }

  .title2 {
    color: #455A64;
    margin-top: 5px;
    margin-left: 30px;
    font-size: 14px;
  }
  </style>

  </head>

  <body>

  <div class="show" align="center">
  <img referrerpolicy="no-referrer" class="icon" src="<?php  echo $icon;  ?>">
  <div class="title"><b><?php echo $appname; ?></b></div>
  
  <button class="down" onclick="window.location.href ='<?php echo $url; ?>'">点我下载</button>
  </div>


  <div class="show" style="margin-top: 15px;padding-left: 15px;padding-right: 5px;">
  <p>更新内容:</p>
  <div class="content">软件版本：v<?php echo $banben;  ?><br /> 
  更新功能:<br /><?php  echo $newcontent;  ?>

 
  </div>

  <p>软件公告:</p>
  <div class="content"> <?php echo $notice;  ?>
  <p>软件截图</p>
  <div class="picture">
  <a href="<?php  echo $imga;  ?>">
  <img referrerpolicy="no-referrer" src="<?php  echo $imga;  ?>" width="49%" height="100%"/>
  </a>
  <a href="<?php  echo $imgb;  ?>">
  <img referrerpolicy="no-referrer" src="<?php  echo $imgb;  ?>" width="49%" height="100%"/>
  </a>
  </div>
  </div>



  </div>

  <div class="show" style="padding-top: 20px;padding-bottom: 20px;margin: 10px;">
  <div style="font-size: 15px;" align="center">软件数据</div>
  <div class="title2">总用户量:<?php echo $dirn; ?></div>
  <div class="title2">软件启动:<?php echo $startnum; ?></div>
  <div class="title2">给你带来更好体验。</div>
  </div>


  <div style="width=100%;padding: 5px;" align="center">
  </div>
  </div>
  </body>
<!-- 底部版权 -->
	
<div style="width=100%;background: #333;padding: 5px;margin-bottom: 0px;" align="center">
  <div style="font-size: 10pt;;margin-left: 10px;margin-top: 10px;"> 
	  <a class="url" href="http://appdoc.top" style="color: #E0E0E0">版权声明 · </a> 
	  <a class="url" href="http://appdoc.top" style="color: #E0E0E0">易对接后台 · </a> 
	  <a class="url" href="http://appdoc.top" style="color:#E0E0E0">我要上传</a> 
  </div>
  <div style="text-align:center;font-size:12px;color:#BDBDBD;margin:20px;margin-bottom: 20px;">Copyight © 2019-<?php echo date('Y',time()); ?>
	<a style="color: #BDBDBD" href="http://appdoc.top">易对接后台</a>, All Rights Reserved.<br>E-mail：3399769530@qq.com 
  </div>
</div>

  </html>