<?php
// admin_user_action.php - 后台用户操作逻辑

// -----------------------------------------------------------------------------
// 1. 权限验证
// -----------------------------------------------------------------------------
session_start();
$admin = isset($_GET['admin']) ? $_GET['admin'] : (isset($_SESSION['admin']) ? $_SESSION['admin'] : '');
$pass = isset($_GET['pass']) ? $_GET['pass'] : (isset($_SESSION['pass']) ? $_SESSION['pass'] : '');
$user = isset($_GET['user']) ? $_GET['user'] : '';
$action = isset($_GET['action']) ? $_GET['action'] : '';

function output_message($type, $message) {
    echo "<!DOCTYPE html><html lang='zh-CN'><head><meta charset='UTF-8'><title>操作结果</title><style>body { font-family: Arial, sans-serif; margin: 20px; background-color: #f4f4f4; } .container { background-color: #fff; padding: 20px; border-radius: 8px; box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); } h1 { color: " . ($type == 'success' ? '#5cb85c' : '#d9534f') . "; } .message { margin-bottom: 20px; } .back-link { display: block; margin-top: 20px; }</style></head><body><div class='container'><h1>" . ($type == 'success' ? '操作成功' : '操作失败') . "</h1><div class='message'>" . htmlspecialchars($message) . "</div><a href='admin_user_manage.php?admin=" . htmlspecialchars($_GET['admin']) . "&pass=" . htmlspecialchars($_GET['pass']) . "' class='back-link'>返回用户管理页</a></div></body></html>";
    exit;
}

if ($admin == "" || $pass == "" || $user == "" || $action == "") {
    output_message('error', '参数不完整，无法执行操作。');
}

$admin_path = "userss/" . $admin;
$pass_file = $admin_path . "/admin/passprotect556";
$user_dir = $admin_path . "/userss/" . $user;

if (!file_exists($admin_path) || !file_exists($pass_file)) {
    output_message('error', '管理员账号或密码文件不存在。');
}

$ipass = file_get_contents($pass_file);

if ($pass !== trim($ipass)) {
    output_message('error', '后台密码错误。');
}

if (!is_dir($user_dir)) {
    output_message('error', '目标用户账号不存在。');
}

// -----------------------------------------------------------------------------
// 2. 操作逻辑
// -----------------------------------------------------------------------------

switch ($action) {
    case 'seal':
        $duration = isset($_GET['duration']) ? (int)$_GET['duration'] : 0;
        if ($duration <= 0) {
            output_message('error', '封禁时长必须大于0秒。');
        }
        
        $seal_file = $user_dir . "/seal";
        $seal_time = time() + $duration;
        
        if (file_put_contents($seal_file, $seal_time) !== false) {
            output_message('success', "用户 **{$user}** 已成功封禁，解封时间：" . date("Y-m-d H:i:s", $seal_time));
        } else {
            output_message('error', '写入封禁文件失败，请检查目录权限。');
        }
        break;

    case 'unseal':
        $seal_file = $user_dir . "/seal";
        
        // 将封禁时间设置为0或一个过去的时间，这里设置为0
        if (file_put_contents($seal_file, '0') !== false) {
            output_message('success', "用户 **{$user}** 已成功解封。");
        } else {
            output_message('error', '写入解封文件失败，请检查目录权限。');
        }
        break;
        
    case 'add_money':
        $amount = isset($_GET['amount']) ? (int)$_GET['amount'] : 0;
        if ($amount <= 0) {
            output_message('error', '增加金币数量必须大于0。');
        }
        
        // 调用原有的 moneyadd-admin.php 接口逻辑
        // 注意：原项目结构中，moneyadd-admin.php 依赖于一个固定的密码（如 zxcv25）
        // 并且其逻辑是直接操作文件。为了兼容，我们直接在这里实现文件操作。
        
        $money_file = $user_dir . "/money";
        $current_money = file_exists($money_file) ? (int)trim(file_get_contents($money_file)) : 0;
        $new_money = $current_money + $amount;
        
        if (file_put_contents($money_file, $new_money) !== false) {
            output_message('success', "已成功为用户 **{$user}** 增加 **{$amount}** 金币。当前金币：{$new_money}");
        } else {
            output_message('error', '写入金币文件失败，请检查目录权限。');
        }
        break;

    default:
        output_message('error', '未知的操作类型。');
        break;
}

?>
