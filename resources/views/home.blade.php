@extends('layouts.public')

@section('title', 'Shofia Lafarah\'s Portfolio')

@section('content')

    {{-- ================= PAGE LOADER ================= --}}
    <div class="page-loader">
        <div class="loader-content">
            <div class="loader-spinner"></div>
            <div class="loader-text">LOADING</div>
        </div>
    </div>

    {{-- ================= GRID BACKGROUND ================= --}}
    <div class="grid-background">
        <div class="grid-layer"></div>
    </div>

    {{-- ================= HOME ================= --}}
    <section id="home" class="max-w-7xl mx-auto px-6 py-24">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-12 items-center">

            {{-- KIRI --}}
            <div class="animate-fade-in-left">
                <h1 class="text-4xl md:text-5xl font-bold mb-4">
                    Halo, saya <span class="text-indigo-400">{{ $profile->name }}</span>
                </h1>
                <h2 class="text-xl md:text-2xl font-semibold mb-6">
                    <span class="text-indigo-300" id="typing-text"></span><span class="typing-cursor text-white">|</span>
                </h2>

                <p class="text-gray-300 leading-relaxed mb-8">
                    {{-- {{ $profile->about }} --}}
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
                </p>

                {{-- BUTTON --}}
                <div class="flex flex-wrap gap-4 mb-8">
                    <a href="{{ asset('cv/CV_Shofia Nabila Elfa Rahma.pdf') }}" download
                        class="px-6 py-3 bg-indigo-600 hover:bg-indigo-700 transition-all duration-300 rounded-lg font-semibold hover:shadow-lg hover:scale-100">
                        Download CV
                    </a>

                    <a href="#skills"
                        class="px-6 py-3 border border-indigo-500 text-indigo-300 hover:bg-indigo-600 hover:text-white transition-all duration-300 rounded-lg hover:scale-105">
                        Lihat Skill
                    </a>
                </div>

                {{-- SOSMED --}}
                <div class="flex gap-5 text-2xl text-gray-400">
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
                    $photo = $profile->photo ? asset('storage/' . $profile->photo) : asset('images/profil.jpg');
                @endphp

                <div class="relative">
                    <div class="absolute inset-0 bg-gradient-to-br from-indigo-600 via-purple-600 to-pink-600 rounded-full blur-3xl opacity-40 animate-pulse"></div>
                    <img src="{{ $photo }}" alt="Foto Profil"
                        class="relative w-72 h-72 rounded-full border-4 border-indigo-500 shadow-2xl shadow-indigo-500/50 object-cover hover:scale-105 transition-transform duration-500">
                </div>
            </div>

        </div>
    </section>

    {{-- ================= SKILLS ================= --}}
    <section id="skills" class="max-w-7xl mx-auto px-6 py-24 scroll-reveal">
        <h2 class="text-3xl md:text-4xl font-bold mb-12 text-center section-title">
            Tech Stack & Tools
        </h2>

        <div class="card-glass rounded-3xl p-6 md:p-10 shadow-2xl">
            <div class="grid md:grid-cols-3 gap-8">
                {{-- DESIGN --}}
                <div class="card-inner rounded-2xl p-6 hover:-translate-y-2 transition-all duration-300">
                    <h3 class="text-xl font-semibold mb-6 text-indigo-400 text-center">
                        <span class="inline-block hover:scale-110 transition-transform">🎨</span> Design
                    </h3>
                    <div class="grid grid-cols-3 gap-6">
                        @foreach ($designSkills as $index => $skill)
                            <div class="text-center animate-fade-up hover:scale-110 transition-transform duration-300"
                                style="animation-delay: {{ $index * 0.15 }}s">
                                <div class="bg-zinc-900/50 rounded-xl p-3 mb-2 hover:bg-indigo-600/20 transition-all duration-300">
                                    <img src="{{ asset('storage/' . $skill->icon) }}" class="h-12 mx-auto">
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
                                <div class="bg-zinc-900/50 rounded-xl p-3 mb-2 hover:bg-indigo-600/20 transition-all duration-300">
                                    <img src="{{ asset('storage/' . $skill->icon) }}" class="h-12 mx-auto">
                                </div>
                                <p class="text-xs text-gray-300">{{ $skill->name }}</p>
                            </div>
                        @endforeach
                    </div>
                </div>

                {{-- OFFICE --}}
                <div class="card-inner rounded-2xl p-6 hover:-translate-y-2 transition-all duration-300">
                    <h3 class="text-xl font-semibold mb-6 text-indigo-400 text-center">
                        <span class="inline-block hover:scale-110 transition-transform">📊</span> Microsoft & Admin
                    </h3>
                    <div class="grid grid-cols-3 gap-6">
                        @foreach ($officeSkills as $index => $skill)
                            <div class="text-center hover:scale-110 transition-transform duration-300"
                                style="animation-delay: {{ $index * 0.15 }}s">
                                <div class="bg-zinc-900/50 rounded-xl p-3 mb-2 hover:bg-indigo-600/20 transition-all duration-300">
                                    <img src="{{ asset('storage/' . $skill->icon) }}" class="h-12 mx-auto">
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
    <section id="projects" class="max-w-7xl mx-auto px-6 py-24 scroll-reveal">
        <h2 class="text-3xl md:text-4xl font-bold text-center mb-12 section-title">Projects</h2>
        
        {{-- FILTER --}}
        <div class="flex justify-center mb-12">
            <div class="inline-flex gap-3 card-glass rounded-2xl px-6 py-4">
                <button class="filter-btn active" data-filter="all">All</button>
                <button class="filter-btn" data-filter="web">Web</button>
                <button class="filter-btn" data-filter="design">Design</button>
            </div>
        </div>

        <div class="card-glass rounded-3xl p-6 md:p-10 shadow-2xl">
            <!-- GRID PROJECT -->
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach ($projects as $project)
                    <div class="project-card {{ $project->category }} card-inner rounded-2xl p-4 overflow-hidden group">

                        {{-- WRAPPER GAMBAR (DINAMIS) --}}
                        <div class="w-full overflow-hidden rounded-xl mb-4
                            {{ $project->category === 'design' ? 'aspect-[4/5]' : 'aspect-video' }}
                            bg-zinc-900/50">
                            <img src="{{ asset('storage/' . $project->image) }}" 
                                 class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500"
                                 alt="{{ $project->title }}">
                        </div>

                        <h3 class="font-semibold text-lg text-indigo-300 group-hover:text-indigo-400 transition-colors">
                            {{ $project->title }}
                        </h3>

                        <p class="text-sm text-gray-400 mt-2 leading-relaxed">
                            {{ $project->description }}
                        </p>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- ================= SERTIFIKAT ================= --}}
    <section id="certifications" class="max-w-7xl mx-auto px-6 py-24 scroll-reveal">
        <h2 class="text-3xl md:text-4xl font-bold text-center mb-12 section-title">
            Certifications
        </h2>

        <!-- CARD BESAR -->
        <div class="card-glass rounded-3xl p-6 md:p-10 shadow-2xl">
            <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach ($certifications as $certification)
                    <div class="card-inner rounded-2xl p-5 group hover:-translate-y-2 transition-all duration-300">

                        <!-- FRAME SERTIFIKAT -->
                        <div class="w-full aspect-[4/3] bg-zinc-900/50 rounded-xl 
                                flex items-center justify-center overflow-hidden mb-4">
                            <img src="{{ asset('storage/' . $certification->image) }}" 
                                 alt="{{ $certification->title }}"
                                 class="max-w-full max-h-full object-contain group-hover:scale-105 transition-transform duration-500">
                        </div>

                        <h3 class="font-semibold text-sm text-indigo-300 group-hover:text-indigo-400 transition-colors">
                            {{ $certification->title }}
                        </h3>

                        <p class="text-xs text-gray-400 mt-2">
                            {{ $certification->issuer }} • {{ $certification->year }}
                        </p>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- ================= KOMENTAR ================= --}}
    <section id="comments" class="max-w-7xl mx-auto px-6 py-24 scroll-reveal">
        @if (session('success'))
            <div class="bg-green-500/20 border border-green-400/50 text-green-300 px-6 py-4 rounded-xl mb-8 backdrop-blur-sm animate-fade-up" role="alert">
                ✓ {{ session('success') }}
            </div>
        @endif
        
        <div class="card-glass rounded-3xl p-6 md:p-10 shadow-2xl">
            <form action="{{ route('comments.store') }}" method="POST" class="max-w-3xl mx-auto space-y-6 mb-12">
                @csrf
                <input type="text" name="name" placeholder="Nama Anda" required
                    class="w-full px-5 py-3 rounded-xl border border-indigo-500/30 bg-zinc-800/50 
                           text-white placeholder-gray-400 
                           focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent
                           transition-all duration-300" />

                <textarea name="message" placeholder="Tulis komentar..." required rows="4"
                    class="w-full px-5 py-3 rounded-xl border border-indigo-500/30 bg-zinc-800/50 
                           text-white placeholder-gray-400
                           focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent
                           transition-all duration-300 resize-none"></textarea>

                <button type="submit"
                    class="bg-gradient-to-r from-indigo-600 to-purple-600 hover:from-indigo-700 hover:to-purple-700 
                           text-white font-semibold px-8 py-3 rounded-xl 
                           transition-all duration-300 hover:scale-105 hover:shadow-lg">
                    Kirim Komentar
                </button>
            </form>

            <div class="border-t border-gray-700/50 pt-8">
                <h3 class="text-2xl font-semibold mb-6 text-indigo-300">Komentar:</h3>

                @if ($comments->count())
                    <div class="space-y-4">
                        @foreach ($comments as $comment)
                            <div class="card-inner rounded-xl p-5 hover:-translate-y-1 transition-all duration-300">
                                <div class="flex justify-between items-start mb-3">
                                    <div class="flex items-center gap-3">
                                        <div class="w-10 h-10 rounded-full bg-gradient-to-br from-indigo-500 to-purple-500 flex items-center justify-center font-bold text-white">
                                            {{ strtoupper(substr($comment->name, 0, 1)) }}
                                        </div>
                                        <strong class="text-indigo-300">{{ $comment->name }}</strong>
                                    </div>
                                    <small class="text-gray-500 text-xs">{{ $comment->created_at->diffForHumans() }}</small>
                                </div>
                                <p class="text-gray-300 leading-relaxed pl-13">{{ $comment->message }}</p>
                            </div>
                        @endforeach
                    </div>
                @else
                    <p class="text-gray-400 text-center py-8">Belum ada komentar. Jadilah yang pertama! 💬</p>
                @endif
            </div>
        </div>
    </section>

@endsection

@section('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const texts = @json($headlines);

            if (!texts.length) return;

            let index = 0;
            let charIndex = 0;
            let isDeleting = false;
            const el = document.getElementById('typing-text');

            function typeEffect() {
                const current = texts[index];

                el.textContent = isDeleting ?
                    current.substring(0, charIndex--) :
                    current.substring(0, charIndex++);

                if (!isDeleting && charIndex === current.length) {
                    setTimeout(() => isDeleting = true, 1200);
                }

                if (isDeleting && charIndex === 0) {
                    isDeleting = false;
                    index = (index + 1) % texts.length;
                }

                setTimeout(typeEffect, isDeleting ? 60 : 100);
            }

            typeEffect();
        });
    </script>
@endsection