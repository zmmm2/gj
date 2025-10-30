<?php
// dashboard_user_action.php - 后台用户操作逻辑

require_once 'dashboard_auth.php';
check_admin_login(); // 检查登录状态

$conn = get_db_connection();

$user_id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
$action = isset($_GET['action']) ? $_GET['action'] : '';
$message = '';
$success = false;

// 辅助函数：输出结果并跳转
function output_result($success, $message) {
    echo "<!DOCTYPE html><html lang='zh-CN'><head><meta charset='UTF-8'><title>操作结果</title><style>body { font-family: Arial, sans-serif; margin: 20px; background-color: #f4f4f4; } .container { background-color: #fff; padding: 20px; border-radius: 8px; box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); } h1 { color: " . ($success ? '#5cb85c' : '#d9534f') . "; } .message { margin-bottom: 20px; } .back-link { display: block; margin-top: 20px; }</style><meta http-equiv='refresh' content='3;url=dashboard_user_manage.php'></head><body><div class='container'><h1>" . ($success ? '操作成功' : '操作失败') . "</h1><div class='message'>" . htmlspecialchars($message) . "</div><p>3秒后自动返回用户管理页...</p><a href='dashboard_user_manage.php' class='back-link'>立即返回</a></div></body></html>";
    exit;
}

if ($user_id <= 0) {
    output_result(false, '用户ID无效。');
}

// 获取用户信息
$stmt = $conn->prepare("SELECT username, viptime, money FROM users WHERE id = ?");
$stmt->bind_param("i", $user_id);
$stmt->execute();
$user_data = $stmt->get_result()->fetch_assoc();
$stmt->close();

if (!$user_data) {
    output_result(false, '用户不存在。');
}

$username = $user_data['username'];

switch ($action) {
    case 'seal':
        $duration = isset($_GET['duration']) ? (int)$_GET['duration'] : 0;
        if ($duration <= 0) {
            output_result(false, '封禁时长必须大于0秒。');
        }
        $seal_time = time() + $duration;
        $stmt = $conn->prepare("UPDATE users SET sealtime = ? WHERE id = ?");
        $stmt->bind_param("ii", $seal_time, $user_id);
        $success = $stmt->execute();
        $message = $success ? "用户 **{$username}** 已成功封禁，解封时间：" . date("Y-m-d H:i:s", $seal_time) : "封禁操作失败。";
        break;

    case 'unseal':
        $seal_time = 0;
        $stmt = $conn->prepare("UPDATE users SET sealtime = ? WHERE id = ?");
        $stmt->bind_param("ii", $seal_time, $user_id);
        $success = $stmt->execute();
        $message = $success ? "用户 **{$username}** 已成功解封。" : "解封操作失败。";
        break;
        
    case 'add_money':
        $amount = isset($_GET['amount']) ? (float)$_GET['amount'] : 0;
        if ($amount <= 0) {
            output_result(false, '增加金额必须大于0。');
        }
        $new_money = $user_data['money'] + $amount;
        $stmt = $conn->prepare("UPDATE users SET money = ? WHERE id = ?");
        $stmt->bind_param("di", $new_money, $user_id);
        $success = $stmt->execute();
        $message = $success ? "已成功为用户 **{$username}** 增加 **{$amount}** 余额。当前余额：{$new_money}" : "增加余额操作失败。";
        break;

    case 'add_viptime':
        $duration = isset($_GET['amount']) ? (int)$_GET['amount'] : 0;
        if ($duration <= 0) {
            output_result(false, '增加会员时长必须大于0秒。');
        }
        $viptime = $user_data['viptime'] > time() ? $user_data['viptime'] : time(); // 如果已过期，从现在开始算
        $new_viptime = $viptime + $duration;
        $stmt = $conn->prepare("UPDATE users SET viptime = ? WHERE id = ?");
        $stmt->bind_param("ii", $new_viptime, $user_id);
        $success = $stmt->execute();
        $message = $success ? "已成功为用户 **{$username}** 增加 **{$duration}** 秒会员时长。新的到期时间：" . date("Y-m-d H:i:s", $new_viptime) : "增加会员时长操作失败。";
        break;

    case 'delete':
        $stmt = $conn->prepare("DELETE FROM users WHERE id = ?");
        $stmt->bind_param("i", $user_id);
        $success = $stmt->execute();
        $message = $success ? "用户 **{$username}** 已被永久删除。" : "删除用户操作失败。";
        break;

    default:
        output_result(false, '未知的操作类型。');
        break;
}

$conn->close();
output_result($success, $message);
?>
