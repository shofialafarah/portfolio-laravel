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

                    <a href="#projects"
                        class="px-6 py-3 border border-indigo-500 text-indigo-300 hover:bg-indigo-600 hover:text-white transition-all duration-300 rounded-lg hover:scale-105">
                        Lihat Project
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
        <div class="flex justify-center mb-12">
            <h2 class="section-title text-3xl md:text-4xl font-bold text-center">
                Tech Stack & Tools
            </h2>
        </div>

        <div class="card-glass rounded-3xl p-6 md:p-10 shadow-2xl">
            <div class="grid md:grid-cols-3 gap-8">
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
        <div class="flex justify-center mb-12">
            <h2 class="section-title text-3xl md:text-4xl font-bold text-center">
                Projects
            </h2>
        </div>

        {{-- FILTER --}}
        <div class="flex justify-center mb-12">
            <div class="inline-flex gap-3 card-glass rounded-2xl px-6 py-4">
                <button class="filter-btn active" data-filter="all">Semua</button>
                <button class="filter-btn" data-filter="web">Web</button>
                <button class="filter-btn" data-filter="design">Desain</button>
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
                        <div class="border border-white rounded-lg p-2 mb-2">
                            <h3
                                class="font-semibold text-lg text-indigo-400 group-hover:text-white transition-colors text-center">
                                {{ $project->title }}
                            </h3>
                        </div>
                        <p class="text-sm text-gray-400 mt-2 leading-relaxed text-center">
                            {{ $project->description }}
                        </p>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- ================= SERTIFIKAT ================= --}}
    <section id="certifications" class="max-w-7xl mx-auto px-6 py-24 scroll-reveal">
        <div class="flex justify-center mb-12">
            <h2 class="section-title text-3xl md:text-4xl font-bold text-center">
                Certifications
            </h2>
        </div>

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

    {{-- ================= KOMENTAR & KONTAK ================= --}}
    <section id="comments" class="max-w-7xl mx-auto px-6 py-24 scroll-reveal">
        <div class="flex justify-center mb-12">
            <h2 class="section-title text-3xl md:text-4xl font-bold text-center">
                Comments & Contact
            </h2>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">

            {{-- ================= CARD KOMENTAR ================= --}}
            <div class="card-glass rounded-3xl p-6 md:p-8">

                {{-- HEADLINE --}}
                <div class="flex items-center gap-4 mb-6">
                    <div class="bg-indigo-600/20 p-3 rounded-xl">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-indigo-400" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M8 10h.01M12 10h.01M16 10h.01M21 12c0 4.418-4.03 8-9 8a9.77 9.77 0 01-4-.8L3 20l1.2-3A7.9 7.9 0 013 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" />
                        </svg>
                    </div>
                    <h2 class="text-xl font-semibold text-white">
                        Komentar ({{ $comments->count() }})
                    </h2>
                </div>

                {{-- FORM KOMENTAR --}}
                <form id="commentForm" class="space-y-4">
                    @csrf

                    <div class="relative">
                        <i class="fa-solid fa-user absolute left-4 top-1/2 -translate-y-1/2 text-zinc-400"></i>
                        <input name="name" placeholder="Nama"
                            class="w-full pl-12 px-4 py-2 rounded-lg bg-zinc-800 text-white focus:ring-2 focus:ring-indigo-500"
                            required>
                    </div>

                    <div class="relative">
                        <i class="fa-solid fa-comment absolute left-4 top-4 text-zinc-400"></i>
                        <textarea name="message" rows="4" placeholder="Tulis komentar..."
                            class="w-full pl-12 px-4 py-2 rounded-lg bg-zinc-800 text-white focus:ring-2 focus:ring-indigo-500" required></textarea>
                    </div>


                    {{-- FOTO PROFIL (OPTIONAL) --}}
                    <div
                        class="bg-zinc-800 border border-zinc-700 rounded-lg p-6 text-center hover:border-indigo-500 transition">

                        <img id="avatarPreview"
                            class="w-20 h-20 rounded-full mx-auto mb-3 hidden object-cover border border-zinc-600" />


                        <p class="text-sm text-zinc-400 mb-4">
                            Foto Profil (Opsional)
                        </p>

                        <label
                            class="inline-flex items-center gap-2 px-4 py-2 bg-zinc-700 hover:bg-indigo-600 rounded-lg cursor-pointer text-sm text-white transition">
                            <i class="fa-solid fa-upload"></i>
                            Pilih Foto
                            <input type="file" name="avatar" id="avatarInput" class="hidden" accept="image/*">
                        </label>
                    </div>



                    <button type="submit"
                        class="w-full flex items-center justify-center gap-2 bg-indigo-600 hover:bg-indigo-700 transition px-6 py-2 rounded-lg text-white font-medium">
                        <i class="fa-solid fa-paper-plane"></i>
                        Kirim Komentar
                    </button>

                    {{-- PEMBATAS --}}
                    <hr class="my-8 border-zinc-700">

                </form>
                {{-- LIST KOMENTAR --}}
                <div id="comment-list" class="mt-10 space-y-6 max-h-[300px] overflow-y-auto pr-3 comment-scroll">
                    @foreach ($comments as $comment)
                        @include('partials.comment', ['comment' => $comment])
                    @endforeach
                </div>


            </div>

            {{-- ================= CARD HUBUNGI SAYA ================= --}}
            <div class="card-glass rounded-3xl p-6 md:p-8">

                {{-- HEADLINE --}}
                <div class="flex items-center gap-4 mb-6">
                    <div class="bg-indigo-600/20 p-3 rounded-xl">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-indigo-400" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M8 10h.01M12 10h.01M16 10h.01M21 12c0 4.418-4.03 8-9 8a9.77 9.77 0 01-4-.8L3 20l1.2-3A7.9 7.9 0 013 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" />
                        </svg>
                    </div>
                    <h2 class="text-xl font-semibold text-white">
                        Hubungi Saya
                    </h2>
                </div>


                <form id="messageForm" class="space-y-4">
                    @csrf

                    <div class="relative">
                        <i class="fa-solid fa-envelope absolute left-4 top-1/2 -translate-y-1/2 text-zinc-400"></i>
                        <input type="email" name="email" placeholder="email-mu@gmail.com"
                            class="w-full pl-12 px-4 py-2 rounded-lg bg-zinc-800 text-white focus:ring-2 focus:ring-indigo-500"
                            required>
                    </div>

                    <div class="relative">
                        <i class="fa-solid fa-phone absolute left-4 top-1/2 -translate-y-1/2 text-zinc-400"></i>
                        <input type="text" name="phone" value="+62"
                            class="w-full pl-12 px-4 py-2 rounded-lg bg-zinc-800 text-white focus:ring-2 focus:ring-indigo-500"
                            required>
                    </div>
                    <div class="relative">
                        <i class="fa-solid fa-comment absolute left-4 top-4 text-zinc-400"></i>
                        <textarea name="message" rows="4" placeholder="Pesan"
                            class="w-full pl-12 px-4 py-2 rounded-lg bg-zinc-800 text-white focus:ring-2 focus:ring-indigo-500" required></textarea>
                    </div>
                    <button type="submit"
                        class="w-full flex items-center justify-center gap-2 bg-indigo-600 hover:bg-indigo-700 transition px-6 py-2 rounded-lg text-white font-medium">
                        <i class="fa-solid fa-paper-plane"></i>
                        Kirim Pesan
                    </button>

                    {{-- PEMBATAS --}}
                    <hr class="my-8 border-zinc-700">

                    {{-- CONNECT WITH ME --}}
                    <div
                        class="bg-gradient-to-br from-zinc-800/80 to-zinc-900/80 border border-zinc-700 rounded-2xl p-8 backdrop-blur-sm">
                        <p class="text-white font-semibold mb-6 flex items-center gap-2 text-lg">
                            <i class="fa-solid fa-share-nodes text-indigo-400"></i>
                            Connect with me
                        </p>

                        <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                            <!-- Instagram -->
                            <a href="https://instagram.com/shofialafarah" target="_blank"
                                class="group flex flex-col items-center gap-3 p-6 rounded-xl bg-zinc-700/40 border border-zinc-600 hover:border-pink-500 transition-all duration-300 transform hover:scale-105 hover:shadow-lg hover:shadow-pink-500/20">
                                <div
                                    class="w-14 h-14 rounded-xl bg-zinc-600 group-hover:bg-gradient-to-br group-hover:from-pink-500 group-hover:to-orange-400 flex items-center justify-center transition-all duration-300">
                                    <i class="fa-brands fa-instagram text-white text-xl"></i>
                                </div>
                                <span
                                    class="text-sm font-medium text-gray-300 group-hover:text-white transition">Instagram</span>
                            </a>

                            <!-- LinkedIn -->
                            <a href="https://linkedin.com/in/shofia-nabila-elfa-rahma" target="_blank"
                                class="group flex flex-col items-center gap-3 p-6 rounded-xl bg-zinc-700/40 border border-zinc-600 hover:border-blue-500 transition-all duration-300 transform hover:scale-105 hover:shadow-lg hover:shadow-blue-500/20">
                                <div
                                    class="w-14 h-14 rounded-xl bg-zinc-600 group-hover:bg-gradient-to-br group-hover:from-blue-500 group-hover:to-blue-600 flex items-center justify-center transition-all duration-300">
                                    <i class="fa-brands fa-linkedin text-white text-xl"></i>
                                </div>
                                <span
                                    class="text-sm font-medium text-gray-300 group-hover:text-white transition">LinkedIn</span>
                            </a>

                            <!-- GitHub -->
                            <a href="https://github.com/shofialafarah" target="_blank"
                                class="group flex flex-col items-center gap-3 p-6 rounded-xl bg-zinc-700/40 border border-zinc-600 hover:border-gray-300 transition-all duration-300 transform hover:scale-105 hover:shadow-lg hover:shadow-gray-500/20">
                                <div
                                    class="w-14 h-14 rounded-xl bg-zinc-600 group-hover:bg-gradient-to-br group-hover:from-gray-700 group-hover:to-black flex items-center justify-center transition-all duration-300">
                                    <i class="fa-brands fa-github text-white text-xl"></i>
                                </div>
                                <span
                                    class="text-sm font-medium text-gray-300 group-hover:text-white transition">GitHub</span>
                            </a>

                            <!-- Behance -->
                            <a href="https://behance.net/shofialafarah" target="_blank"
                                class="group flex flex-col items-center gap-3 p-6 rounded-xl bg-zinc-700/40 border border-zinc-600 hover:border-cyan-400 transition-all duration-300 transform hover:scale-105 hover:shadow-lg hover:shadow-cyan-500/20">
                                <div
                                    class="w-14 h-14 rounded-xl bg-zinc-600 group-hover:bg-gradient-to-br group-hover:from-cyan-400 group-hover:to-blue-500 flex items-center justify-center transition-all duration-300">
                                    <i class="fa-brands fa-behance text-white text-xl"></i>
                                </div>
                                <span
                                    class="text-sm font-medium text-gray-300 group-hover:text-white transition">Behance</span>
                            </a>
                        </div>
                    </div>


                </form>

            </div>
        </div>
    </section>

