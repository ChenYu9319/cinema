<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <title>Welcome to CineManage Cinema</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body class="bg-gradient-to-br from-indigo-950 via-slate-900 to-indigo-900 min-h-screen flex items-center justify-center p-4 font-sans antialiased text-slate-300">

    <div class="w-full max-w-lg bg-slate-900/80 border border-white/10 rounded-3xl shadow-2xl p-6 sm:p-8 backdrop-blur-xl space-y-6 text-center relative overflow-hidden">
        
        <!-- Ambient Background Glow -->
        <div class="absolute -top-10 -right-10 w-40 h-40 bg-indigo-600/20 rounded-full blur-3xl pointer-events-none"></div>

        <!-- Branding -->
        <div class="space-y-3">
            <div class="inline-flex p-4 bg-indigo-950 border border-indigo-500/30 rounded-2xl text-amber-400 shadow-lg">
                <i class="fa-solid fa-film text-3xl"></i>
            </div>
            <h1 class="text-2xl sm:text-3xl font-black text-white tracking-tight">CineManage Cinema</h1>
            <p class="text-xs sm:text-sm text-slate-400 leading-relaxed max-w-xs mx-auto">
                Unforgettable moments, premier comfort. Your journey into cinema begins here.
            </p>
        </div>

        <!-- Guest Services -->
        <div class="grid grid-cols-3 gap-2 sm:gap-3">
            <div class="p-3 bg-slate-950/60 rounded-xl border border-slate-800">
                <i class="fa-solid fa-fire text-amber-500 text-lg mb-1 block"></i>
                <span class="text-[11px] font-bold text-white block">Now</span>
            </div>
            <div class="p-3 bg-slate-950/60 rounded-xl border border-slate-800">
                <i class="fa-solid fa-clock text-indigo-400 text-lg mb-1 block"></i>
                <span class="text-[11px] font-bold text-white block">Time</span>
            </div>
            <div class="p-3 bg-slate-950/60 rounded-xl border border-slate-800">
                <i class="fa-solid fa-couch text-rose-400 text-lg mb-1 block"></i>
                <span class="text-[11px] font-bold text-white block">Book</span>
            </div>
        </div>

        <!-- Action Buttons -->
        <div class="flex flex-col gap-3 pt-2">
            <a href="login.php" class="w-full px-6 py-4 bg-indigo-600 hover:bg-indigo-500 active:scale-[0.98] text-white rounded-2xl transition shadow-lg flex items-center justify-center space-x-2 font-semibold text-sm">
                <i class="fa-solid fa-right-to-bracket text-xs"></i>
                <span>Sign In to Your Account</span>
            </a>
            <a href="signup.php" class="w-full px-6 py-4 bg-slate-800 text-slate-300 hover:bg-slate-700 active:scale-[0.98] rounded-2xl transition flex items-center justify-center space-x-2 font-medium text-sm border border-slate-700">
                <i class="fa-solid fa-user-plus text-xs"></i>
                <span>Create New Account</span>
            </a>
        </div>

        <!-- Footer -->
        <div class="text-[10px] text-slate-600 pt-2">
            &copy; 2026 CineManage Cinema
        </div>
    </div>

</body>
</html>