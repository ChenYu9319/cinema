<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CineManage Pro - Halls</title>
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
    <div class="flex-1 flex flex-col min-w-0 overflow-hidden">
        
        <!-- Header: 确保它是一个独立的 flex 子项，固定在顶部 -->
        <header class="bg-white border-b border-gray-200 px-6 py-4 flex flex-wrap sm:flex-nowrap justify-between items-center gap-4 shrink-0 z-20">
            <div>
                <h1 class="text-xl font-bold text-gray-900">Theater Halls</h1>
            </div>
            <div class="flex items-center gap-3">
                <!-- 侧边栏切换按钮 (仅移动端) -->
                <button id="openSidebarBtn" class="md:hidden text-gray-500 hover:text-indigo-600 p-2">
                    <i class="fa-solid fa-bars text-xl"></i>
                </button>
                <!-- 真正的新建按钮 -->
                <button id="openModalBtn" class="bg-indigo-600 hover:bg-indigo-700 text-white px-4 py-2 rounded-lg text-sm font-semibold transition cursor-pointer">
                    <i class="fa-solid fa-plus mr-1"></i> Add New Hall
                </button>
            </div>
        </header>

        <!-- 列表区 -->
        <main class="p-6 max-w-7xl w-full mx-auto">
            <div class="bg-white rounded-xl border border-gray-100 shadow-xs overflow-hidden">
                <div class="overflow-x-auto">
                    <table class="w-full text-left border-collapse">
                        <thead>
                            <tr class="bg-gray-50/70 text-gray-500 text-xs font-bold uppercase tracking-wider border-b border-gray-100">
                                <th class="py-3 px-5">Hall Number</th>
                                <th class="py-3 px-5">Seat Capacity</th>
                                <th class="py-3 px-5">Hall Type</th>
                                <!-- ✅ 新增：状态列 -->
                                <th class="py-3 px-5">Status</th>
                                <th class="py-3 px-5 text-right">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="text-sm divide-y divide-gray-100">
                            <!-- 影厅 1 -->
                            <tr class="hover:bg-slate-50/80 transition">
                                <td class="py-3.5 px-5 font-semibold text-gray-900">
                                    <i class="fa-solid fa-door-closed text-gray-400 mr-2.5"></i>Hall 1
                                </td>
                                <td class="py-3.5 px-5 text-gray-600 font-medium">150 Seats</td>
                                <td class="py-3.5 px-5">
                                    <span class="text-xs font-mono uppercase bg-blue-50 text-blue-700 px-2 py-0.5 rounded-md border border-blue-200/50 font-semibold">standard</span>
                                </td>
                                <!-- 状态数据 -->
                                <td class="py-3.5 px-5">
                                    <span class="inline-flex items-center space-x-1.5 text-xs text-emerald-700 bg-emerald-50 px-2 py-0.5 rounded-md border border-emerald-200/50 font-medium">
                                        <span class="w-1.5 h-1.5 rounded-full bg-emerald-500"></span>
                                        <span>Active</span>
                                    </span>
                                </td>
                                <td class="py-3.5 px-5 text-right">
                                    <a href="halls-configure.php?id=1" class="inline-flex items-center space-x-1 text-indigo-600 hover:text-indigo-900 font-semibold text-xs transition">
                                        <i class="fa-solid fa-gear text-[10px]"></i>
                                        <span>Configure</span>
                                    </a>
                                </td>
                            </tr>
                            
                            <!-- 影厅 2 -->
                            <tr class="hover:bg-slate-50/80 transition">
                                <td class="py-3.5 px-5 font-semibold text-gray-900">
                                    <i class="fa-solid fa-door-closed text-gray-400 mr-2.5"></i>Hall 2 (IMAX)
                                </td>
                                <td class="py-3.5 px-5 text-gray-600 font-medium">300 Seats</td>
                                <td class="py-3.5 px-5">
                                    <span class="text-xs font-mono uppercase bg-amber-50 text-amber-700 px-2 py-0.5 rounded-md border border-amber-200/50 font-semibold">imax</span>
                                </td>
                                <td class="py-3.5 px-5">
                                    <span class="inline-flex items-center space-x-1.5 text-xs text-emerald-700 bg-emerald-50 px-2 py-0.5 rounded-md border border-emerald-200/50 font-medium">
                                        <span class="w-1.5 h-1.5 rounded-full bg-emerald-500"></span>
                                        <span>Active</span>
                                    </span>
                                </td>
                                <td class="py-3.5 px-5 text-right">
                                    <a href="halls-configure.php" class="inline-flex items-center space-x-1 text-indigo-600 hover:text-indigo-900 font-semibold text-xs transition">
                                        <i class="fa-solid fa-gear text-[10px]"></i>
                                        <span>Configure</span>
                                    </a>
                                </td>
                            </tr>
                            
                            <!-- 影厅 3 -->
                            <tr class="hover:bg-slate-50/80 transition">
                                <td class="py-3.5 px-5 font-semibold text-gray-900">
                                    <i class="fa-solid fa-door-closed text-gray-400 mr-2.5"></i>VIP Hall
                                </td>
                                <td class="py-3.5 px-5 text-gray-600 font-medium">30 Seats</td>
                                <td class="py-3.5 px-5">
                                    <span class="text-xs font-mono uppercase bg-purple-50 text-purple-700 px-2 py-0.5 rounded-md border border-purple-200/50 font-semibold">beanie</span>
                                </td>
                                <!-- 演示维护状态 -->
                                <td class="py-3.5 px-5">
                                    <span class="inline-flex items-center space-x-1.5 text-xs text-amber-700 bg-amber-50 px-2 py-0.5 rounded-md border border-amber-200/50 font-medium">
                                        <span class="w-1.5 h-1.5 rounded-full bg-amber-500 animate-pulse"></span>
                                        <span>Maintenance</span>
                                    </span>
                                </td>
                                <td class="py-3.5 px-5 text-right">
                                    <a href="halls-configure.php?id=3" class="inline-flex items-center space-x-1 text-indigo-600 hover:text-indigo-900 font-semibold text-xs transition">
                                        <i class="fa-solid fa-gear text-[10px]"></i>
                                        <span>Configure</span>
                                    </a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </main>
    </div>
    <!-- ================= 新增影厅弹窗 MODAL (默认隐藏 hidden) ================= -->
