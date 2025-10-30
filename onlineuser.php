<?php
$admin=$_GET['admin'];
$user=$_GET['user'];
$pass=$_GET['pass'];
$content=$_GET['content'];
require 'test_test.php';
//屏蔽铭感词
if($content!=''){
$content=str_replace("傻逼","**",$content);
$content=str_replace("弱智","**",$content);
$content=str_replace("举报","**",$content);
$content=str_replace("求举报","***",$content);
$content=str_replace("刷钻","**",$content);
$content=str_replace("代刷","**",$content);
$content=str_replace("求打","**",$content);
$content=str_replace("滚","*",$content);
$content=str_replace("滚蛋","**",$content);
$content=str_replace("傻子","**",$content);
$content=str_replace("小学生","***",$content);
$content=str_replace("干你妈","***",$content);
$content=str_replace("干尼玛","***",$content);
$content=str_replace("草泥马","***",$content);
$content=str_replace("操你妈","***",$content);
$content=str_replace("废物","**",$content);
$content=str_replace("蠢逼","**",$content);
$content=str_replace("我是你爸","****",$content);
$content=str_replace("我是你爹","****",$content);
$content=str_replace("儿子","**",$content);
$content=str_replace("孙子","**",$content);
$content=str_replace("腾讯","**",$content);
$content=str_replace("赛尼姆","***",$content);
$content=str_replace("返利","**",$content);
$content=str_replace("狗比","**",$content);
$content=str_replace("狗逼","**",$content);
$content=str_replace("垃圾","**",$content);
$content=str_replace("狗屎","**",$content);
$content=str_replace("辣鸡","**",$content);
}
//屏蔽铭感词
if(is_dir('userss/'.$admin)&&$admin!=''){
    if(is_dir('userss/'.$admin.'/userss/'.$user)&&$user!=''){
        if($pass==file_get_contents('userss/'.$admin.'/userss/'.$user.'/passprotect556')){
            include 'logintrue.php';
            if($content!=''){
                if(strlen($content)<=1500){
                    if(strpos($content,'|')===false&&strpos($content,'[')===false&&strpos($content,']')===false&&strpos($content,'(html)')===false){
                        if(file_exists('userss/'.$admin.'/userss/'.$user.'/seal')){
                            if(file_get_contents('userss/'.$admin.'/userss/'.$user.'/seal')>time()){
                                $seal='true';
                            }
                        }
                    if($seal!='true'){
                    if(file_exists('userfrozen/'.$admin.'-'.$user)){
                    $timesss=file_get_contents('userfrozen/'.$admin.'-'.$user);
                    if($timesss>time()-3){
                    $frozen='true';
                    $timesss=$timesss-time()+3;
                    }else{$frozen=='false';}
                    }else{$frozen=='false';}
                    
                    if($frozen!='true'){
                        file_put_contents('userfrozen/'.$admin.'-'.$user,time());
                        //查找消息记录
                        if(file_exists('onlines/'.$admin.'-'.$user)){
                            $a=file_get_contents('onlines/'.$admin.'-'.$user);
                        }else{$a='';}
                        //查找消息记录
                        $b='[User|'.$content.'||'.date('Y-m-d H:i',time()).']';//消息格式
                        file_put_contents('onlines/'.$admin.'-'.$user,$a.$b);
                        echo '发送成功';
                    }else{echo '频繁操作，请'.$timesss.'秒后重试';}
                    }else{echo "发送失败，账号封禁至".date('Y-m-d H:i',file_get_contents('userss/'.$admin.'/userss/'.$user.'/seal'));}
                    }else{echo '发送内容包含禁词';}
                }else{echo '发送内容不可超过1500字符';}
            }else{echo '请输入完整';}
        }else{echo '密码错误';}
    }else{echo '账号不存在';}
}else{echo '后台账号不存在';}
?>