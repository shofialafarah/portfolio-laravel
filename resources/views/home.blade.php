@extends('layouts.public')

@section('title', 'Shofia Lafarah\'s Portfolio')

@section('content')

    {{-- ================= PAGE LOADER ================= --}}
    <div class="page-loader">
        <div class="loader-content">
            <div class="loader-spinner"></div>
            <div class="loader-text">MEMUAT</div>
        </div>
    </div>

    {{-- ================= GRID BACKGROUND ================= --}}
    <div class="grid-background">
        <div class="grid-layer"></div>
    </div>

    {{-- ================= HOME ================= --}}
    <section id="home" class="max-w-7xl mx-auto px-4 sm:px-6 py-14 sm:py-20 md:py-24">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8 md:gap-12 items-center">

            {{-- KIRI --}}
            <div class="animate-fade-in-left">
                <h1 class="text-3xl sm:text-4xl md:text-5xl font-bold mb-4 text-center md:text-left">
                    {{-- Pakai nama default jika data kosong --}}
                    Halo, saya <span class="text-indigo-400">{{ $profile->name ?? 'Shofia Lafarah' }}</span>
                </h1>
                <h2 class="text-lg sm:text-xl md:text-2xl font-semibold mb-6 text-center md:text-left">
                    <span class="text-indigo-300" id="typing-text"></span><span class="typing-cursor text-white">|</span>
                </h2>

                <p class="text-gray-300 leading-relaxed mb-8 text-sm sm:text-base text-center md:text-left">
                    @if (isset($profile->about) && $profile->about)
                        {{ $profile->about }}
                    @else
                        Saya fresh graduate dari
                        <span class="text-indigo-300 font-medium">
                            Universitas Islam Kalimantan Muhammad Arsyad Al-Banjari
                        </span>
                        dengan minat utama di bidang desain grafis.
                        <br><br>
                        Selama kuliah, saya pernah PKL sebagai
                        <span class="text-indigo-300 font-medium">Staff Administrasi Intern</span>
                        di Kementerian Agama (Seksi PHU).
                        Selain desain, saya juga memiliki dasar pemrograman web menggunakan
                        Laravel dan Tailwind CSS.
                    @endif
                </p>
                {{-- BUTTON --}}
                <div class="flex flex-wrap gap-4 mb-8 justify-center md:justify-start">
                    <a href="{{ asset('cv/CV_Shofia Nabila Elfa Rahma.pdf') }}" download
                        class="px-6 py-3 bg-indigo-600 hover:bg-indigo-700 transition-all duration-300 rounded-lg font-semibold hover:shadow-lg hover:scale-100">
                        Download CV
                    </a>

                    <a href="#projects"
                        class="px-6 py-3 border border-indigo-500 text-indigo-300 hover:bg-indigo-600 hover:text-white transition-all duration-300 rounded-lg hover:scale-105">
                        Lihat Project
                    </a>
                </div>

                {{-- SOSMED --}}
                <div class="flex gap-5 text-2xl text-gray-400 justify-center md:justify-start">
                    <a href="https://instagram.com/shofialafarah" target="_blank"
                        class="hover:text-pink-400 transition-all duration-300 hover:scale-125 hover:-rotate-6">
                        <i class="fab fa-instagram"></i>
                    </a>
                    <a href="https://www.behance.net/shofialafarah" target="_blank"
                        class="hover:text-blue-400 transition-all duration-300 hover:scale-125 hover:rotate-6">
                        <i class="fab fa-behance"></i>
                    </a>
                    <a href="https://github.com/shofialafarah" target="_blank"
                        class="hover:text-purple-400 transition-all duration-300 hover:scale-125 hover:-rotate-6">
                        <i class="fab fa-github"></i>
                    </a>
                    <a href="https://linkedin.com/in/shofia-nabila-elfa-rahma" target="_blank"
                        class="hover:text-indigo-400 transition-all duration-300 hover:scale-125 hover:rotate-6">
                        <i class="fab fa-linkedin"></i>
                    </a>
                </div>
            </div>

            {{-- KANAN --}}
            <div class="flex justify-center md:justify-end animate-fade-in-right">
                @php
                    $photoUrl =
                        isset($profile->photo) && $profile->photo
                            ? asset('storage/' . $profile->photo)
                            : asset('images/foto-profil.jpg');

                @endphp

                <div class="relative">
                    <div
                        class="absolute inset-0 bg-gradient-to-br from-indigo-600 via-purple-600 to-pink-600 rounded-full blur-3xl opacity-40 animate-pulse">
                    </div>
                    {{-- Gunakan variabel $photoUrl yang sudah kita buat di atas --}}
                    <img src="{{ $photoUrl }}" alt="Foto Profil"
                        class="relative w-52 h-52 sm:w-64 sm:h-64 md:w-72 md:h-72 rounded-full border-4 border-indigo-500 shadow-2xl shadow-indigo-500/50 object-cover hover:scale-105 transition-transform duration-500">
                </div>
            </div>

        </div>
    </section>

    {{-- ================= SKILLS ================= --}}
    <section id="skills" class="max-w-7xl mx-auto px-4 sm:px-6 py-14 sm:py-20 md:py-24 scroll-reveal">
        <div class="flex justify-center mb-12">
            <h2 class="section-title text-3xl md:text-4xl font-bold text-center">
                Tech Stack & Tools
            </h2>
        </div>

        <div class="card-glass rounded-3xl p-4 sm:p-6 md:p-10 shadow-2xl">
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6 md:gap-8">
                {{-- DESIGN --}}
                <div class="card-inner rounded-2xl p-6 hover:-translate-y-2 transition-all duration-300">
                    <h3 class="text-xl font-semibold mb-6 text-indigo-400 text-center">
                        <span class="inline-block hover:scale-110 transition-transform">🎨</span> Design
                    </h3>
                    <div class="grid grid-cols-3 gap-6">
                        @foreach ($designSkills as $index => $skill)
                            <div class="text-center hover:scale-110 transition-transform duration-300"
                                style="animation-delay: {{ $index * 0.15 }}s">
                                <div
                                    class="bg-zinc-900/50 rounded-xl p-3 mb-2 hover:bg-indigo-600/20 transition-all duration-300">
                                    {{-- UPDATE BACKEND 1 --}}
                                    <img src="{{ Storage::disk('s3')->url($skill->icon) }}" class="h-12 mx-auto"
                                        alt="{{ $skill->name }}">
                                </div>
                                <p class="text-xs text-gray-300">{{ $skill->name }}</p>
                            </div>
                        @endforeach
                    </div>
                </div>

                {{-- WEB --}}
                <div class="card-inner rounded-2xl p-6 hover:-translate-y-2 transition-all duration-300">
                    <h3 class="text-xl font-semibold mb-6 text-indigo-400 text-center">
                        <span class="inline-block hover:scale-110 transition-transform">💻</span> Programming
                    </h3>
                    <div class="grid grid-cols-3 gap-6">
                        @foreach ($webSkills as $index => $skill)
                            <div class="text-center hover:scale-110 transition-transform duration-300"
                                style="animation-delay: {{ $index * 0.15 }}s">
                                <div
                                    class="bg-zinc-900/50 rounded-xl p-3 mb-2 hover:bg-indigo-600/20 transition-all duration-300">
                                    {{-- UPDATE BACKEND 2 --}}
                                    <img src="{{ Storage::disk('s3')->url($skill->icon) }}" class="h-12 mx-auto"
                                        alt="{{ $skill->name }}">
                                </div>
                                <p class="text-xs text-gray-300">{{ $skill->name }}</p>
                            </div>
                        @endforeach
                    </div>
                </div>

                {{-- OFFICE --}}
                <div class="card-inner rounded-2xl p-6 hover:-translate-y-2 transition-all duration-300">
                    <h3 class="text-xl font-semibold mb-6 text-indigo-400 text-center">
                        <span class="inline-block hover:scale-110 transition-transform">📊</span> Administration
                    </h3>
                    <div class="grid grid-cols-3 gap-6">
                        @foreach ($officeSkills as $index => $skill)
                            <div class="text-center hover:scale-110 transition-transform duration-300"
                                style="animation-delay: {{ $index * 0.15 }}s">
                                <div
                                    class="bg-zinc-900/50 rounded-xl p-3 mb-2 hover:bg-indigo-600/20 transition-all duration-300">
                                    {{-- UPDATE BACKEND 3 --}}
                                    <img src="{{ Storage::disk('s3')->url($skill->icon) }}" class="h-12 mx-auto"
                                        alt="{{ $skill->name }}">
                                </div>
                                <p class="text-xs text-gray-300">{{ $skill->name }}</p>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
    {{-- ================= PROJEK ================= --}}
    <section id="projects" class="max-w-7xl mx-auto px-4 sm:px-6 py-14 sm:py-20 md:py-24 scroll-reveal">
        <div class="flex justify-center mb-12">
            <h2 class="section-title text-3xl md:text-4xl font-bold text-center">
                My Projects
            </h2>
        </div>

        {{-- FILTER --}}
        <div class="flex justify-center mb-8 md:mb-12">
            <div
                class="inline-flex flex-wrap justify-center gap-2 sm:gap-3 card-glass rounded-2xl px-4 sm:px-6 py-3 sm:py-4">
                <button class="filter-btn active" data-filter="all">Semua</button>
                <button class="filter-btn" data-filter="web">Web Dev</button>
                <button class="filter-btn" data-filter="design">Desain</button>
            </div>
        </div>

        {{-- GRID PROJECT --}}
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 md:gap-8">
            @foreach ($projects as $project)
                <div
                    class="project-card {{ $project->category }} card-glass rounded-3xl p-5 overflow-hidden group flex flex-col">

                    {{-- WRAPPER GAMBAR --}}
                    <div
                        class="relative w-full overflow-hidden rounded-2xl mb-5 
                    {{ $project->category === 'design' ? 'aspect-[4/5]' : 'aspect-video' }} 
                    bg-zinc-900/50 shadow-inner">
                        <img src="{{ asset('storage/' . $project->image) }}"
                            class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700"
                            alt="{{ $project->title }}">

                        {{-- Badge Kategori --}}
                        <div
                            class="absolute top-3 left-3 px-3 py-1 bg-black/40 backdrop-blur-md border border-white/10 rounded-full">
                            <span class="text-[10px] font-bold text-white uppercase tracking-wider">
                                {{ $project->category === 'web' ? 'Web Development' : 'Graphic Design' }}
                            </span>
                        </div>
                    </div>

                    {{-- INFO PROJECT --}}
                    <div class="flex-grow">
                        <h3 class="font-bold text-xl text-white mb-2 group-hover:text-indigo-400 transition-colors">
                            {{ $project->title }}
                        </h3>
                        <p class="text-sm text-gray-400 leading-relaxed line-clamp-3 mb-4">
                            {{ $project->description }}
                        </p>

                        {{-- TECH STACK (Hanya Muncul Jika Web) --}}
                        @if ($project->category === 'web' && $project->tech_stack)
                            <div class="flex flex-wrap gap-2 mb-6">
                                @foreach (explode(',', $project->tech_stack) as $tech)
                                    <span
                                        class="text-[10px] px-2 py-1 bg-indigo-500/10 text-indigo-300 border border-indigo-500/20 rounded-md">
                                        {{ trim($tech) }}
                                    </span>
                                @endforeach
                            </div>
                        @endif
                    </div>

                    {{-- TOMBOL AKSI (FOOTER CARD) --}}
                    <div class="mt-auto flex items-center justify-between pt-4 border-t border-white/5">
                        {{-- SISI KIRI: Ikon-ikon untuk Web --}}
                        <div class="flex gap-4">
                            @if ($project->category === 'web')
                                @if ($project->link_github)
                                    <a href="{{ $project->link_github }}" target="_blank"
                                        class="text-zinc-400 hover:text-white transition-colors"
                                        title="Lihat Kode di GitHub">
                                        <i class="fa-brands fa-github text-xl"></i>
                                    </a>
                                @endif
                                @if ($project->link_deploy)
                                    <a href="{{ $project->link_deploy }}" target="_blank"
                                        class="text-zinc-400 hover:text-indigo-400 transition-colors"
                                        title="Coba Aplikasi">
                                        <i class="fa-solid fa-arrow-up-right-from-square text-lg"></i>
                                    </a>
                                @endif
                            @endif
                        </div>

                        {{-- SISI KANAN: Tombol teks hanya untuk Desain (atau jika Web tidak punya link deploy) --}}
                        @if ($project->category === 'design' && $project->link_deploy)
                            <a href="{{ $project->link_deploy }}" target="_blank"
                                class="text-[11px] font-black text-indigo-400 hover:text-white uppercase tracking-widest transition-colors flex items-center gap-2">
                                Lihat Karya <i class="fa-solid fa-chevron-right text-[10px]"></i>
                            </a>
                        @elseif($project->category === 'web' && !$project->link_deploy && $project->link_github)
                            {{-- Jika Web tidak ada demo, tapi ada github, kasih teks kecil --}}
                            <span class="text-[10px] text-zinc-600 italic">Demo not available</span>
                        @endif
                    </div>
                </div>
            @endforeach
        </div>
    </section>

    {{-- ================= SERTIFIKAT ================= --}}
    <section id="certifications" class="max-w-7xl mx-auto px-4 sm:px-6 py-14 sm:py-20 md:py-24 scroll-reveal">
        <div class="flex justify-center mb-12">
            <h2 class="section-title text-3xl md:text-4xl font-bold text-center">
                Certifications
            </h2>
        </div>

        <!-- CARD BESAR -->
        <div class="card-glass rounded-3xl p-4 sm:p-6 md:p-10 shadow-2xl">
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 md:gap-8">
                @foreach ($certifications as $certification)
                    <div class="card-inner rounded-2xl p-5 group hover:-translate-y-2 transition-all duration-300">

                        <!-- FRAME SERTIFIKAT -->
                        <div
                            class="w-full aspect-[4/3] bg-zinc-900/50 rounded-xl 
                                flex items-center justify-center overflow-hidden mb-4">
                            <img src="{{ asset('storage/' . $certification->image) }}" alt="{{ $certification->title }}"
                                class="max-w-full max-h-full object-contain group-hover:scale-105 transition-transform duration-500">
                        </div>
                        <div class="border border-white rounded-lg p-2 mb-2">
                            <h3
                                class="font-semibold text-sm text-indigo-400 group-hover:text-white transition-colors text-center">
                                {{ $certification->title }}
                            </h3>
                        </div>


                        <p class="text-xs text-gray-400 mt-2 text-center">
                            {{ $certification->issuer }} | {{ $certification->year }}
                        </p>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- ================= KONTAK & SOSIAL MEDIA ================= --}}
    <section id="contact" class="max-w-7xl mx-auto px-4 sm:px-6 py-14 sm:py-20 md:py-24 scroll-reveal">
        <div class="flex justify-center mb-12">
            <h2 class="section-title text-3xl md:text-4xl font-bold text-center">
                Get In Touch
            </h2>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-8 items-start">

            {{-- ================= CARD HUBUNGI SAYA ================= --}}
            <div
                class="card-glass rounded-3xl p-6 sm:p-8 md:p-10 shadow-2xl border border-white/10 relative overflow-hidden">
                <div class="absolute top-0 right-0 -mt-4 -mr-4 w-24 h-24 bg-indigo-600/10 blur-3xl rounded-full"></div>

                <div class="flex items-center gap-4 mb-8">
                    <div class="bg-indigo-600/20 p-3 rounded-xl">
                        <i class="fa-solid fa-paper-plane text-indigo-400 text-xl"></i>
                    </div>
                    <h2 class="text-2xl font-bold text-white tracking-tight">Kirim Pesan</h2>
                </div>

                <form id="messageForm" class="space-y-5">
                    @csrf
                    <div class="relative group">
                        <i
                            class="fa-solid fa-envelope absolute left-4 top-1/2 -translate-y-1/2 text-zinc-500 group-focus-within:text-indigo-400 transition-colors"></i>
                        <input type="email" name="email" placeholder="Email kamu (email-mu@gmail.com)"
                            class="w-full pl-12 px-4 py-3 rounded-xl bg-zinc-900/50 border border-white/5 text-white focus:ring-2 focus:ring-indigo-500 focus:bg-zinc-800 transition-all outline-none"
                            required>
                    </div>

                    <div class="relative group">
                        <i
                            class="fa-solid fa-phone absolute left-4 top-1/2 -translate-y-1/2 text-zinc-500 group-focus-within:text-indigo-400 transition-colors"></i>
                        <input type="text" name="phone" value="+62"
                            class="w-full pl-12 px-4 py-3 rounded-xl bg-zinc-900/50 border border-white/5 text-white focus:ring-2 focus:ring-indigo-500 focus:bg-zinc-800 transition-all outline-none"
                            required>
                    </div>

                    <div class="relative group">
                        <i
                            class="fa-solid fa-comment-dots absolute left-4 top-4 text-zinc-500 group-focus-within:text-indigo-400 transition-colors"></i>
                        <textarea name="message" rows="5" placeholder="Apa yang ingin kamu diskusikan?"
                            class="w-full pl-12 px-4 py-3 rounded-xl bg-zinc-900/50 border border-white/5 text-white focus:ring-2 focus:ring-indigo-500 focus:bg-zinc-800 transition-all outline-none resize-none"
                            required></textarea>
                    </div>

                    <button type="submit"
                        class="w-full flex items-center justify-center gap-3 bg-indigo-600 hover:bg-indigo-500 transition-all py-4 rounded-xl text-white font-bold shadow-lg shadow-indigo-500/20 active:scale-95">
                        <span>Kirim Sekarang</span>
                        <i class="fa-solid fa-chevron-right text-xs"></i>
                    </button>
                </form>
            </div>

            {{-- ================= CARD SOSIAL MEDIA ================= --}}
            <div class="space-y-6">
                <div
                    class="card-glass rounded-3xl p-8 border border-white/10 bg-gradient-to-br from-zinc-800/40 to-transparent">
                    <h3 class="text-xl font-bold text-white mb-2">Mari Berkolaborasi!</h3>
                    <p class="text-zinc-400 mb-8 leading-relaxed">
                        Saya selalu terbuka untuk projek freelance, kolaborasi tim, atau sekadar menyapa. Pilih platform
                        yang paling nyaman buat kamu.
                    </p>

                    <div class="grid grid-cols-2 gap-4">
                        <a href="https://instagram.com/shofialafarah" target="_blank"
                            class="group flex flex-col items-center gap-3 p-5 rounded-2xl bg-zinc-900/50 border border-white/5 hover:border-pink-500/50 transition-all duration-300 transform hover:-translate-y-1">
                            <div
                                class="w-12 h-12 rounded-xl bg-zinc-800 group-hover:bg-gradient-to-br group-hover:from-pink-500 group-hover:to-orange-400 flex items-center justify-center transition-all duration-300 shadow-inner">
                                <i class="fa-brands fa-instagram text-white text-xl"></i>
                            </div>
                            <span
                                class="text-sm font-semibold text-zinc-400 group-hover:text-white transition">Instagram</span>
                        </a>

                        <a href="https://linkedin.com/in/shofia-nabila-elfa-rahma" target="_blank"
                            class="group flex flex-col items-center gap-3 p-5 rounded-2xl bg-zinc-900/50 border border-white/5 hover:border-blue-500/50 transition-all duration-300 transform hover:-translate-y-1">
                            <div
                                class="w-12 h-12 rounded-xl bg-zinc-800 group-hover:bg-gradient-to-br group-hover:from-blue-500 group-hover:to-blue-600 flex items-center justify-center transition-all duration-300 shadow-inner">
                                <i class="fa-brands fa-linkedin text-white text-xl"></i>
                            </div>
                            <span
                                class="text-sm font-semibold text-zinc-400 group-hover:text-white transition">LinkedIn</span>
                        </a>

                        <a href="https://github.com/shofialafarah" target="_blank"
                            class="group flex flex-col items-center gap-3 p-5 rounded-2xl bg-zinc-900/50 border border-white/5 hover:border-white/20 transition-all duration-300 transform hover:-translate-y-1">
                            <div
                                class="w-12 h-12 rounded-xl bg-zinc-800 group-hover:bg-zinc-700 flex items-center justify-center transition-all duration-300 shadow-inner">
                                <i class="fa-brands fa-github text-white text-xl"></i>
                            </div>
                            <span
                                class="text-sm font-semibold text-zinc-400 group-hover:text-white transition">GitHub</span>
                        </a>

                        <a href="https://behance.net/shofialafarah" target="_blank"
                            class="group flex flex-col items-center gap-3 p-5 rounded-2xl bg-zinc-900/50 border border-white/5 hover:border-cyan-400/50 transition-all duration-300 transform hover:-translate-y-1">
                            <div
                                class="w-12 h-12 rounded-xl bg-zinc-800 group-hover:bg-gradient-to-br group-hover:from-cyan-400 group-hover:to-blue-500 flex items-center justify-center transition-all duration-300 shadow-inner">
                                <i class="fa-brands fa-behance text-white text-xl"></i>
                            </div>
                            <span
                                class="text-sm font-semibold text-zinc-400 group-hover:text-white transition">Behance</span>
                        </a>
                    </div>
                </div>

                {{-- Optional: Lokasi/Availability --}}
                <div class="p-5 bg-indigo-600/5 border border-indigo-500/10 rounded-3xl flex items-center gap-4">
                    <div class="w-3 h-3 bg-green-500 rounded-full animate-pulse"></div>
                    <p class="text-zinc-400 text-sm font-medium">Available for new projects & collaborations</p>
                </div>
            </div>
        </div>
    </section>

