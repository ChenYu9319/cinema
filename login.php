<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CineManage Pro - Login</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body class="bg-gradient-to-br from-indigo-950 via-slate-900 to-indigo-900 min-h-screen flex items-center justify-center p-4 font-sans antialiased">

    <div class="w-full max-w-md bg-white rounded-2xl border border-white/10 shadow-2xl overflow-hidden backdrop-blur-md">
        <!-- 头部 Branding -->
        <div class="bg-slate-950 p-6 text-center border-b border-indigo-950/50 flex flex-col items-center">
            <div class="w-12 h-12 bg-indigo-900/40 rounded-xl flex items-center justify-center border border-indigo-500/20 mb-3">
                <i class="fa-solid fa-film text-2xl text-amber-400"></i>
            </div>
            <h1 class="text-xl font-bold text-white tracking-wider">CineManage Pro</h1>
            <p class="text-xs text-slate-400 mt-1">Sign in to control your cinema management portal</p>
        </div>

        <!-- 登录表单 -->
        <form action="" method="POST" class="p-6 sm:p-8 space-y-4">
            
            <div>
                <label for="username" class="block text-xs font-bold uppercase tracking-wider text-gray-500 mb-1.5">Username or Email</label>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-gray-400">
                        <i class="fa-regular fa-user text-sm"></i>
                    </div>
                    <input type="text" id="username" name="username" required placeholder="admin@cinema.com"
                        class="w-full pl-10 pr-4 py-2.5 bg-gray-50 border border-gray-200 rounded-lg text-sm text-gray-900 placeholder-gray-400 focus:outline-hidden focus:border-indigo-600 focus:bg-white focus:ring-4 focus:ring-indigo-100 transition">
                </div>
            </div>

            <div>
                <div class="flex justify-between items-center mb-1.5">
                    <label for="password" class="block text-xs font-bold uppercase tracking-wider text-gray-500">Password</label>
                </div>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-gray-400">
                        <i class="fa-solid fa-lock text-sm"></i>
                    </div>
                    <input type="password" id="password" name="password" required placeholder="••••••••"
                        class="w-full pl-10 pr-4 py-2.5 bg-gray-50 border border-gray-200 rounded-lg text-sm text-gray-900 placeholder-gray-400 focus:outline-hidden focus:border-indigo-600 focus:bg-white focus:ring-4 focus:ring-indigo-100 transition">
                </div>
            </div>

            <button type="submit" class="w-full bg-indigo-600 hover:bg-indigo-700 text-white font-medium text-sm py-2.5 rounded-lg shadow-md hover:shadow-lg flex items-center justify-center space-x-2 transition cursor-pointer mt-2">
                <span>Sign In Account</span>
                <i class="fa-solid fa-arrow-right text-xs"></i>
            </button>

            <!-- 注册跳转 -->
            <div class="text-center pt-2 border-t border-gray-100 mt-6">
                <p class="text-xs text-gray-500">
                    Don't have an administrator account? 
                    <a href="signup.php" class="font-bold text-indigo-600 hover:text-indigo-700 transition ml-1">Sign Up here</a>
                </p>
            </div>
        </form>
    </div>

</body>
</html>