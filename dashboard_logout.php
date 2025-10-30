<?php
// dashboard_logout.php - 退出登录

session_start();
session_destroy(); // 销毁所有 session 数据
header("Location: dashboard_login.php"); // 跳转到登录页面
exit;
?>
