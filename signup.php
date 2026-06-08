<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CineManage Cinema - Sign Up</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body class="bg-gradient-to-br from-indigo-950 via-slate-900 to-indigo-900 min-h-screen flex flex-col items-center justify-center p-4 font-sans antialiased">

    <!-- Back to Home Link -->
    <div class="mb-4">
        <a href="index.php" class="text-xs font-medium text-slate-400 hover:text-white transition flex items-center space-x-1.5">
            <i class="fa-solid fa-arrow-left text-[10px]"></i>
            <span>Back to Home</span>
        </a>
    </div>

    <div class="w-full max-w-md bg-white rounded-2xl border border-white/10 shadow-2xl overflow-hidden backdrop-blur-md">
        <!-- Header Branding -->
        <div class="bg-slate-950 p-6 text-center border-b border-indigo-950/50 flex flex-col items-center">
            <div class="w-12 h-12 bg-indigo-900/40 rounded-xl flex items-center justify-center border border-indigo-500/20 mb-3">
                <i class="fa-solid fa-film text-2xl text-amber-400"></i>
            </div>
            <h1 class="text-xl font-bold text-white tracking-wider">Create Account</h1>
            <p class="text-xs text-slate-400 mt-1">Join us today to unlock online booking and member rewards</p>
        </div>

        <!-- Registration Form -->
        <form action="" method="POST" class="p-6 sm:p-8 space-y-4">
            
            <!-- Full Name Input -->
            <div>
                <label for="fullname" class="block text-xs font-bold uppercase tracking-wider text-gray-500 mb-1.5">Full Name</label>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-gray-400">
                        <i class="fa-regular fa-id-card text-sm"></i>
                    </div>
                    <input type="text" id="fullname" name="fullname" required placeholder="John Doe"
                        class="w-full pl-10 pr-4 py-2.5 bg-gray-50 border border-gray-200 rounded-lg text-sm text-gray-900 placeholder-gray-400 focus:outline-hidden focus:border-indigo-600 focus:bg-white focus:ring-4 focus:ring-indigo-100 transition">
                </div>
            </div>

            <!-- Email Address Input -->
            <div>
                <label for="email" class="block text-xs font-bold uppercase tracking-wider text-gray-500 mb-1.5">Email Address</label>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-gray-400">
                        <i class="fa-regular fa-envelope text-sm"></i>
                    </div>
                    <input type="email" id="email" name="email" required placeholder="moviegoer@example.com"
                        class="w-full pl-10 pr-4 py-2.5 bg-gray-50 border border-gray-200 rounded-lg text-sm text-gray-900 placeholder-gray-400 focus:outline-hidden focus:border-indigo-600 focus:bg-white focus:ring-4 focus:ring-indigo-100 transition">
                </div>
            </div>

            <!-- Password Input -->
            <div>
                <label for="password" class="block text-xs font-bold uppercase tracking-wider text-gray-500 mb-1.5">Password</label>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-gray-400">
                        <i class="fa-solid fa-lock text-sm"></i>
                    </div>
                    <input type="password" id="password" name="password" required placeholder="••••••••"
                        class="w-full pl-10 pr-4 py-2.5 bg-gray-50 border border-gray-200 rounded-lg text-sm text-gray-900 placeholder-gray-400 focus:outline-hidden focus:border-indigo-600 focus:bg-white focus:ring-4 focus:ring-indigo-100 transition">
                </div>
            </div>

            <!-- Submit Button -->
            <button type="submit" class="w-full bg-indigo-600 hover:bg-indigo-700 text-white font-medium text-sm py-2.5 rounded-lg shadow-md hover:shadow-lg flex items-center justify-center space-x-2 transition cursor-pointer mt-2">
                <span>Create Account</span>
                <i class="fa-solid fa-user-plus text-xs"></i>
            </button>

            <!-- Switch to Login -->
            <div class="text-center pt-2 border-t border-gray-100 mt-6">
                <p class="text-xs text-gray-500">
                    Already have a member profile? 
                    <a href="login.php" class="font-bold text-indigo-600 hover:text-indigo-700 transition ml-1">Log In instead</a>
                </p>
            </div>
        </form>
    </div>

</body>
</html>