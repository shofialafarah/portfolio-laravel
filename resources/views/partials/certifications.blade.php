{{-- ================= SERTIFIKAT ================= --}}
<section id="certifications" class="max-w-7xl mx-auto px-4 sm:px-6 py-12 sm:py-20 md:py-24 scroll-reveal">
    <div class="flex justify-center mb-10 md:mb-12">
        <h2 class="section-title text-3xl md:text-4xl font-bold text-center">
            Certifications
        </h2>
    </div>

    <div class="card-glass rounded-3xl p-4 sm:p-6 md:p-10 shadow-2xl">
        {{-- Di HP: 1 kolom, sm: 2 kolom, lg: 3 kolom --}}
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-5 sm:gap-6 md:gap-8">
            @foreach ($certifications as $certification)
                <div class="card-inner rounded-2xl p-4 sm:p-5 group hover:-translate-y-2 transition-all duration-300">
                    {{-- FRAME SERTIFIKAT --}}
                    <div class="w-full aspect-[4/3] bg-zinc-900/50 rounded-xl flex items-center justify-center overflow-hidden mb-4">
                        <img src="{{ rtrim(config('filesystems.disks.s3.url'), '/') . '/' . ltrim($certification->image, '/') }}"
                            alt="{{ $certification->title }}"
                            onerror="this.src='https://placehold.co/600x400?text=Sertifikat+{{ urlencode($certification->title) }}'"
                            class="max-w-full max-h-full object-contain group-hover:scale-105 transition-transform duration-500">
                    </div>
                    <div class="border border-white rounded-lg p-2 mb-2">
                        <h3 class="font-semibold text-sm text-indigo-400 group-hover:text-white transition-colors text-center">
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