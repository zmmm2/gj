<?php
echo '现在时间:'.date('Y-m-d H:i:s',time());
echo '<br>一天之后:'.date('Y-m-d H:i:s',time()+60*60*24);
echo '<br>一周之后:'.date('Y-m-d H:i:s',time()+60*60*24*7);
echo '<br>一月之后:'.date('Y-m-d H:i:s',strtotime('1month',time()));
echo '<br>一年之后:'.date('Y-m-d H:i:s',strtotime('1year',time()));
echo '<br>目前时间戳:'.time();
?>