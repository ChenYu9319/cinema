<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CineManage Pro - Movies</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body class="bg-gray-100 font-sans text-gray-800 flex h-screen overflow-hidden">

    <!-- 侧边栏导航 (修复：增加 ID 和移动端样式) -->
    <aside id="sidebar" class="fixed inset-y-0 left-0 z-50 w-64 bg-indigo-950 text-slate-300 flex flex-col justify-between transform -translate-x-full transition-transform duration-300 md:relative md:translate-x-0 shrink-0">
        <div>
            <div class="p-5 flex items-center justify-between bg-slate-950 border-b border-indigo-900">
                <div class="flex items-center space-x-3">
                    <i class="fa-solid fa-film text-2xl text-amber-400"></i>
                    <span class="text-xl font-bold tracking-wider text-white">CineManage</span>
                </div>
                <!-- 移动端关闭按钮 -->
                <button id="closeSidebarBtn" class="md:hidden text-slate-400 hover:text-white"><i class="fa-solid fa-xmark"></i></button>
            </div>
            <nav class="p-4 space-y-1.5">
                <a href="dashboard.php" class="flex items-center space-x-3 hover:bg-indigo-900/50 hover:text-white px-4 py-2.5 rounded-lg font-medium transition">
                    <i class="fa-solid fa-chart-pie w-5 text-center text-slate-400"></i>
                    <span>Dashboard</span>
                </a>
                <!-- ✨ 当前激活项切换为 Movies -->
                <a href="movies.php" class="flex items-center space-x-3 bg-indigo-900 text-white px-4 py-2.5 rounded-lg font-medium transition">
                    <i class="fa-solid fa-video w-5 text-center text-amber-400"></i>
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
            </nav>
        </div>
        <div class="p-4 px-5 border-t border-indigo-900 bg-slate-950/40 flex items-center justify-between shrink-0">
            <p class="text-sm font-semibold text-white truncate">Alan Admin</p>
            <a href="index.php" class="text-slate-400 hover:text-rose-500"><i class="fa-solid fa-arrow-right-from-bracket"></i></a>
        </div>
    </aside>

    <!-- 遮罩层 (修复：增加此元素以支持移动端点击空白关闭) -->
    <div id="sidebarOverlay" class="fixed inset-0 bg-slate-900/50 z-40 hidden opacity-0 transition-opacity duration-300 md:hidden"></div>

    <!-- 主内容区 -->
    <div class="flex-1 flex flex-col overflow-y-auto">
        <!-- 顶栏 -->
        <header class="bg-white border-b border-gray-200 px-6 py-4 flex justify-between items-center shrink-0">
            <div class="flex items-center space-x-4">
                <button id="openSidebarBtn" class="md:hidden text-gray-500 hover:text-indigo-600">
                    <i class="fa-solid fa-bars text-xl"></i>
                </button>
                <div>
                    <h1 class="text-xl font-bold text-gray-900">Movies Directory</h1>
                </div>
            </div>
            <button id="openModalBtn" class="bg-indigo-600 hover:bg-indigo-700 text-white text-sm font-medium px-4 py-2.5 rounded-xl shadow-xs flex items-center space-x-2 transition cursor-pointer">
                <i class="fa-solid fa-plus text-xs"></i>
                <span>Add New Movie</span>
            </button>
        </header>

        <!-- 列表区 -->
        <main class="p-6 max-w-7xl w-full mx-auto">
            <div class="bg-white rounded-xl border border-gray-100 shadow-xs overflow-hidden">
                <div class="overflow-x-auto">
                    <table class="w-full text-left border-collapse">
                        <thead>
                            <tr class="bg-gray-50/70 text-gray-500 text-xs font-bold uppercase tracking-wider border-b border-gray-100">
                                <th class="py-3 px-5">Movie Info</th>
                                <th class="py-3 px-5">Genre</th>
                                <th class="py-3 px-5">Duration</th>
                                <th class="py-3 px-5">Release Date</th>
                                <th class="py-3 px-5">Status</th>
                                <th class="py-3 px-5 text-right">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="text-sm divide-y divide-gray-100">
                            <!-- 电影 1 -->
                            <tr class="hover:bg-slate-50/80 transition">
                                <td class="py-3.5 px-5">
                                    <div class="flex items-center space-x-3">
                                        <div class="w-9 h-12 bg-slate-200 rounded-lg flex items-center justify-center text-slate-400 shrink-0 border border-gray-100 overflow-hidden">
                                            <i class="fa-solid fa-image text-xs"></i>
                                        </div>
                                        <div>
                                            <p class="font-semibold text-gray-900">Inception</p>
                                            <p class="text-xs text-gray-400 mt-0.5">ID: #MOV-001</p>
                                        </div>
                                    </div>
                                </td>
                                <td class="py-3.5 px-5">
                                    <span class="text-xs font-mono uppercase bg-blue-50 text-blue-700 px-2 py-0.5 rounded-md border border-blue-200/50 font-semibold">Sci-Fi</span>
                                </td>
                                <td class="py-3.5 px-5 text-gray-600 font-medium">148 Mins</td>
                                <td class="py-3.5 px-5 text-gray-500 text-xs">2010-07-16</td>
                                <td class="py-3.5 px-5">
                                    <span class="inline-flex items-center space-x-1.5 text-xs text-emerald-700 bg-emerald-50 px-2 py-0.5 rounded-md border border-emerald-200/50 font-medium">
                                        <span class="w-1.5 h-1.5 rounded-full bg-emerald-500"></span>
                                        <span>Now Showing</span>
                                    </span>
                                </td>
                                <td class="py-3.5 px-5 text-right">
                                    <a href="movies-edit.php?id=1" class="inline-flex items-center space-x-1 text-indigo-600 hover:text-indigo-900 font-semibold text-xs transition">
                                        <i class="fa-solid fa-pen-to-square text-[10px]"></i>
                                        <span>Edit</span>
                                    </a>
                                </td>
                            </tr>
                            
                            <!-- 电影 2 -->
                            <tr class="hover:bg-slate-50/80 transition">
                                <td class="py-3.5 px-5">
                                    <div class="flex items-center space-x-3">
                                        <div class="w-9 h-12 bg-slate-200 rounded-lg flex items-center justify-center text-slate-400 shrink-0 border border-gray-100 overflow-hidden">
                                            <i class="fa-solid fa-image text-xs"></i>
                                        </div>
                                        <div>
                                            <p class="font-semibold text-gray-900">Avatar: The Way of Water</p>
                                            <p class="text-xs text-gray-400 mt-0.5">ID: #MOV-002</p>
                                        </div>
                                    </div>
                                </td>
                                <td class="py-3.5 px-5">
                                    <span class="text-xs font-mono uppercase bg-purple-50 text-purple-700 px-2 py-0.5 rounded-md border border-purple-200/50 font-semibold">Action</span>
                                </td>
                                <td class="py-3.5 px-5 text-gray-600 font-medium">192 Mins</td>
                                <td class="py-3.5 px-5 text-gray-500 text-xs">2022-12-16</td>
                                <td class="py-3.5 px-5">
                                    <span class="inline-flex items-center space-x-1.5 text-xs text-amber-700 bg-amber-50 px-2 py-0.5 rounded-md border border-amber-200/50 font-medium">
                                        <span class="w-1.5 h-1.5 rounded-full bg-amber-500 animate-pulse"></span>
                                        <span>Coming Soon</span>
                                    </span>
                                </td>
                                <td class="py-3.5 px-5 text-right">
                                    <a href="movies-edit.php?id=2" class="inline-flex items-center space-x-1 text-indigo-600 hover:text-indigo-900 font-semibold text-xs transition">
                                        <i class="fa-solid fa-pen-to-square text-[10px]"></i>
                                        <span>Edit</span>
                                    </a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </main>
    </div>

    <!-- ================= 新增电影弹窗 MODAL ================= -->
    <div id="newHallModal" class="fixed inset-0 bg-slate-900/60 backdrop-blur-xs flex items-center justify-center z-50 hidden transition-all duration-300">
        <div class="bg-white rounded-2xl border border-gray-100 shadow-xl max-w-md w-full m-4 overflow-hidden transform transition-all scale-95 opacity-0 duration-300" id="modalContainer">
            
            <!-- 头部 -->
            <div class="px-6 py-4 border-b border-gray-100 flex items-center justify-between bg-gray-50/50">
                <div>
                    <h3 class="text-base font-bold text-gray-900">Add New Movie</h3>
                    <p class="text-xs text-gray-500 mt-0.5">Register a new cinematic asset into the active catalog.</p>
                </div>
                <button id="closeModalBtn" class="text-gray-400 hover:text-gray-600 p-1.5 hover:bg-gray-100 rounded-lg transition cursor-pointer">
                    <i class="fa-solid fa-xmark text-sm"></i>
                </button>
            </div>

            <!-- 表单主体 -->
            <form action="movies.php" method="POST" class="p-6 space-y-4">
                
                <!-- 电影名称 -->
                <div>
                    <label class="block text-xs font-bold text-gray-400 tracking-wider uppercase mb-1.5">Movie Title</label>
                    <div class="relative">
                        <span class="absolute inset-y-0 left-0 flex items-center pl-3.5 text-gray-400 pointer-events-none text-xs">
                            <i class="fa-solid fa-clapperboard"></i>
                        </span>
                        <input type="text" name="movie_title" required placeholder="e.g., Interstellar" 
                            class="w-full pl-9 pr-4 py-2.5 bg-gray-50 border border-gray-200 rounded-xl text-sm text-gray-900 focus:outline-hidden focus:border-indigo-600 focus:bg-white focus:ring-4 focus:ring-indigo-100/50 transition">
                    </div>
                </div>

                <!-- 语言与时长（双列并排） -->
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="block text-xs font-bold text-gray-400 tracking-wider uppercase mb-1.5">Duration (Mins)</label>
                        <div class="relative">
                            <span class="absolute inset-y-0 left-0 flex items-center pl-3.5 text-gray-400 pointer-events-none text-xs">
                                <i class="fa-regular fa-clock"></i>
                            </span>
                            <input type="number" name="duration" required placeholder="e.g., 120" 
                                class="w-full pl-9 pr-4 py-2.5 bg-gray-50 border border-gray-200 rounded-xl text-sm text-gray-900 focus:outline-hidden focus:border-indigo-600 focus:bg-white focus:ring-4 focus:ring-indigo-100/50 transition">
                        </div>
                    </div>
                    <div>
                        <label class="block text-xs font-bold text-gray-400 tracking-wider uppercase mb-1.5">Genre</label>
                        <select name="genre" class="w-full px-3 py-2.5 bg-gray-50 border border-gray-200 rounded-xl text-sm text-gray-900 focus:outline-hidden focus:border-indigo-600 focus:bg-white focus:ring-4 focus:ring-indigo-100/50 transition">
                            <option value="action">Action</option>
                            <option value="scifi">Sci-Fi</option>
                            <option value="drama">Drama</option>
                            <option value="comedy">Comedy</option>
                        </select>
                    </div>
                </div>

                <!-- 上映日期 -->
                <div>
                    <label class="block text-xs font-bold text-gray-400 tracking-wider uppercase mb-1.5">Release Date</label>
                    <div class="relative">
                        <span class="absolute inset-y-0 left-0 flex items-center pl-3.5 text-gray-400 pointer-events-none text-xs">
                            <i class="fa-solid fa-calendar-day"></i>
                        </span>
                        <input type="date" name="release_date" required 
                            class="w-full pl-9 pr-4 py-2.5 bg-gray-50 border border-gray-200 rounded-xl text-sm text-gray-900 focus:outline-hidden focus:border-indigo-600 focus:bg-white focus:ring-4 focus:ring-indigo-100/50 transition">
                    </div>
                </div>

                <!-- 状态选择 -->
                <div>
                    <label class="block text-xs font-bold text-gray-400 tracking-wider uppercase mb-1.5">Status</label>
                    <select name="status" class="w-full px-3 py-2.5 bg-gray-50 border border-gray-200 rounded-xl text-sm text-gray-900 focus:outline-hidden focus:border-indigo-600 focus:bg-white focus:ring-4 focus:ring-indigo-100/50 transition">
                        <option value="showing">Now Showing</option>
                        <option value="coming">Coming Soon</option>
                        <option value="archived">Archived</option>
                    </select>
                </div>

                <!-- 底部操作按钮 -->
                <div class="pt-4 border-t border-gray-100 flex items-center justify-end space-x-3">
                    <button type="button" id="cancelModalBtn" class="px-4 py-2.5 bg-white border border-gray-200 text-gray-700 rounded-xl text-xs font-semibold hover:bg-gray-50 transition text-center cursor-pointer">
                        Cancel
                    </button>
                    <button type="submit" class="px-4 py-2.5 bg-indigo-600 hover:bg-indigo-700 text-white rounded-xl text-xs font-semibold shadow-xs hover:shadow-md transition cursor-pointer flex items-center space-x-1.5">
                        <i class="fa-solid fa-plus text-[10px]"></i>
                        <span>Add Movie</span>
                    </button>
                </div>

            </form>
        </div>
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
    <!-- ================= 交互控制 JavaScript ================= -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const openBtn = document.getElementById('openModalBtn');
            const closeBtn = document.getElementById('closeModalBtn');
            const cancelBtn = document.getElementById('cancelModalBtn');
            const modal = document.getElementById('newHallModal');
            const container = document.getElementById('modalContainer');

            function openModal() {
                modal.classList.remove('hidden');
                setTimeout(() => {
                    container.classList.remove('scale-95', 'opacity-0');
                    container.classList.add('scale-100', 'opacity-100');
                }, 20);
            }

            function closeModal() {
                container.classList.remove('scale-100', 'opacity-100');
                container.classList.add('scale-95', 'opacity-0');
                setTimeout(() => {
                    modal.classList.add('hidden');
                }, 300);
            }

            if (openBtn) openBtn.addEventListener('click', openModal);
            if (closeBtn) closeBtn.addEventListener('click', closeModal);
            if (cancelBtn) cancelBtn.addEventListener('click', closeModal);

            modal.addEventListener('click', function(e) {
                if (e.target === modal) {
                    closeModal();
                }
            });
        });
    </script>
</body>
</html>