<?php
// ================= 1. 建立数据库连接 =================
try {
    $db = new PDO("mysql:host=localhost;dbname=cinema", "root", "");
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Database connection failed: " . $e->getMessage());
}

// ================= 2. 处理表单提交 (新增电影) =================
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // 获取表单数据，严格对应你的表字段
    $title         = $_POST['title'] ?? '';
    $description   = $_POST['description'] ?? '';
    $director_name = $_POST['director_name'] ?? '';
    $release_date  = $_POST['release_date'] ?? '';
    $end_date      = $_POST['end_date'] ?? '';
    $duration      = $_POST['duration'] ?? 0;

    if (!empty($title)) {
        try {
            // 只保留你指定的 6 个插入字段（id 为自增）
            $sql = "INSERT INTO movies (title, description, director_name, release_date, end_date, duration) 
                    VALUES (?, ?, ?, ?, ?, ?)";
            $stmt = $db->prepare($sql);
            $stmt->execute([$title, $description, $director_name, $release_date, $end_date, $duration]);
            
            header("Location: movies.php");
            exit;
        } catch (PDOException $e) {
            echo "<script>alert('Error saving record: " . addslashes($e->getMessage()) . "');</script>";
        }
    }
}

// ================= 3. 读取电影列表 =================
try {
    $query = $db->query("SELECT * FROM movies ORDER BY id DESC");
    $movies = $query->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    die("Query failed: " . $e->getMessage());
}
?>
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

    <!-- 侧边栏导航 -->
    <aside id="sidebar" class="fixed inset-y-0 left-0 z-50 w-64 bg-indigo-950 text-slate-300 flex flex-col justify-between transform -translate-x-full transition-transform duration-300 md:relative md:translate-x-0 shrink-0 border-r border-indigo-900/30">
        <div>
            <div class="p-5 flex items-center justify-between bg-slate-950 border-b border-indigo-900">
                <div class="flex items-center space-x-3">
                    <i class="fa-solid fa-film text-2xl text-amber-400"></i>
                    <span class="text-xl font-bold tracking-wider text-white">CineManage</span>
                </div>
                <button id="closeSidebarBtn" class="md:hidden text-slate-400 hover:text-white p-2 cursor-pointer">
                    <i class="fa-solid fa-xmark text-lg"></i>
                </button>
            </div>
            <nav class="p-4 space-y-1.5">
                <a href="dashboard.php" class="flex items-center space-x-3 hover:bg-indigo-900/50 hover:text-white px-4 py-2.5 rounded-lg font-medium transition">
                    <i class="fa-solid fa-chart-pie w-5 text-center text-slate-400"></i>
                    <span>Dashboard</span>
                </a>
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
        <div class="p-4 px-5 border-t border-indigo-900 bg-slate-950/40 flex items-center justify-between shrink-0">
            <p class="text-sm font-semibold text-white truncate">Alan Admin</p>
            <a href="index.php" class="text-slate-400 hover:text-rose-500 transition"><i class="fa-solid fa-arrow-right-from-bracket"></i></a>
        </div>
    </aside>

    <!-- 移动端侧边栏遮罩层 -->
    <div id="sidebarOverlay" class="fixed inset-0 bg-slate-950/40 z-40 hidden opacity-0 transition-opacity duration-300 md:hidden backdrop-blur-xs"></div>

    <!-- 主内容区 -->
    <div class="flex-1 flex flex-col overflow-y-auto">
        <!-- 顶栏 -->
        <header class="bg-white border-b border-gray-200 px-6 py-4 flex justify-between items-center shrink-0">
            <div class="flex items-center space-x-4">
                <button id="openSidebarBtn" class="md:hidden text-gray-500 hover:text-indigo-600 p-1 rounded-lg hover:bg-gray-100 transition cursor-pointer">
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
                                <th class="py-3 px-5">Movie Title</th>
                                <th class="py-3 px-5">Director</th>
                                <th class="py-3 px-5">Duration</th>
                                <th class="py-3 px-5">Release Date</th>
                                <th class="py-3 px-5">End Date</th>
                                <th class="py-3 px-5">Description</th>
                                <th class="py-3 px-5 text-right">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="text-sm divide-y divide-gray-100">
                            <?php if (empty($movies)): ?>
                                <tr>
                                    <td colspan="7" class="py-8 text-center text-gray-400 font-medium">
                                        <i class="fa-solid fa-inbox block text-2xl mb-2 text-gray-300"></i>
                                        No movies found. Click "Add New Movie" to get started!
                                    </td>
                                </tr>
                            <?php else: ?>
                                <?php foreach ($movies as $movie): ?>
                                    <tr class="hover:bg-slate-50/80 transition">
                                        <!-- 电影标题与 ID -->
                                        <td class="py-3.5 px-5">
                                            <div class="flex items-center space-x-3">
                                                <div class="w-9 h-12 bg-slate-200 rounded-lg flex items-center justify-center text-slate-400 shrink-0 border border-gray-100 overflow-hidden">
                                                    <i class="fa-solid fa-image text-xs"></i>
                                                </div>
                                                <div>
                                                    <p class="font-semibold text-gray-900"><?= htmlspecialchars($movie['title']) ?></p>
                                                    <p class="text-xs text-gray-400 mt-0.5">ID: #MOV-<?= str_pad($movie['id'], 3, '0', STR_PAD_LEFT) ?></p>
                                                </div>
                                            </div>
                                        </td>
                                        <!-- 导演 -->
                                        <td class="py-3.5 px-5 text-gray-700 font-medium">
                                            <?= htmlspecialchars($movie['director_name']) ?>
                                        </td>
                                        <!-- 时长 -->
                                        <td class="py-3.5 px-5 text-gray-600 font-mono">
                                            <?= htmlspecialchars($movie['duration']) ?> Mins
                                        </td>
                                        <!-- 上映日期 -->
                                        <td class="py-3.5 px-5 text-gray-500 text-xs">
                                            <?= htmlspecialchars($movie['release_date']) ?>
                                        </td>
                                        <!-- 结束日期 -->
                                        <td class="py-3.5 px-5 text-gray-500 text-xs">
                                            <?= htmlspecialchars($movie['end_date']) ?>
                                        </td>
                                        <!-- 电影简介 (限制最大宽度并多出部分显示省略号) -->
                                        <td class="py-3.5 px-5 text-gray-400 text-xs max-w-xs truncate">
                                            <?= htmlspecialchars($movie['description'] ?: 'No description provided.') ?>
                                        </td>
                                        <!-- 操作 -->
                                        <td class="py-3.5 px-5 text-right">
                                            <a href="movies-edit.php?id=<?= $movie['id'] ?>" class="inline-flex items-center space-x-1 text-indigo-600 hover:text-indigo-900 font-semibold text-xs transition">
                                                <i class="fa-solid fa-pen-to-square text-[10px]"></i>
                                                <span>Edit</span>
                                            </a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </main>
    </div>

    <!-- ================= 新增电影弹窗 MODAL ================= -->
    <div id="newMovieModal" class="fixed inset-0 bg-slate-900/60 backdrop-blur-xs flex items-center justify-center z-50 hidden transition-all duration-300">
        <div class="bg-white rounded-2xl border border-gray-100 shadow-xl max-w-lg w-full m-4 overflow-hidden transform transition-all scale-95 opacity-0 duration-300" id="modalContainer">
            
            <div class="px-6 py-4 border-b border-gray-100 flex items-center justify-between bg-gray-50/50">
                <div>
                    <h3 class="text-base font-bold text-gray-900">Add New Movie</h3>
                    <p class="text-xs text-gray-500 mt-0.5">Register a new cinematic asset into the active catalog.</p>
                </div>
                <button id="closeModalBtn" class="text-gray-400 hover:text-gray-600 p-1.5 hover:bg-gray-100 rounded-lg transition cursor-pointer">
                    <i class="fa-solid fa-xmark text-sm"></i>
                </button>
            </div>

            <!-- 表单提交 -->
            <form action="movies.php" method="POST" class="p-6 space-y-4">
                
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <!-- Title -->
                    <div>
                        <label class="block text-xs font-bold text-gray-400 tracking-wider uppercase mb-1.5">Movie Title</label>
                        <div class="relative">
                            <span class="absolute inset-y-0 left-0 flex items-center pl-3.5 text-gray-400 pointer-events-none text-xs">
                                <i class="fa-solid fa-clapperboard"></i>
                            </span>
                            <input type="text" name="title" required placeholder="e.g., Interstellar" 
                                class="w-full pl-9 pr-4 py-2.5 bg-gray-50 border border-gray-200 rounded-xl text-sm text-gray-900 focus:outline-none focus:border-indigo-600 focus:bg-white focus:ring-4 focus:ring-indigo-100/50 transition">
                        </div>
                    </div>
                    <!-- Director -->
                    <div>
                        <label class="block text-xs font-bold text-gray-400 tracking-wider uppercase mb-1.5">Director Name</label>
                        <div class="relative">
                            <span class="absolute inset-y-0 left-0 flex items-center pl-3.5 text-gray-400 pointer-events-none text-xs">
                                <i class="fa-solid fa-user-gear"></i>
                            </span>
                            <input type="text" name="director_name" required placeholder="e.g., Christopher Nolan" 
                                class="w-full pl-9 pr-4 py-2.5 bg-gray-50 border border-gray-200 rounded-xl text-sm text-gray-900 focus:outline-none focus:border-indigo-600 focus:bg-white focus:ring-4 focus:ring-indigo-100/50 transition">
                        </div>
                    </div>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
                    <!-- Duration -->
                    <div class="sm:col-span-1">
                        <label class="block text-xs font-bold text-gray-400 tracking-wider uppercase mb-1.5">Duration (Mins)</label>
                        <div class="relative">
                            <span class="absolute inset-y-0 left-0 flex items-center pl-3.5 text-gray-400 pointer-events-none text-xs">
                                <i class="fa-regular fa-clock"></i>
                            </span>
                            <input type="number" name="duration" required placeholder="e.g., 120" 
                                class="w-full pl-9 pr-4 py-2.5 bg-gray-50 border border-gray-200 rounded-xl text-sm text-gray-900 focus:outline-none focus:border-indigo-600 focus:bg-white focus:ring-4 focus:ring-indigo-100/50 transition">
                        </div>
                    </div>
                    <!-- Release Date -->
                    <div class="sm:col-span-1">
                        <label class="block text-xs font-bold text-gray-400 tracking-wider uppercase mb-1.5">Release Date</label>
                        <div class="relative">
                            <span class="absolute inset-y-0 left-0 flex items-center pl-3.5 text-gray-400 pointer-events-none text-xs">
                                <i class="fa-solid fa-calendar-day"></i>
                            </span>
                            <input type="date" name="release_date" required 
                                class="w-full pl-9 pr-4 py-2.5 bg-gray-50 border border-gray-200 rounded-xl text-sm text-gray-900 focus:outline-none focus:border-indigo-600 focus:bg-white focus:ring-4 focus:ring-indigo-100/50 transition">
                        </div>
                    </div>
                    <!-- End Date -->
                    <div class="sm:col-span-1">
                        <label class="block text-xs font-bold text-gray-400 tracking-wider uppercase mb-1.5">End Date</label>
                        <div class="relative">
                            <span class="absolute inset-y-0 left-0 flex items-center pl-3.5 text-gray-400 pointer-events-none text-xs">
                                <i class="fa-solid fa-calendar-xmark"></i>
                            </span>
                            <input type="date" name="end_date" required 
                                class="w-full pl-9 pr-4 py-2.5 bg-gray-50 border border-gray-200 rounded-xl text-sm text-gray-900 focus:outline-none focus:border-indigo-600 focus:bg-white focus:ring-4 focus:ring-indigo-100/50 transition">
                        </div>
                    </div>
                </div>

                <!-- Description (取代了原先的分类与状态) -->
                <div>
                    <label class="block text-xs font-bold text-gray-400 tracking-wider uppercase mb-1.5">Description</label>
                    <textarea name="description" rows="3" placeholder="Enter movie synopsis or description here..." 
                        class="w-full px-3 py-2 bg-gray-50 border border-gray-200 rounded-xl text-sm text-gray-900 focus:outline-none focus:border-indigo-600 focus:bg-white focus:ring-4 focus:ring-indigo-100/50 transition resize-none"></textarea>
                </div>

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

    <!-- JavaScript 交互 -->
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            // ----- 1. 移动端侧边栏 -----
            const openSidebarBtn = document.getElementById('openSidebarBtn');
            const closeSidebarBtn = document.getElementById('closeSidebarBtn');
            const sidebar = document.getElementById('sidebar');
            const sidebarOverlay = document.getElementById('sidebarOverlay');

            function toggleSidebar(isOpen) {
                if (isOpen) {
                    sidebar.classList.remove('-translate-x-full');
                    sidebarOverlay.classList.remove('hidden');
                    setTimeout(() => sidebarOverlay.classList.add('opacity-100'), 20);
                } else {
                    sidebar.classList.add('-translate-x-full');
                    sidebarOverlay.classList.remove('opacity-100');
                    setTimeout(() => sidebarOverlay.classList.add('hidden'), 300);
                }
            }

            openSidebarBtn?.addEventListener('click', () => toggleSidebar(true));
            closeSidebarBtn?.addEventListener('click', () => toggleSidebar(false));
            sidebarOverlay?.addEventListener('click', () => toggleSidebar(false));

            // ----- 2. 电影弹窗 -----
            const openModalBtn = document.getElementById('openModalBtn');
            const closeModalBtn = document.getElementById('closeModalBtn');
            const cancelModalBtn = document.getElementById('cancelModalBtn');
            const movieModal = document.getElementById('newMovieModal');
            const modalContainer = document.getElementById('modalContainer');

            function openModal() {
                movieModal.classList.remove('hidden');
                setTimeout(() => {
                    modalContainer.classList.remove('scale-95', 'opacity-0');
                    modalContainer.classList.add('scale-100', 'opacity-100');
                }, 20);
            }

            function closeModal() {
                modalContainer.classList.remove('scale-100', 'opacity-100');
                modalContainer.classList.add('scale-95', 'opacity-0');
                setTimeout(() => {
                    movieModal.classList.add('hidden');
                }, 300);
            }

            if (openModalBtn) openModalBtn.addEventListener('click', openModal);
            if (closeModalBtn) closeModalBtn.addEventListener('click', closeModal);
            if (cancelModalBtn) cancelModalBtn.addEventListener('click', closeModal);

            movieModal?.addEventListener('click', (e) => {
                if (e.target === movieModal) closeModal();
            });
        });
    </script>
</body>
</html>