@endsection

@section('scripts')
    {{-- TYPING EFFECT DI HOME --}}
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            // Ambil data dari Laravel, jika kosong gunakan default array
            const texts = @json($headlines ?? []);
            const defaultTexts = ['Graphic Designer', 'Web Developer', 'Fresh Graduate'];
            const finalTexts = texts.length > 0 ? texts : defaultTexts;

            let index = 0;
            let charIndex = 0;
            let isDeleting = false;
            const el = document.getElementById('typing-text');

            function typeEffect() {
                const current = finalTexts[index];

                el.textContent = isDeleting ?
                    current.substring(0, charIndex--) :
                    current.substring(0, charIndex++);

                if (!isDeleting && charIndex === current.length) {
                    setTimeout(() => isDeleting = true, 1200);
                }

                if (isDeleting && charIndex === 0) {
                    isDeleting = false;
                    index = (index + 1) % finalTexts.length;
                }

                setTimeout(typeEffect, isDeleting ? 60 : 100);
            }

            typeEffect();
        });
        document.querySelectorAll('.filter-btn').forEach(btn => {
            btn.addEventListener('click', () => {
                // Hapus class active dari semua tombol
                document.querySelectorAll('.filter-btn').forEach(b => b.classList.remove('active'));
                btn.classList.add('active');

                const filter = btn.getAttribute('data-filter');
                document.querySelectorAll('.project-card').forEach(card => {
                    if (filter === 'all' || card.classList.contains(filter)) {
                        card.style.display = 'flex'; // atau 'block' tergantung layout
                    } else {
                        card.style.display = 'none';
                    }
                });
            });
        });
    </script>
    {{-- SCROLL REVEAL ANIMATION --}}
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const observer = new IntersectionObserver(entries => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('revealed')
                    }
                })
            }, {
                threshold: 0.1
            })

            document.querySelectorAll('.scroll-reveal')
                .forEach(el => observer.observe(el))
        })
    </script>
    {{-- MESSAGE --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        document.getElementById('messageForm').addEventListener('submit', async function(e) {
            e.preventDefault();

            const form = this;
            const btn = form.querySelector('button');
            const originalContent = btn.innerHTML;

            const messageText = form.querySelector('textarea[name="message"]').value;
            if (messageText.length < 10) {
                Swal.fire({
                    icon: 'warning',
                    title: 'Pesan Terlalu Singkat',
                    text: 'Tulis minimal 10 karakter ya, supaya Shofia lebih paham maksudmu.',
                    confirmButtonColor: '#4f46e5'
                });
                return;
            }

            btn.disabled = true;
            btn.innerHTML = '<i class="fa-solid fa-circle-notch animate-spin"></i> Mengirim...';

            try {
                const response = await fetch("{{ route('message.store') }}", {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                        'Accept': 'application/json',
                    },
                    body: new FormData(form)
                });

                const data = await response.json();

                if (data.success) {
                    // SUCCESS SWEETALERT
                    Swal.fire({
                        icon: 'success',
                        title: 'Berhasil Terkirim!',
                        text: data.message,
                        showConfirmButton: false,
                        timer: 3000,
                        timerProgressBar: true,
                        background: '#18181b',
                        color: '#fff'
                    });
                    form.reset();
                } else {
                    throw new Error(data.message || 'Terjadi kesalahan');
                }
            } catch (error) {
                // ERROR SWEETALERT
                Swal.fire({
                    icon: 'error',
                    title: 'Gagal Mengirim',
                    text: error.message || 'Cek koneksi internet atau coba lagi nanti.',
                    confirmButtonColor: '#ef4444',
                    background: '#18181b',
                    color: '#fff'
                });
            } finally {
                btn.disabled = false;
                btn.innerHTML = originalContent;
            }
        });
    </script>
@endsection
