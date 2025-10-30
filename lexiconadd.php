<?php
$user=$_GET['user'];
$pass=$_GET['pass'];
$problem=$_GET['problem'];
$answer=$_GET['answer'];
$prnum=strlen($problem);
$annum=strlen($answer);
require 'test_test.php';

if(file_exists('adminfrozen/'.$user)){
$timesss=file_get_contents('adminfrozen/'.$user);
if($timesss>time()-3){
$frozen='true';
$timesss=$timesss-time()+3;//剩余多久可操作
}else{$frozen=='false';}
}else{$frozen=='false';}

if($frozen!='true'){
if(is_dir('userss/'.$user)&&$user!=''){
    if($pass==file_get_contents('userss/'.$user.'/admin/passprotect556')){
        if(file_exists('userss/'.$user.'/admin/data/thesaurus')){
        $thesaurus=file_get_contents('userss/'.$user.'/admin/data/thesaurus');
        }else{$thesaurus='';}
            if($problem!=''&&$answer!=''){
                if(strpos($thesaurus,'"'.$problem.'":')===false){
                    if(strpos($problem,'[(My)')===false&&strpos($problem,'(My)|(Ai)')===false&&strpos($problem,'(Ai)]')===false&&strpos($answer,'[(My)')===false&&strpos($answer,'(My)|(Ai)')===false&&strpos($answer,'(Ai)]')===false&&strpos($problem,'[')===false&&strpos($problem,'=>')===false&&strpos($problem,']')===false&&strpos($answer,'[')===false&&strpos($answer,'=>')===false&&strpos($answer,']')===false){
                        if($prnum<=300){
                            if($annum<=1800){
                    $arrays=json_decode($thesaurus,true);//将json转化为数组
                    $arrays[$problem]=$answer;//数组元素相加
                    $json=json_encode($arrays,JSON_UNESCAPED_UNICODE);//转化为json
                    file_put_contents('userss/'.$user.'/admin/data/thesaurus',$json);//写入文件
                    file_put_contents('adminfrozen/'.$user,time());
                    echo '添加成功';
                            }else{echo '回答不可超过1800字符';}
                        }else{echo '问题不可超过300字符';}
                    }else{echo '问题或回答包含禁词';}
                }else{echo '请勿添加重复问题';}
            }else{echo '请输入完整';}
    }else{echo '后台密码错误';}
}else{echo '后台账号不存在';}
}else{echo '频繁操作，请'.$timesss.'秒后重试';}
?>
