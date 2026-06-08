<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CineManage Pro - Reset Password</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body class="bg-gradient-to-br from-indigo-950 via-slate-900 to-indigo-900 min-h-screen flex items-center justify-center p-4 font-sans antialiased">

    <!-- 密码重置卡片 -->
    <div class="w-full max-w-md bg-white rounded-2xl shadow-2xl overflow-hidden border border-gray-100">
        
        <!-- 头部 Branding -->
        <div class="bg-slate-950 p-6 text-center border-b border-indigo-950/40 flex flex-col items-center">
            <div class="w-12 h-12 bg-amber-500/10 rounded-xl flex items-center justify-center border border-amber-500/20 mb-3">
                <i class="fa-solid fa-key text-xl text-amber-400"></i>
            </div>
            <h1 class="text-xl font-bold text-white tracking-wider">Account Recovery</h1>
            <p class="text-xs text-slate-400 mt-1">Reset your security credentials to regain access</p>
        </div>

        <!-- 表单区 -->
        <form action="login.php" method="POST" class="p-6 sm:p-8 space-y-4">
            
            <!-- 提示警告框 -->
            <div class="p-3.5 bg-amber-50 border border-amber-200 text-amber-800 rounded-xl flex items-start space-x-2.5 text-xs leading-relaxed">
                <i class="fa-solid fa-circle-info text-amber-500 text-sm mt-0.5 shrink-0"></i>
                <div>
                    Please provide your registered identification email and enter your new desired password below.
                </div>
            </div>

            <!-- 身份验证：邮箱或用户名 -->
            <div>
                <label for="identity" class="block text-xs font-bold uppercase tracking-wider text-gray-400 mb-1.5">Your Registered Email</label>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-gray-400">
                        <i class="fa-regular fa-envelope text-sm"></i>
                    </div>
                    <input type="email" id="identity" name="identity" required placeholder="yourname@example.com"
                        class="w-full pl-10 pr-4 py-2.5 bg-gray-50 border border-gray-200 rounded-xl text-sm text-gray-900 placeholder-gray-400 focus:outline-hidden focus:border-indigo-600 focus:bg-white focus:ring-4 focus:ring-indigo-100/50 transition">
                </div>
            </div>

            <!-- 新密码 -->
            <div>
                <label for="new_password" class="block text-xs font-bold uppercase tracking-wider text-gray-400 mb-1.5">New Password</label>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-gray-400">
                        <i class="fa-solid fa-lock text-sm"></i>
                    </div>
                    <input type="password" id="new_password" name="new_password" required placeholder="••••••••"
                        class="w-full pl-10 pr-4 py-2.5 bg-gray-50 border border-gray-200 rounded-xl text-sm text-gray-900 placeholder-gray-400 focus:outline-hidden focus:border-indigo-600 focus:bg-white focus:ring-4 focus:ring-indigo-100/50 transition">
                </div>
            </div>

            <!-- 确认新密码 -->
            <div>
                <label for="confirm_password" class="block text-xs font-bold uppercase tracking-wider text-gray-400 mb-1.5">Confirm New Password</label>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-gray-400">
                        <i class="fa-solid fa-shield text-sm"></i>
                    </div>
                    <input type="password" id="confirm_password" name="confirm_password" required placeholder="••••••••"
                        class="w-full pl-10 pr-4 py-2.5 bg-gray-50 border border-gray-200 rounded-xl text-sm text-gray-900 placeholder-gray-400 focus:outline-hidden focus:border-indigo-600 focus:bg-white focus:ring-4 focus:ring-indigo-100/50 transition">
                </div>
            </div>

            <!-- 提交重置 -->
            <button type="submit" class="w-full bg-indigo-600 hover:bg-indigo-700 text-white font-semibold text-sm py-2.5 rounded-xl shadow-xs hover:shadow-md flex items-center justify-center space-x-2 transition cursor-pointer pt-3">
                <span>Update Security Password</span>
                <i class="fa-solid fa-check text-xs"></i>
            </button>

            <!-- 返回登录 -->
            <div class="text-center pt-4 border-t border-gray-100 mt-6">
                <a href="login.php" class="text-xs font-bold text-indigo-600 hover:text-indigo-700 inline-flex items-center space-x-1.5 transition">
                    <i class="fa-solid fa-arrow-left text-[10px]"></i>
                    <span>Back to Sign In</span>
                </a>
            </div>
        </form>
    </div>

</body>
</html>