<div id="newHallModal" class="fixed inset-0 bg-slate-900/60 backdrop-blur-xs flex items-center justify-center z-50 hidden transition-all duration-300">
    
    <!-- 模态框主体容器 -->
    <div class="bg-white rounded-2xl border border-gray-100 shadow-xl max-w-md w-full m-4 overflow-hidden transform transition-all scale-95 opacity-0 duration-300" id="modalContainer">
        
        <!-- 头部 -->
        <div class="px-6 py-4 border-b border-gray-100 flex items-center justify-between bg-gray-50/50">
            <div>
                <h3 class="text-base font-bold text-gray-900">Add New Auditorium</h3>
                <p class="text-xs text-gray-500 mt-0.5">Deploy a new theater hall into the systemic infrastructure.</p>
            </div>
            <button id="closeModalBtn" class="text-gray-400 hover:text-gray-600 p-1.5 hover:bg-gray-100 rounded-lg transition cursor-pointer">
                <i class="fa-solid fa-xmark text-sm"></i>
            </button>
        </div>

        <!-- 表单主体 -->
        <form action="halls.php" method="POST" class="p-6 space-y-4">
            
            <!-- 影厅名称/编号 -->
            <div>
                <label class="block text-xs font-bold text-gray-400 tracking-wider uppercase mb-1.5">Hall Name / Number</label>
                <div class="relative">
                    <span class="absolute inset-y-0 left-0 flex items-center pl-3.5 text-gray-400 pointer-events-none text-xs">
                        <i class="fa-solid fa-door-closed"></i>
                    </span>
                    <input type="text" name="hall_name" required placeholder="e.g., Hall 4 or Dolby Cinema" 
                        class="w-full pl-9 pr-4 py-2.5 bg-gray-50 border border-gray-200 rounded-xl text-sm text-gray-900 focus:outline-hidden focus:border-indigo-600 focus:bg-white focus:ring-4 focus:ring-indigo-100/50 transition">
                </div>
            </div>

            <!-- 座位数 -->
            <div>
                <label class="block text-xs font-bold text-gray-400 tracking-wider uppercase mb-1.5">Seat Capacity</label>
                <div class="relative">
                    <span class="absolute inset-y-0 left-0 flex items-center pl-3.5 text-gray-400 pointer-events-none text-xs">
                        <i class="fa-solid fa-chair"></i>
                    </span>
                    <input type="number" name="capacity" required min="1" max="1000" placeholder="e.g., 120" 
                        class="w-full pl-9 pr-4 py-2.5 bg-gray-50 border border-gray-200 rounded-xl text-sm text-gray-900 focus:outline-hidden focus:border-indigo-600 focus:bg-white focus:ring-4 focus:ring-indigo-100/50 transition">
                </div>
            </div>

            <!-- 影厅类型与初始状态（双列并排） -->
            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="block text-xs font-bold text-gray-400 tracking-wider uppercase mb-1.5">Hall Type</label>
                    <select name="type" class="w-full px-3 py-2.5 bg-gray-50 border border-gray-200 rounded-xl text-sm text-gray-900 focus:outline-hidden focus:border-indigo-600 focus:bg-white focus:ring-4 focus:ring-indigo-100/50 transition">
                        <option value="standard">Standard</option>
                        <option value="imax">IMAX</option>
                        <option value="beanie">Beanie (VIP)</option>
                        <option value="4dx">4DX</option>
                    </select>
                </div>
                <div>
                    <label class="block text-xs font-bold text-gray-400 tracking-wider uppercase mb-1.5">Initial Status</label>
                    <select name="status" class="w-full px-3 py-2.5 bg-gray-50 border border-gray-200 rounded-xl text-sm text-gray-900 focus:outline-hidden focus:border-indigo-600 focus:bg-white focus:ring-4 focus:ring-indigo-100/50 transition">
                        <option value="active">Active</option>
                        <option value="maintenance">Maintenance</option>
                    </select>
                </div>
            </div>

            <!-- 底部操作按钮 -->
            <div class="pt-4 border-t border-gray-100 flex items-center justify-end space-x-3">
                <button type="button" id="cancelModalBtn" class="px-4 py-2.5 bg-white border border-gray-200 text-gray-700 rounded-xl text-xs font-semibold hover:bg-gray-50 transition text-center cursor-pointer">
                    Cancel
                </button>
                <button type="submit" class="px-4 py-2.5 bg-indigo-600 hover:bg-indigo-700 text-white rounded-xl text-xs font-semibold shadow-xs hover:shadow-md transition cursor-pointer flex items-center space-x-1.5">
                    <i class="fa-solid fa-plus text-[10px]"></i>
                    <span>Create Hall</span>
                </button>
            </div>

        </form>
    </div>