@endsection

@section('scripts')
    {{-- TYPING EFFECT DI HOME --}}
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
    {{-- KOMENTAR AJAX --}}
    <script>
        document.addEventListener('submit', async function(e) {
            const form = e.target

            if (form.classList.contains('reply-form') || form.id === 'commentForm') {
                e.preventDefault()
                console.log('Form submitted:', form.id)

                const formData = new FormData(form)
                console.log('CSRF Token:', '{{ csrf_token() }}')

                try {
                    const res = await fetch("{{ route('comment.store') }}", {
                        method: 'POST',
                        headers: {
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        },
                        body: formData
                    })

                    const responseText = await res.text()
                    console.log('Response status:', res.status)
                    console.log('Response text:', responseText)

                    if (!res.ok) {
                        alert('Error ' + res.status + ': ' + responseText.substring(0, 200))
                        return
                    }

                    const data = JSON.parse(responseText)

                    if (form.dataset.parent) {
                        form.insertAdjacentHTML('beforebegin', data.html)
                        form.reset()
                        form.classList.add('hidden')
                    } else {
                        document.getElementById('comment-list')
                            .insertAdjacentHTML('afterbegin', data.html)
                        form.reset()
                        alert('Komentar berhasil dikirim!')
                    }
                } catch (error) {
                    console.error('Error:', error)
                    alert('Terjadi kesalahan: ' + error.message)
                }
            }
        })



        // LIKE BUTTON
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
    {{-- AVATAR PREVIEW --}}
    <script>
        document.getElementById('avatarInput')?.addEventListener('change', function(e) {
            const file = e.target.files[0]
            if (!file) return

            const preview = document.getElementById('avatarPreview')
            const icon = document.getElementById('avatarIcon')

            if (preview) {
                preview.src = URL.createObjectURL(file)
                preview.classList.remove('hidden')
            }
            if (icon) {
                icon.classList.add('hidden')
            }
        })
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
                threshold: 0.25
            })

            document.querySelectorAll('.scroll-reveal')
                .forEach(el => observer.observe(el))
        })
    </script>




@endsection
