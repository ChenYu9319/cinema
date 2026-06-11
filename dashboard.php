<?php
session_start();

// 1. 权限拦截：如果未登录，严禁白嫖后台，直接踢回登录页
if (!isset($_SESSION['user'])) {
    header("Location: login-form.php");
    exit();
}

// 获取当前登录的管理员信息（对应你登录成功时存入 session 的数据）
$admin_name = $_SESSION['user']['username'] ?? 'Admin';
$admin_email = $_SESSION['user']['email'] ?? 'admin@cinema.com';

// 2. 初始化核心看板数据（防止由于缺少表导致页面报错）
$total_users = 0;
$active_movies = 0;
$total_halls = 0;
$total_schedules = 0;
$total_tickets = 0;
$live_schedules = [];
$recent_bookings = [];

try {
    // 连通数据库
    $db = new PDO("mysql:host=localhost;dbname=cinema", "root", "");
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // 3. 动态读取看板核心数字
    $total_users = $db->query("SELECT COUNT(*) FROM users")->fetchColumn();
    
    // 智能动态统计今天处于档期内的电影数量
    $active_movies = $db->query("SELECT COUNT(*) FROM movies WHERE CURDATE() BETWEEN release_date AND end_date")->fetchColumn();
    
    $total_halls = $db->query("SELECT COUNT(*) FROM halls")->fetchColumn();
    $total_schedules = $db->query("SELECT COUNT(*) FROM schedules")->fetchColumn();
    $total_tickets = $db->query("SELECT COUNT(*) FROM bookings")->fetchColumn();

    // 4. 读取实时排片中心（💡 已将 h.name 改为 h.number，h.type 改为 h.hall_type）
    $schedule_sql = "SELECT s.*, m.title, m.director_name, h.number AS hall_name, h.hall_type AS hall_type 
                     FROM schedules s
                     JOIN movies m ON s.movie_id = m.id
                     JOIN halls h ON s.hall_id = h.id
                     ORDER BY s.schedule_date ASC, s.start_time ASC LIMIT 3";
    $live_schedules = $db->query($schedule_sql)->fetchAll(PDO::FETCH_ASSOC);

    // 5. 读取最近的实时订单（💡 这里的影厅字段也同步通过 AS 进行了平替修复）
    $booking_sql = "SELECT b.id AS booking_id, u.username, m.title, h.number AS hall_name, h.hall_type AS hall_type, s.schedule_date, s.start_time
                    FROM bookings b
                    JOIN users u ON b.user_id = u.id
                    JOIN schedules s ON b.schedule_id = s.id
                    JOIN movies m ON s.movie_id = m.id
                    JOIN halls h ON s.hall_id = h.id
                    ORDER BY b.id DESC LIMIT 2";
    $recent_bookings = $db->query($booking_sql)->fetchAll(PDO::FETCH_ASSOC);

} catch (PDOException $e) {
    // 如果表不存在，可以在这里记录日志，或者暂时忽略以便前端正常渲染静态骨架
    $db_error = $e->getMessage(); 
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CineManage Pro - Dashboard</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body class="bg-gray-100 font-sans text-gray-800 flex h-screen overflow-hidden">

    <!-- 移动端遮罩层 -->
    <div id="sidebarOverlay" class="fixed inset-0 bg-slate-950/40 z-30 hidden md:hidden backdrop-blur-xs transition-opacity duration-300 opacity-0"></div>

    <!-- 侧边栏导航 -->
    <aside id="sidebar" class="w-64 bg-indigo-950 text-slate-300 flex flex-col justify-between fixed md:relative inset-y-0 left-0 z-40 transform -translate-x-full md:translate-x-0 shrink-0 transition-transform duration-300 ease-in-out border-r border-indigo-900/30">
        <div>
            <div class="p-5 flex items-center justify-between bg-slate-950 border-b border-indigo-900">
                <div class="flex items-center space-x-3">
                    <i class="fa-solid fa-film text-2xl text-amber-400"></i>
                    <span class="text-xl font-bold tracking-wider text-white">CineManage</span>
                </div>
                <button id="closeSidebarBtn" class="md:hidden text-slate-400 hover:text-white p-1 cursor-pointer">
                    <i class="fa-solid fa-xmark text-lg"></i>
                </button>
            </div>
            <nav class="p-4 space-y-1.5">
                <a href="dashboard.php" class="flex items-center space-x-3 bg-indigo-900 text-white px-4 py-2.5 rounded-lg font-medium transition">
                    <i class="fa-solid fa-chart-pie w-5 text-center text-amber-400"></i>
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
        
        <!-- 动态渲染管理信息 -->
        <div class="p-4 px-5 border-t border-indigo-900 bg-slate-950/40 flex items-center justify-between shrink-0">
            <div class="min-w-0 flex-1 pr-3">
                <p class="text-sm font-semibold text-white truncate"><?php echo htmlspecialchars($admin_name); ?></p>
                <p class="text-xs text-slate-400 truncate mt-0.5"><?php echo htmlspecialchars($admin_email); ?></p>
            </div>
            <a href="logout.php" class="shrink-0 w-8 h-8 flex items-center justify-center text-slate-400 hover:text-rose-500 hover:bg-rose-500/10 rounded-lg transition" title="Log Out">
                <i class="fa-solid fa-arrow-right-from-bracket"></i>
            </a>
        </div>
    </aside>

    <!-- 主内容区 -->
    <div class="flex-1 flex flex-col overflow-y-auto">
        
        <header class="bg-white border-b border-gray-200 px-6 py-4 flex items-center justify-between gap-4 shrink-0">
            <div class="flex items-center space-x-3 min-w-0">
                <button id="openSidebarBtn" class="md:hidden p-2 -ml-2 text-gray-600 hover:text-gray-900 hover:bg-gray-100 rounded-lg transition cursor-pointer shrink-0">
                    <i class="fa-solid fa-bars text-lg"></i>
                </button>
                <div class="min-w-0">
                    <h1 class="text-xl font-bold text-gray-900 truncate">Dashboard Overview</h1>
                    <p class="text-xs text-gray-500 mt-0.5 truncate">Welcome back, <?php echo htmlspecialchars($admin_name); ?>! Here is what's happening today.</p>
                </div>
            </div>
        </header>

        <main class="p-6 max-w-7xl w-full mx-auto space-y-6">

            <!-- 数据库报错温和提示 -->
            <?php if(isset($db_error)): ?>
                <div class="bg-amber-50 text-amber-800 p-3.5 rounded-xl text-xs border border-amber-200 font-mono">
                    <i class="fa-solid fa-triangle-exclamation mr-1.5"></i> <strong>Dev Note:</strong> Some tables are missing. Showing 0 fallback data. (<?php echo $db_error; ?>)
                </div>
            <?php endif; ?>

            <!-- 核心看板数据网格 -->
            <div class="flex flex-wrap gap-4 justify-center">
                <!-- 1. 总用户卡片 -->
                <a href="users.php" class="w-full sm:w-[220px] bg-white p-5 rounded-xl border border-gray-100 shadow-xs flex items-center justify-between hover:shadow-md hover:border-gray-200 transition cursor-pointer">
                    <div>
                        <span class="text-xs font-bold text-gray-400 tracking-wider uppercase block">Total Users</span>
                        <span class="text-2xl font-black font-mono text-gray-900 block mt-1"><?php echo $total_users; ?></span>
                    </div>
                    <div class="p-3 bg-blue-50 text-blue-600 rounded-xl shrink-0"><i class="fa-solid fa-users text-lg"></i></div>
                </a>

                <!-- 2. 电影卡片 -->
                <a href="movies.php" class="w-full sm:w-[220px] bg-white p-5 rounded-xl border border-gray-100 shadow-xs flex items-center justify-between hover:shadow-md hover:border-gray-200 transition cursor-pointer">
                    <div>
                        <span class="text-xs font-bold text-gray-400 tracking-wider uppercase block">Active Movies</span>
                        <span class="text-2xl font-black font-mono text-gray-900 block mt-1"><?php echo $active_movies; ?></span>
                    </div>
                    <div class="p-3 bg-emerald-50 text-emerald-600 rounded-xl shrink-0"><i class="fa-solid fa-video text-lg"></i></div>
                </a>

                <!-- 3. 影厅卡片 -->
                <a href="halls.php" class="w-full sm:w-[220px] bg-white p-5 rounded-xl border border-gray-100 shadow-xs flex items-center justify-between hover:shadow-md hover:border-gray-200 transition cursor-pointer">
                    <div>
                        <span class="text-xs font-bold text-gray-400 tracking-wider uppercase block">Total Halls</span>
                        <span class="text-2xl font-black font-mono text-gray-900 block mt-1"><?php echo $total_halls; ?></span>
                    </div>
                    <div class="p-3 bg-amber-50 text-amber-600 rounded-xl shrink-0"><i class="fa-solid fa-door-open text-lg"></i></div>
                </a>

                <!-- 4. 排片卡片 -->
                <a href="schedules.php" class="w-full sm:w-[220px] bg-white p-5 rounded-xl border border-gray-100 shadow-xs flex items-center justify-between hover:shadow-md hover:border-gray-200 transition cursor-pointer">
                    <div>
                        <span class="text-xs font-bold text-gray-400 tracking-wider uppercase block">Schedules</span>
                        <span class="text-2xl font-black font-mono text-gray-900 block mt-1"><?php echo $total_schedules; ?></span>
                    </div>
                    <div class="p-3 bg-purple-50 text-purple-600 rounded-xl shrink-0"><i class="fa-solid fa-calendar-days text-lg"></i></div>
                </a>

                <!-- 5. 订单/票务卡片 -->
                <a href="bookings.php" class="w-full sm:w-[220px] bg-white p-5 rounded-xl border border-gray-100 shadow-xs flex items-center justify-between hover:shadow-md hover:border-gray-200 transition cursor-pointer">
                    <div>
                        <span class="text-xs font-bold text-gray-400 tracking-wider uppercase block">Total Tickets</span>
                        <span class="text-2xl font-black font-mono text-gray-900 block mt-1"><?php echo $total_tickets; ?></span>
                    </div>
                    <div class="p-3 bg-rose-50 text-rose-600 rounded-xl shrink-0"><i class="fa-solid fa-ticket text-lg"></i></div>
                </a>
            </div>

            <!-- 数据表格与历史看板区 -->
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
                
                <!-- 实时排片中心 -->
                <div class="lg:col-span-2 bg-white rounded-xl border border-gray-100 shadow-xs overflow-hidden">
                    <div class="px-5 py-4 border-b border-gray-100 flex justify-between items-center bg-gradient-to-r from-gray-50 to-white">
                        <h2 class="font-bold text-gray-900 flex items-center">
                            <i class="fa-solid fa-clock text-indigo-600 mr-2 text-sm"></i>
                            <span>Live Scheduling Center</span>
                        </h2>
                        <span class="text-xs font-medium text-emerald-700 bg-emerald-50 px-2 py-0.5 rounded-full">System Active</span>
                    </div>
                    <div class="overflow-x-auto">
                        <table class="w-full text-left border-collapse">
                            <thead>
                                <tr class="bg-gray-50/70 text-gray-500 text-xs font-bold uppercase tracking-wider border-b border-gray-100">
                                    <th class="py-3 px-5">Movie</th>
                                    <th class="py-3 px-5">Theater Hall</th>
                                    <th class="py-3 px-5">Date & Start Time</th>
                                </tr>
                            </thead>
                            <tbody class="text-sm divide-y divide-gray-100">
                                <?php if(empty($live_schedules)): ?>
                                    <tr>
                                        <td colspan="3" class="py-6 text-center text-gray-400 text-xs">No active movie schedules found.</td>
                                    </tr>
                                <?php else: ?>
                                    <?php foreach($live_schedules as $row): ?>
                                        <tr class="hover:bg-slate-50/80 transition">
                                            <td class="py-3.5 px-5">
                                                <div class="font-semibold text-gray-900"><?php echo htmlspecialchars($row['title']); ?></div>
                                                <div class="text-xs text-gray-400 mt-0.5">Dir: <?php echo htmlspecialchars($row['director_name']); ?></div>
                                            </td>
                                            <td class="py-3.5 px-5">
                                                <span class="text-gray-700 font-medium block"><?php echo htmlspecialchars($row['hall_name']); ?></span>
                                                <span class="inline-block text-[10px] font-bold tracking-wider uppercase bg-amber-50 text-amber-700 border border-amber-200/60 rounded px-1.5 mt-0.5"><?php echo htmlspecialchars($row['hall_type']); ?></span>
                                            </td>
                                            <td class="py-3.5 px-5">
                                                <div class="text-gray-600 text-xs font-mono"><?php echo $row['schedule_date']; ?></div>
                                                <div class="font-mono text-indigo-600 font-bold mt-0.5"><?php echo $row['start_time']; ?></div>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- 实时订单看板 -->
                <div class="bg-white rounded-xl border border-gray-100 shadow-xs p-5 flex flex-col justify-between">
                    <div>
                        <div class="mb-4 pb-1">
                            <h2 class="font-bold text-gray-900 flex items-center">
                                <i class="fa-solid fa-receipt text-rose-500 mr-2 text-sm"></i>
                                <span>Recent Live Bookings</span>
                            </h2>
                        </div>
                        <div class="space-y-3.5">
                            <?php if(empty($recent_bookings)): ?>
                                <p class="text-center text-gray-400 text-xs py-10">No recent ticket bookings.</p>
                            <?php else: ?>
                                <?php foreach($recent_bookings as $booking): ?>
                                    <div class="p-3.5 bg-slate-50/70 border border-slate-100 rounded-xl flex items-start space-x-3 hover:shadow-xs transition">
                                        <div class="p-2 bg-rose-50 text-rose-500 rounded-lg shrink-0">
                                            <i class="fa-solid fa-ticket"></i>
                                        </div>
                                        <div class="min-w-0 flex-1">
                                            <div class="flex justify-between items-baseline">
                                                <p class="text-sm font-bold text-gray-900 truncate"><?php echo htmlspecialchars($booking['username']); ?></p>
                                                <span class="text-[10px] bg-slate-200/70 text-slate-600 px-1.5 py-0.5 rounded font-mono">ID: #<?php echo $booking['booking_id']; ?></span>
                                            </div>
                                            <p class="text-xs text-gray-500 mt-0.5 truncate"><?php echo htmlspecialchars($booking['title']); ?> • <?php echo htmlspecialchars($booking['hall_name']); ?> (<?php echo strtoupper($booking['hall_type']); ?>)</p>
                                            <div class="flex items-center space-x-2 mt-2">
                                                <i class="fa-regular fa-clock text-[10px] text-gray-400"></i>
                                                <span class="text-xs text-indigo-600 font-mono font-semibold">
                                                    <?php echo date('M d, H:i', strtotime($booking['schedule_date'] . ' ' . $booking['start_time'])); ?>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </div>
                    </div>
                    <a href="bookings.php" class="block text-center text-xs font-semibold text-indigo-600 hover:text-indigo-700 bg-indigo-50/50 hover:bg-indigo-50 py-2 rounded-lg transition mt-4">
                        View All Booking History
                    </a>
                </div>
            </div>
        </main>
    </div>

    <!-- 移动端菜单控制 JavaScript -->
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