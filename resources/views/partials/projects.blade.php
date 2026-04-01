{{-- ================= PROJEK ================= --}}
<section id="projects" class="max-w-7xl mx-auto px-4 sm:px-6 py-12 sm:py-20 md:py-24 scroll-reveal">
    <div class="flex justify-center mb-10 md:mb-12">
        <h2 class="section-title text-3xl md:text-4xl font-bold text-center">
            My Projects
        </h2>
    </div>

    {{-- FILTER --}}
    <div class="flex justify-center mb-8 md:mb-12">
        <div class="inline-flex flex-wrap justify-center gap-2 sm:gap-3 card-glass rounded-2xl px-4 sm:px-6 py-3 sm:py-4">
            <button class="filter-btn active text-sm sm:text-base px-3 py-1.5 sm:px-4 sm:py-2" data-filter="all">Semua</button>
            <button class="filter-btn text-sm sm:text-base px-3 py-1.5 sm:px-4 sm:py-2" data-filter="web">Web Dev</button>
            <button class="filter-btn text-sm sm:text-base px-3 py-1.5 sm:px-4 sm:py-2" data-filter="design">Desain</button>
        </div>
    </div>

    {{-- GRID PROJECT --}}
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-5 sm:gap-6 md:gap-8">
        @foreach ($projects as $project)
            <div class="project-card {{ $project->category }} card-glass rounded-3xl p-4 sm:p-5 overflow-hidden group flex flex-col">

                {{-- WRAPPER GAMBAR --}}
                <div class="relative w-full overflow-hidden rounded-2xl mb-4
                    {{ $project->category === 'design' ? 'aspect-[4/5]' : 'aspect-video' }}
                    bg-zinc-900/50 shadow-inner">
                    <img src="{{ Storage::disk('s3')->url($project->image) }}"
                        class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700"
                        alt="{{ $project->title }}">

                    {{-- Badge Kategori --}}
                    <div class="absolute top-3 left-3 px-3 py-1 bg-black/40 backdrop-blur-md border border-white/10 rounded-full">
                        <span class="text-[10px] font-bold text-white uppercase tracking-wider">
                            {{ $project->category === 'web' ? 'Web Development' : 'Graphic Design' }}
                        </span>
                    </div>
                </div>

                {{-- INFO PROJECT --}}
                <div class="flex-grow">
                    <h3 class="font-bold text-lg sm:text-xl text-white mb-2 group-hover:text-indigo-400 transition-colors">
                        {{ $project->title }}
                    </h3>
                    <p class="text-sm text-gray-400 leading-relaxed line-clamp-3 mb-4">
                        {{ $project->description }}
                    </p>

                    {{-- TECH STACK (Hanya Muncul Jika Web) --}}
                    @if ($project->category === 'web' && $project->tech_stack)
                        <div class="flex flex-wrap gap-2 mb-5">
                            @foreach (explode(',', $project->tech_stack) as $tech)
                                <span class="text-[10px] px-2 py-1 bg-indigo-500/10 text-indigo-300 border border-indigo-500/20 rounded-md">
                                    {{ trim($tech) }}
                                </span>
                            @endforeach
                        </div>
                    @endif
                </div>

                {{-- TOMBOL AKSI --}}
                <div class="mt-auto flex items-center justify-between pt-4 border-t border-white/5">
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

                    @if ($project->category === 'design' && $project->link_deploy)
                        <a href="{{ $project->link_deploy }}" target="_blank"
                            class="text-[11px] font-black text-indigo-400 hover:text-white uppercase tracking-widest transition-colors flex items-center gap-2">
                            Lihat Karya <i class="fa-solid fa-chevron-right text-[10px]"></i>
                        </a>
                    @elseif($project->category === 'web' && !$project->link_deploy && $project->link_github)
                        <span class="text-[10px] text-zinc-600 italic">Demo not available</span>
                    @endif
                </div>
            </div>
        @endforeach
    </div>
</section>