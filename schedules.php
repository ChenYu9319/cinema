<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CineManage Pro - Schedules</title>
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

    <!-- 主体区 -->
    <div class="flex-1 flex flex-col overflow-y-auto">
        
    <!-- 顶栏头部 -->
        <header class="bg-white border-b border-gray-200 px-6 py-4 flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4 shrink-0">
    
            <div class="min-w-0">
                <h1 class="text-xl font-bold text-gray-900">Showtime Schedules</h1>
                <p class="text-xs text-gray-500 mt-0.5">Deploy and manage movie screening slots across all theater halls.</p>
            </div>

            <div class="flex items-center gap-4 w-full sm:w-auto">
                <button id="openSidebarBtn" class="md:hidden p-2 -ml-2 text-gray-600 hover:text-gray-900 hover:bg-gray-100 rounded-lg transition cursor-pointer shrink-0">
                    <i class="fa-solid fa-bars text-lg"></i>
                </button>

                <a href="schedules-add.php" class="w-full sm:w-auto bg-indigo-600 hover:bg-indigo-700 text-white text-sm font-semibold px-4 py-2.5 rounded-xl shadow-xs hover:shadow-md flex items-center justify-center space-x-2 transition cursor-pointer ml-auto">
                    <i class="fa-solid fa-plus text-xs"></i>
                    <span>Create New Slot</span>
                </a>
            </div>
        </header>

        <main class="p-6 max-w-7xl w-full mx-auto space-y-4">
            
            <!-- 过滤控制栏 -->
            <div class="bg-white p-4 rounded-xl border border-gray-100 shadow-2xs flex flex-col sm:flex-row gap-4 items-center justify-between">
                <div class="flex flex-wrap items-center gap-3 w-full sm:w-auto">
                    <div class="relative w-full sm:w-44">
                        <input type="date" value="2026-06-15" class="w-full border border-gray-200 rounded-xl px-3 py-2 text-xs font-mono text-gray-600 bg-gray-50 focus:bg-white focus:outline-hidden focus:ring-4 focus:ring-indigo-100 transition">
                    </div>
                    <select class="w-full sm:w-44 border border-gray-200 rounded-xl px-3 py-2 text-xs font-medium text-gray-600 bg-gray-50 focus:bg-white focus:outline-hidden focus:ring-4 focus:ring-indigo-100 transition">
                        <option>All Showrooms</option>
                        <option>Hall 1 (Standard)</option>
                        <option>Hall 2 (IMAX)</option>
                        <option>VIP Hall</option>
                    </select>
                </div>
                <div class="text-[11px] font-bold text-gray-400 uppercase tracking-widest">
                    3 Slots Found
                </div>
            </div>

            <!-- 表格容器 -->
            <div class="bg-white rounded-xl border border-gray-100 shadow-xs overflow-hidden">
                <div class="overflow-x-auto">
                    <table class="w-full text-left border-collapse">
                        <thead>
                            <tr class="bg-gray-50/70 text-gray-500 text-[10px] font-black uppercase tracking-[0.1em] border-b border-gray-100">
                                <th class="py-4 px-5 w-20">ID</th>
                                <th class="py-4 px-5">Movie Details</th>
                                <th class="py-4 px-5">Theater & Hall</th>
                                <th class="py-4 px-5 text-center">Start Time</th>
                                <th class="py-4 px-5">Status</th>
                                <th class="py-4 px-5 text-right">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="text-sm divide-y divide-gray-100">
                            
                            <!-- Slot #01 -->
                            <tr class="hover:bg-slate-50/80 transition group">
                                <td class="py-4 px-5 font-mono text-xs text-gray-400">#01</td>
                                <td class="py-4 px-5">
                                    <div class="font-bold text-gray-900 group-hover:text-indigo-600 transition">Interstellar</div>
                                    <div class="text-[11px] text-gray-400 mt-1 flex items-center gap-2">
                                        <span class="flex items-center"><i class="fa-regular fa-clock mr-1"></i>169 min</span>
                                        <span class="w-1 h-1 rounded-full bg-gray-300"></span>
                                        <span class="font-bold text-amber-600 uppercase">PG-13</span>
                                    </div>
                                </td>
                                <td class="py-4 px-5">
                                    <div class="flex flex-col">
                                        <span class="text-gray-700 font-semibold">Hall 2</span>
                                        <span class="text-[9px] font-black uppercase text-amber-600 bg-amber-50 border border-amber-200/50 px-1.5 py-0.5 rounded-sm self-start mt-1 tracking-tighter">imax showroom</span>
                                    </div>
                                </td>
                                <td class="py-4 px-5">
                                    <div class="flex flex-col items-center">
                                        <span class="text-[11px] font-bold text-gray-400 font-mono">2026-06-15</span>
                                        <div class="flex items-center gap-1.5 mt-1 font-mono font-bold text-indigo-600">
                                            <span>19:00</span>
                                        </div>
                                    </div>
                                </td>
                                <td class="py-4 px-5">
                                    <span class="inline-flex items-center space-x-1.5 text-[10px] font-bold uppercase text-amber-700 bg-amber-50 border border-amber-200/40 px-2 py-1 rounded-md">
                                        <span class="w-1.5 h-1.5 rounded-full bg-amber-500 animate-pulse"></span>
                                        <span>Screening</span>
                                    </span>
                                </td>
                                <td class="py-4 px-5 text-right">
                                    <div class="flex items-center justify-end space-x-3">
                                        <!-- 直接使用 <a> 标签，移除外层的 <button> -->
                                        <a href="schedules-edit.php?id=01" class="p-2 text-gray-400 hover:text-indigo-600 hover:bg-indigo-50 rounded-lg transition cursor-pointer" title="Edit">
                                            <i class="fa-solid fa-pen-to-square text-xs"></i>
                                        </a>
                                        
                                        <!-- 删除按钮同理，建议也改为 <a> 标签 -->
                                        <a href="delete-schedule.php?id=01" onclick="return confirm('Are you sure?');" class="p-2 text-gray-400 hover:text-rose-600 hover:bg-rose-50 rounded-lg transition cursor-pointer" title="Delete">
                                            <i class="fa-solid fa-trash-can text-xs"></i>
                                        </a>
                                    </div>
                                </td>
                            </tr>

                            <!-- Slot #02 (已修复散场时间与字号不一致) -->
                            <tr class="hover:bg-slate-50/80 transition group">
                                <td class="py-4 px-5 font-mono text-xs text-gray-400">#02</td>
                                <td class="py-4 px-5">
                                    <div class="font-bold text-gray-900 group-hover:text-indigo-600 transition">The Wandering Earth 3</div>
                                    <div class="text-[11px] text-gray-400 mt-1 flex items-center gap-2">
                                        <span class="flex items-center"><i class="fa-regular fa-clock mr-1"></i>182 min</span>
                                        <span class="w-1 h-1 rounded-full bg-gray-300"></span>
                                        <span class="font-bold text-blue-600 uppercase">PG-13</span>
                                    </div>
                                </td>
                                <td class="py-4 px-5">
                                    <div class="flex flex-col">
                                        <span class="text-gray-700 font-semibold">Hall 2</span>
                                        <span class="text-[9px] font-black uppercase text-amber-600 bg-amber-50 border border-amber-200/50 px-1.5 py-0.5 rounded-sm self-start mt-1 tracking-tighter">imax showroom</span>
                                    </div>
                                </td>
                                <td class="py-4 px-5">
                                    <div class="flex flex-col items-center">
                                        <span class="text-[11px] font-bold text-gray-400 font-mono">2026-06-15</span>
                                        <div class="flex items-center gap-1.5 mt-1 font-mono font-bold text-indigo-600">
                                            <span>19:00</span>
                                        </div>
                                    </div>
                                </td>
                                <td class="py-4 px-5">
                                    <span class="inline-flex items-center space-x-1.5 text-[10px] font-bold uppercase text-blue-700 bg-blue-50 border border-blue-200/40 px-2 py-1 rounded-md">
                                        <span class="w-1.5 h-1.5 rounded-full bg-blue-500"></span>
                                        <span>Scheduled</span>
                                    </span>
                                </td>
                                <td class="py-4 px-5 text-right">
                                    <div class="flex items-center justify-end space-x-3">
                                        <!-- 直接使用 <a> 标签，移除外层的 <button> -->
                                        <a href="schedules-edit.php?id=01" aria-label="Edit schedule" class="p-2 text-gray-400 hover:text-indigo-600 hover:bg-indigo-50 rounded-lg transition cursor-pointer" title="Edit">
                                            <i class="fa-solid fa-pen-to-square text-xs"></i>
                                        </a>
                                        
                                        <!-- 删除按钮同理，建议也改为 <a> 标签 -->
                                        <a href="delete-schedule.php?id=01" aria-label="Edit schedule" onclick="return confirm('Are you sure?');" class="p-2 text-gray-400 hover:text-rose-600 hover:bg-rose-50 rounded-lg transition cursor-pointer" title="Delete">
                                            <i class="fa-solid fa-trash-can text-xs"></i>
                                        </a>
                                    </div>
                                </td>
                            </tr>

                            <!-- Slot #03 (已修复日期逻辑、散场时间、分级标签) -->
                            <tr class="hover:bg-slate-50/80 transition group opacity-75">
                                <td class="py-4 px-5 font-mono text-xs text-gray-400">#03</td>
                                <td class="py-4 px-5">
                                    <div class="font-bold text-gray-900 group-hover:text-indigo-600 transition">The Wandering Earth 3</div>
                                    <div class="text-[11px] text-gray-400 mt-1 flex items-center gap-2">
                                        <span class="flex items-center"><i class="fa-regular fa-clock mr-1"></i>182 min</span>
                                        <span class="w-1 h-1 rounded-full bg-gray-300"></span>
                                        <span class="font-bold text-blue-600 uppercase">PG-13</span>
                                    </div>
                                </td>
                                <td class="py-4 px-5">
                                    <div class="flex flex-col">
                                        <span class="text-gray-700 font-semibold">Hall 1</span>
                                        <span class="text-[9px] font-black uppercase text-blue-600 bg-blue-50 border border-blue-200/50 px-1.5 py-0.5 rounded-sm self-start mt-1 tracking-tighter">standard showroom</span>
                                    </div>
                                </td>
                                <td class="py-4 px-5 text-center">
                                    <div class="flex flex-col items-center">
                                        <span class="text-[11px] font-bold text-gray-400 font-mono">2026-06-15</span>
                                        <div class="flex items-center gap-1.5 mt-1 font-mono font-bold text-gray-500">
                                            <span>10:00</span>
                                        </div>
                                    </div>
                                </td>
                                <td class="py-4 px-5">
                                    <span class="inline-flex items-center space-x-1.5 text-[10px] font-bold uppercase text-gray-500 bg-gray-100 border border-gray-200 px-2 py-1 rounded-md">
                                        <span class="w-1.5 h-1.5 rounded-full bg-gray-400"></span>
                                        <span>Finished</span>
                                    </span>
                                </td>
                                <td class="py-4 px-5 text-right">
                                    <div class="flex items-center justify-end space-x-3">
                                        <!-- 直接使用 <a> 标签，移除外层的 <button> -->
                                        <a href="schedules-edit.php?id=01" aria-label="Edit schedule" class="p-2 text-gray-400 hover:text-indigo-600 hover:bg-indigo-50 rounded-lg transition cursor-pointer" title="Edit">
                                            <i class="fa-solid fa-pen-to-square text-xs"></i>
                                        </a>
                                        
                                        <!-- 删除按钮同理，建议也改为 <a> 标签 -->
                                        <a href="delete-schedule.php?id=01" aria-label="Edit schedule" onclick="return confirm('Are you sure?');" class="p-2 text-gray-400 hover:text-rose-600 hover:bg-rose-50 rounded-lg transition cursor-pointer" title="Delete">
                                            <i class="fa-solid fa-trash-can text-xs"></i>
                                        </a>
                                    </div>
                                </td>
                            </tr>

                        </tbody>
                    </table>
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