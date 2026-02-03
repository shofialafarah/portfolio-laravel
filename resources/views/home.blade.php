@extends('layouts.public')

@section('title', 'Home')

@section('content')

    {{-- ================= HOME ================= --}}
    <section id="home" class="max-w-7xl mx-auto px-6 py-24">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-12 items-center">

            {{-- KIRI --}}
            <div class="animate-fade-in-left">
                <h1 class="text-4xl md:text-5xl font-bold mb-4">
                    Halo, saya <span class="text-indigo-400">{{ $profile->name }}</span>
                </h1>

                {{-- <h2 class="text-xl md:text-2xl text-indigo-300 font-semibold mb-6">
                    {{ $profile->headline }}
                </h2> --}}
                {{-- <h2 class="text-xl md:text-2xl font-semibold mb-6">
                    <span class="text-indigo-300" id="typing-text"></span>
                    <span class="cursor">|</span>
                </h2> --}}
                <h2 class="text-xl md:text-2xl  font-semibold mb-6">
                    <span class="text-indigo-300" id="typing-text"></span><span class="typing-cursor text-white">|</span>
                </h2>




                <p class="text-gray-300 leading-relaxed mb-8">
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
                        class="px-6 py-3 bg-indigo-600 hover:bg-indigo-700 transition rounded-lg font-semibold">
                        Download CV
                    </a>

                    <a href="#skills"
                        class="px-6 py-3 border border-indigo-500 text-indigo-300 hover:bg-indigo-600 hover:text-white transition rounded-lg">
                        Lihat Skill
                    </a>
                </div>

                {{-- SOSMED --}}
                <div class="flex gap-5 text-2xl text-gray-400">
                    <a href="https://instagram.com/shofialafarah" target="_blank"><i class="fab fa-instagram"></i></a>
                    <a href="https://www.behance.net/shofialafarah" target="_blank"><i class="fab fa-behance"></i></a>
                    <a href="https://github.com/shofialafarah" target="_blank"><i class="fab fa-github"></i></a>
                    <a href="https://linkedin.com/in/shofia-nabila-elfa-rahma" target="_blank"><i
                            class="fab fa-linkedin"></i></a>
                </div>
            </div>

            {{-- KANAN --}}
            <div class="flex justify-center md:justify-end animate-fade-in-right">
                @php
                    $photo = $profile->photo ? asset('storage/' . $profile->photo) : asset('images/profil.jpg');
                @endphp

                <div class="relative">
                    <div class="absolute inset-0 bg-indigo-600 rounded-full blur-2xl opacity-30"></div>
                    <img src="{{ $photo }}" alt="Foto Profil"
                        class="relative w-72 h-72 rounded-full border-4 border-indigo-500 shadow-xl object-cover">
                </div>

            </div>

        </div>
    </section>

    {{-- ================= SKILLS ================= --}}
    <section id="skills" class="max-w-7xl mx-auto px-6 py-24">
        <h2 class="text-3xl font-bold mb-12 text-center">
            Tech Stack & Tools
        </h2>

        <div class="bg-zinc-900/60 backdrop-blur rounded-2xl p-6 md:p-10 shadow-2xl">
            <div class="grid md:grid-cols-3 gap-12">
                {{-- DESIGN --}}
                <div class="bg-zinc-800 rounded-xl p-4 hover:-translate-y-1 transition">
                    <h3 class="text-xl font-semibold mb-6 text-indigo-400 text-center animate-fade-up">
                        Design
                    </h3>
                    <div class="grid grid-cols-3 gap-6">
                        @foreach ($designSkills as $index => $skill)
                            <div class="text-center animate-fade-up hover:scale-110 transition"
                                style="animation-delay: {{ $index * 0.15 }}s">
                                <img src="{{ asset('storage/' . $skill->icon) }}" class="h-14 mx-auto mb-2">
                                <p class="text-sm">{{ $skill->name }}</p>
                            </div>
                        @endforeach
                    </div>
                </div>

                {{-- WEB --}}
                <div class="bg-zinc-800 rounded-xl p-4 hover:-translate-y-1 transition">
                    <h3 class="text-xl font-semibold mb-6 text-indigo-400 text-center">Programming</h3>
                    <div class="grid grid-cols-3 gap-6">
                        @foreach ($webSkills as $skill)
                            <div class="text-center hover:scale-110 transition">
                                <img src="{{ asset('storage/' . $skill->icon) }}" class="h-14 mx-auto mb-2">
                                <p class="text-sm">{{ $skill->name }}</p>
                            </div>
                        @endforeach
                    </div>
                </div>

                {{-- OFFICE --}}
                <div class="bg-zinc-800 rounded-xl p-4 hover:-translate-y-1 transition">
                    <h3 class="text-xl font-semibold mb-6 text-indigo-400 text-center">Microsoft & Admin</h3>
                    <div class="grid grid-cols-3 gap-6">
                        @foreach ($officeSkills as $skill)
                            <div class="text-center hover:scale-110 transition">
                                <img src="{{ asset('storage/' . $skill->icon) }}" class="h-14 mx-auto mb-2">
                                <p class="text-sm">{{ $skill->name }}</p>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- ================= PROJEK & SERTIFIKAT ================= --}}
    <section id="projects" class="max-w-7xl mx-auto px-6 py-24">
        <h2 class="text-3xl font-bold text-center mb-12">Projects</h2>
        {{-- FILTER --}}
        <div class="flex justify-center mb-12">
            <div
                class="inline-flex gap-3 bg-zinc-900/60 backdrop-blur border border-white/10 rounded-2xl px-4 py-3 shadow-lg">
                <button class="filter-btn" data-filter="all">All</button>
                <button class="filter-btn" data-filter="web">Web</button>
                <button class="filter-btn" data-filter="design">Design</button>
            </div>
        </div>

        <div class="bg-zinc-900/60 backdrop-blur rounded-2xl p-6 md:p-10 shadow-2xl">
            <!-- GRID PROJECT -->
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach ($projects as $project)
                    <div
                        class="project-card {{ $project->category }} bg-zinc-800 rounded-xl p-4 hover:-translate-y-1 transition">

                        {{-- WRAPPER GAMBAR (DINAMIS) --}}
                        <div
                            class="w-full overflow-hidden rounded-lg
                        {{ $project->category === 'design' ? 'aspect-[4/5]' : 'aspect-video' }}">

                            <img src="{{ asset('storage/' . $project->image) }}" class="w-full h-full object-cover"
                                alt="{{ $project->title }}">
                        </div>

                        <h3 class="mt-4 font-semibold text-lg">
                            {{ $project->title }}
                        </h3>

                        <p class="text-sm text-gray-400 mt-1">
                            {{ $project->description }}
                        </p>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    {{-- ================= SERTIFIKAT ================= --}}
    <section id="certifications" class="max-w-7xl mx-auto px-6 py-24">
        <h2 class="text-3xl font-bold text-center mb-12">
            Certifications
        </h2>

        <!-- CARD BESAR -->
        <div class="bg-zinc-900/60 backdrop-blur rounded-2xl p-6 md:p-10 shadow-2xl">

            <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach ($certifications as $cert)
                    <div class="bg-zinc-800 rounded-xl p-4 hover:-translate-y-1 transition">

                        <!-- FRAME SERTIFIKAT -->
                        <div
                            class="w-full aspect-[4/3] bg-zinc-900 rounded-lg 
                                flex items-center justify-center overflow-hidden">

                            <img src="{{ asset('storage/' . $cert->image) }}" alt="{{ $cert->title }}"
                                class="max-w-full max-h-full object-contain">
                        </div>

                        <h3 class="mt-4 font-semibold text-sm">
                            {{ $cert->title }}
                        </h3>

                        <p class="text-xs text-gray-400 mt-1">
                            {{ $cert->issuer }} • {{ $cert->year }}
                        </p>
                    </div>
                @endforeach
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
    <script>
        document.querySelectorAll('.filter-btn').forEach(btn => {
            btn.addEventListener('click', () => {
                const filter = btn.dataset.filter;

                document.querySelectorAll('.project-card').forEach(card => {
                    card.style.display =
                        filter === 'all' || card.classList.contains(filter) ?
                        'block' :
                        'none';
                });
            });
        });
    </script>

@endsection
