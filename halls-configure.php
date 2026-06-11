<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CineManage Pro - Configure Hall</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body class="bg-gray-100 font-sans text-gray-800 flex h-screen overflow-hidden">

    <!-- 移动端遮罩层 -->
    <div id="sidebarOverlay" class="fixed inset-0 bg-black/50 z-20 hidden md:hidden"></div>

    <!-- 侧边栏 -->
    <aside id="sidebar" class="w-64 bg-indigo-950 text-slate-300 flex flex-col justify-between absolute md:relative inset-y-0 left-0 z-30 transform -translate-x-full md:translate-x-0 transition-transform duration-300 shrink-0">
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
                <a href="halls.php" class="flex items-center space-x-3 bg-indigo-900 text-white px-4 py-2.5 rounded-lg font-medium transition">
                    <i class="fa-solid fa-door-open w-5 text-center text-amber-400"></i>
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
                <a href="users.php" class="flex items-center space-x-3 hover:bg-indigo-900/50 hover:text-white px-4 py-2.5 rounded-lg font-medium transition">
                    <i class="fa-solid fa-users w-5 text-center text-slate-400"></i>
                    <span>Users</span>
                </a>
            </nav>
        </div>
    </aside>

    <!-- 主体区域 -->
    <div class="flex-1 flex flex-col overflow-y-auto">
        <header class="bg-white border-b border-gray-200 px-6 py-4 flex items-center justify-between sticky top-0 z-10">
            <div class="flex items-center gap-4">
                <!-- 移动端菜单按钮 -->
                <button id="menuBtn" class="md:hidden text-gray-600 hover:text-indigo-600">
                    <i class="fa-solid fa-bars text-xl"></i>
                </button>
                <div>
                    <div class="text-xs text-gray-400 mb-1">Halls / Configuration</div>
                    <h1 class="text-xl font-bold text-gray-900">Configure Hall 2 (IMAX)</h1>
                </div>
            </div>
            <a href="halls.php" class="text-sm text-gray-500 hover:text-indigo-600 font-medium">Cancel</a>
        </header>

        <main class="p-6 max-w-5xl mx-auto w-full grid grid-cols-1 lg:grid-cols-3 gap-6">
            
            <!-- 表单区域 -->
            <div class="lg:col-span-2 space-y-6">
                <div class="bg-white p-6 rounded-xl border border-gray-100 shadow-xs">
                    <h3 class="text-sm font-bold text-gray-900 mb-5 flex items-center">
                        <i class="fa-solid fa-sliders mr-2 text-indigo-500"></i> Technical Settings
                    </h3>
                    
                    <!-- 绑定 ID: hallForm -->
                    <form id="hallForm" action="halls.php" method="POST" class="space-y-4">
                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <label class="block text-[10px] font-bold text-gray-400 uppercase mb-1">Hall Name</label>
                                <input type="text" name="hall_name" value="Hall 2" required class="w-full border border-gray-200 rounded-lg px-3 py-2 text-sm focus:ring-2 focus:ring-indigo-500 outline-hidden">
                            </div>
                            <div>
                                <label class="block text-[10px] font-bold text-gray-400 uppercase mb-1">Total Capacity</label>
                                <input type="number" name="capacity" value="120" required class="w-full border border-gray-200 rounded-lg px-3 py-2 text-sm focus:ring-2 focus:ring-indigo-500 outline-hidden">
                            </div>
                        </div>

                        <div>
                            <label class="block text-[10px] font-bold text-gray-400 uppercase mb-2">Capabilities</label>
                            <div class="flex flex-wrap gap-2">
                                <label class="flex items-center px-3 py-2 bg-indigo-50 border border-indigo-200 rounded-lg cursor-pointer">
                                    <input type="checkbox" name="capabilities[]" value="imax" checked class="accent-indigo-600 mr-2">
                                    <span class="text-xs font-semibold text-indigo-900">IMAX 4K</span>
                                </label>
                                <label class="flex items-center px-3 py-2 bg-gray-50 border border-gray-200 rounded-lg cursor-pointer">
                                    <input type="checkbox" name="capabilities[]" value="dolby" checked class="accent-indigo-600 mr-2">
                                    <span class="text-xs font-semibold text-gray-700">Dolby Atmos</span>
                                </label>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <!-- 右侧：状态面板 -->
            <div class="space-y-6">
                <div class="bg-indigo-900 p-6 rounded-xl text-white shadow-lg">
                    <h3 class="text-xs font-bold uppercase tracking-wider mb-4 opacity-70">Current Status</h3>
                    <div class="flex items-center space-x-2 mb-1">
                        <span class="w-2 h-2 rounded-full bg-emerald-400 animate-pulse"></span>
                        <span class="text-3xl font-black">Active</span>
                    </div>
                    <p class="text-xs text-indigo-200 mt-2">This hall is available for scheduling.</p>
                    
                    <!-- 通过 form="hallForm" 关联表单 -->
                    <button type="submit" form="hallForm" class="mt-6 w-full py-2.5 bg-indigo-600 hover:bg-indigo-500 rounded-lg text-sm font-semibold transition cursor-pointer">
                        Update Configuration
                    </button>
                    <button class="mt-3 w-full py-2.5 text-rose-300 hover:text-rose-200 text-sm font-medium transition cursor-pointer">
                        Deactivate Hall
                    </button>
                </div>
            </div>
        </main>
    </div>

    <script>
        // 移动端侧边栏切换逻辑
        const menuBtn = document.getElementById('menuBtn');
        const sidebar = document.getElementById('sidebar');
        const overlay = document.getElementById('sidebarOverlay');

        function toggleSidebar() {
            sidebar.classList.toggle('-translate-x-full');
            overlay.classList.toggle('hidden');
        }

        menuBtn.addEventListener('click', toggleSidebar);
        overlay.addEventListener('click', toggleSidebar);
    </script>
</body>
</html>