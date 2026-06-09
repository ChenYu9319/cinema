<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CineManage Pro - Bookings</title>
    <!-- Tailwind CSS 4.0 -->
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <!-- FontAwesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body class="bg-gray-100 font-sans text-gray-800 flex h-screen overflow-hidden">

    <!-- 1. 遮罩层 (移动端点击外部关闭侧边栏) -->
    <div id="sidebarOverlay" class="fixed inset-0 bg-slate-950/40 z-30 hidden md:hidden backdrop-blur-xs transition-opacity duration-300 opacity-0"></div>

    <!-- 2. 侧边栏导航 -->
    <aside id="sidebar" class="w-64 bg-indigo-950 text-slate-300 flex flex-col justify-between fixed md:relative inset-y-0 left-0 z-40 transform -translate-x-full md:translate-x-0 shrink-0 transition-transform duration-300 ease-in-out border-r border-indigo-900/30">
        <div>
            <!-- Logo 区 -->
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
            
            <!-- 导航 -->
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
                <!-- ✅ 当前激活项：Bookings -->
                <a href="bookings.php" class="flex items-center space-x-3 bg-indigo-900 text-white px-4 py-2.5 rounded-lg font-medium transition">
                    <i class="fa-solid fa-ticket w-5 text-center text-amber-400"></i>
                    <span>Bookings</span>
                </a>
                <a href="users.php" class="flex items-center space-x-3 hover:bg-indigo-900/50 hover:text-white px-4 py-2.5 rounded-lg font-medium transition">
                    <i class="fa-solid fa-users w-5 text-center text-slate-400"></i>
                    <span>Users</span>
                </a>
            </nav>
        </div>
        <!-- 底部用户信息 -->
        <div class="p-4 px-5 border-t border-indigo-900 bg-slate-950/40 flex items-center justify-between shrink-0">
            <div class="min-w-0 flex-1 pr-3">
                <p class="text-sm font-semibold text-white truncate">Alan Admin</p>
                <p class="text-xs text-slate-400 truncate mt-0.5">admin@cinema.com</p>
            </div>
            <a href="index.php" class="shrink-0 w-8 h-8 flex items-center justify-center text-slate-400 hover:text-rose-500 hover:bg-rose-500/10 rounded-lg transition">
                <i class="fa-solid fa-arrow-right-from-bracket"></i>
            </a>
        </div>
    </aside>

    <!-- 主内容区 -->
    <div class="flex-1 flex flex-col overflow-y-auto">
        
        <!-- 顶栏 Header -->
        <header class="bg-white border-b border-gray-200 px-6 py-4 flex items-center justify-between shrink-0 relative z-20">
            <div class="flex items-center gap-4 min-w-0">
                <!-- 移动端触发按钮 -->
                <button id="openSidebarBtn" class="md:hidden text-gray-500 hover:text-indigo-600 p-2 cursor-pointer">
                    <i class="fa-solid fa-bars text-xl"></i>
                </button>
                <div class="min-w-0">
                    <h1 class="text-xl font-bold text-gray-900 truncate">Ticket Bookings</h1>
                    <p class="text-xs text-gray-500 mt-0.5 hidden sm:block">Audit system transactions and client reservations.</p>
                </div>
            </div>
            <div class="shrink-0 ml-4">
                <span class="inline-flex items-center text-xs text-slate-600 bg-slate-100 font-semibold px-3 py-1.5 rounded-xl border border-slate-200/40">
                    Active: 2
                </span>
            </div>
        </header>

        <main class="p-6 max-w-7xl w-full mx-auto space-y-4">

            <!-- 列表区 -->
            <div class="bg-white rounded-xl border border-gray-100 shadow-xs overflow-hidden">
                <div class="overflow-x-auto">
                    <table class="w-full text-left border-collapse">
                        <thead>
                            <tr class="bg-gray-50/70 text-gray-500 text-xs font-bold uppercase tracking-wider border-b border-gray-100">
                                <th class="py-3 px-5">Ticket ID</th>
                                <th class="py-3 px-5">Customer (User)</th>
                                <th class="py-3 px-5">Movie & Hall Slot</th>
                                <th class="py-3 px-5">Showtime</th>
                                <!-- ✅ 新增核心字段列 -->
                                <th class="py-3 px-5">Seats Ordered</th>
                                <th class="py-3 px-5">Amount Paid</th>
                                <th class="py-3 px-5">Status</th>
                                <th class="py-3 px-5 text-right">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="text-sm divide-y divide-gray-100">
                            <!-- 订单 1 -->
                            <tr class="hover:bg-slate-50/80 transition">
                                <td class="py-3.5 px-5 font-mono text-xs font-semibold text-gray-500">#BK-84920</td>
                                <td class="py-3.5 px-5">
                                    <div class="font-semibold text-gray-900">user_bob</div>
                                    <p class="text-[11px] text-gray-400 font-normal mt-0.5">bob@example.com</p>
                                </td>
                                <td class="py-3.5 px-5">
                                    <div class="font-semibold text-gray-800">Interstellar</div>
                                    <div class="text-xs text-slate-400 mt-0.5 inline-flex items-center bg-slate-50 px-1.5 py-0.5 rounded border border-gray-200/60 text-[10px] uppercase font-semibold font-mono">Hall 2 (IMAX)</div>
                                </td>
                                <td class="py-3.5 px-5">
                                    <div class="text-gray-600 text-xs font-medium">2026-06-15</div>
                                    <div class="font-mono text-indigo-600 font-bold text-xs mt-0.5">14:30</div>
                                </td>
                                <!-- ✅ 补全真实座位数据 -->
                                <td class="py-3.5 px-5">
                                    <div class="flex flex-wrap gap-1">
                                        <span class="bg-indigo-50 text-indigo-700 text-[11px] font-semibold px-1.5 py-0.5 rounded border border-indigo-100">Row F - 10</span>
                                        <span class="bg-indigo-50 text-indigo-700 text-[11px] font-semibold px-1.5 py-0.5 rounded border border-indigo-100">Row F - 11</span>
                                    </div>
                                </td>
                                <!-- ✅ 补全财务金额数据 -->
                                <td class="py-3.5 px-5 font-mono text-xs font-bold text-gray-950">$28.00</td>
                                <!-- ✅ 优化：同步全局系统的高级原子态组件 -->
                                <td class="py-3.5 px-5">
                                    <span class="inline-flex items-center space-x-1.5 text-xs text-emerald-700 bg-emerald-50 px-2 py-0.5 rounded-md border border-emerald-200/50 font-medium">
                                        <span class="w-1.5 h-1.5 rounded-full bg-emerald-500"></span>
                                        <span>Confirmed</span>
                                    </span>
                                </td>
                                <td class="py-3.5 px-5 text-right">
                                    <button onclick="return confirm('Are you sure you want to cancel this reservation?');" class="inline-flex items-center space-x-1 text-indigo-600 hover:text-indigo-900 font-semibold text-xs transition cursor-pointer">
                                        <i class="fa-solid fa-circle-info text-[10px]"></i>
                                        <span>Details</span>
                                    </button>
                                </td>
                            </tr>
                            
                            <!-- 订单 2 -->
                            <tr class="hover:bg-slate-50/80 transition">
                                <td class="py-3.5 px-5 font-mono text-xs font-semibold text-gray-500">#BK-10394</td>
                                <td class="py-3.5 px-5">
                                    <div class="font-semibold text-gray-900">user_charlie</div>
                                    <p class="text-[11px] text-gray-400 font-normal mt-0.5">charlie@gmail.com</p>
                                </td>
                                <td class="py-3.5 px-5">
                                    <div class="font-semibold text-gray-800">The Wandering Earth 3</div>
                                    <div class="text-xs text-slate-400 mt-0.5 inline-flex items-center bg-slate-50 px-1.5 py-0.5 rounded border border-gray-200/60 text-[10px] uppercase font-semibold font-mono">Hall 2 (IMAX)</div>
                                </td>
                                <td class="py-3.5 px-5">
                                    <div class="text-gray-600 text-xs font-medium">2026-06-15</div>
                                    <div class="font-mono text-indigo-600 font-bold text-xs mt-0.5">19:00</div>
                                </td>
                                <td class="py-3.5 px-5">
                                    <span class="bg-indigo-50 text-indigo-700 text-[11px] font-semibold px-1.5 py-0.5 rounded border border-indigo-100">Row C - 05</span>
                                </td>
                                <td class="py-3.5 px-5 font-mono text-xs font-bold text-gray-950">$14.50</td>
                                <td class="py-3.5 px-5">
                                    <span class="inline-flex items-center space-x-1.5 text-xs text-emerald-700 bg-emerald-50 px-2 py-0.5 rounded-md border border-emerald-200/50 font-medium">
                                        <span class="w-1.5 h-1.5 rounded-full bg-emerald-500"></span>
                                        <span>Confirmed</span>
                                    </span>
                                </td>
                                <td class="py-3.5 px-5 text-right">
                                    <button onclick="return confirm('Are you sure you want to cancel this reservation?');" class="inline-flex items-center space-x-1 text-indigo-600 hover:text-indigo-900 font-semibold text-xs transition cursor-pointer">
                                        <i class="fa-solid fa-circle-info text-[10px]"></i>
                                        <span>Details</span>
                                    </button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </main>
    </div>

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