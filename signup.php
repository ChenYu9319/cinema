<?php
session_start();

// 1. 如果已经登录，没必要注册，直接去后台
if(isset($_SESSION['user'])){
    header("Location: dashboard.php");
    exit();
}

// 💡 修复 Warning 核心：在最外层初始化变量，确保无论是刚进页面还是提交表单，变量都一定存在
$error = '';
$success = false;

// 2. 接收注册表单
if(isset($_POST['username']) && isset($_POST['password'])){
    $username = $_POST['username'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'] ?? '';
    $email = $_POST['email'] ?? ''; // 拿到邮箱（以备后续你要扩展数据库字段）

    // 💡 安全升级：后端二次验证密码是否一致，防止绕过前端 JS
    if($password !== $confirm_password) {
        $error = "Passwords do not match!";
    } else {
        try {
            $db = new PDO("mysql:host=localhost;dbname=cinema", "root", "");
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            // 检查用户名是否已经被占用
            $checkQuery = "SELECT * FROM users WHERE username = :username";
            $stmt = $db->prepare($checkQuery);
            $stmt->execute([':username' => $username]);
            
            if($stmt->rowCount() > 0){
                // 💡 修复：不要用 header 乱跳文件了，直接给 $error 赋值，让本页 HTML 渲染出来
                $error = "Username already exists!";
            } else {
                // 将明文密码转化为哈希密文
                $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

                // 💡 注意：如果你以后在数据库增加 email 列，这里可以改为: INSERT INTO users (username, password, email)...
                $insertQuery = "INSERT INTO users (username,email , password) VALUES (:username, :email, :password)";
                $insertStmt = $db->prepare($insertQuery);
                $insertStmt->execute([
                    ':username' => $username,
                    ':email' => $email
                    ':password' => $hashedPassword
                ]);

                // 💡 顺应注册流：注册成功直接安全跳到登录页，并在 URL 后面带上成功标记
                header("Location: login-form.php?success=1");
                exit();
            }

        } catch (PDOException $e) {
            $error = "Database error: " . $e->getMessage();
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CineManage Cinema - Sign Up</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body class="bg-gradient-to-br from-indigo-950 via-slate-900 to-indigo-900 min-h-screen flex flex-col items-center justify-center p-4 font-sans antialiased">

    <div class="mb-4">
        <a href="index.php" class="text-xs font-medium text-slate-400 hover:text-white transition flex items-center space-x-1.5">
            <i class="fa-solid fa-arrow-left text-[10px]"></i>
            <span>Back to Home</span>
        </a>
    </div>

    <div class="w-full max-w-md bg-white rounded-2xl border border-white/10 shadow-2xl overflow-hidden backdrop-blur-md">
        <div class="bg-slate-950 p-6 text-center border-b border-indigo-950/50 flex flex-col items-center">
            <div class="w-12 h-12 bg-indigo-900/40 rounded-xl flex items-center justify-center border border-indigo-500/20 mb-3">
                <i class="fa-solid fa-film text-2xl text-amber-400"></i>
            </div>
            <h1 class="text-xl font-bold text-white tracking-wider">Create Account</h1>
            <p class="text-xs text-slate-400 mt-1">Join us today to unlock online booking</p>
        </div>

        <form action="" method="POST" class="p-6 sm:p-8 space-y-4">
            
            <!-- 动态提示错误 -->
            <?php if(!empty($error)): ?>
                <div class="bg-rose-50 text-rose-600 p-3 rounded-xl text-xs text-center font-bold border border-rose-100">
                    <i class="fa-solid fa-circle-exclamation mr-1"></i> <?php echo $error; ?>
                </div>
            <?php endif; ?>

            <!-- 💡 提示：因为成功后直接去了 login-form.php，这个页面不再需要放隐藏的 success 提示框了 -->

            <!-- Username 输入框 -->
            <div>
                <label for="username" class="block text-xs font-bold uppercase tracking-wider text-gray-500 mb-1.5">Username</label>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-gray-400">
                        <i class="fa-regular fa-user text-sm"></i>
                    </div>
                    <input type="text" id="username" name="username" required placeholder="johndoe123" class="w-full pl-10 pr-4 py-2.5 bg-gray-50 border border-gray-200 rounded-lg text-sm text-gray-900 focus:outline-hidden focus:border-indigo-600 focus:bg-white focus:ring-4 focus:ring-indigo-100 transition">
                </div>
            </div>

            <!-- Email Address -->
            <div>
                <label for="email" class="block text-xs font-bold uppercase tracking-wider text-gray-500 mb-1.5">Email Address</label>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-gray-400">
                        <i class="fa-regular fa-envelope text-sm"></i>
                    </div>
                    <input type="email" id="email" name="email" required placeholder="moviegoer@example.com" class="w-full pl-10 pr-4 py-2.5 bg-gray-50 border border-gray-200 rounded-lg text-sm text-gray-900 focus:outline-hidden focus:border-indigo-600 focus:bg-white focus:ring-4 focus:ring-indigo-100 transition">
                </div>
            </div>

            <!-- Password -->
            <div>
                <label for="password" class="block text-xs font-bold uppercase tracking-wider text-gray-500 mb-1.5">Password</label>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-gray-400">
                        <i class="fa-solid fa-lock text-sm"></i>
                    </div>
                    <input type="password" id="password" name="password" required placeholder="••••••••" class="w-full pl-10 pr-4 py-2.5 bg-gray-50 border border-gray-200 rounded-lg text-sm text-gray-900 focus:outline-hidden focus:border-indigo-600 focus:bg-white focus:ring-4 focus:ring-indigo-100 transition">
                </div>
            </div>

            <!-- Confirm Password -->
            <div>
                <label for="confirm_password" class="block text-xs font-bold uppercase tracking-wider text-gray-500 mb-1.5">Confirm Password</label>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-gray-400">
                        <i class="fa-solid fa-lock text-sm"></i>
                    </div>
                    <input type="password" id="confirm_password" name="confirm_password" required placeholder="••••••••" class="w-full pl-10 pr-4 py-2.5 bg-gray-50 border border-gray-200 rounded-lg text-sm text-gray-900 focus:outline-hidden focus:border-indigo-600 focus:bg-white focus:ring-4 focus:ring-indigo-100 transition">
                </div>
                <p id="password-error" class="text-[10px] text-red-500 mt-1 hidden font-semibold">Passwords do not match!</p>
            </div>

            <button type="submit" class="w-full bg-indigo-600 hover:bg-indigo-700 text-white font-medium text-sm py-2.5 rounded-lg shadow-md hover:shadow-lg flex items-center justify-center space-x-2 transition cursor-pointer mt-2">
                <span>Create Account</span>
                <i class="fa-solid fa-user-plus text-xs"></i>
            </button>

            <div class="text-center pt-2 border-t border-gray-100 mt-6">
                <p class="text-xs text-gray-500">
                    Already have a member profile? 
                    <a href="login-form.php" class="font-bold text-indigo-600 hover:text-indigo-700 transition ml-1">Log In instead</a>
                </p>
            </div>
        </form>
    </div>

    <script>
        const form = document.querySelector('form');
        const password = document.getElementById('password');
        const confirmPassword = document.getElementById('confirm_password');
        const errorMsg = document.getElementById('password-error');

        form.addEventListener('submit', function(e) {
            if (password.value !== confirmPassword.value) {
                e.preventDefault(); // 阻止表单提交
                errorMsg.classList.remove('hidden');
                confirmPassword.classList.add('border-red-500', 'ring-1', 'ring-red-200');
            } else {
                errorMsg.classList.add('hidden');
                confirmPassword.classList.remove('border-red-500', 'ring-1', 'ring-red-200');
            }
        });

        confirmPassword.addEventListener('input', () => {
            errorMsg.classList.add('hidden');
            confirmPassword.classList.remove('border-red-500', 'ring-1', 'ring-red-200');
        });
    </script>
</body>
</html>