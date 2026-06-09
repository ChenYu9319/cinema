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

    <!-- 侧边栏 (保持一致) -->
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
                <a href="halls.php" class="flex items-center space-x-3 bg-indigo-900 text-white px-4 py-2.5 rounded-lg font-medium transition">
                    <i class="fa-solid fa-door-open w-5 text-center text-amber-400"></i>
                    <span>Halls</span>
                </a>
                <!-- ... 其他导航 ... -->
            </nav>
        </div>
    </aside>

    <!-- 主体区域 -->
    <div class="flex-1 flex flex-col overflow-y-auto">
        <header class="bg-white border-b border-gray-200 px-6 py-4 flex items-center justify-between">
            <div>
                <div class="text-xs text-gray-400 mb-1">Halls / Configuration</div>
                <h1 class="text-xl font-bold text-gray-900">Configure Hall 2 (IMAX)</h1>
            </div>
            <a href="halls.php" class="text-sm text-gray-500 hover:text-indigo-600 font-medium">Cancel & Return</a>
        </header>

        <main class="p-6 max-w-5xl mx-auto w-full grid grid-cols-1 lg:grid-cols-3 gap-6">
            
            <!-- 左侧：基础参数配置 -->
            <div class="lg:col-span-2 space-y-6">
                <div class="bg-white p-6 rounded-xl border border-gray-100 shadow-xs">
                    <h3 class="text-sm font-bold text-gray-900 mb-5 flex items-center">
                        <i class="fa-solid fa-sliders mr-2 text-indigo-500"></i> Technical Settings
                    </h3>
                    <form class="space-y-4">
                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <label class="block text-[10px] font-bold text-gray-400 uppercase mb-1">Hall Name</label>
                                <input type="text" value="Hall 2" class="w-full border border-gray-200 rounded-lg px-3 py-2 text-sm">
                            </div>
                            <div>
                                <label class="block text-[10px] font-bold text-gray-400 uppercase mb-1">Total Capacity</label>
                                <input type="number" value="120" class="w-full border border-gray-200 rounded-lg px-3 py-2 text-sm">
                            </div>
                        </div>

                        <div>
                            <label class="block text-[10px] font-bold text-gray-400 uppercase mb-2">Capabilities</label>
                            <div class="flex flex-wrap gap-2">
                                <label class="flex items-center px-3 py-2 bg-indigo-50 border border-indigo-200 rounded-lg cursor-pointer">
                                    <input type="checkbox" checked class="accent-indigo-600 mr-2">
                                    <span class="text-xs font-semibold text-indigo-900">IMAX 4K</span>
                                </label>
                                <label class="flex items-center px-3 py-2 bg-gray-50 border border-gray-200 rounded-lg cursor-pointer">
                                    <input type="checkbox" checked class="accent-indigo-600 mr-2">
                                    <span class="text-xs font-semibold text-gray-700">Dolby Atmos</span>
                                </label>
                                <label class="flex items-center px-3 py-2 bg-gray-50 border border-gray-200 rounded-lg cursor-pointer">
                                    <input type="checkbox" class="accent-indigo-600 mr-2">
                                    <span class="text-xs font-semibold text-gray-700">3D Support</span>
                                </label>
                            </div>
                        </div>
                    </form>
                </div>

                <!-- 座位预览简图 -->
                <div class="bg-white p-6 rounded-xl border border-gray-100 shadow-xs">
                    <h3 class="text-sm font-bold text-gray-900 mb-4">Seating Layout Preview</h3>
                    <div class="border-2 border-dashed border-gray-200 rounded-lg p-8 flex flex-col items-center justify-center space-y-4">
                        <div class="w-32 h-2 bg-gray-300 rounded-full"></div>
                        <p class="text-[10px] text-gray-400 uppercase tracking-widest font-bold">Screen Direction</p>
                        <div class="grid grid-cols-10 gap-1.5 opacity-60">
                            <!-- 模拟座位 -->
                            <?php for($i=0; $i<40; $i++): ?>
                                <div class="w-4 h-4 bg-indigo-200 rounded-sm"></div>
                            <?php endfor; ?>
                        </div>
                    </div>
                </div>
            </div>

            <!-- 右侧：状态面板 -->
            <div class="space-y-6">
                <div class="bg-indigo-900 p-6 rounded-xl text-white shadow-lg">
                    <h3 class="text-xs font-bold uppercase tracking-wider mb-4 opacity-70">Current Status</h3>
                    <div class="text-3xl font-black mb-1">Active</div>
                    <p class="text-xs text-indigo-200">This hall is currently available for scheduling.</p>
                    
                    <button class="mt-6 w-full py-2.5 bg-indigo-600 hover:bg-indigo-500 rounded-lg text-sm font-semibold transition">
                        Update Configuration
                    </button>
                    <button class="mt-3 w-full py-2.5 text-rose-300 hover:text-rose-200 text-sm font-medium transition">
                        Deactivate Hall
                    </button>
                </div>
            </div>
        </main>
    </div>
</body>
</html>