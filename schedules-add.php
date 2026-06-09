<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CineManage Pro - Add Schedule</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body class="bg-gray-100 font-sans text-gray-800 flex h-screen overflow-hidden">

    <!-- 侧边栏 (与主列表页完全一致) -->
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
                <a href="schedules.php" class="flex items-center space-x-3 bg-indigo-900 text-white px-4 py-2.5 rounded-lg font-medium transition">
                    <i class="fa-solid fa-calendar-days w-5 text-center text-amber-400"></i>
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

    <!-- 主体内容区 -->
    <div class="flex-1 flex flex-col overflow-y-auto">
        
        <!-- 头部导航 -->
        <header class="bg-white border-b border-gray-200 px-6 py-4 flex items-center justify-between shrink-0">
            <div>
                <div class="flex items-center space-x-2 text-xs text-gray-400 font-medium mb-1">
                    <a href="schedules.php" class="hover:text-indigo-600 transition">Schedules</a>
                    <span>/</span>
                    <span class="text-gray-600">Create New Slot</span>
                </div>
                <h1 class="text-xl font-bold text-gray-900">Create Showtime Slot</h1>
            </div>
            <a href="schedules.php" class="border border-gray-200 hover:bg-gray-50 text-gray-600 text-sm font-semibold px-4 py-2.5 rounded-xl flex items-center space-x-2 transition cursor-pointer">
                <i class="fa-solid fa-arrow-left text-xs"></i>
                <span>Back to List</span>
            </a>
        </header>

        <!-- 表单主体 -->
        <main class="p-6 max-w-3xl w-full mx-auto">
            
            <!-- 动态提示通知栏 (已修复：只有在URL中包含 status=success 时才渲染) -->
            <?php if (isset($_GET['status']) && $_GET['status'] == 'success'): ?>
            <div id="notification-banner" class="mb-5 p-4 rounded-xl border flex items-start space-x-3 bg-emerald-50 border-emerald-200 text-emerald-800">
                <i class="fa-solid fa-circle-check text-emerald-500 mt-0.5 text-lg"></i>
                <div>
                    <p class="text-sm font-semibold">Success!</p>
                    <p class="text-xs opacity-90 mt-0.5">The new movie screening slot has been successfully scheduled.</p>
                </div>
            </div>
            <?php endif; ?>

            <div class="bg-white rounded-xl border border-gray-100 shadow-sm overflow-hidden">
                <div class="p-5 border-b border-gray-100 bg-gray-50/50">
                    <h2 class="text-sm font-bold text-gray-700 uppercase tracking-wider">Showtime Details</h2>
                    <p class="text-xs text-gray-400 mt-0.5">Fill in the parameters below to deploy a screening on the grid.</p>
                </div>

                <!-- 提示：如果你的表单处理写在别的文件，记得把 action 改为对应的处理脚本（如 add-schedule-process.php） -->
                <form action="schedules.php" method="POST" class="p-6 space-y-5">
                    
                    <!-- 电影选择 -->
                    <div>
                        <label class="block text-xs font-bold text-gray-500 uppercase tracking-wider mb-2">Select Movie</label>
                        <div class="relative">
                            <select name="movie_id" required class="w-full appearance-none border border-gray-200 rounded-xl px-3.5 py-2.5 text-sm font-medium text-gray-700 bg-gray-50/50 focus:bg-white focus:outline-hidden focus:ring-4 focus:ring-indigo-100 transition cursor-pointer">
                                <option value="" disabled selected>Choose a movie...</option>
                                <option value="1">Interstellar (169 min - PG-13)</option>
                                <option value="2">The Wandering Earth 3 (182 min - PG-13)</option>
                                <option value="3">Avatar: The Way of Water (192 min - PG-13)</option>
                            </select>
                            <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-4 text-gray-400">
                                <i class="fa-solid fa-chevron-down text-xs"></i>
                            </div>
                        </div>
                    </div>

                    <!-- 网格布局：影厅 与 票价 -->
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                        <!-- 影厅选择 -->
                        <div>
                            <label class="block text-xs font-bold text-gray-500 uppercase tracking-wider mb-2">Theater / Hall</label>
                            <div class="relative">
                                <select name="hall_id" required class="w-full appearance-none border border-gray-200 rounded-xl px-3.5 py-2.5 text-sm font-medium text-gray-700 bg-gray-50/50 focus:bg-white focus:outline-hidden focus:ring-4 focus:ring-indigo-100 transition cursor-pointer">
                                    <option value="" disabled selected>Select showroom...</option>
                                    <option value="1">Hall 1 (Standard Showroom)</option>
                                    <option value="2">Hall 2 (IMAX Showroom)</option>
                                    <option value="3">VIP Hall (Luxury Lounge)</option>
                                </select>
                                <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-4 text-gray-400">
                                    <i class="fa-solid fa-chevron-down text-xs"></i>
                                </div>
                            </div>
                        </div>

                        <!-- 基础票价 -->
                        <div>
                            <label class="block text-xs font-bold text-gray-500 uppercase tracking-wider mb-2">Base Ticket Price (USD)</label>
                            <div class="relative">
                                <span class="absolute inset-y-0 left-0 flex items-center pl-4 text-gray-400 text-sm font-medium">$</span>
                                <input type="number" name="ticket_price" step="0.01" min="0" placeholder="0.00" required class="w-full border border-gray-200 rounded-xl pl-8 pr-4 py-2.5 text-sm font-medium text-gray-700 bg-gray-50/50 focus:bg-white focus:outline-hidden focus:ring-4 focus:ring-indigo-100 transition">
                            </div>
                        </div>
                    </div>

                    <!-- 网格布局：日期 与 时间 -->
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                        <!-- 放映日期 -->
                        <div>
                            <label class="block text-xs font-bold text-gray-500 uppercase tracking-wider mb-2">Screening Date</label>
                            <input type="date" name="show_date" value="2026-06-15" required class="w-full border border-gray-200 rounded-xl px-3.5 py-2.5 text-sm font-mono text-gray-700 bg-gray-50/50 focus:bg-white focus:outline-hidden focus:ring-4 focus:ring-indigo-100 transition">
                        </div>

                        <!-- 开场时间 -->
                        <div>
                            <label class="block text-xs font-bold text-gray-500 uppercase tracking-wider mb-2">Start Time</label>
                            <input type="time" name="start_time" required class="w-full border border-gray-200 rounded-xl px-3.5 py-2.5 text-sm font-mono text-gray-700 bg-gray-50/50 focus:bg-white focus:outline-hidden focus:ring-4 focus:ring-indigo-100 transition">
                        </div>
                    </div>

                    <!-- 温馨提示：协助管理员注意排片间隔 -->
                    <div class="p-3 bg-amber-50/60 border border-amber-100 rounded-xl flex items-center space-x-2 text-amber-800">
                        <i class="fa-solid fa-circle-info text-amber-500 text-xs"></i>
                        <span class="text-[11px] font-medium">Tip: Leaving at least a 15-minute cleaning interval between screenings is highly recommended.</span>
                    </div>

                    <hr class="border-gray-100 my-2">

                    <!-- 底部提交按钮组 -->
                    <div class="flex items-center justify-end space-x-3 pt-2">
                        <a href="schedules.php" class="px-4 py-2.5 text-sm font-semibold text-gray-500 hover:text-gray-700 transition">
                            Cancel
                        </a>
                        <button type="submit" class="bg-indigo-600 hover:bg-indigo-700 text-white text-sm font-semibold px-5 py-2.5 rounded-xl shadow-xs hover:shadow-md flex items-center space-x-2 transition cursor-pointer">
                            <i class="fa-solid fa-circle-plus text-xs"></i>
                            <span>Save Schedule</span>
                        </button>
                    </div>

                </form>
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