<?php
// admin_user_manage.php - 后台用户管理页面

// -----------------------------------------------------------------------------
// 1. 权限验证
// -----------------------------------------------------------------------------
session_start();
$admin = isset($_GET['admin']) ? $_GET['admin'] : (isset($_SESSION['admin']) ? $_SESSION['admin'] : '');
$pass = isset($_GET['pass']) ? $_GET['pass'] : (isset($_SESSION['pass']) ? $_SESSION['pass'] : '');

// 检查是否已登录
if ($admin == "" || $pass == "") {
    echo "<h1>错误：请提供管理员账号和密码参数（?admin=xxx&pass=xxx）或先登录。</h1>";
    exit;
}

$admin_path = "userss/" . $admin;
$pass_file = $admin_path . "/admin/passprotect556";

if (!file_exists($admin_path)) {
    echo "<h1>错误：后台账号不存在。</h1>";
    exit;
}

if (!file_exists($pass_file)) {
    echo "<h1>错误：管理员密码文件丢失。</h1>";
    exit;
}

$ipass = file_get_contents($pass_file);

if ($pass !== trim($ipass)) {
    echo "<h1>错误：后台密码错误。</h1>";
    exit;
}

// 验证成功，将会话信息保存，方便后续操作
$_SESSION['admin'] = $admin;
$_SESSION['pass'] = $pass;

// -----------------------------------------------------------------------------
// 2. 页面逻辑
// -----------------------------------------------------------------------------

// 辅助函数：读取用户数据文件内容
function getUserData($admin, $user, $filename, $default = '未设置') {
    $filepath = "userss/" . $admin . "/userss/" . $user . "/" . $filename;
    if (file_exists($filepath)) {
        return trim(file_get_contents($filepath));
    }
    return $default;
}

// 辅助函数：格式化时间戳
function formatTime($timestamp) {
    if (empty($timestamp) || !is_numeric($timestamp) || $timestamp <= 0) {
        return "永久/未设置";
    }
    return date("Y-m-d H:i:s", $timestamp);
}

// 获取用户列表
$user_list = [];
$users_dir = $admin_path . "/userss";
if (is_dir($users_dir)) {
    $handle = opendir($users_dir);
    while (false !== ($file = readdir($handle))) {
        if ($file != "." && $file != ".." && is_dir($users_dir . '/' . $file)) {
            $user = $file;
            $data = [
                'user' => $user,
                'name' => getUserData($admin, $user, 'name', '未设置'),
                'grade' => getUserData($admin, $user, 'grade', '普通用户'),
                'money' => getUserData($admin, $user, 'money', '0'),
                'viptime' => (int)getUserData($admin, $user, 'viptime', '0'),
                'sealtime' => (int)getUserData($admin, $user, 'seal', '0'),
                'registertime' => (int)getUserData($admin, $user, 'registertime', '0'),
            ];

            // 处理时间显示
            $data['vip_status'] = ($data['viptime'] > time()) ? formatTime($data['viptime']) : '已过期';
            $data['seal_status'] = ($data['sealtime'] > time()) ? formatTime($data['sealtime']) : '未封禁';
            $data['register_time_str'] = formatTime($data['registertime']);

            $user_list[] = $data;
        }
    }
    closedir($handle);
}

