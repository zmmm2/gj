<?php
$db_config = [
    "interact",
    "code",
    "moreCode",
    "course"
];
$dbNum = [];
$dayNum = [];
$link = new mysqli("localhost", "appdoc", "123456", "appdoc");
if (!$link) die('数据库连接失败，请联系站长');

function whole($db,$link) {
    $counts="select  count(*) as count from $db WHERE `check` =1 ";
    $countss=mysqli_query($link,$counts);
    $count=mysqli_fetch_assoc($countss);
    $count=$count['count'];
    return $count;
}

function day($db,$link) {
    
    $day_online = time();
    $day_date = date('Y-m-d',$day_online);
    $day_online = strtotime($day_date); //今日时间戳

    $day_down = time();
    $day_dates = date('Y-m-d',$day_down);
    $day_down = strtotime($day_dates) + 86400; //明日时间戳
    
    $counts="select  count(*) as count from $db WHERE `time` >= $day_online and `time` < $day_down and `check` =1 ";
    $countss=mysqli_query($link,$counts);
    $count=mysqli_fetch_assoc($countss);
    $count=$count['count'];
    return $count;
}

for($i=0;$i<count($db_config);$i++){
    $dayNum[$db_config[$i].'_day'] = day($db_config[$i],$link);
}
for($i=0;$i<count($db_config);$i++){
    $dbNum[$db_config[$i]] = whole($db_config[$i],$link);
}
$data = json_encode(array_merge($dayNum,$dbNum));
exit($data);