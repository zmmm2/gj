<?php
$admin=$_GET['admin'];
$pass=$_GET['pass'];
$id=$_GET['id'];
$user=$_GET['user'];
$title=$_GET['title'];
$content=$_GET['content'];
$url=$_GET['url'];
require 'test_test.php';
//{(id):id,(user):用户账号,(title):标题,(content):内容,(url):链接}
if(is_dir('userss/'.$admin)&&$admin!=''){
    if($pass==file_get_contents('userss/'.$admin.'/admin/passprotect556')){
        if($id!=''&&$user!=''&&$title!=''&&$content!=''&&$url!=''){
            if(strpos(file_get_contents('userss/'.$admin.'/admin/data/adoptlist'),'{(id):'.$id.',(user):'.$user.',(title):'.$title.',(content):'.$content.',(url):'.$url.'}')!==false){
                $a='{(id):'.$id.',(user):'.$user.',(title):'.$title.',(content):'.$content.',(url):'.$url.'}';//格式
                $b=file_get_contents('userss/'.$admin.'/admin/data/adoptlist');//全部通过内容
                $c=str_replace($a,'',$b);
                file_put_contents('userss/'.$admin.'/admin/data/adoptlist',$c);
                echo '删除成功';
            }else{echo '通过内容不存在';}
        }else{echo '请输入完整';}
    }else{echo '后台密码错误';}
}else{echo '后台账号不存在';}
?>