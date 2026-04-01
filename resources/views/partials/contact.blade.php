{{-- ================= KONTAK & SOSIAL MEDIA ================= --}}
<section id="contact" class="max-w-7xl mx-auto px-4 sm:px-6 py-12 sm:py-20 md:py-24 scroll-reveal">
    <div class="flex justify-center mb-10 md:mb-12">
        <h2 class="section-title text-3xl md:text-4xl font-bold text-center">
            Get In Touch
        </h2>
    </div>

    {{-- Di HP: 1 kolom stack, md: 2 kolom --}}
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 md:gap-8 items-start">

        {{-- CARD KIRIM PESAN --}}
        <div class="card-glass rounded-3xl p-5 sm:p-8 md:p-10 shadow-2xl border border-white/10 relative overflow-hidden">
            <div class="absolute top-0 right-0 -mt-4 -mr-4 w-24 h-24 bg-indigo-600/10 blur-3xl rounded-full"></div>

            <div class="flex items-center gap-4 mb-6 sm:mb-8">
                <div class="bg-indigo-600/20 p-3 rounded-xl">
                    <i class="fa-solid fa-paper-plane text-indigo-400 text-xl"></i>
                </div>
                <h2 class="text-xl sm:text-2xl font-bold text-white tracking-tight">Kirim Pesan</h2>
            </div>

            <form id="messageForm" class="space-y-4 sm:space-y-5">
                @csrf

                <div class="relative group">
                    <i class="fa-solid fa-envelope absolute left-4 top-1/2 -translate-y-1/2 text-zinc-500 group-focus-within:text-indigo-400 transition-colors"></i>
                    <input type="email" name="email" placeholder="Email kamu (email-mu@gmail.com)"
                        class="w-full pl-12 px-4 py-3 rounded-xl bg-zinc-900/50 border border-white/5 text-white text-sm sm:text-base focus:ring-2 focus:ring-indigo-500 focus:bg-zinc-800 transition-all outline-none"
                        required>
                </div>

                <div class="relative group">
                    <i class="fa-solid fa-phone absolute left-4 top-1/2 -translate-y-1/2 text-zinc-500 group-focus-within:text-indigo-400 transition-colors"></i>
                    <input type="text" name="phone" value="+62"
                        class="w-full pl-12 px-4 py-3 rounded-xl bg-zinc-900/50 border border-white/5 text-white text-sm sm:text-base focus:ring-2 focus:ring-indigo-500 focus:bg-zinc-800 transition-all outline-none"
                        required>
                </div>

                <div class="relative group">
                    <i class="fa-solid fa-comment-dots absolute left-4 top-4 text-zinc-500 group-focus-within:text-indigo-400 transition-colors"></i>
                    <textarea name="message" rows="5" placeholder="Apa yang ingin kamu diskusikan?"
                        class="w-full pl-12 px-4 py-3 rounded-xl bg-zinc-900/50 border border-white/5 text-white text-sm sm:text-base focus:ring-2 focus:ring-indigo-500 focus:bg-zinc-800 transition-all outline-none resize-none"
                        required></textarea>
                </div>

                <button type="submit"
                    class="w-full flex items-center justify-center gap-3 bg-indigo-600 hover:bg-indigo-500 transition-all py-3.5 sm:py-4 rounded-xl text-white font-bold shadow-lg shadow-indigo-500/20 active:scale-95 text-sm sm:text-base">
                    <span>Kirim Sekarang</span>
                    <i class="fa-solid fa-chevron-right text-xs"></i>
                </button>
            </form>
        </div>

        {{-- CARD SOSIAL MEDIA --}}
        <div class="space-y-5 sm:space-y-6">
            <div class="card-glass rounded-3xl p-6 sm:p-8 border border-white/10 bg-gradient-to-br from-zinc-800/40 to-transparent">
                <h3 class="text-lg sm:text-xl font-bold text-white mb-2">Mari Berkolaborasi!</h3>
                <p class="text-zinc-400 mb-6 sm:mb-8 leading-relaxed text-sm sm:text-base">
                    Saya selalu terbuka untuk projek freelance, kolaborasi tim, atau sekadar menyapa.
                    Pilih platform yang paling nyaman buat kamu.
                </p>

                {{-- Di HP: 2 kolom tetap, tapi padding dikecilkan --}}
                <div class="grid grid-cols-2 gap-3 sm:gap-4">
                    <a href="https://instagram.com/shofialafarah" target="_blank"
                        class="group flex flex-col items-center gap-2 sm:gap-3 p-4 sm:p-5 rounded-2xl bg-zinc-900/50 border border-white/5 hover:border-pink-500/50 transition-all duration-300 transform hover:-translate-y-1">
                        <div class="w-10 h-10 sm:w-12 sm:h-12 rounded-xl bg-zinc-800 group-hover:bg-gradient-to-br group-hover:from-pink-500 group-hover:to-orange-400 flex items-center justify-center transition-all duration-300 shadow-inner">
                            <i class="fa-brands fa-instagram text-white text-lg sm:text-xl"></i>
                        </div>
                        <span class="text-xs sm:text-sm font-semibold text-zinc-400 group-hover:text-white transition">Instagram</span>
                    </a>

                    <a href="https://linkedin.com/in/shofia-nabila-elfa-rahma" target="_blank"
                        class="group flex flex-col items-center gap-2 sm:gap-3 p-4 sm:p-5 rounded-2xl bg-zinc-900/50 border border-white/5 hover:border-blue-500/50 transition-all duration-300 transform hover:-translate-y-1">
                        <div class="w-10 h-10 sm:w-12 sm:h-12 rounded-xl bg-zinc-800 group-hover:bg-gradient-to-br group-hover:from-blue-500 group-hover:to-blue-600 flex items-center justify-center transition-all duration-300 shadow-inner">
                            <i class="fa-brands fa-linkedin text-white text-lg sm:text-xl"></i>
                        </div>
                        <span class="text-xs sm:text-sm font-semibold text-zinc-400 group-hover:text-white transition">LinkedIn</span>
                    </a>

                    <a href="https://github.com/shofialafarah" target="_blank"
                        class="group flex flex-col items-center gap-2 sm:gap-3 p-4 sm:p-5 rounded-2xl bg-zinc-900/50 border border-white/5 hover:border-white/20 transition-all duration-300 transform hover:-translate-y-1">
                        <div class="w-10 h-10 sm:w-12 sm:h-12 rounded-xl bg-zinc-800 group-hover:bg-zinc-700 flex items-center justify-center transition-all duration-300 shadow-inner">
                            <i class="fa-brands fa-github text-white text-lg sm:text-xl"></i>
                        </div>
                        <span class="text-xs sm:text-sm font-semibold text-zinc-400 group-hover:text-white transition">GitHub</span>
                    </a>

                    <a href="https://behance.net/shofialafarah" target="_blank"
                        class="group flex flex-col items-center gap-2 sm:gap-3 p-4 sm:p-5 rounded-2xl bg-zinc-900/50 border border-white/5 hover:border-cyan-400/50 transition-all duration-300 transform hover:-translate-y-1">
                        <div class="w-10 h-10 sm:w-12 sm:h-12 rounded-xl bg-zinc-800 group-hover:bg-gradient-to-br group-hover:from-cyan-400 group-hover:to-blue-500 flex items-center justify-center transition-all duration-300 shadow-inner">
                            <i class="fa-brands fa-behance text-white text-lg sm:text-xl"></i>
                        </div>
                        <span class="text-xs sm:text-sm font-semibold text-zinc-400 group-hover:text-white transition">Behance</span>
                    </a>
                </div>
            </div>

            {{-- Available status --}}
            <div class="p-4 sm:p-5 bg-indigo-600/5 border border-indigo-500/10 rounded-3xl flex items-center gap-4">
                <div class="w-3 h-3 bg-green-500 rounded-full animate-pulse flex-shrink-0"></div>
                <p class="text-zinc-400 text-sm font-medium">Available for new projects & collaborations</p>
            </div>
        </div>
    </div>
</section>