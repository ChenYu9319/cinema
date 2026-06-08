<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CineManage Pro - Users</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body class="bg-gray-100 font-sans text-gray-800 flex h-screen overflow-hidden">

    <!-- 侧边栏导航 -->
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
        
        <!-- 顶栏头部（已加入面包屑与规范化链接） -->
        <header class="bg-white border-b border-gray-200 px-6 py-4 flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4 shrink-0">
            <div>
                <div class="flex items-center space-x-2 text-xs text-gray-400 font-medium mb-1">
                    <span>System</span>
                    <span>/</span>
                    <span class="text-gray-600">Users</span>
                </div>
                <h1 class="text-xl font-bold text-gray-900">User Accounts</h1>
                <p class="text-xs text-gray-500 mt-0.5">Manage user profiles and system access levels.</p>
            </div>
            <!-- 已修复：转换为指向添加页面的链接 -->
            <a href="user-add.php" class="bg-indigo-600 hover:bg-indigo-700 text-white text-sm font-semibold px-4 py-2.5 rounded-xl shadow-xs hover:shadow-md flex items-center space-x-2 transition text-center shrink-0">
                <i class="fa-solid fa-user-plus text-xs"></i>
                <span>Add New User</span>
            </a>
        </header>

        <!-- 表格管理区 -->
        <main class="p-6 max-w-7xl w-full mx-auto">
            <div class="bg-white rounded-xl border border-gray-100 shadow-xs overflow-hidden">
                <div class="overflow-x-auto">
                    <table class="w-full text-left border-collapse">
                        <thead>
                            <tr class="bg-gray-50/70 text-gray-500 text-xs font-bold uppercase tracking-wider border-b border-gray-100">
                                <th class="py-3.5 px-5">User ID</th>
                                <th class="py-3.5 px-5">Username</th>
                                <th class="py-3.5 px-5">Email Address</th>
                                <th class="py-3.5 px-5">Role Permission</th>
                                <th class="py-3.5 px-5 text-right">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="text-sm divide-y divide-gray-100">
                            <!-- 用户行 #01 -->
                            <tr class="hover:bg-slate-50/80 transition">
                                <td class="py-4 px-5 font-mono text-xs text-gray-400">#01</td>
                                <td class="py-4 px-5 font-semibold text-gray-900">admin_alan</td>
                                <td class="py-4 px-5 text-gray-600">admin@cinema.com</td>
                                <td class="py-4 px-5">
                                    <span class="text-[10px] font-bold uppercase px-2 py-0.5 rounded-md bg-purple-50 text-purple-700 border border-purple-200/50 tracking-wider">admin</span>
                                </td>
                                <td class="py-4 px-5 text-right space-x-3">
                                    <!-- 找到 users.php 中的 Edit 按钮，修改 href -->
                                    <a href="user-edit-cdw.php" class="text-indigo-600 hover:text-indigo-900 font-semibold text-xs inline-flex items-center space-x-1 transition">
                                        <i class="fa-solid fa-pen text-[10px]"></i>
                                        <span>Edit</span>
                                    </a>
                                    <button class="text-rose-600 hover:text-rose-900 font-semibold text-xs inline-flex items-center space-x-1 transition cursor-pointer">
                                        <i class="fa-solid fa-trash text-[10px]"></i>
                                        <span>Delete</span>
                                    </button>
                                </td>
                            </tr>
                            <!-- 用户行 #02 -->
                            <tr class="hover:bg-slate-50/80 transition">
                                <td class="py-4 px-5 font-mono text-xs text-gray-400">#02</td>
                                <td class="py-4 px-5 font-semibold text-gray-900">user_bob</td>
                                <td class="py-4 px-5 text-gray-600">bob@example.com</td>
                                <td class="py-4 px-5">
                                    <span class="text-[10px] font-bold uppercase px-2 py-0.5 rounded-md bg-blue-50 text-blue-700 border border-blue-200/50 tracking-wider">user</span>
                                </td>
                                <td class="py-4 px-5 text-right space-x-3">
                                    <!-- 找到 users.php 中的 Edit 按钮，修改 href -->
                                    <a href="user-edit-cdw.php" class="text-indigo-600 hover:text-indigo-900 font-semibold text-xs inline-flex items-center space-x-1 transition">
                                        <i class="fa-solid fa-pen text-[10px]"></i>
                                        <span>Edit</span>
                                    </a>
                                    <button class="text-rose-600 hover:text-rose-900 font-semibold text-xs inline-flex items-center space-x-1 transition cursor-pointer">
                                        <i class="fa-solid fa-trash text-[10px]"></i>
                                        <span>Delete</span>
                                    </button>
                                </td>
                            </tr>
                            <!-- 用户行 #03 -->
                            <tr class="hover:bg-slate-50/80 transition">
                                <td class="py-4 px-5 font-mono text-xs text-gray-400">#03</td>
                                <td class="py-4 px-5 font-semibold text-gray-900">user_charlie</td>
                                <td class="py-4 px-5 text-gray-600">charlie@example.com</td>
                                <td class="py-4 px-5">
                                    <span class="text-[10px] font-bold uppercase px-2 py-0.5 rounded-md bg-blue-50 text-blue-700 border border-blue-200/50 tracking-wider">user</span>
                                </td>
                                <td class="py-4 px-5 text-right space-x-3">
                                    <a href="user-edit.php" class="text-indigo-600 hover:text-indigo-900 font-semibold text-xs inline-flex items-center space-x-1 transition">
                                        <i class="fa-solid fa-pen text-[10px]"></i>
                                        <span>Edit</span>
                                    </a>
                                    <button class="text-rose-600 hover:text-rose-900 font-semibold text-xs inline-flex items-center space-x-1 transition cursor-pointer">
                                        <i class="fa-solid fa-trash text-[10px]"></i>
                                        <span>Delete</span>
                                    </button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </main>
    </div>
</body>
</html>