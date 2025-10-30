<?php 
$admin=$_GET['admin'];
$user=$_GET['user'];
$pass=$_GET['pass'];
$title=$_GET['title'];
$content=$_GET['content'];
$url=$_GET['url'];
require 'test_test.php';
//{(id):id,(user):用户账号,(title):标题,(content):内容,(url):链接}

if(file_exists('userfrozen/'.$admin.'-'.$user)){
$timesss=file_get_contents('userfrozen/'.$admin.'-'.$user);
if($timesss>time()-5){
$frozen='true';
$timesss=$timesss-time()+5;//剩余多久可操作
}else{$frozen=='false';}
}else{$frozen=='false';}

$sealdate='false';
if(is_dir('userss/'.$admin.'/userss/'.$user.'/seal')){
if(file_get_contents('userss/'.$admin.'/userss/'.$user.'/seal')>time()){
$sealdate=date('Y-m-d H:i',file_get_contents('userss/'.$admin.'/userss/'.$user.'/seal'));
}
}

if(is_dir('userss/'.$admin)&&$admin!=''){
    if(is_dir('userss/'.$admin.'/userss/'.$user)&&$user!=''){
        if($pass==file_get_contents('userss/'.$admin.'/userss/'.$user.'/passprotect556')){
            include 'logintrue.php';
            if($title!=''&&$content!=''&&$url!=''){
                if(strpos($title,'(user)')===false&&strpos($title,'(title)')===false&&strpos($title,'(content)')===false&&strpos($title,'(url)')===false&&strpos($content,'(user)')===false&&strpos($content,'(title)')===false&&strpos($content,'(content)')===false&&strpos($content,'(url)')===false&&strpos($url,'(user)')===false&&strpos($url,'(title)')===false&&strpos($url,'(content)')===false&&strpos($url,'(url)')===false){
                    if(strlen($title)<=300){
                        if(strlen($content)<=1500){
                            if(strlen($url)<=300){
                                if($frozen!='true'){
                                    if($sealdate=='false'){
                                        $a='{(id):'.rand(10000,99999).',(user):'.$user.',(title):'.$title.',(content):'.$content.',(url):'.$url.'}';
                                        if(file_exists('userss/'.$admin.'/admin/data/customlist')){
                                        $b=file_get_contents('userss/'.$admin.'/admin/data/customlist');
                                        }else{$b='';}
                                        file_put_contents('userss/'.$admin.'/admin/data/customlist',$a.$b);
                                        file_put_contents('userfrozen/'.$admin.'-'.$user,time());
                                        echo '发布成功，请耐心等待审核';
                                    }else{echo '发布失败，账号封禁至'.$sealdate;}
                                }else{echo '操作频繁，请'.$timesss.'秒后重试';}
                            }else{echo '链接不可超过300字符';}
                        }else{echo '内容不可超过1500字符';}
                    }else{echo '标题不可超过300字符';}
                }else{echo '标题，内容或链接包含禁词';}
            }else{echo '请输入完整';}
        }else{echo '密码错误';}
    }else{echo '账号不存在';}
}else{echo '后台账号不存在';}
?>