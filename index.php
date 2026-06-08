<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to CineManage Cinema</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body class="bg-gradient-to-br from-indigo-950 via-slate-900 to-indigo-900 min-h-screen flex items-center justify-center p-4 font-sans antialiased text-slate-300">

    <div class="w-full max-w-xl bg-slate-900/60 border border-white/10 rounded-2xl shadow-2xl p-6 sm:p-10 backdrop-blur-md space-y-8 text-center relative overflow-hidden">
        <!-- Ambient Background Glow -->
        <div class="absolute -top-10 -right-10 w-40 h-40 bg-indigo-600/10 rounded-full blur-2xl pointer-events-none"></div>

        <!-- Cinema Branding & Intro -->
        <div class="space-y-3">
            <div class="inline-flex p-3 bg-indigo-950 border border-indigo-500/20 rounded-xl text-amber-400">
                <i class="fa-solid fa-film text-3xl"></i>
            </div>
            <h1 class="text-3xl font-black text-white tracking-wide">CineManage Cinema</h1>
            <p class="text-sm text-slate-400 max-w-md mx-auto leading-relaxed">
                Great movies, unforgettable moments. Welcome to your premier cinema destination, where advanced audio-visual technology meets ultimate theater comfort.
            </p>
        </div>

        <!-- Guest Services (Simple 3 Steps) -->
        <div class="grid grid-cols-3 gap-3 pt-2">
            <div class="p-3 bg-slate-950/40 rounded-xl border border-slate-800/60">
                <i class="fa-solid fa-fire text-amber-500 text-base mb-1 block"></i>
                <span class="text-xs font-bold text-white block">Now Showing</span>
                <span class="text-[10px] text-slate-500 mt-0.5 block">Explore Hit Movies</span>
            </div>
            <div class="p-3 bg-slate-950/40 rounded-xl border border-slate-800/60">
                <i class="fa-solid fa-clock text-indigo-400 text-base mb-1 block"></i>
                <span class="text-xs font-bold text-white block">Showtimes</span>
                <span class="text-[10px] text-slate-500 mt-0.5 block">Find Perfect Timing</span>
            </div>
            <div class="p-3 bg-slate-950/40 rounded-xl border border-slate-800/60">
                <i class="fa-solid fa-couch text-rose-400 text-base mb-1 block"></i>
                <span class="text-xs font-bold text-white block">Book Seats</span>
                <span class="text-[10px] text-slate-500 mt-0.5 block">Secure Best Views</span>
            </div>
        </div>

        <!-- Action Buttons for Guests -->
        <div class="pt-4">
            <div class="flex flex-col sm:flex-row items-center justify-center gap-4 text-sm font-medium">
                <a href="login.php" class="w-full sm:w-1/2 px-6 py-3 bg-indigo-600 hover:bg-indigo-700 text-white rounded-xl transition shadow-md flex items-center justify-center space-x-2 cursor-pointer">
                    <i class="fa-solid fa-right-to-bracket text-xs"></i>
                    <span>Login</span>
                </a>
                <a href="signup.php" class="w-full sm:w-1/2 px-6 py-3 bg-slate-800/60 text-slate-300 border border-slate-700/60 hover:bg-slate-700 hover:text-white rounded-xl transition flex items-center justify-center space-x-2 cursor-pointer">
                    <i class="fa-solid fa-user-plus text-xs"></i>
                    <span>Register Account</span>
                </a>
            </div>
        </div>

        <!-- Footer -->
        <div class="text-[10px] text-slate-600 border-t border-white/5 pt-6 mt-4">
            &copy; 2026 CineManage Cinema • We look forward to your visit
        </div>
    </div>

</body>
</html>