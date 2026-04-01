{{-- ================= PROJEK ================= --}}
<section id="projects" class="max-w-7xl mx-auto px-4 sm:px-6 py-12 sm:py-20 md:py-24 scroll-reveal">
    <div class="flex justify-center mb-10 md:mb-12">
        <h2 class="section-title text-3xl md:text-4xl font-bold text-center">
            My Projects
        </h2>
    </div>

    {{-- FILTER --}}
    <div class="flex justify-center mb-8 md:mb-12">
        <div
            class="inline-flex flex-wrap justify-center gap-2 sm:gap-3 card-glass rounded-2xl px-4 sm:px-6 py-3 sm:py-4">
            <button class="filter-btn active text-sm sm:text-base px-3 py-1.5 sm:px-4 sm:py-2"
                data-filter="all">Semua</button>
            <button class="filter-btn text-sm sm:text-base px-3 py-1.5 sm:px-4 sm:py-2" data-filter="web">Web Dev</button>
            <button class="filter-btn text-sm sm:text-base px-3 py-1.5 sm:px-4 sm:py-2"
                data-filter="design">Desain</button>
        </div>
    </div>

    {{-- GRID PROJECT --}}
    <div id="project-container" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-5 sm:gap-6 md:gap-8">
        @foreach ($projects as $project)
            {{-- Tambahkan class 'project-item' dan 'hidden-item' secara default --}}
            <div
                class="project-item project-card {{ $project->category }} card-glass rounded-3xl p-4 sm:p-5 overflow-hidden group flex flex-col hidden-item">

                {{-- WRAPPER GAMBAR --}}
                <div class="relative w-full overflow-hidden rounded-2xl mb-4 cursor-pointer group/img
    {{ $project->category === 'design' ? 'aspect-[4/5]' : 'aspect-video' }}
    bg-zinc-900/50 shadow-inner"
                    onclick="openProjectModal('{{ $project->title }}', '{{ Storage::disk('s3')->url($project->image) }}', '{{ addslashes($project->description) }}')">

                    {{-- Overlay saat hover gambar --}}
                    <div
                        class="absolute inset-0 bg-indigo-600/20 opacity-0 group-hover/img:opacity-100 transition-opacity z-10 flex items-center justify-center">
                        <div
                            class="bg-white/20 backdrop-blur-md p-3 rounded-full border border-white/30 transform translate-y-4 group-hover/img:translate-y-0 transition-transform">
                            <i class="fa-solid fa-magnifying-glass-plus text-white text-xl"></i>
                        </div>
                    </div>

                    <img src="{{ Storage::disk('s3')->url($project->image) }}"
                        class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700"
                        alt="{{ $project->title }}">

                    <div
                        class="absolute top-3 left-3 px-3 py-1 bg-black/40 backdrop-blur-md border border-white/10 rounded-full">
                        <span class="text-[10px] font-bold text-white uppercase tracking-wider">
                            {{ $project->category === 'web' ? 'Web Development' : 'Graphic Design' }}
                        </span>
                    </div>
                </div>

                {{-- INFO PROJECT --}}
                <div class="flex-grow">
                    <h3
                        class="font-bold text-lg sm:text-xl text-white mb-2 group-hover:text-indigo-400 transition-colors">
                        {{ $project->title }}
                    </h3>
                    <p class="text-sm text-gray-400 leading-relaxed line-clamp-3 mb-4">
                        {{ $project->description }}
                    </p>
                    @if ($project->category === 'web' && $project->tech_stack)
                        <div class="flex flex-wrap gap-2 mb-5">
                            @foreach (explode(',', $project->tech_stack) as $tech)
                                <span
                                    class="text-[10px] px-2 py-1 bg-indigo-500/10 text-indigo-300 border border-indigo-500/20 rounded-md">
                                    {{ trim($tech) }}
                                </span>
                            @endforeach
                        </div>
                    @endif
                </div>

                {{-- TOMBOL AKSI --}}
                <div class="mt-auto flex items-center gap-3 pt-4 border-t border-white/5">
                    @if ($project->category === 'web')
                        @if ($project->link_github)
                            <a href="{{ $project->link_github }}" target="_blank" class="action-icon"
                                title="GitHub Source Code">
                                <i class="fa-brands fa-github text-lg"></i>
                            </a>
                        @endif
                        @if ($project->link_deploy)
                            <a href="{{ $project->link_deploy }}" target="_blank" class="action-btn-primary flex-1"
                                title="Live Preview">
                                <span>Live Demo</span>
                                <i class="fa-solid fa-arrow-up-right-from-square text-[10px]"></i>
                            </a>
                        @endif
                    @endif

                    @if ($project->category === 'design' && $project->link_deploy)
                        <a href="{{ $project->link_deploy }}" target="_blank" class="action-btn-design flex-1">
                            <i class="fa-brands fa-behance"></i>
                            <span>Lihat Karya</span>
                        </a>
                    @endif
                </div>
            </div>
        @endforeach
    </div>

    {{-- TOMBOL LIHAT LAGI --}}
    <div class="flex justify-center mt-12">
        <button id="load-more-btn"
            class="px-8 py-3 bg-indigo-600 hover:bg-indigo-500 text-white font-bold rounded-xl transition-all active:scale-95 shadow-lg shadow-indigo-500/20 flex items-center gap-2">
            <span>Lihat Lebih Banyak</span>
            <i class="fa-solid fa-chevron-down text-xs"></i>
        </button>
    </div>
