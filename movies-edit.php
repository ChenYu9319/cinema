<?php
// ================= 1. 建立数据库连接 =================
try {
    $db = new PDO("mysql:host=localhost;dbname=cinema", "root", "");
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Database connection failed: " . $e->getMessage());
}

// 获取有效的电影 ID，若没有则退回主页
$id = $_GET['id'] ?? null;
if (!$id) {
    header("Location: movies.php");
    exit;
}

// ================= 2. 处理表单提交 (更新电影) =================
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['update_movie'])) {
    $title         = $_POST['title'] ?? '';
    $description   = $_POST['description'] ?? '';
    $director_name = $_POST['director_name'] ?? '';
    $release_date  = $_POST['release_date'] ?? '';
    $end_date      = $_POST['end_date'] ?? '';
    $duration      = $_POST['duration'] ?? 0;

    if (!empty($title)) {
        try {
            // 严格对应你指定的表结构进行更新
            $sql = "UPDATE movies SET title = ?, description = ?, director_name = ?, release_date = ?, end_date = ?, duration = ? WHERE id = ?";
            $stmt = $db->prepare($sql);
            $stmt->execute([$title, $description, $director_name, $release_date, $end_date, $duration, $id]);
            
            header("Location: movies.php");
            exit;
        } catch (PDOException $e) {
            echo "<script>alert('Error updating record: " . addslashes($e->getMessage()) . "');</script>";
        }
    }
}

// ================= 3. 处理电影删除 =================
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['delete_movie'])) {
    try {
        $sql = "DELETE FROM movies WHERE id = ?";
        $stmt = $db->prepare($sql);
        $stmt->execute([$id]);
        
        header("Location: movies.php");
        exit;
    } catch (PDOException $e) {
        echo "<script>alert('Error deleting record: " . addslashes($e->getMessage()) . "');</script>";
    }
}

