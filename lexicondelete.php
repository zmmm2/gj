<?php
$user=$_GET['user'];
$pass=$_GET['pass'];
$problem=$_GET['problem'];
$problem=str_replace('/','\/',$problem);
$answer=$_GET['answer'];
$answer=str_replace('/','\/',$answer);
require 'test_test.php';
if(is_dir('userss/'.$user)&&$user!=''){
    if($pass=file_get_contents('userss/'.$user.'/admin/passprotect556')){
        if(file_exists('userss/'.$user.'/admin/data/thesaurus')){
        $thesaurus=file_get_contents('userss/'.$user.'/admin/data/thesaurus');
        }else{$thesaurus='';}
            if($problem!=''&&$answer!=''){
                $json='"'.$problem.'":"'.$answer.'"';
                $jsons='{'.'"'.$problem.'":"'.$answer.'"'.'}';
                if(strpos($thesaurus,$jsons)!==false){
                    $thesauruss=str_replace($jsons,'',$thesaurus);
                    file_put_contents('userss/'.$user.'/admin/data/thesaurus',$thesauruss);
                    echo '删除成功';
                }else if(strpos($thesaurus,$json)!==false){
                    $thesauruss=str_replace($json,'',$thesaurus);
                    file_put_contents('userss/'.$user.'/admin/data/thesaurus',$thesauruss);
                    echo '删除成功'; 
                }else{echo '该问题不存在';}
            }else{echo '请输入完整';}
    }else{echo '后台密码错误';}
}else{echo '后台账号不存在';}
?>
