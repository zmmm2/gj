<?php
$test_admin = isset($admin)?$admin:null;
$test_user = isset($user)?$user:null;
$test_file = isset($file)?$file:null;
$test_key = isset($key)?$key:null;
$test_id = isset($id)?$id:null;
$test_user2 = isset($user2)?$user2:null;
$test_kalman = isset($kalman)?$kalman:null;
$test_users = isset($users)?$users:null;
$test_imei = isset($imei)?$imei:null;
$test_query = isset($query)?$query:null;
$test_num = isset($num)?$num:null;
$test_myqq = isset($myqq)?$myqq:null;
$test_sid = isset($sid)?$sid:null;
$test_code = isset($code)?$code:null;

test_ftn($test_admin);
test_ftn($test_user);
test_ftn($test_file);
test_ftn($test_key);
test_ftn($test_id);
test_ftn($test_user2);
test_ftn($test_kalman);
test_ftn($test_users);
test_ftn($test_imei);
test_ftn($test_query);
test_ftn($test_sid);
test_ftn($test_num);
test_ftn($test_myqq);
test_ftn($test_code);

function test_ftn($test_data){
    if(
        strpos($test_data,'/') !== false
        || $test_data == '.'
        || $test_data == '..'
        || strpos($test_data,'eval(') !== false
        || strpos($test_data,'\\') !== false
        || strpos($test_data,'&') !== false
        || strpos($test_data,'#') !== false
        || $test_data == '.'
        || $test_data == '..'
    )die('非法请求');
}

//在线人数统计
if(is_dir('./userss/'.$test_admin) && is_dir('./userss/'.$test_admin.'/userss/'.$test_user) && $test_user != null && $test_admin != null){
    $test_time = time();
    $test_link = new mysqli("localhost","appdoc","123456","appdoc");
    $test_sql = "INSERT INTO `online`(`admin`, `user`, `time`) VALUES ('{$test_admin}','{$test_user}','{$test_time}')";
    $test_sql_up = "UPDATE `online` SET `time`= '{$test_time}' WHERE admin = '{$test_admin}' and user = '{$test_user}'";
    $test_sql_see = "SELECT COUNT(*) FROM `online` WHERE `admin` = '{$test_admin}' AND `user` = '{$test_user}'";
    if(mysqli_fetch_assoc($test_link->query($test_sql_see))["COUNT(*)"]==0){
        $test_link->query($test_sql);
    }else{
        $test_link->query($test_sql_up);
    }
    mysqli_close();
}