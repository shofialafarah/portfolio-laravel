<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Sedang Perbaikan - Shofia Portfolio</title>
    <style>
        @keyframes float {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-20px); }
        }
        .float { animation: float 3s ease-in-out infinite; }
    </style>
</head>
<body class="bg-zinc-950 text-zinc-200 flex items-center justify-center min-h-screen px-6">
    <div class="max-w-md w-full text-center">
        <!-- Ikon Ilustrasi -->
        <div class="mb-8 flex justify-center">
            <div class="relative">
                <div class="absolute -inset-4 bg-indigo-500/20 blur-xl rounded-full"></div>
                <svg class="w-24 h-24 text-indigo-500 float relative" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path>
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                </svg>
            </div>
        </div>

        <h1 class="text-3xl font-extrabold text-white mb-4 tracking-tight">System Update</h1>
        <p class="text-zinc-400 text-lg mb-8 leading-relaxed">
            Maaf atas ketidaknyamanannya. Kami sedang melakukan pemeliharaan rutin untuk meningkatkan performa website.
        </p>
        
        <div class="p-4 bg-zinc-900/50 border border-zinc-800 rounded-2xl mb-8">
            <p class="text-sm text-zinc-500 font-medium uppercase tracking-widest mb-1">Status</p>
            <p class="text-indigo-400 font-semibold italic">"Akan segera kembali online"</p>
        </div>

        <button onclick="window.location.reload()" class="inline-flex items-center gap-2 px-6 py-3 bg-indigo-600 hover:bg-indigo-500 text-white font-bold rounded-xl transition-all active:scale-95 shadow-lg shadow-indigo-500/20">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"></path></svg>
            Cek Lagi
        </button>
    </div>
</body>
</html>