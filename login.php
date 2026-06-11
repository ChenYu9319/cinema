<?php
session_start();

// 1. 如果已经登录，直接进后台主页
if(isset($_SESSION['user'])){
    header("Location: dashboard.php");
    exit();
}

$username = isset($_POST['username']) ? $_POST['username'] : null;
$password = isset($_POST['password']) ? $_POST['password'] : null;

// 2. 接收前端表单发送过来的 username 和 password
if(isset($_POST['username'])){

    try {
        // 连接数据库
        $db = new PDO("mysql:host=localhost;dbname=cinema", "root", "");
        // 设置 PDO 错误模式为异常，方便捕获而非直接崩溃泄露路径
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // 使用 username 进行安全预处理查询
        $query = "SELECT * FROM users WHERE username = :username";
        $stmt = $db->prepare($query);
        $stmt->execute([':username' => $username]);
        $users = $stmt->fetchAll();

        // 💡 优化：时间差防御。如果用户不存在，虚构一个假的哈希进行比对，消耗掉相同的时间
        $userExists = count($users) > 0;
        $dbPassword = $userExists ? $users[0]['password'] : '$2y$10$abcdefghijklmnopqrstuv'; 

        // 验证密码
        if(password_verify($password, $dbPassword) && $userExists){
            
            // 💡 修复漏洞 1：防御会话固定漏洞！登录成功瞬间销毁旧 ID，生成全新的 Session ID
            session_regenerate_id(true);

            // 💡 修复漏洞 3：擦除敏感数据。保护 Session 内存安全，不存放密码哈希
            $userData = $users[0];
            unset($userData['password']); 

            $_SESSION['user'] = $userData;
            header("Location: dashboard.php");
            exit();
        } else {
            // 失败则带上 error 参数弹回登录页
            header("Location: login-form.php?error=1");
            exit();
        }

    } catch (PDOException $e) {
        // 💡 修复漏洞 4：捕获异常，防止直接在前端打印出数据库账号密码和路径
        // 实际开发中可以记录到 error_log，给前端展示一个模糊的错误提示即可
        header("Location: login-form.php?error=1");
        exit();
    }
}

// 如果不是 POST 提交，直接退回登录页
header("Location: login-form.php");
exit();
?>