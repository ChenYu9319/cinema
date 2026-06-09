<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CineManage Pro - Edit Credentials</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body class="bg-gray-100 font-sans text-gray-800 flex h-screen overflow-hidden">

    <!-- 侧边栏导航（保持全局一致，Users 高亮） -->
    <aside class="w-64 bg-indigo-950 text-slate-300 flex flex-col justify-between hidden md:flex shrink-0">
        <div>
            <div class="p-5 flex items-center space-x-3 bg-slate-950 border-b border-indigo-900">
                <i class="fa-solid fa-film text-2xl text-amber-400"></i>
                <span class="text-xl font-bold tracking-wider text-white">CineManage</span>
            </div>
            <nav class="p-4 space-y-1.5">
                <a href="dashboard.php" class="flex items-center space-x-3 hover:bg-indigo-900/50 hover:text-white px-4 py-2.5 rounded-lg font-medium transition">
                    <i class="fa-solid fa-chart-pie w-5 text-center text-slate-400"></i>
                    <span>Dashboard</span>
                </a>
                <a href="movies.php" class="flex items-center space-x-3 hover:bg-indigo-900/50 hover:text-white px-4 py-2.5 rounded-lg font-medium transition">
                    <i class="fa-solid fa-video w-5 text-center text-slate-400"></i>
                    <span>Movies</span>
                </a>
                <a href="halls.php" class="flex items-center space-x-3 hover:bg-indigo-900/50 hover:text-white px-4 py-2.5 rounded-lg font-medium transition">
                    <i class="fa-solid fa-door-open w-5 text-center text-slate-400"></i>
                    <span>Halls</span>
                </a>
                <a href="schedules.php" class="flex items-center space-x-3 hover:bg-indigo-900/50 hover:text-white px-4 py-2.5 rounded-lg font-medium transition">
                    <i class="fa-solid fa-calendar-days w-5 text-center text-slate-400"></i>
                    <span>Schedules</span>
                </a>
                <a href="bookings.php" class="flex items-center space-x-3 hover:bg-indigo-900/50 hover:text-white px-4 py-2.5 rounded-lg font-medium transition">
                    <i class="fa-solid fa-ticket w-5 text-center text-slate-400"></i>
                    <span>Bookings</span>
                </a>
                <a href="users.php" class="flex items-center space-x-3 bg-indigo-900 text-white px-4 py-2.5 rounded-lg font-medium transition">
                    <i class="fa-solid fa-users w-5 text-center text-amber-400"></i>
                    <span>Users</span>
                </a>
            </nav>
        </div>
        <div class="p-4 px-5 border-t border-indigo-900 bg-slate-950/40 flex items-center justify-between shrink-0">
            <div class="min-w-0 flex-1 pr-3">
                <p class="text-sm font-semibold text-white truncate">Alan Admin</p>
                <p class="text-xs text-slate-400 truncate mt-0.5">admin@cinema.com</p>
            </div>
            <a href="index.php" class="shrink-0 w-8 h-8 flex items-center justify-center text-slate-400 hover:text-rose-500 hover:bg-rose-500/10 rounded-lg transition" title="Log Out">
                <i class="fa-solid fa-arrow-right-from-bracket"></i>
            </a>
        </div>
    </aside>

    <!-- 主内容区 -->
    <div class="flex-1 flex flex-col overflow-y-auto">
        
        <!-- 头部顶栏 -->
        <header class="bg-white border-b border-gray-200 px-6 py-4 flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4 shrink-0">
            <div>
                <div class="flex items-center space-x-2 text-xs text-gray-400 font-medium mb-1">
                    <span>System</span>
                    <span>/</span>
                    <a href="users.php" class="hover:text-indigo-600 transition">Users</a>
                    <span>/</span>
                    <span class="text-gray-600">Edit Credentials</span>
                </div>
                <h1 class="text-xl font-bold text-gray-900">Change User Password</h1>
                <p class="text-xs text-gray-500 mt-0.5">Update account passwords and access permissions safely.</p>
            </div>
            
            <!-- 返回列表按钮 -->
            <a href="users.php" class="border border-gray-200 bg-white hover:bg-gray-50 text-gray-700 text-sm font-semibold px-4 py-2.5 rounded-xl shadow-xs transition text-center shrink-0 flex items-center space-x-2">
                <i class="fa-solid fa-arrow-left text-xs"></i>
                <span>Back to List</span>
            </a>
        </header>

        <!-- 表单主体区 -->
        <main class="p-6 max-w-3xl w-full mx-auto">
            <div class="bg-white rounded-xl border border-gray-100 shadow-xs overflow-hidden">
                <div class="p-6 sm:p-8 border-b border-gray-50 bg-gray-50/50">
                    <h2 class="text-sm font-bold text-gray-800 uppercase tracking-wider flex items-center space-x-2">
                        <i class="fa-solid fa-shield-halved text-indigo-600"></i>
                        <span>Security Credentials Info</span>
                    </h2>
                </div>

                <form action="users.php" method="POST" class="p-6 sm:p-8 space-y-5">
                    
                    <!-- 账号只读展示（明确当前修改的是谁） -->
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                        <div>
                            <label class="block text-xs font-bold uppercase tracking-wider text-gray-400 mb-1.5">Target Username</label>
                            <input type="text" value="user_bob" readonly 
                                class="w-full px-4 py-2.5 bg-gray-100 border border-gray-200 rounded-xl text-sm text-gray-500 cursor-not-allowed font-medium">
                        </div>
                        <div>
                            <label class="block text-xs font-bold uppercase tracking-wider text-gray-400 mb-1.5">Target Email</label>
                            <input type="text" value="bob@example.com" readonly 
                                class="w-full px-4 py-2.5 bg-gray-100 border border-gray-200 rounded-xl text-sm text-gray-500 cursor-not-allowed font-medium">
                        </div>
                    </div>

                    <hr class="border-gray-100 my-2">

                    <!-- 新密码输入框 -->
                    <div>
                        <label for="new_password" class="block text-xs font-bold uppercase tracking-wider text-gray-400 mb-1.5">Set New Password</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-gray-400">
                                <i class="fa-solid fa-lock text-sm"></i>
                            </div>
                            <input type="password" id="new_password" name="new_password" required placeholder="Enter new strong password"
                                class="w-full pl-10 pr-4 py-2.5 bg-gray-50 border border-gray-200 rounded-xl text-sm text-gray-900 placeholder-gray-400 focus:outline-hidden focus:border-indigo-600 focus:bg-white focus:ring-4 focus:ring-indigo-100/50 transition">
                        </div>
                        <p class="text-[11px] text-gray-400 mt-1.5">Recommended: Use at least 8 characters with a mix of letters and numbers.</p>
                    </div>

                    <!-- 确认新密码 -->
                    <div>
                        <label for="confirm_password" class="block text-xs font-bold uppercase tracking-wider text-gray-400 mb-1.5">Confirm New Password</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-gray-400">
                                <i class="fa-solid fa-circle-check text-sm"></i>
                            </div>
                            <input type="password" id="confirm_password" name="confirm_password" required placeholder="Repeat the new password"
                                class="w-full pl-10 pr-4 py-2.5 bg-gray-50 border border-gray-200 rounded-xl text-sm text-gray-900 placeholder-gray-400 focus:outline-hidden focus:border-indigo-600 focus:bg-white focus:ring-4 focus:ring-indigo-100/50 transition">
                        </div>
                    </div>

                    <!-- 底端动作按钮 -->
                    <div class="flex items-center justify-end space-x-3 pt-4 border-t border-gray-100 mt-8">
                        <a href="users.php" class="px-4 py-2.5 border border-gray-200 hover:bg-gray-50 text-gray-600 text-sm font-semibold rounded-xl transition text-center">
                            Cancel
                        </a>
                        <button type="submit" class="px-5 py-2.5 bg-indigo-600 hover:bg-indigo-700 text-white text-sm font-semibold rounded-xl shadow-xs hover:shadow-md transition cursor-pointer flex items-center space-x-2">
                            <i class="fa-solid fa-save text-xs"></i>
                            <span>Save New Password</span>
                        </button>
                    </div>
                </form>
            </div>
        </main>
    </div>

</body>
</html>