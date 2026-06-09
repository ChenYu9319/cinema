<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CineManage Pro - Dashboard</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body class="bg-gray-100 font-sans text-gray-800 flex h-screen overflow-hidden">

    <!-- 移动端遮罩层：点击可关闭侧边栏 -->
    <div id="sidebarOverlay" class="fixed inset-0 bg-slate-950/40 z-30 hidden md:hidden backdrop-blur-xs transition-opacity duration-300 opacity-0"></div>

    <!-- 侧边栏导航：支持移动端抽屉动画 -->
    <aside id="sidebar" class="w-64 bg-indigo-950 text-slate-300 flex flex-col justify-between fixed md:relative inset-y-0 left-0 z-40 transform -translate-x-full md:translate-x-0 shrink-0 transition-transform duration-300 ease-in-out border-r border-indigo-900/30">
        <div>
            <div class="p-5 flex items-center justify-between bg-slate-950 border-b border-indigo-900">
                <div class="flex items-center space-x-3">
                    <i class="fa-solid fa-film text-2xl text-amber-400"></i>
                    <span class="text-xl font-bold tracking-wider text-white">CineManage</span>
                </div>
                <!-- 移动端关闭按钮 -->
                <button id="closeSidebarBtn" class="md:hidden text-slate-400 hover:text-white p-1 cursor-pointer">
                    <i class="fa-solid fa-xmark text-lg"></i>
                </button>
            </div>
            <nav class="p-4 space-y-1.5">
                <a href="dashboard.php" class="flex items-center space-x-3 bg-indigo-900 text-white px-4 py-2.5 rounded-lg font-medium transition">
                    <i class="fa-solid fa-chart-pie w-5 text-center text-amber-400"></i>
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
                <a href="users.php" class="flex items-center space-x-3 hover:bg-indigo-900/50 hover:text-white px-4 py-2.5 rounded-lg font-medium transition">
                    <i class="fa-solid fa-users w-5 text-center text-slate-400"></i>
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
        
        <!-- 顶栏头部 -->
        <header class="bg-white border-b border-gray-200 px-6 py-4 flex items-center justify-between gap-4 shrink-0">
            <div class="flex items-center space-x-3 min-w-0">
                <!-- 移动端汉堡包唤醒按钮 -->
                <button id="openSidebarBtn" class="md:hidden p-2 -ml-2 text-gray-600 hover:text-gray-900 hover:bg-gray-100 rounded-lg transition cursor-pointer shrink-0">
                    <i class="fa-solid fa-bars text-lg"></i>
                </button>
                <div class="min-w-0">
                    <h1 class="text-xl font-bold text-gray-900 truncate">Dashboard Overview</h1>
                    <p class="text-xs text-gray-500 mt-0.5 truncate">Welcome back! Here is what's happening at your cinema today.</p>
                </div>
            </div>
        </header>

        <!-- 核心看板数据网格 -->
        <main class="p-6 max-w-7xl w-full mx-auto space-y-6">

            <!-- 核心看板数据网格：已调整为 flex 布局实现自动居中 -->
            <div class="flex flex-wrap gap-4 justify-center">
                <!-- 1. 总用户卡片 -->
                <a href="users.php" class="w-full sm:w-[220px] bg-white p-5 rounded-xl border border-gray-100 shadow-xs flex items-center justify-between hover:shadow-md hover:border-gray-200 transition cursor-pointer">
                    <div>
                        <span class="text-xs font-bold text-gray-400 tracking-wider uppercase block">Total Users</span>
                        <span class="text-2xl font-black font-mono text-gray-900 block mt-1">3</span>
                    </div>
                    <div class="p-3 bg-blue-50 text-blue-600 rounded-xl shrink-0"><i class="fa-solid fa-users text-lg"></i></div>
                </a>

                <!-- 2. 电影卡片 -->
                <a href="movies.php" class="w-full sm:w-[220px] bg-white p-5 rounded-xl border border-gray-100 shadow-xs flex items-center justify-between hover:shadow-md hover:border-gray-200 transition cursor-pointer">
                    <div>
                        <span class="text-xs font-bold text-gray-400 tracking-wider uppercase block">Active Movies</span>
                        <span class="text-2xl font-black font-mono text-gray-900 block mt-1">2</span>
                    </div>
                    <div class="p-3 bg-emerald-50 text-emerald-600 rounded-xl shrink-0"><i class="fa-solid fa-video text-lg"></i></div>
                </a>

                <!-- 3. 影厅卡片 -->
                <a href="halls.php" class="w-full sm:w-[220px] bg-white p-5 rounded-xl border border-gray-100 shadow-xs flex items-center justify-between hover:shadow-md hover:border-gray-200 transition cursor-pointer">
                    <div>
                        <span class="text-xs font-bold text-gray-400 tracking-wider uppercase block">Total Halls</span>
                        <span class="text-2xl font-black font-mono text-gray-900 block mt-1">3</span>
                    </div>
                    <div class="p-3 bg-amber-50 text-amber-600 rounded-xl shrink-0"><i class="fa-solid fa-door-open text-lg"></i></div>
                </a>

                <!-- 4. 排片卡片 -->
                <a href="schedules.php" class="w-full sm:w-[220px] bg-white p-5 rounded-xl border border-gray-100 shadow-xs flex items-center justify-between hover:shadow-md hover:border-gray-200 transition cursor-pointerr">
                    <div>
                        <span class="text-xs font-bold text-gray-400 tracking-wider uppercase block">Schedules</span>
                        <span class="text-2xl font-black font-mono text-gray-900 block mt-1">3</span>
                    </div>
                    <div class="p-3 bg-purple-50 text-purple-600 rounded-xl shrink-0"><i class="fa-solid fa-calendar-days text-lg"></i></div>
                </a>

                <!-- 5. 订单/票务卡片 -->
                <a href="bookings.php" class="w-full sm:w-[220px] bg-white p-5 rounded-xl border border-gray-100 shadow-xs flex items-center justify-between hover:shadow-md hover:border-gray-200 transition cursor-pointer">
                    <div>
                        <span class="text-xs font-bold text-gray-400 tracking-wider uppercase block">Total Tickets</span>
                        <span class="text-2xl font-black font-mono text-gray-900 block mt-1">2</span>
                    </div>
                    <div class="p-3 bg-rose-50 text-rose-600 rounded-xl shrink-0"><i class="fa-solid fa-ticket text-lg"></i></div>
                </a>
            </div>

            <!-- 数据表格与历史看板区 -->
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
                
                <!-- 实时排片中心 -->
                <div class="lg:col-span-2 bg-white rounded-xl border border-gray-100 shadow-xs overflow-hidden">
                    <div class="px-5 py-4 border-b border-gray-100 flex justify-between items-center bg-gradient-to-r from-gray-50 to-white">
                        <h2 class="font-bold text-gray-900 flex items-center">
                            <i class="fa-solid fa-clock text-indigo-600 mr-2 text-sm"></i>
                            <span>Live Scheduling Center</span>
                        </h2>
                        <span class="text-xs font-medium text-emerald-700 bg-emerald-50 px-2 py-0.5 rounded-full">System Active</span>
                    </div>
                    <div class="overflow-x-auto">
                        <table class="w-full text-left border-collapse">
                            <thead>
                                <tr class="bg-gray-50/70 text-gray-500 text-xs font-bold uppercase tracking-wider border-b border-gray-100">
                                    <th class="py-3 px-5">Movie</th>
                                    <th class="py-3 px-5">Theater Hall</th>
                                    <th class="py-3 px-5">Date & Start Time</th>
                                </tr>
                            </thead>
                            <tbody class="text-sm divide-y divide-gray-100">
                                <!-- 示例数据行 -->
                                <tr class="hover:bg-slate-50/80 transition">
                                    <td class="py-3.5 px-5">
                                        <div class="font-semibold text-gray-900">Interstellar</div>
                                        <div class="text-xs text-gray-400 mt-0.5">Dir: Christopher Nolan</div>
                                    </td>
                                    <td class="py-3.5 px-5">
                                        <span class="text-gray-700 font-medium block">Hall 2</span>
                                        <span class="inline-block text-[10px] font-bold tracking-wider uppercase bg-amber-50 text-amber-700 border border-amber-200/60 rounded px-1.5 mt-0.5">imax</span>
                                    </td>
                                    <td class="py-3.5 px-5">
                                        <div class="text-gray-600 text-xs font-mono">2026-06-15</div>
                                        <div class="font-mono text-indigo-600 font-bold mt-0.5">14:30:00</div>
                                    </td>
                                </tr>
                                </tr>
                                <tr class="hover:bg-slate-50/80 transition">
                                    <td class="py-3.5 px-5">
                                        <div class="font-semibold text-gray-900">The Wandering Earth 3</div>
                                        <div class="text-xs text-gray-400 mt-0.5">Dir: Frant Gwo</div>
                                    </td>
                                    <td class="py-3.5 px-5">
                                        <span class="text-gray-700 font-medium block">Hall 2</span>
                                        <span class="inline-block text-[10px] font-bold tracking-wider uppercase bg-amber-50 text-amber-700 border border-amber-200/60 rounded px-1.5 mt-0.5">imax</span>
                                    </td>
                                    <td class="py-3.5 px-5">
                                        <div class="text-gray-600 text-xs font-mono">2026-06-15</div>
                                        <div class="font-mono text-indigo-600 font-bold mt-0.5">19:00:00</div>
                                    </td>
                                </tr>
                                <tr class="hover:bg-slate-50/80 transition">
                                    <td class="py-3.5 px-5">
                                        <div class="font-semibold text-gray-900">The Wandering Earth 3</div>
                                        <div class="text-xs text-gray-400 mt-0.5">Dir: Frant Gwo</div>
                                    </td>
                                    <td class="py-3.5 px-5">
                                        <span class="text-gray-700 font-medium block">Hall 1</span>
                                        <span class="inline-block text-[10px] font-bold tracking-wider uppercase bg-blue-50 text-blue-700 border border-blue-200/60 rounded px-1.5 mt-0.5">standard</span>
                                    </td>
                                    <td class="py-3.5 px-5">
                                        <div class="text-gray-600 text-xs font-mono">2026-06-16</div>
                                        <div class="font-mono text-indigo-600 font-bold mt-0.5">10:00:00</div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- 实时订单看板 -->
                <div class="bg-white rounded-xl border border-gray-100 shadow-xs p-5 flex flex-col justify-between">
                    <div>
                        <div class="mb-4 pb-1">
                            <h2 class="font-bold text-gray-900 flex items-center">
                                <i class="fa-solid fa-receipt text-rose-500 mr-2 text-sm"></i>
                                <span>Recent Live Bookings</span>
                            </h2>
                        </div>
                        <div class="space-y-3.5">
                            <div class="p-3.5 bg-slate-50/70 border border-slate-100 rounded-xl flex items-start space-x-3 hover:shadow-xs transition">
                                <div class="p-2 bg-rose-50 text-rose-500 rounded-lg shrink-0">
                                    <i class="fa-solid fa-ticket"></i>
                                </div>
                                <div class="min-w-0 flex-1">
                                    <div class="flex justify-between items-baseline">
                                        <p class="text-sm font-bold text-gray-900 truncate">user_bob</p>
                                        <span class="text-[10px] bg-slate-200/70 text-slate-600 px-1.5 py-0.5 rounded font-mono">ID: #01</span>
                                    </div>
                                    <p class="text-xs text-gray-500 mt-0.5 truncate">Interstellar • Hall 2 (IMAX)</p>
                                    <div class="flex items-center space-x-2 mt-2">
                                        <i class="fa-regular fa-clock text-[10px] text-gray-400"></i>
                                        <span class="text-xs text-indigo-600 font-mono font-semibold">June 15, 14:30</span>
                                    </div>
                                </div>
                            </div>
                            <div class="p-3.5 bg-slate-50/70 border border-slate-100 rounded-xl flex items-start space-x-3 hover:shadow-xs transition">
                                <div class="p-2 bg-rose-50 text-rose-500 rounded-lg shrink-0">
                                    <i class="fa-solid fa-ticket"></i>
                                </div>
                                <div class="min-w-0 flex-1">
                                    <div class="flex justify-between items-baseline">
                                        <p class="text-sm font-bold text-gray-900 truncate">user_charlie</p>
                                        <span class="text-[10px] bg-slate-200/70 text-slate-600 px-1.5 py-0.5 rounded font-mono">ID: #02</span>
                                    </div>
                                    <p class="text-xs text-gray-500 mt-0.5 truncate">The Wandering Earth 3 • Hall 2 (IMAX)</p>
                                    <div class="flex items-center space-x-2 mt-2">
                                        <i class="fa-regular fa-clock text-[10px] text-gray-400"></i>
                                        <span class="text-xs text-indigo-600 font-mono font-semibold">June 15, 19:00</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <a href="bookings.php" class="block text-center text-xs font-semibold text-indigo-600 hover:text-indigo-700 bg-indigo-50/50 hover:bg-indigo-50 py-2 rounded-lg transition mt-4">
                        View All Booking History
                    </a>
                </div>
            </div>
        </main>
    </div>

    <!-- 💡 新增：移动端菜单控制 JavaScript -->
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const openBtn = document.getElementById('openSidebarBtn');
            const closeBtn = document.getElementById('closeSidebarBtn');
            const sidebar = document.getElementById('sidebar');
            const overlay = document.getElementById('sidebarOverlay');

            function toggleSidebar(isOpen) {
                if (isOpen) {
                    sidebar.classList.remove('-translate-x-full');
                    overlay.classList.remove('hidden');
                    setTimeout(() => overlay.classList.add('opacity-100'), 20);
                } else {
                    sidebar.classList.add('-translate-x-full');
                    overlay.classList.remove('opacity-100');
                    setTimeout(() => overlay.classList.add('hidden'), 300);
                }
            }

            openBtn?.addEventListener('click', () => toggleSidebar(true));
            closeBtn?.addEventListener('click', () => toggleSidebar(false));
            overlay?.addEventListener('click', () => toggleSidebar(false));
        });
    </script>
</body>
</html>