</section>
{{-- ================= MODAL OVERLAY ================= --}}
<div id="projectModal"
    class="fixed inset-0 z-[9999] hidden items-center justify-center p-4 sm:p-6 backdrop-blur-xl bg-black/80">
    <div
        class="relative w-full max-w-4xl bg-zinc-900 rounded-[2rem] border border-white/10 overflow-hidden animate-modal-in shadow-2xl">
        <button onclick="closeProjectModal()"
            class="absolute top-4 right-4 z-20 bg-black/50 hover:bg-red-500/80 text-white w-10 h-10 rounded-full transition-all flex items-center justify-center">
            <i class="fa-solid fa-xmark"></i>
        </button>

        <div class="flex flex-col md:flex-row h-full max-h-[90vh] overflow-y-auto">
            <div class="w-full md:w-2/3 bg-black flex items-center justify-center">
                <img id="modalImg" src="" class="w-full h-auto object-contain">
            </div>
            <div class="w-full md:w-1/3 p-6 sm:p-8 flex flex-col justify-center">
                <h2 id="modalTitle" class="text-2xl font-bold text-white mb-4"></h2>
                <div class="h-1 w-12 bg-indigo-500 rounded-full mb-6"></div>
                <p id="modalDesc" class="text-zinc-400 text-sm leading-relaxed mb-6"></p>
            </div>
        </div>
    </div>
</div>
<style>
    .hidden-item {
        display: none !important;
    }

    .animate-show {
        animation: fadeInUp 0.5s ease forwards;
    }

    @keyframes fadeInUp {
        from {
            opacity: 0;
            transform: translateY(20px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    /* Modal Animation */
    @keyframes modal-in {
        from {
            opacity: 0;
            transform: scale(0.9) translateY(20px);
        }

        to {
            opacity: 1;
            transform: scale(1) translateY(0);
        }
    }

    .action-icon {
        padding: 0.6rem;
        background-color: #27272a;
        /* zinc-800 */
        color: #a1a1aa;
        /* zinc-400 */
        border-radius: 0.75rem;
        border: 1px solid rgba(255, 255, 255, 0.05);
        transition: all 0.3s;
    }

    .action-icon:hover {
        background-color: #3f3f46;
        color: white;
    }

    .action-btn-primary {
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 0.5rem;
        padding: 0.6rem 1rem;
        background-color: #4f46e5;
        /* indigo-600 */
        color: white;
        font-size: 0.75rem;
        font-weight: 700;
        border-radius: 0.75rem;
        transition: all 0.3s;
        box-shadow: 0 10px 15px -3px rgba(79, 70, 229, 0.2);
    }

    .action-btn-primary:hover {
        background-color: #6366f1;
    }

    .action-btn-design {
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 0.5rem;
        padding: 0.6rem 1rem;
        background: linear-gradient(to right, #2563eb, #4f46e5);
        color: white;
        font-size: 0.75rem;
        font-weight: 700;
        border-radius: 0.75rem;
        transition: all 0.3s;
    }
</style>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const loadMoreBtn = document.getElementById('load-more-btn');
        const filterBtns = document.querySelectorAll('.filter-btn');
        const items = document.querySelectorAll('.project-item');

        let itemsToShow = 3; // Jumlah item per tampil
        let currentFilter = 'all';

        function updateVisibility() {
            let visibleCount = 0;
            let totalMatched = 0;

            items.forEach(item => {
                const isMatch = currentFilter === 'all' || item.classList.contains(currentFilter);

                if (isMatch) {
                    totalMatched++;
                    if (visibleCount < itemsToShow) {
                        item.classList.remove('hidden-item');
                        item.classList.add('animate-show');
                        visibleCount++;
                    } else {
                        item.classList.add('hidden-item');
                    }
                } else {
                    item.classList.add('hidden-item');
                    item.classList.remove('animate-show');
                }
            });

            // Sembunyikan tombol jika sudah tidak ada lagi yang bisa ditampilkan untuk filter ini
            if (visibleCount >= totalMatched) {
                loadMoreBtn.style.display = 'none';
            } else {
                loadMoreBtn.style.display = 'flex';
            }
        }

        // Event Klik Tombol Load More
        loadMoreBtn.addEventListener('click', () => {
            itemsToShow += 3;
            updateVisibility();
        });

        // Event Klik Filter
        filterBtns.forEach(btn => {
            btn.addEventListener('click', function() {
                filterBtns.forEach(b => b.classList.remove('active'));
                this.classList.add('active');

                currentFilter = this.getAttribute('data-filter');
                itemsToShow = 3; // Reset jumlah tampilan setiap ganti filter
                updateVisibility();
            });
        });

        // Inisialisasi awal
        updateVisibility();
    });

    // Fungsi Buka Modal
    function openProjectModal(title, img, desc) {
        const modal = document.getElementById('projectModal');
        document.getElementById('modalTitle').innerText = title;
        document.getElementById('modalImg').src = img;
        document.getElementById('modalDesc').innerText = desc;

        modal.classList.remove('hidden');
        modal.classList.add('flex');
        document.body.style.overflow = 'hidden'; // Kunci scroll layar saat modal buka
    }

    // Fungsi Tutup Modal
    function closeProjectModal() {
        const modal = document.getElementById('projectModal');
        modal.classList.add('hidden');
        modal.classList.remove('flex');
        document.body.style.overflow = 'auto'; // Aktifkan scroll lagi
    }

    // Tutup modal kalau klik di luar area gambar/teks
    window.onclick = function(event) {
        const modal = document.getElementById('projectModal');
        if (event.target == modal) {
            closeProjectModal();
        }
    }
</script>
