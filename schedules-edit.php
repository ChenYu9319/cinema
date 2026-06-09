<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Schedule - CineManage Pro</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body class="bg-gray-100 font-sans text-gray-800 flex h-screen overflow-hidden">

    <!-- 侧边栏导航 (保持一致) -->
    <aside class="w-64 bg-indigo-950 text-slate-300 flex flex-col justify-between hidden md:flex shrink-0">
        <div>
            <div class="p-5 flex items-center space-x-3 bg-slate-950 border-b border-indigo-900">
                <i class="fa-solid fa-calendar-days text-2xl text-amber-400"></i>
                <span class="text-xl font-bold tracking-wider text-white">CineManage</span>
            </div>
            <nav class="p-4 space-y-1.5">
                <a href="schedules.php" class="flex items-center space-x-3 bg-indigo-900 text-white px-4 py-2.5 rounded-lg font-medium transition">
                    <i class="fa-solid fa-calendar-days w-5 text-center text-amber-400"></i>
                    <span>Schedules</span>
                </a>
            </nav>
        </div>
    </aside>

    <!-- 主内容区 -->
    <div class="flex-1 flex flex-col overflow-y-auto">
        
        <!-- 顶栏 -->
        <header class="bg-white border-b border-gray-200 px-6 py-4 flex items-center justify-between shrink-0">
            <div>
                <div class="text-xs text-gray-400 mb-1 flex items-center space-x-2">
                    <a href="schedules.php" class="hover:text-indigo-600 transition">Schedules</a>
                    <i class="fa-solid fa-chevron-right text-[10px]"></i>
                    <span class="text-gray-900 font-medium">Edit Schedule</span>
                </div>
                <h1 class="text-xl font-bold text-gray-900">Edit Session #SCH-9921</h1>
            </div>
            <div class="flex items-center space-x-3">
                <a href="schedules.php" class="px-4 py-2.5 text-gray-600 hover:text-gray-900 text-sm font-semibold transition">Cancel</a>
                <button type="submit" form="edit-schedule-form" class="bg-indigo-600 hover:bg-indigo-700 text-white text-sm font-semibold px-4 py-2.5 rounded-xl shadow-xs transition">
                    Save Changes
                </button>
            </div>
        </header>

        <!-- 编辑表单区 -->
        <main class="p-6 max-w-4xl w-full mx-auto">
            <form id="edit-schedule-form" action="update-schedule.php" method="POST" class="bg-white p-8 rounded-xl border border-gray-100 shadow-xs">
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                    <!-- 左侧：关联选择 -->
                    <div class="space-y-6">
                        <div>
                            <label class="block text-xs font-bold text-gray-400 uppercase tracking-wider mb-2">Movie</label>
                            <select name="movie_id" class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-xl text-sm focus:border-indigo-600 focus:bg-white focus:ring-4 focus:ring-indigo-100/50 outline-hidden transition">
                                <option value="1">Inception</option>
                                <option value="2">Avatar: The Way of Water</option>
                            </select>
                        </div>
                        <div>
                            <label class="block text-xs font-bold text-gray-400 uppercase tracking-wider mb-2">Hall</label>
                            <select name="hall_id" class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-xl text-sm focus:border-indigo-600 focus:bg-white focus:ring-4 focus:ring-indigo-100/50 outline-hidden transition">
                                <option value="1">IMAX Hall A</option>
                                <option value="2">Standard Hall B</option>
                            </select>
                        </div>
                    </div>

                    <!-- 右侧：时间配置 -->
                    <div class="space-y-6">
                        <div>
                            <label class="block text-xs font-bold text-gray-400 uppercase tracking-wider mb-2">Show Date</label>
                            <input type="date" name="show_date" value="2026-06-15" class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-xl text-sm focus:border-indigo-600 focus:bg-white focus:ring-4 focus:ring-indigo-100/50 outline-hidden transition">
                        </div>
                        <div>
                            <label class="block text-xs font-bold text-gray-400 uppercase tracking-wider mb-2">Start Time</label>
                            <input type="time" name="start_time" value="14:30" class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-xl text-sm focus:border-indigo-600 focus:bg-white focus:ring-4 focus:ring-indigo-100/50 outline-hidden transition">
                        </div>
                    </div>
                </div>

                <!-- 底部辅助区 -->
                <div class="mt-8 pt-6 border-t border-gray-100 flex items-center justify-between">
                    <div class="text-xs text-gray-400">
                        * Ensure hall availability before saving changes.
                    </div>
                    <button type="button" class="text-rose-600 hover:text-rose-700 text-sm font-semibold flex items-center space-x-2 transition cursor-pointer">
                        <i class="fa-solid fa-trash-can"></i>
                        <span>Delete Schedule</span>
                    </button>
                </div>
            </form>
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