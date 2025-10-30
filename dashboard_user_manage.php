<?php
// dashboard_user_manage.php - 后台用户管理页面

require_once 'dashboard_auth.php';
check_admin_login(); // 检查登录状态

$conn = get_db_connection();

// -----------------------------------------------------------------------------
// 1. 获取用户列表
// -----------------------------------------------------------------------------
$user_list = [];
$result = $conn->query("SELECT * FROM users ORDER BY id DESC");

if ($result) {
    while ($row = $result->fetch_assoc()) {
        $row['viptime_str'] = ($row['viptime'] > time()) ? date("Y-m-d H:i:s", $row['viptime']) : '已过期';
        $row['sealtime_str'] = ($row['sealtime'] > time()) ? date("Y-m-d H:i:s", $row['sealtime']) : '未封禁';
        $row['registertime_str'] = date("Y-m-d H:i:s", $row['registertime']);
        $user_list[] = $row;
    }
}

$conn->close();

// -----------------------------------------------------------------------------
// 2. HTML 页面输出
// -----------------------------------------------------------------------------
?>
<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="UTF-8">
    <title>用户管理 - 易对接</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 0; background-color: #f4f4f4; display: flex; }
        .sidebar { width: 200px; background-color: #333; color: white; padding: 20px; height: 100vh; }
        .sidebar h2 { color: white; margin-top: 0; border-bottom: 1px solid #555; padding-bottom: 10px; }
        .sidebar a { color: white; text-decoration: none; display: block; padding: 10px 0; border-bottom: 1px solid #444; }
        .sidebar a:hover { background-color: #555; }
        .content { flex-grow: 1; padding: 20px; }
        h1 { color: #333; border-bottom: 2px solid #eee; padding-bottom: 10px; margin-bottom: 20px; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; background-color: #fff; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); border-radius: 8px; overflow: hidden; }
        th, td { border: 1px solid #ddd; padding: 12px; text-align: left; }
        th { background-color: #f2f2f2; }
        .action-form { display: flex; gap: 5px; align-items: center; margin-bottom: 5px; }
        .action-form input[type="text"], .action-form input[type="number"] { padding: 5px; border: 1px solid #ddd; border-radius: 3px; width: 80px; }
        .action-form button { padding: 5px 10px; color: white; border: none; border-radius: 3px; cursor: pointer; }
        .seal-btn { background-color: #d9534f; }
        .seal-btn:hover { background-color: #c9302c; }
        .unseal-btn { background-color: #f0ad4e; }
        .unseal-btn:hover { background-color: #ec971f; }
        .money-btn { background-color: #5cb85c; }
        .money-btn:hover { background-color: #4cae4c; }
    </style>
    <script>
        function manageUser(id, username, action) {
            let url = 'dashboard_user_action.php?action=' + action + '&id=' + id;
            let durationInput = document.getElementById('duration_' + id);
            let amountInput = document.getElementById('amount_' + id);
            
            if (action === 'seal') {
                let duration = durationInput.value;
                if (!duration || isNaN(duration) || duration <= 0) {
                    alert('请输入有效的封禁时长（秒）。');
                    return;
                }
                if (!confirm('确定要对用户 ' + username + ' 封禁 ' + duration + ' 秒吗？')) return;
                url += '&duration=' + duration;
            } else if (action === 'unseal') {
                if (!confirm('确定要对用户 ' + username + ' 进行解封操作吗？')) return;
            } else if (action === 'add_money') {
                let amount = amountInput.value;
                if (!amount || isNaN(amount) || amount <= 0) {
                    alert('请输入有效的增加金额。');
                    return;
                }
                if (!confirm('确定要为用户 ' + username + ' 增加 ' + amount + ' 余额吗？')) return;
                url += '&amount=' + amount;
            } else if (action === 'add_viptime') {
                let amount = amountInput.value;
                if (!amount || isNaN(amount) || amount <= 0) {
                    alert('请输入有效的增加会员时长（秒）。');
                    return;
                }
                if (!confirm('确定要为用户 ' + username + ' 增加 ' + amount + ' 秒会员时长吗？')) return;
                url += '&amount=' + amount;
            } else if (action === 'delete') {
                if (!confirm('警告：确定要永久删除用户 ' + username + ' 吗？此操作不可逆！')) return;
            }

            window.location.href = url;
        }
    </script>
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
        <h1>用户管理</h1>

        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>账号</th>
                    <th>昵称</th>
                    <th>余额</th>
                    <th>文档数</th>
                    <th>注册时间</th>
                    <th>会员到期</th>
                    <th>**封禁状态**</th>
                    <th>**操作**</th>
                </tr>
            </thead>
            <tbody>
                <?php if (empty($user_list)): ?>
                    <tr><td colspan="9" style="text-align: center;">未找到任何用户数据。</td></tr>
                <?php else: ?>
                    <?php foreach ($user_list as $user): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($user['id']); ?></td>
                            <td><?php echo htmlspecialchars($user['username']); ?></td>
                            <td><?php echo htmlspecialchars($user['nickname']); ?></td>
                            <td>¥<?php echo htmlspecialchars($user['money']); ?></td>
                            <td><?php echo htmlspecialchars($user['doc_count']); ?></td>
                            <td><?php echo htmlspecialchars($user['registertime_str']); ?></td>
                            <td style="color: <?php echo $user['viptime'] > time() ? 'green' : 'red'; ?>;"><?php echo htmlspecialchars($user['viptime_str']); ?></td>
                            <td style="color: <?php echo $user['sealtime'] > time() ? 'red' : 'green'; ?>; font-weight: bold;"><?php echo htmlspecialchars($user['sealtime_str']); ?></td>
                            <td>
                                <!-- 封禁/解封操作 -->
                                <div class="action-form">
                                    <input type="number" id="duration_<?php echo $user['id']; ?>" placeholder="封禁秒数" value="86400">
                                    <button class="seal-btn" onclick="manageUser(<?php echo $user['id']; ?>, '<?php echo $user['username']; ?>', 'seal')">封禁</button>
                                    <button class="unseal-btn" onclick="manageUser(<?php echo $user['id']; ?>, '<?php echo $user['username']; ?>', 'unseal')">解封</button>
                                </div>
                                <!-- 余额操作 -->
                                <div class="action-form">
                                    <input type="number" id="amount_<?php echo $user['id']; ?>" placeholder="增加金额" value="10">
                                    <button class="money-btn" onclick="manageUser(<?php echo $user['id']; ?>, '<?php echo $user['username']; ?>', 'add_money')">加余额</button>
                                </div>
                                <!-- 会员操作 -->
                                <div class="action-form">
                                    <input type="number" id="viptime_<?php echo $user['id']; ?>" placeholder="增加会员秒数" value="2592000">
                                    <button class="money-btn" style="background-color: #007bff;" onclick="manageUser(<?php echo $user['id']; ?>, '<?php echo $user['username']; ?>', 'add_viptime')">加会员</button>
                                </div>
                                <!-- 删除操作 -->
                                <div class="action-form">
                                    <button class="seal-btn" onclick="manageUser(<?php echo $user['id']; ?>, '<?php echo $user['username']; ?>', 'delete')">删除用户</button>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</body>
</html>
