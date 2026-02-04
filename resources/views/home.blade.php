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
                    <div
                        class="absolute inset-0 bg-gradient-to-br from-indigo-600 via-purple-600 to-pink-600 rounded-full blur-3xl opacity-40 animate-pulse">
                    </div>
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
                                <div
                                    class="bg-zinc-900/50 rounded-xl p-3 mb-2 hover:bg-indigo-600/20 transition-all duration-300">
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
                                <div
                                    class="bg-zinc-900/50 rounded-xl p-3 mb-2 hover:bg-indigo-600/20 transition-all duration-300">
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
                                <div
                                    class="bg-zinc-900/50 rounded-xl p-3 mb-2 hover:bg-indigo-600/20 transition-all duration-300">
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
                        <div
                            class="w-full overflow-hidden rounded-xl mb-4
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
                        <div
                            class="w-full aspect-[4/3] bg-zinc-900/50 rounded-xl 
                                flex items-center justify-center overflow-hidden mb-4">
                            <img src="{{ asset('storage/' . $certification->image) }}" alt="{{ $certification->title }}"
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
    <section id="comments" class="max-w-7xl mx-auto px-6 py-24">
        <div class="card-glass rounded-3xl p-6 md:p-10">
            {{-- FORM KOMENTAR --}}
            <form id="commentForm" class="space-y-4 mb-10">
                @csrf
                <input name="name" placeholder="Nama" class="w-full px-4 py-2 rounded bg-zinc-800 text-white"
                    required>

                <textarea name="message" placeholder="Tulis komentar..." class="w-full px-4 py-2 rounded bg-zinc-800 text-white"
                    required></textarea>

                <button class="bg-indigo-600 px-6 py-2 rounded">Kirim</button>
            </form>

            {{-- LIST KOMENTAR --}}
            <div id="comment-list" class="space-y-6">
                @foreach ($comments as $comment)
                    @include('partials.comment', ['comment' => $comment])
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
        document.addEventListener('submit', async function(e) {

            if (e.target.matches('.reply-form') || e.target.matches('#commentForm')) {
                e.preventDefault()

                const form = e.target
                const formData = new FormData(form)

                const res = await fetch("{{ route('comment.store') }}", {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    body: formData
                })

                const data = await res.json()

                if (form.dataset.parent) {
                    form.insertAdjacentHTML('beforebegin', data.html)
                    form.reset()
                    form.classList.add('hidden')
                } else {
                    document.getElementById('comment-list')
                        .insertAdjacentHTML('afterbegin', data.html)
                    form.reset()
                }
            }

        })

        document.addEventListener('click', async function(e) {

    const likeBtn = e.target.closest('.like-btn')
    if (likeBtn) {
        const id = likeBtn.dataset.id

        const res = await fetch("{{ route('comment.reaction') }}", {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({
                comment_id: id
            })
        })

        const data = await res.json()
        likeBtn.querySelector('.like-count').innerText = data.count
    }

    // REPLY
    if (e.target.classList.contains('reply-btn')) {
        const id = e.target.dataset.id
        const form = document.querySelector(`.reply-form[data-parent="${id}"]`)
        form.classList.toggle('hidden')
    }

})

    </script>


@endsection