// ================= 4. 读取当前电影数据 =================
try {
    $stmt = $db->prepare("SELECT * FROM movies WHERE id = ?");
    $stmt->execute([$id]);
    $movie = $stmt->fetch(PDO::FETCH_ASSOC);
    
    // 如果找不到对应 ID 的电影，退回主页
    if (!$movie) {
        header("Location: movies.php");
        exit;
    }
} catch (PDOException $e) {
    die("Query failed: " . $e->getMessage());
}
?>
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

    <!-- 侧边栏导航 (已同步响应式设计) -->
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
        <header class="bg-white border-b border-gray-200 px-6 py-4 flex items-center justify-between shrink-0">
            <div class="flex items-center space-x-4">
                <button id="openSidebarBtn" class="md:hidden text-gray-500 hover:text-indigo-600 p-1 rounded-lg hover:bg-gray-100 transition cursor-pointer">
                    <i class="fa-solid fa-bars text-xl"></i>
                </button>
                <div>
                    <div class="text-xs text-gray-400 mb-1 flex items-center space-x-2">
                        <a href="movies.php" class="hover:text-indigo-600 transition">Movies</a>
                        <i class="fa-solid fa-chevron-right text-[10px]"></i>
                        <span class="text-gray-900 font-medium">Edit Movie</span>
                    </div>
                    <!-- 动态绑定当前电影标题 -->
                    <h1 class="text-xl font-bold text-gray-900"><?= htmlspecialchars($movie['title']) ?></h1>
                </div>
            </div>
            <div class="flex items-center space-x-3">
                <a href="movies.php" class="px-4 py-2.5 text-gray-600 hover:text-gray-900 text-sm font-semibold transition">Cancel</a>
                <!-- 提交主编辑表单 -->
                <button type="submit" form="edit-movie-form" class="bg-indigo-600 hover:bg-indigo-700 text-white text-sm font-semibold px-4 py-2.5 rounded-xl shadow-xs transition cursor-pointer">
                    Save Changes
                </button>
            </div>
        </header>

        <!-- 编辑表单区 -->
        <main class="p-6 max-w-5xl w-full mx-auto">
            <!-- 提交到当前页面，并携带参数 id -->
            <form id="edit-movie-form" action="movies-edit.php?id=<?= $id ?>" method="POST" class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <!-- 用于告知 PHP 执行更新操作的隐藏标识 -->
                <input type="hidden" name="update_movie" value="1">
                
                <!-- 左侧主要信息 (2/3宽度) -->
                <div class="md:col-span-2 space-y-6">
                    <div class="bg-white p-6 rounded-xl border border-gray-100 shadow-xs">
                        <h3 class="text-sm font-bold text-gray-900 mb-5 border-b border-gray-50 pb-4">Movie Details</h3>
                        
                        <div class="space-y-4">
                            <!-- Movie Title -->
                            <div>
                                <label class="block text-xs font-bold text-gray-400 uppercase tracking-wider mb-1.5">Movie Title</label>
                                <input type="text" name="title" required value="<?= htmlspecialchars($movie['title']) ?>" class="w-full px-4 py-2.5 bg-gray-50 border border-gray-200 rounded-xl text-sm focus:border-indigo-600 focus:bg-white focus:ring-4 focus:ring-indigo-100/50 transition outline-hidden">
                            </div>

                            <!-- Director Name -->
                            <div>
                                <label class="block text-xs font-bold text-gray-400 uppercase tracking-wider mb-1.5">Director Name</label>
                                <input type="text" name="director_name" required value="<?= htmlspecialchars($movie['director_name']) ?>" class="w-full px-4 py-2.5 bg-gray-50 border border-gray-200 rounded-xl text-sm focus:border-indigo-600 focus:bg-white focus:ring-4 focus:ring-indigo-100/50 transition outline-hidden">
                            </div>
                            
                            <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
                                <!-- Duration -->
                                <div>
                                    <label class="block text-xs font-bold text-gray-400 uppercase tracking-wider mb-1.5">Duration (Mins)</label>
                                    <input type="number" name="duration" required value="<?= htmlspecialchars($movie['duration']) ?>" class="w-full px-4 py-2.5 bg-gray-50 border border-gray-200 rounded-xl text-sm focus:border-indigo-600 focus:bg-white focus:ring-4 focus:ring-indigo-100/50 transition outline-hidden">
                                </div>
                                <!-- Release Date -->
                                <div>
                                    <label class="block text-xs font-bold text-gray-400 uppercase tracking-wider mb-1.5">Release Date</label>
                                    <input type="date" name="release_date" required value="<?= htmlspecialchars($movie['release_date']) ?>" class="w-full px-4 py-2.5 bg-gray-50 border border-gray-200 rounded-xl text-sm focus:border-indigo-600 focus:bg-white focus:ring-4 focus:ring-indigo-100/50 transition outline-hidden">
                                </div>
                                <!-- End Date -->
                                <div>
                                    <label class="block text-xs font-bold text-gray-400 uppercase tracking-wider mb-1.5">End Date</label>
                                    <input type="date" name="end_date" required value="<?= htmlspecialchars($movie['end_date']) ?>" class="w-full px-4 py-2.5 bg-gray-50 border border-gray-200 rounded-xl text-sm focus:border-indigo-600 focus:bg-white focus:ring-4 focus:ring-indigo-100/50 transition outline-hidden">
                                </div>
                            </div>

                            <!-- Description -->
                            <div>
                                <label class="block text-xs font-bold text-gray-400 uppercase tracking-wider mb-1.5">Description</label>
                                <textarea name="description" rows="5" placeholder="Enter movie synopsis..." class="w-full px-4 py-2.5 bg-gray-50 border border-gray-200 rounded-xl text-sm focus:border-indigo-600 focus:bg-white focus:ring-4 focus:ring-indigo-100/50 transition resize-none outline-hidden"><?= htmlspecialchars($movie['description']) ?></textarea>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- 右侧边栏 (1/3宽度) -->
                <div class="space-y-6">
                    <!-- 资产信息卡片 -->
                    <div class="bg-white p-6 rounded-xl border border-gray-100 shadow-xs">
                        <h3 class="text-sm font-bold text-gray-900 mb-2">Asset Context</h3>
                        <p class="text-xs text-gray-400">System database references for this entry.</p>
                        <div class="mt-4 pt-4 border-t border-gray-50 space-y-2 text-xs">
                            <div class="flex justify-between"><span class="text-gray-400">Internal ID:</span> <span class="font-mono text-gray-700 font-semibold">#MOV-<?= str_pad($movie['id'], 3, '0', STR_PAD_LEFT) ?></span></div>
                        </div>
                    </div>

                    <!-- 删除动作区 (Danger Zone) -->
                    <div class="bg-white p-6 rounded-xl border border-rose-100 shadow-xs">
                        <h3 class="text-sm font-bold text-rose-600 mb-2">Danger Zone</h3>
                        <p class="text-xs text-gray-500 mb-4">Once deleted, this cinematic entry will be permanently erased from active records.</p>
                        <!-- 绑定到下面的独立删除表单，触发 Submit -->
                        <button type="submit" form="delete-movie-form" class="w-full px-4 py-2.5 border border-rose-200 text-rose-600 hover:bg-rose-50 rounded-xl text-sm font-semibold transition cursor-pointer">
                            Delete Movie
                        </button>
                    </div>
                </div>
            </form>

            <!-- 独立的删除表单 (避免干扰主更新表单的校验) -->
            <form id="delete-movie-form" action="movies-edit.php?id=<?= $id ?>" method="POST" onsubmit="return confirm('Are you sure you want to permanently delete this movie?');">
                <input type="hidden" name="delete_movie" value="1">
            </form>
        </main>
    </div>

    <!-- JavaScript 交互 (同步响应式侧边栏功能) -->
    <script>
        document.addEventListener('DOMContentLoaded', () => {
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
        });
    </script>
</body>
</html>