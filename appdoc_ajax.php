<?php
$user=isset($_POST["user"])?$_POST["user"]:null;
$km=isset($_POST["km"])?$_POST["km"]:null;

$mysql = [
    "host" => "localhost",
    "username" => "appdoc",
    "password" => "123456",
    "dbname" => "appdoc",
]; //数据库信息配置
$link = mysql_link($mysql["host"],$mysql["username"],$mysql["password"],$mysql["dbname"]); //连接数据库

function mysql_link($host,$username,$password,$dbname) {
    $link = new mysqli($host,$username,$password,$dbname);
    if($link->connect_error)die("数据库连接失败: " . $link->connect_error);
    mysqli_set_charset($link,'utf8');
    return $link;
} //连接数据库

function mysql_op($link,$code) {
    $query = $link->query($code);
    if($query)return true;
    return false;
} //数据库操作返回布尔值

function mysql_out($link,$code) {
    $query = $link->query($code);
    if($query)return mysqli_fetch_assoc($query);
    return false;
} //数据库查询返回数组

function test($user,$km){
    require './test_test.php';
    if($user == "appdoc")die(json_encode(array("code"=>false,"msg"=>"测试账号永久关闭")));
    if($user === null || $km === null || $user == '' || $km == '')die(json_encode(array("code" => false, "msg" => "error")));
    if (!is_dir("./userss/" . $user))die(json_encode(array("code" => false, "msg" => "后台账号不存在")));
    $t = [0,1,2,3,4,5,6,7,8,9,'a','b','c','d','e','f','g','h','i','j','k','l','m','n','o','p','q','r','s','t','u','v','w','x','y','z'];
    if(str_ireplace($t,'',$km) != '')die(json_encode(array("code" => false, "msg" => "卡密格式错误")));
}

function km_use($km,$link,$user){
    $km_data = mysql_out($link,"SELECT * FROM `vip_km` WHERE `km` = '{$km}'");
    if($km_data["km"] === null)die(json_encode(array("code" => false, "msg" => "卡密不存在或已被使用")));
    if($km_data["type"] == 'vip'){
        $user_vip_time = file_get_contents("./userss/$user/admin/viptime")>time()?file_get_contents("./userss/$user/admin/viptime"):time();
        $new_time = ($km_data["time"] + $user_vip_time);
        $file_put = file_put_contents("./userss/$user/admin/viptime",$new_time);
        $sql_del = mysql_op($link,"DELETE FROM `vip_km` WHERE `km` = '$km'");
        if($file_put && $sql_del)die(json_encode(array("code" => true, "msg" => "卡密使用成功，请重启后台查看")));
        die(json_encode(array("code" => false, "msg" => "发生了一个未知错误，请联系客服处理")));
    }else{
        $file_num = file_get_contents("./userss/$user/admin/data/filenum");
        $new_file_num = $file_num + $km_data['time'];
        $file_put = file_put_contents("./userss/$user/admin/data/filenum",$new_file_num);
        $sql_del = mysql_op($link,"DELETE FROM `vip_km` WHERE `km` = '$km'");
        if($file_put && $sql_del)die(json_encode(array("code" => true, "msg" => "卡密使用成功，请重启后台查看")));
        die(json_encode(array("code" => false, "msg" => "发生了一个未知错误，请联系客服处理")));
    }
}

test($user,$km);
km_use($km,$link,$user);