</div>

<script>
    // --- 侧边栏交互逻辑 (补充部分) ---
        const sidebar = document.getElementById('sidebar');
        const overlay = document.getElementById('sidebarOverlay');
        const openSidebarBtn = document.getElementById('openSidebarBtn');
        const closeSidebarBtn = document.getElementById('closeSidebarBtn');

        function toggleSidebar(show) {
            if (show) {
                sidebar.classList.remove('-translate-x-full');
                overlay.classList.remove('hidden');
                // 强制重绘以触发遮罩层过渡
                setTimeout(() => overlay.classList.add('opacity-100'), 10);
            } else {
                sidebar.classList.add('-translate-x-full');
                overlay.classList.remove('opacity-100');
                // 等待动画结束后隐藏
                setTimeout(() => overlay.classList.add('hidden'), 300);
            }
        }

        // 绑定点击事件
        if (openSidebarBtn) openSidebarBtn.addEventListener('click', () => toggleSidebar(true));
        if (closeSidebarBtn) closeSidebarBtn.addEventListener('click', () => toggleSidebar(false));
        if (overlay) overlay.addEventListener('click', () => toggleSidebar(false));
</script>
<!-- ================= 交互控制 JavaScript ================= -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // 获取关键 DOM 节点
        // 💡 提示：记得在 halls.php 原本的 "Add New Hall" 按钮上加上 id="openModalBtn" 属性
        const openBtn = document.getElementById('openModalBtn');
        const closeBtn = document.getElementById('closeModalBtn');
        const cancelBtn = document.getElementById('cancelModalBtn');
        const modal = document.getElementById('newHallModal');
        const container = document.getElementById('modalContainer');

        function openModal() {
            modal.classList.remove('hidden');
            // 延迟一点点触发动画，确保过渡流畅
            setTimeout(() => {
                container.classList.remove('scale-95', 'opacity-0');
                container.classList.add('scale-100', 'opacity-100');
            }, 20);
        }

        function closeModal() {
            container.classList.remove('scale-100', 'opacity-100');
            container.classList.add('scale-95', 'opacity-0');
            // 动画结束后再彻底隐藏
            setTimeout(() => {
                modal.classList.add('hidden');
            }, 300);
        }

        // 绑定点击事件
        if (openBtn) openBtn.addEventListener('click', openModal);
        if (closeBtn) closeBtn.addEventListener('click', closeModal);
        if (cancelBtn) cancelBtn.addEventListener('click', closeModal);

        // 点击背景遮罩层也可以关闭弹窗
        modal.addEventListener('click', function(e) {
            if (e.target === modal) {
                closeModal();
            }
        });
    });
</script>
</body>
</html>