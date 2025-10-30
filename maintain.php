 <?php
$user=$_GET['user'];
$pass=$_GET['pass'];
$switch=$_GET['switch'];
$notice=$_GET['notice'];
require 'test_test.php';
if(is_dir('userss/'.$user)&&$user!=''){
  if($pass==file_get_contents('userss/'.$user.'/admin/passprotect556')){
      if($switch=='开'||$switch=='关'){
          if($notice!=''){
            if(strlen($notice)<=3000){
              file_put_contents('userss/'.$user.'/admin/data/maintain','维护开关:'.$switch.'<br>维护通知:'.$notice);
              echo '修改成功';
             }else{echo '通知内容不可超过3000字符';}
          }else{echo '请输入完整';}
      }else{echo '开关参数错误';}
  }else{echo '后台密码错误';}
}else{echo '后台账号不存在';}
?>