<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CineManage Pro - Bookings</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body class="bg-gray-100 font-sans text-gray-800 flex h-screen overflow-hidden">

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
        <div class="p-4 px-5 border-t border-indigo-900 bg-slate-950/40 flex items-center justify-between shrink-0">
            <!-- 用户信息区 -->
            <div class="min-w-0 flex-1 pr-3">
                <p class="text-sm font-semibold text-white truncate">Alan Admin</p>
                <p class="text-xs text-slate-400 truncate mt-0.5">admin@cinema.com</p>
            </div>
            <!-- 登出按钮 -->
            <a href="index.php" class="shrink-0 w-8 h-8 flex items-center justify-center text-slate-400 hover:text-rose-500 hover:bg-rose-500/10 rounded-lg transition" title="Log Out">
                <i class="fa-solid fa-arrow-right-from-bracket"></i>
            </a>
        </div>
    </aside>

    <div class="flex-1 flex flex-col overflow-y-auto">
        <header class="bg-white border-b border-gray-200 px-6 py-4 flex justify-between items-center shrink-0">
            <div>
                <h1 class="text-xl font-bold text-gray-900">Ticket Bookings</h1>
                <p class="text-xs text-gray-500 mt-0.5">Audit system transactions, ticket issuance, and client reservations.</p>
            </div>
            <span class="text-xs text-slate-400 font-medium bg-slate-100 px-3 py-1.5 rounded-lg">Total Records: 2</span>
        </header>

        <main class="p-6 max-w-7xl w-full mx-auto">
            <div class="bg-white rounded-xl border border-gray-100 shadow-xs overflow-hidden">
                <div class="overflow-x-auto">
                    <table class="w-full text-left border-collapse">
                        <thead>
                            <tr class="bg-gray-50/70 text-gray-500 text-xs font-bold uppercase tracking-wider border-b border-gray-100">
                                <th class="py-3 px-5">Ticket ID</th>
                                <th class="py-3 px-5">Customer (User)</th>
                                <th class="py-3 px-5">Movie & Hall Slot</th>
                                <th class="py-3 px-5">Showtime</th>
                                <th class="py-3 px-5 text-right">Status</th>
                            </tr>
                        </thead>
                        <tbody class="text-sm divide-y divide-gray-100">
                            <tr class="hover:bg-slate-50/80 transition">
                                <td class="py-3.5 px-5 font-mono text-xs text-gray-400">#01</td>
                                <td class="py-3.5 px-5 font-semibold text-gray-900">user_bob</td>
                                <td class="py-3.5 px-5">
                                    <div class="font-medium text-gray-800">Interstellar</div>
                                    <div class="text-xs text-gray-400 mt-0.5">Hall 2 (IMAX)</div>
                                </td>
                                <td class="py-3.5 px-5">
                                    <div class="text-gray-600 text-xs">2026-06-15</div>
                                    <div class="font-mono text-indigo-600 font-semibold text-xs mt-0.5">14:30:00</div>
                                </td>
                                <td class="py-3.5 px-5 text-right">
                                    <span class="text-xs font-bold text-emerald-700 bg-emerald-50 px-2 py-0.5 rounded-full border border-emerald-200/40">Confirmed</span>
                                </td>
                            </tr>
                            <tr class="hover:bg-slate-50/80 transition">
                                <td class="py-3.5 px-5 font-mono text-xs text-gray-400">#02</td>
                                <td class="py-3.5 px-5 font-semibold text-gray-900">user_charlie</td>
                                <td class="py-3.5 px-5">
                                    <div class="font-medium text-gray-800">The Wandering Earth 3</div>
                                    <div class="text-xs text-gray-400 mt-0.5">Hall 2 (IMAX)</div>
                                </td>
                                <td class="py-3.5 px-5">
                                    <div class="text-gray-600 text-xs">2026-06-15</div>
                                    <div class="font-mono text-indigo-600 font-semibold text-xs mt-0.5">19:00:00</div>
                                </td>
                                <td class="py-3.5 px-5 text-right">
                                    <span class="text-xs font-bold text-emerald-700 bg-emerald-50 px-2 py-0.5 rounded-full border border-emerald-200/40">Confirmed</span>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </main>
    </div>
</body>
</html>