// -----------------------------------------------------------------------------
// 3. HTML 页面输出
// -----------------------------------------------------------------------------
?>
<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="UTF-8">
    <title>易对接后台用户管理 - <?php echo $admin; ?></title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; background-color: #f4f4f4; }
        .container { background-color: #fff; padding: 20px; border-radius: 8px; box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); }
        h1 { color: #333; border-bottom: 2px solid #eee; padding-bottom: 10px; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid #ddd; padding: 8px; text-align: left; }
        th { background-color: #f2f2f2; }
        .action-form { margin-top: 10px; padding: 10px; border: 1px solid #ccc; border-radius: 5px; background-color: #fafafa; }
        .action-form input[type="text"], .action-form input[type="number"] { padding: 5px; margin-right: 10px; border: 1px solid #ddd; border-radius: 3px; }
        .action-form button { padding: 5px 10px; background-color: #5cb85c; color: white; border: none; border-radius: 3px; cursor: pointer; }
        .action-form button:hover { background-color: #4cae4c; }
        .seal-btn { background-color: #d9534f !important; }
        .seal-btn:hover { background-color: #c9302c !important; }
        .unseal-btn { background-color: #f0ad4e !important; }
        .unseal-btn:hover { background-color: #ec971f !important; }
        .warning { color: red; font-weight: bold; margin-bottom: 15px; padding: 10px; border: 1px solid red; background-color: #ffecec; border-radius: 5px; }
    </style>
    <script>
        // 封禁/解封操作的JavaScript
        function manageUser(user, action) {
            const form = document.getElementById('form_' + user + '_' + action);
            const durationInput = document.getElementById('duration_' + user);
            let duration = 0;

            if (action === 'seal') {
                duration = durationInput.value;
                if (!duration || isNaN(duration) || duration <= 0) {
                    alert('请输入有效的封禁时长（秒）。');
                    return;
                }
            }
            
            if (action === 'unseal') {
                if (!confirm('确定要对用户 ' + user + ' 进行解封操作吗？')) {
                    return;
                }
            }
            
            // 构造URL并提交
            let url = 'admin_user_action.php?admin=<?php echo $admin; ?>&pass=<?php echo $pass; ?>&user=' + user + '&action=' + action;
            if (action === 'seal') {
                url += '&duration=' + duration;
            }
            
            window.location.href = url;
        }
        
        // 余额操作的JavaScript
        function manageMoney(user, action) {
            const moneyInput = document.getElementById('money_' + user);
            let amount = moneyInput.value;
            
            if (!amount || isNaN(amount) || amount <= 0) {
                alert('请输入有效的金额。');
                return;
            }
            
            let url = '';
            if (action === 'add_money') {
                url = 'moneyadd-admin.php?pass=<?php echo $pass; ?>&num=' + amount + '&admin=' + user;
                // 注意：这里直接使用了项目原有的 moneyadd-admin.php 接口，
                // 但原接口的 admin 参数是用户账号，pass 参数是管理员密码。
                // 且原接口没有返回结果，需要用户自行刷新或检查。
                // 为了演示，我将使用新的 admin_user_action.php 来处理。
                
                // 实际上，原项目接口应该是：
                // url = 'moneyadd-admin.php?pass=zxcv25&num=' + amount + '&admin=' + user;
                // 但为了安全和统一，我们使用新的逻辑。
            }
            
            // 使用新的统一处理接口
            url = 'admin_user_action.php?admin=<?php echo $admin; ?>&pass=<?php echo $pass; ?>&user=' + user + '&action=add_money&amount=' + amount;
            
            if (!confirm('确定要为用户 ' + user + ' 增加 ' + amount + ' 金币吗？')) {
                return;
            }
            
            window.location.href = url;
        }
    </script>
</head>
<body>
    <div class="container">
        <h1>易对接后台用户管理面板</h1>
        <p class="warning">
            **安全警告：** 本页面使用 GET 参数进行身份验证（admin 和 pass），这在生产环境中极不安全。
            请在实际部署时，将此验证机制改为安全的 Session/Cookie 登录验证。
        </p>

        <table>
            <thead>
                <tr>
                    <th>账号</th>
                    <th>昵称</th>
                    <th>等级</th>
                    <th>金币</th>
                    <th>注册时间</th>
                    <th>会员状态</th>
                    <th>**封禁状态**</th>
                    <th>**操作**</th>
                </tr>
            </thead>
            <tbody>
                <?php if (empty($user_list)): ?>
                    <tr><td colspan="8">未找到任何用户数据。</td></tr>
                <?php else: ?>
                    <?php foreach ($user_list as $user): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($user['user']); ?></td>
                            <td><?php echo htmlspecialchars($user['name']); ?></td>
                            <td><?php echo htmlspecialchars($user['grade']); ?></td>
                            <td><?php echo htmlspecialchars($user['money']); ?></td>
                            <td><?php echo htmlspecialchars($user['register_time_str']); ?></td>
                            <td><?php echo htmlspecialchars($user['vip_status']); ?></td>
                            <td style="color: <?php echo $user['sealtime'] > time() ? 'red' : 'green'; ?>; font-weight: bold;"><?php echo htmlspecialchars($user['seal_status']); ?></td>
                            <td>
                                <!-- 封禁/解封操作 -->
                                <div class="action-form">
                                    <input type="number" id="duration_<?php echo $user['user']; ?>" placeholder="封禁时长(秒)" value="86400" style="width: 100px;">
                                    <button class="seal-btn" onclick="manageUser('<?php echo $user['user']; ?>', 'seal')">封禁</button>
                                    <button class="unseal-btn" onclick="manageUser('<?php echo $user['user']; ?>', 'unseal')">解封</button>
                                </div>
                                <!-- 金币操作 -->
                                <div class="action-form">
                                    <input type="number" id="money_<?php echo $user['user']; ?>" placeholder="增加金币数" value="10" style="width: 100px;">
                                    <button onclick="manageMoney('<?php echo $user['user']; ?>', 'add_money')">增加金币</button>
                                </div>
                                <!-- 更多操作可以继续添加... -->
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</body>
</html>
