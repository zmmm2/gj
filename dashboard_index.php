<?php
// dashboard_index.php - 后台仪表板主页

require_once 'dashboard_auth.php';
check_admin_login(); // 检查登录状态

$conn = get_db_connection();

// -----------------------------------------------------------------------------
// 1. 数据统计逻辑
// -----------------------------------------------------------------------------
$stats = [
    'total_users' => 0,
    'vip_active' => 0,
    'vip_expired' => 0,
    'total_money' => 0.00,
    'total_docs' => 0,
];

// 总用户数
$result = $conn->query("SELECT COUNT(*) AS count FROM users");
$stats['total_users'] = $result->fetch_assoc()['count'];

// 会员状态
$now = time();
$result = $conn->query("SELECT COUNT(*) AS count FROM users WHERE viptime > {$now}");
$stats['vip_active'] = $result->fetch_assoc()['count'];
$stats['vip_expired'] = $stats['total_users'] - $stats['vip_active'];

// 总余额
$result = $conn->query("SELECT SUM(money) AS total FROM users");
$stats['total_money'] = number_format($result->fetch_assoc()['total'] ?? 0, 2);

// 总文档数
$result = $conn->query("SELECT SUM(doc_count) AS total FROM users");
$stats['total_docs'] = $result->fetch_assoc()['total'] ?? 0;

// -----------------------------------------------------------------------------
// 2. 公告管理逻辑
// -----------------------------------------------------------------------------
$announcement = get_config('announcement');
$message = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['announcement_content'])) {
    $new_announcement = $_POST['announcement_content'];
    if (update_config('announcement', $new_announcement)) {
        $announcement = $new_announcement; // 更新页面显示
        $message = '<div class="alert success">公告更新成功！</div>';
    } else {
        $message = '<div class="alert error">公告更新失败，请检查数据库连接。</div>';
    }
}

$conn->close();

// -----------------------------------------------------------------------------
// 3. HTML 页面输出
// -----------------------------------------------------------------------------
?>
<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="UTF-8">
    <title>后台仪表板 - 易对接</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 0; background-color: #f4f4f4; display: flex; }
        .sidebar { width: 200px; background-color: #333; color: white; padding: 20px; height: 100vh; }
        .sidebar h2 { color: white; margin-top: 0; border-bottom: 1px solid #555; padding-bottom: 10px; }
        .sidebar a { color: white; text-decoration: none; display: block; padding: 10px 0; border-bottom: 1px solid #444; }
        .sidebar a:hover { background-color: #555; }
        .content { flex-grow: 1; padding: 20px; }
        .header { display: flex; justify-content: space-between; align-items: center; border-bottom: 2px solid #eee; padding-bottom: 10px; margin-bottom: 20px; }
        .stats-grid { display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 20px; margin-bottom: 30px; }
        .stat-card { background-color: #fff; padding: 20px; border-radius: 8px; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); }
        .stat-card h3 { margin-top: 0; color: #555; font-size: 16px; }
        .stat-card p { font-size: 32px; font-weight: bold; color: #333; margin: 5px 0 0 0; }
        .announcement-section { background-color: #fff; padding: 20px; border-radius: 8px; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); }
        .announcement-section h2 { color: #333; border-bottom: 1px solid #eee; padding-bottom: 10px; margin-bottom: 15px; }
        .announcement-section textarea { width: 100%; height: 150px; padding: 10px; border: 1px solid #ccc; border-radius: 4px; resize: vertical; margin-bottom: 10px; box-sizing: border-box; }
        .announcement-section button { padding: 10px 15px; background-color: #007bff; color: white; border: none; border-radius: 4px; cursor: pointer; }
        .announcement-section button:hover { background-color: #0056b3; }
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
        <div class="header">
            <h1>欢迎回来，<?php echo htmlspecialchars($_SESSION['username']); ?></h1>
        </div>

        <?php echo $message; ?>

        <!-- 数据统计 -->
        <h2>平台数据概览</h2>
        <div class="stats-grid">
            <div class="stat-card">
                <h3>总用户数</h3>
                <p><?php echo $stats['total_users']; ?></p>
            </div>
            <div class="stat-card">
                <h3>活跃会员数</h3>
                <p><?php echo $stats['vip_active']; ?></p>
            </div>
            <div class="stat-card">
                <h3>会员到期用户数</h3>
                <p><?php echo $stats['vip_expired']; ?></p>
            </div>
            <div class="stat-card">
                <h3>平台总余额</h3>
                <p>¥<?php echo $stats['total_money']; ?></p>
            </div>
            <div class="stat-card">
                <h3>总文档数量</h3>
                <p><?php echo $stats['total_docs']; ?></p>
            </div>
        </div>

        <!-- 公告管理 -->
        <div class="announcement-section">
            <h2>公告管理</h2>
            <form method="POST">
                <textarea name="announcement_content" placeholder="输入新的平台公告内容..."><?php echo htmlspecialchars($announcement); ?></textarea>
                <button type="submit">更新公告</button>
            </form>
        </div>
    </div>
</body>
</html>
