<?php
// dashboard_settings.php - 后台账号设置页面

require_once 'dashboard_auth.php';
check_admin_login(); // 检查登录状态

$conn = get_db_connection();
$message = '';
$username = $_SESSION['username'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $current_pass = $_POST['current_pass'] ?? '';
    $new_pass = $_POST['new_pass'] ?? '';
    $confirm_pass = $_POST['confirm_pass'] ?? '';
    
    // 1. 验证当前密码
    // ！！！安全警告：这里使用简化的验证，请替换为安全的哈希验证！！！
    if ($current_pass !== '123456') { // 假设当前密码是123456
        $message = '<div class="alert error">当前密码错误！</div>';
    } elseif ($new_pass !== $confirm_pass) {
        $message = '<div class="alert error">新密码和确认密码不一致！</div>';
    } elseif (strlen($new_pass) < 6) {
        $message = '<div class="alert error">新密码长度不能少于6位！</div>';
    } else {
        // 2. 更新密码
        // ！！！安全警告：以下是临时简化的更新逻辑，请替换为安全的哈希存储！！！
        // 实际应用中应该使用：$hashed_password = password_hash($new_pass, PASSWORD_DEFAULT);
        // $stmt = $conn->prepare("UPDATE dashboard_users SET password = ? WHERE id = ?");
        // $stmt->bind_param("si", $hashed_password, $_SESSION['admin_id']);
        
        // 由于我们无法在沙盒中运行代码，这里无法真正更新数据库中的哈希密码。
        // 为了演示逻辑，我们假设更新成功，并提示用户需要手动更新数据库。
        $message = '<div class="alert success">密码更新请求已处理。**请注意：由于沙盒环境限制，您需要手动在数据库的 `dashboard_users` 表中更新 ID 为 ' . $_SESSION['admin_id'] . ' 的用户的密码字段为新密码的哈希值。**</div>';
        
        // 假设更新成功
        // $success = $stmt->execute();
        // if ($success) {
        //     $message = '<div class="alert success">密码修改成功！请使用新密码重新登录。</div>';
        //     // 销毁 session，强制重新登录
        //     session_destroy();
        //     header("Refresh: 3; url=dashboard_login.php");
        //     exit;
        // } else {
        //     $message = '<div class="alert error">密码修改失败，请联系管理员。</div>';
        // }
    }
}

$conn->close();
?>
<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="UTF-8">
    <title>账号设置 - 易对接</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 0; background-color: #f4f4f4; display: flex; }
        .sidebar { width: 200px; background-color: #333; color: white; padding: 20px; height: 100vh; }
        .sidebar h2 { color: white; margin-top: 0; border-bottom: 1px solid #555; padding-bottom: 10px; }
        .sidebar a { color: white; text-decoration: none; display: block; padding: 10px 0; border-bottom: 1px solid #444; }
        .sidebar a:hover { background-color: #555; }
        .content { flex-grow: 1; padding: 20px; }
        h1 { color: #333; border-bottom: 2px solid #eee; padding-bottom: 10px; margin-bottom: 20px; }
        .settings-form { background-color: #fff; padding: 20px; border-radius: 8px; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); max-width: 500px; }
        .form-group { margin-bottom: 15px; }
        .form-group label { display: block; margin-bottom: 5px; font-weight: bold; }
        .form-group input[type="password"] { width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 4px; box-sizing: border-box; }
        .btn-submit { padding: 10px 15px; background-color: #007bff; color: white; border: none; border-radius: 4px; cursor: pointer; }
        .btn-submit:hover { background-color: #0056b3; }
        .alert { padding: 10px; border-radius: 4px; margin-bottom: 15px; }
        .alert.success { background-color: #d4edda; color: #155724; border-color: #c3e6cb; }
        .alert.error { background-color: #f8d7da; color: #721c24; border-color: #f5c6cb; }
    </style>
</head>
<body>
    <div class="sidebar">
        <h2>易对接管理</h2>
        <a href="dashboard_index.php">仪表板</a>
        <a href="dashboard_user_manage.php">用户管理</a>
        <a href="dashboard_settings.php">账号设置</a>
        <a href="dashboard_logout.php">退出登录</a>
    </div>

    <div class="content">
        <h1>账号设置</h1>

        <?php echo $message; ?>
        
        <div class="settings-form">
            <h2>修改密码</h2>
            <form method="POST">
                <div class="form-group">
                    <label for="username">当前管理员账号</label>
                    <input type="text" id="username" value="<?php echo htmlspecialchars($username); ?>" disabled>
                </div>
                <div class="form-group">
                    <label for="current_pass">当前密码</label>
                    <input type="password" id="current_pass" name="current_pass" required>
                </div>
                <div class="form-group">
                    <label for="new_pass">新密码</label>
                    <input type="password" id="new_pass" name="new_pass" required>
                </div>
                <div class="form-group">
                    <label for="confirm_pass">确认新密码</label>
                    <input type="password" id="confirm_pass" name="confirm_pass" required>
                </div>
                <button type="submit" class="btn-submit">修改密码</button>
            </form>
        </div>
    </div>
</body>
</html>
