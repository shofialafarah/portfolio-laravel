@extends('layouts.public')

@section('title', 'Home')

@section('content')

    {{-- ================= HOME ================= --}}
    <section id="home" class="max-w-7xl mx-auto px-6 py-24">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-12 items-center">

            {{-- KIRI --}}
            <div class="animate-fade-in-left">
                <h1 class="text-4xl md:text-5xl font-bold mb-4">
                    Halo, saya <span class="text-indigo-400">Shofia</span> 👋
                </h1>

                <h2 class="text-xl md:text-2xl text-indigo-300 font-semibold mb-6">
                    Web Developer | Graphic Designer | Fashion Designer
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
                <div class="relative">
                    <div class="absolute inset-0 bg-indigo-600 rounded-full blur-2xl opacity-30"></div>
                    <img src="{{ asset('images/foto-profil.jpg') }}"
                        class="relative w-72 h-72 rounded-full border-4 border-indigo-500 shadow-xl">
                </div>
            </div>

        </div>
    </section>

    {{-- ================= SKILLS ================= --}}
    <section id="skills" class="max-w-7xl mx-auto px-6 py-24">
        <h2 class="text-3xl font-bold mb-12 text-center">
            Skill & Tools
        </h2>

        <div class="grid md:grid-cols-3 gap-12">

            {{-- DESIGN --}}
            <div>
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
            <div>
                <h3 class="text-xl font-semibold mb-6 text-indigo-400 text-center">Web</h3>
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
            <div>
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
    </section>

@endsection
