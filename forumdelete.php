<?php
$admin=$_GET['admin'];
$pass=$_GET['pass'];
$user=$_GET['user'];
$users=$_GET['users'];
$mods=$_GET['mods'];
$title=$_GET['title'];
$time=$_GET['time'];
$content=$_GET['content'];
$id=$_GET['id'];
require 'test_test.php';
if($mods=='admin'){
//管理删帖--------------------------------------------------
if(is_dir('userss/'.$admin)&&$admin!=''){
if($pass==file_get_contents('userss/'.$admin.'/admin/passprotect556')){
$a='[<'.$id.'-/-'.$user.'-//-'.$title.'-///-'.$content.'-////-'.$time.'>]';
if(file_exists('userss/'.$admin.'/forum/forum')){
if(strpos(file_get_contents('userss/'.$admin.'/forum/forum'),$a)!==false){
$b=str_replace($a,'',file_get_contents('userss/'.$admin.'/forum/forum'));
file_put_contents('userss/'.$admin.'/forum/forum',$b);
if(file_exists('userss/'.$admin.'/forum/'.$id)){
unlink('userss/'.$admin.'/forum/'.$id);
}
if(file_get_contents('userss/'.$admin.'/forum/forum')==''){
unlink('userss/'.$admin.'/forum/forum');
}
echo '删除成功';
}else{echo '帖子不存在';}
}else{echo '后台无任何帖子';}
}else{echo '密码错误';}
}else{echo '后台账号不存在';}
}else{
if(file_exists('userss/'.$admin.'/admin/data/moderator')){
$m=file_get_contents('userss/'.$admin.'/admin/data/moderator');
}else{$m='';}
if(strpos($m,$user.'|')===false){
//用户删帖--------------------------------------------------
if(is_dir('userss/'.$admin)&&$admin!=''){
if(is_dir('userss/'.$admin.'/userss/'.$user)&&$user!=''){
if($pass==file_get_contents('userss/'.$admin.'/userss/'.$user.'/passprotect556')){
    include 'logintrue.php';
$c='-//-'.$title.'-///-'.$content.'-////-'.$time.'>]';
$a='[<'.$id.'-/-'.$user.'-//-'.$title.'-///-'.$content.'-////-'.$time.'>]';
if(file_exists('userss/'.$admin.'/forum/forum')){
if(strpos(file_get_contents('userss/'.$admin.'/forum/forum'),$c)!==false&&strpos(file_get_contents('userss/'.$admin.'/forum/forum'),$id)!==false){
if(strpos(file_get_contents('userss/'.$admin.'/forum/forum'),$a)!==false){
$b=str_replace($a,'',file_get_contents('userss/'.$admin.'/forum/forum'));
file_put_contents('userss/'.$admin.'/forum/forum',$b);
if(file_exists('userss/'.$admin.'/forum/'.$id)){
unlink('userss/'.$admin.'/forum/'.$id);
}
if(file_get_contents('userss/'.$admin.'/forum/forum')==''){
unlink('userss/'.$admin.'/forum/forum');
}
echo '删除成功';
}else{echo '无权删除，或参数错误';}
}else{echo '帖子不存在';}
}else{echo '后台无任何帖子';}
}else{echo '密码错误';}
}else{echo '用户不存在';}
}else{echo '后台账号不存在';}
}else{
//版主删帖--------------------------------------------------
if(is_dir('userss/'.$admin)&&$admin!=''){
if(is_dir('userss/'.$admin.'/userss/'.$user)&&$user!=''){
if($pass==file_get_contents('userss/'.$admin.'/userss/'.$user.'/passprotect556')){
    include 'logintrue.php';
$c='-//-'.$title.'-///-'.$content.'-////-'.$time.'>]';
if(strpos(file_get_contents('userss/'.$admin.'/forum/forum'),$c)!==false&&strpos(file_get_contents('userss/'.$admin.'/forum/forum'),$id)!==false){
$a='[<'.$id.'-/-'.$users.'-//-'.$title.'-///-'.$content.'-////-'.$time.'>]';
if($users!='(html)<font color=red>开发者</font>'){
$b=str_replace($a,'',file_get_contents('userss/'.$admin.'/forum/forum'));
file_put_contents('userss/'.$admin.'/forum/forum',$b);
if(file_exists('userss/'.$admin.'/forum/'.$id)){
unlink('userss/'.$admin.'/forum/'.$id);
}
if(file_get_contents('userss/'.$admin.'/forum/forum')==''){
unlink('userss/'.$admin.'/forum/forum');
}
echo '删除成功';
}else{echo '无权删除，或参数错误';}
}else{echo '帖子不存在';}
}else{echo '密码错误';}
}else{echo '用户不存在';}
}else{echo '后台账号不存在';}
}
}
?>