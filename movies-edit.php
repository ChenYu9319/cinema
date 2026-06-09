<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Movie - CineManage Pro</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body class="bg-gray-100 font-sans text-gray-800 flex h-screen overflow-hidden">

    <!-- 侧边栏导航 (保持一致) -->
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
        </div>
    </aside>

    <!-- 主内容区 -->
    <div class="flex-1 flex flex-col overflow-y-auto">
        
        <!-- 顶栏 -->
        <header class="bg-white border-b border-gray-200 px-6 py-4 flex items-center justify-between shrink-0">
            <div>
                <div class="text-xs text-gray-400 mb-1 flex items-center space-x-2">
                    <a href="movies.php" class="hover:text-indigo-600 transition">Movies</a>
                    <i class="fa-solid fa-chevron-right text-[10px]"></i>
                    <span class="text-gray-900 font-medium">Edit Movie</span>
                </div>
                <h1 class="text-xl font-bold text-gray-900">Inception</h1>
            </div>
            <div class="flex items-center space-x-3">
                <a href="movies.php" class="px-4 py-2.5 text-gray-600 hover:text-gray-900 text-sm font-semibold transition">Cancel</a>
                <button type="submit" form="edit-movie-form" class="bg-indigo-600 hover:bg-indigo-700 text-white text-sm font-semibold px-4 py-2.5 rounded-xl shadow-xs transition">
                    Save Changes
                </button>
            </div>
        </header>

        <!-- 编辑表单区 -->
        <main class="p-6 max-w-5xl w-full mx-auto">
            <form id="edit-movie-form" action="update-movie.php" method="POST" class="grid grid-cols-1 md:grid-cols-3 gap-6">
                
                <!-- 左侧主要信息 (2/3宽度) -->
                <div class="md:col-span-2 space-y-6">
                    <div class="bg-white p-6 rounded-xl border border-gray-100 shadow-xs">
                        <h3 class="text-sm font-bold text-gray-900 mb-5 border-b border-gray-50 pb-4">Movie Details</h3>
                        
                        <div class="space-y-4">
                            <div>
                                <label class="block text-xs font-bold text-gray-400 uppercase tracking-wider mb-1.5">Movie Title</label>
                                <input type="text" name="title" value="Inception" class="w-full px-4 py-2.5 bg-gray-50 border border-gray-200 rounded-xl text-sm focus:border-indigo-600 focus:bg-white focus:ring-4 focus:ring-indigo-100/50 transition outline-hidden">
                            </div>
                            
                            <div class="grid grid-cols-2 gap-4">
                                <div>
                                    <label class="block text-xs font-bold text-gray-400 uppercase tracking-wider mb-1.5">Duration (Mins)</label>
                                    <input type="number" name="duration" value="148" class="w-full px-4 py-2.5 bg-gray-50 border border-gray-200 rounded-xl text-sm focus:border-indigo-600 focus:bg-white focus:ring-4 focus:ring-indigo-100/50 transition outline-hidden">
                                </div>
                                <div>
                                    <label class="block text-xs font-bold text-gray-400 uppercase tracking-wider mb-1.5">Genre</label>
                                    <select name="genre" class="w-full px-4 py-2.5 bg-gray-50 border border-gray-200 rounded-xl text-sm focus:border-indigo-600 focus:bg-white focus:ring-4 focus:ring-indigo-100/50 transition outline-hidden">
                                        <option value="scifi" selected>Sci-Fi</option>
                                        <option value="action">Action</option>
                                        <option value="drama">Drama</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- 右侧边栏 (1/3宽度) -->
                <div class="space-y-6">
                    <div class="bg-white p-6 rounded-xl border border-gray-100 shadow-xs">
                        <h3 class="text-sm font-bold text-gray-900 mb-4">Display Status</h3>
                        <div class="space-y-3">
                            <select name="status" class="w-full px-4 py-2.5 bg-gray-50 border border-gray-200 rounded-xl text-sm outline-hidden">
                                <option value="showing" selected>Now Showing</option>
                                <option value="coming">Coming Soon</option>
                                <option value="archived">Archived</option>
                            </select>
                        </div>
                    </div>

                    <!-- 删除动作区 -->
                    <div class="bg-white p-6 rounded-xl border border-rose-100 shadow-xs">
                        <h3 class="text-sm font-bold text-rose-600 mb-2">Danger Zone</h3>
                        <p class="text-xs text-gray-500 mb-4">Once deleted, all schedules associated with this movie will be removed.</p>
                        <button type="button" class="w-full px-4 py-2.5 border border-rose-200 text-rose-600 hover:bg-rose-50 rounded-xl text-sm font-semibold transition cursor-pointer">
                            Delete Movie
                        </button>
                    </div>
                </div>

            </form>
        </main>
    </div>
</body>
</html>