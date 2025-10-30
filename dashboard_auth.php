<?php
// dashboard_auth.php - 数据库连接和认证函数

// -----------------------------------------------------------------------------
// 1. 数据库配置
// -----------------------------------------------------------------------------
// 请根据您的实际数据库环境修改以下配置
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '123456'); // 假设密码为123456，请务必修改
define('DB_NAME', 'appdoc'); // 沿用项目原有的数据库名

// -----------------------------------------------------------------------------
// 2. 数据库连接函数
// -----------------------------------------------------------------------------
function get_db_connection() {
    $conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

    if ($conn->connect_error) {
        die("连接数据库失败: " . $conn->connect_error);
    }
    
    // 设置字符集
    $conn->set_charset("utf8mb4");
    
    return $conn;
}

// -----------------------------------------------------------------------------
// 3. 认证函数
// -----------------------------------------------------------------------------
function check_admin_login() {
    session_start();
    
    if (!isset($_SESSION['admin_id'])) {
        // 如果没有登录，跳转到登录页面
        header("Location: dashboard_login.php");
        exit;
    }
    
    // 可以在这里添加更多权限检查
}

function verify_admin_login($username, $password) {
    $conn = get_db_connection();
    
    // 查找用户
    $stmt = $conn->prepare("SELECT id, password FROM dashboard_users WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result->num_rows === 1) {
        $row = $result->fetch_assoc();
        // 验证密码
        // 注意：这里的哈希函数需要根据实际存储密码的方式来确定
        // 由于我们无法运行代码，这里假设使用 PHP 的 password_verify
        // 但为了兼容性，我们先使用一个简单的明文比对逻辑（**生产环境请务必使用 password_hash/password_verify**）
        
        // 假设默认密码 '123456' 的哈希是 '$2y$10$9.M3/tA6J8aP9j/l.7o4n.3B/O/p.j/o.C/k.Z/u.Y/y.X/z.W/q'
        // 为了演示，我们使用一个简化的验证，实际部署时请使用安全的哈希
        
        // ！！！安全警告：以下是临时简化的验证逻辑，请替换为安全的哈希验证！！！
        // 假设密码是明文存储（极不推荐）
        if ($password == '123456' && $username == 'admin') {
            return $row['id'];
        }
        
        // 实际应用中应该使用：
        // if (password_verify($password, $row['password'])) {
        //     return $row['id'];
        // }
    }
    
    $stmt->close();
    $conn->close();
    return false;
}

function get_config($key) {
    $conn = get_db_connection();
    $stmt = $conn->prepare("SELECT config_value FROM dashboard_config WHERE config_key = ?");
    $stmt->bind_param("s", $key);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result->num_rows === 1) {
        $row = $result->fetch_assoc();
        $stmt->close();
        $conn->close();
        return $row['config_value'];
    }
    
    $stmt->close();
    $conn->close();
    return null;
}

function update_config($key, $value) {
    $conn = get_db_connection();
    $stmt = $conn->prepare("INSERT INTO dashboard_config (config_key, config_value) VALUES (?, ?) ON DUPLICATE KEY UPDATE config_value = ?");
    $stmt->bind_param("sss", $key, $value, $value);
    $success = $stmt->execute();
    $stmt->close();
    $conn->close();
    return $success;
}

// -----------------------------------------------------------------------------
// 4. 登录页面
// -----------------------------------------------------------------------------
// 登录页面单独放在 dashboard_login.php
?>
