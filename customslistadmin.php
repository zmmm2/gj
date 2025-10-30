<?php
$admin=$_GET['admin'];
$pass=$_GET['pass'];
$id=$_GET['id'];
$user=$_GET['user'];
$title=$_GET['title'];
$content=$_GET['content'];
$url=$_GET['url'];
$true=$_GET['true'];
require 'test_test.php';
//{(id):id,(user):用户账号,(title):标题,(content):内容,(url):链接}
if(is_dir('userss/'.$admin)&&$admin!=''){
    if($pass==file_get_contents('userss/'.$admin.'/admin/passprotect556')){
        if(file_get_contents('userss/'.$admin.'/admin/viptime')>time()){
            if($id!=''&&$user!=''&&$title!=''&&$content!=''&&$url!=''&&$true!=''){
                if(strpos(file_get_contents('userss/'.$admin.'/admin/data/customlist'),'{(id):'.$id.',(user):'.$user.',(title):'.$title.',(content):'.$content.',(url):'.$url.'}')!==false){
                    $a='{(id):'.$id.',(user):'.$user.',(title):'.$title.',(content):'.$content.',(url):'.$url.'}';//格式
                    $b=file_get_contents('userss/'.$admin.'/admin/data/customlist');//全部审核内容
                    $c=file_get_contents('userss/'.$admin.'/admin/data/adoptlist');//全部通过内容
                    if($true=='true'){
                    //通过
                    $d=str_replace($a,'',$b);
                    file_put_contents('userss/'.$admin.'/admin/data/customlist',$d);
                    file_put_contents('userss/'.$admin.'/admin/data/adoptlist',$a.$c);
                    //发送通知
                    $ass='恭喜，您发布的《'.$title.'》已经通过审核';
                    $ass='['.$ass.'|'.date('Y-m-d H:i',time()).']';
                    if(file_exists('userss/'.$admin.'/userss/'.$user.'/newscontents')){
                    $bss=file_get_contents('userss/'.$admin.'/userss/'.$user.'/newscontents');
                    }else{
                    $bss='';
                    }
                    file_put_contents('userss/'.$admin.'/userss/'.$user.'/newscontents',$ass.$bss);
                    //发送通知
                    echo '批准成功:通过';
                    }else{
                    //不通过
                    $c=str_replace($a,'',$b);
                    file_put_contents('userss/'.$admin.'/admin/data/customlist',$c);
                    //发送通知
                    $ass='很遗憾，您发布的《'.$title.'》未通过审核';
                    $ass='['.$ass.'|'.date('Y-m-d H:i',time()).']';
                    if(file_exists('userss/'.$admin.'/userss/'.$user.'/newscontents')){
                    $bss=file_get_contents('userss/'.$admin.'/userss/'.$user.'/newscontents');
                    }else{
                    $bss='';
                    }
                    file_put_contents('userss/'.$admin.'/userss/'.$user.'/newscontents',$ass.$bss);
                    //发送通知
                    echo '批准成功:不通过';
                    }
                }else{echo '审核内容不存在';}
            }else{echo '请输入完整';}
        }else{echo '后台账号过期，无法操作';}
    }else{echo '后台密码错误';}
}else{echo '后台账号不存在';}
?>