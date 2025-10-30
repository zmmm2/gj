<?php
$act=isset($_GET["act"])?$_GET["act"]:null;
if($act === null)die(json_encode(array("code"=>false,"msg"=>"Not")));

function login($user,$pwd){
    require '../test_test.php';
    if($user == "appdoc")die(json_encode(array("code"=>false,"msg"=>"测试账号永久关闭")));
    if($user === null || $pwd === null)die(json_encode(array("code" => false, "msg" => "Not")));
    if (!is_dir("../userss/" . $user)) die(json_encode(array("code" => false, "msg" => "登录失败，后台账号不存在")));
    if (file_get_contents("../userss/" . $user . "/admin/passprotect556") != $pwd) die(json_encode(array("code" => false, "msg" => "登录失败，后台密码错误")));
    if (file_get_contents("../userss/" . $user . "/admin/viptime") < time())die(json_encode(array("code" => false, "msg" => "后台账号过期，请先缴费")));
}

switch($act) {
    case "login":
        $user=isset($_POST["user"])?$_POST["user"]:null;
        $pwd=isset($_POST["pwd"])?$_POST["pwd"]:null;
        login($user,$pwd);
        setcookie("user", $user, time() + 86400 * 30);
        setcookie("pwd", $pwd, time() + 86400 * 30);
        die(json_encode(array("code" => true, "msg" => "登录成功，请等待跳转...")));
    case "notice":
        $user=isset($_COOKIE['user'])?$_COOKIE['user']:null;
        $pwd=isset($_COOKIE['pwd'])?$_COOKIE['pwd']:null;
        login($user,$pwd);
        $content = isset($_POST['content'])?$_POST['content']:null;
        if($content == null)die(json_encode(array("code" => true, "msg" => "内容参数为空")));
        $content = str_replace('&#10','<br>',$content);
        file_put_contents('../userss/'.$user.'/admin/data/notice',$content);
        die(json_encode(array("code" => true, "msg" => "公告修改成功")));
    case "new":
        $user=isset($_COOKIE['user'])?$_COOKIE['user']:null;
        $pwd=isset($_COOKIE['pwd'])?$_COOKIE['pwd']:null;
        login($user,$pwd);
        $bb = isset($_POST['bb'])?$_POST['bb']:null;
        $lj = isset($_POST['lj'])?$_POST['lj']:null;
        $tz = isset($_POST['tz'])?$_POST['tz']:null;
        if($bb == "" || $lj == "" || $tz == "")die(json_encode(array("code" => true, "msg" => "所需参数为空")));;
        if(strlen($bb) > 100 || strlen($lj) > 300 || strlen($tz) > 3000)die(json_encode(array("code" => true, "msg" => "有信息超出了最大长度")));;
        $newc="软件版本:($bb)更新内容:($tz)更新链接:($lj)";
        $newc=str_replace('*-*-*','&',$newc);
        $newc=str_replace('*-|-*','#',$newc);
        file_put_contents("../userss/".$user."/admin/data/new",$newc);
        die(json_encode(array("code" => true, "msg" => "更新修改成功")));
}
die(json_encode(array("code" => false, "msg" => "Not")));