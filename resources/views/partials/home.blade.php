{{-- ================= HOME / HERO ================= --}}
<section id="home" class="max-w-7xl mx-auto px-4 sm:px-6 py-12 sm:py-20 md:py-24">
    <div class="flex flex-col-reverse md:grid md:grid-cols-2 gap-8 md:gap-12 items-center">

        {{-- KIRI: Teks --}}
        <div class="animate-fade-in-left text-center md:text-left">
            <h1 class="text-3xl sm:text-4xl md:text-5xl font-bold mb-3">
                Halo, saya <span class="text-indigo-400">{{ $profile->name ?? 'Shofia Lafarah' }}</span>
            </h1>

            <h2 class="text-lg sm:text-xl md:text-2xl font-semibold mb-4">
                <span class="text-indigo-300" id="typing-text"></span><span class="typing-cursor text-white">|</span>
            </h2>

            <p class="text-gray-300 leading-relaxed mb-6 text-sm sm:text-base whitespace-pre-line indent-8 text-justify max-w-prose mx-auto md:mx-0">
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
                    Selain desain, saya juga memiliki dasar pemrograman web menggunakan Laravel dan Tailwind CSS.
                @endif
            </p>

            {{-- TOMBOL --}}
            <div class="flex flex-wrap gap-3 mb-6 justify-center md:justify-start">
                @php
                    $cvUrl =
                        isset($profile->cv_path) && $profile->cv_path
                            ? Storage::disk('s3')->url($profile->cv_path)
                            : asset('cv/CV_Shofia Nabila Elfa Rahma.pdf');
                @endphp

                <a href="{{ $cvUrl }}" target="_blank"
                    class="px-5 py-2.5 sm:px-6 sm:py-3 bg-indigo-600 hover:bg-indigo-700 transition-all duration-300 rounded-lg font-semibold text-sm sm:text-base hover:shadow-lg">
                    Lihat CV
                </a>

                <a href="#projects"
                    class="px-5 py-2.5 sm:px-6 sm:py-3 border border-indigo-500 text-indigo-300 hover:bg-indigo-600 hover:text-white transition-all duration-300 rounded-lg text-sm sm:text-base hover:scale-105">
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

        {{-- KANAN: Foto — tampil di atas di HP --}}
        <div class="flex justify-center md:justify-end animate-fade-in-right">
            @php
                $photoUrl =
                    isset($profile->photo) && $profile->photo
                        ? asset('storage/' . $profile->photo)
                        : asset('images/foto-profil.jpg');
            @endphp

            <div class="relative">
                <div class="absolute inset-0 bg-gradient-to-br from-indigo-600 via-purple-600 to-pink-600 rounded-full blur-3xl opacity-40 animate-pulse"></div>
                <img src="{{ $photoUrl }}" alt="Foto Profil"
                    class="relative w-44 h-44 sm:w-60 sm:h-60 md:w-72 md:h-72 rounded-full border-4 border-indigo-500 shadow-2xl shadow-indigo-500/50 object-cover hover:scale-105 transition-transform duration-500">
            </div>
        </div>

    </div>
</section>