{{-- ================= SERTIFIKAT ================= --}}
<section id="certifications" class="max-w-7xl mx-auto px-4 sm:px-6 py-12 sm:py-20 md:py-24 scroll-reveal">
    <div class="flex justify-center mb-10 md:mb-12">
        <h2 class="section-title text-3xl md:text-4xl font-bold text-center">
            Certifications
        </h2>
    </div>

    <div class="card-glass rounded-3xl p-4 sm:p-6 md:p-10 shadow-2xl">
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-5 sm:gap-6 md:gap-8">
            @foreach ($certifications as $certification)
                @php
                    $certImage = rtrim(config('filesystems.disks.s3.url'), '/') . '/' . ltrim($certification->image, '/');
                @endphp
                
                <div class="card-inner rounded-2xl p-4 sm:p-5 group hover:-translate-y-2 transition-all duration-300">
                    
                    {{-- FRAME SERTIFIKAT (Ditambah onclick) --}}
                    <div class="relative w-full aspect-[4/3] bg-zinc-900/50 rounded-xl flex items-center justify-center overflow-hidden mb-4 cursor-pointer group/cert"
                         onclick="openCertModal('{{ $certification->title }}', '{{ $certImage }}')">
                        
                        {{-- Overlay Hover --}}
                        <div class="absolute inset-0 bg-indigo-600/20 opacity-0 group-hover/cert:opacity-100 transition-opacity z-10 flex items-center justify-center">
                            <div class="bg-white/20 backdrop-blur-md p-2 rounded-lg border border-white/30 transform translate-y-2 group-hover/cert:translate-y-0 transition-transform">
                                <span class="text-white text-[10px] font-bold uppercase tracking-widest">Klik untuk Memperbesar</span>
                            </div>
                        </div>

                        <img src="{{ $certImage }}"
                            alt="{{ $certification->title }}"
                            onerror="this.src='https://placehold.co/600x400?text=Sertifikat+{{ urlencode($certification->title) }}'"
                            class="max-w-full max-h-full object-contain group-hover:scale-105 transition-transform duration-500">
                    </div>

                    <div class="border border-white/10 rounded-lg p-2 mb-2 bg-white/5">
                        <h3 class="font-semibold text-sm text-indigo-400 group-hover:text-white transition-colors text-center">
                            {{ $certification->title }}
                        </h3>
                    </div>
                    <p class="text-xs text-zinc-500 mt-2 text-center uppercase tracking-tighter">
                        {{ $certification->issuer }} • {{ $certification->year }}
                    </p>
                </div>
            @endforeach
        </div>
    </div>
</section>

{{-- ================= MODAL SERTIFIKAT ================= --}}
<div id="certModal" class="fixed inset-0 z-[10000] hidden items-center justify-center p-4 sm:p-8 backdrop-blur-2xl bg-black/90 transition-all duration-300">
    {{-- Tombol Close Luar --}}
    <button onclick="closeCertModal()" class="absolute top-6 right-6 text-white/50 hover:text-white transition-colors z-[10001]">
        <i class="fa-solid fa-xmark text-3xl"></i>
    </button>

    <div class="relative max-w-5xl w-full flex flex-col items-center animate-modal-in">
        <img id="certModalImg" src="" class="max-w-full max-h-[80vh] rounded-lg shadow-2xl border border-white/10 object-contain">
        <div class="mt-6 text-center">
            <h3 id="certModalTitle" class="text-xl font-bold text-white mb-1"></h3>
            <div class="h-1 w-10 bg-indigo-500 mx-auto rounded-full"></div>
        </div>
    </div>
</div>

<script>
function openCertModal(title, img) {
    const modal = document.getElementById('certModal');
    const modalImg = document.getElementById('certModalImg');
    const modalTitle = document.getElementById('certModalTitle');

    modalImg.src = img;
    modalTitle.innerText = title;

    modal.classList.remove('hidden');
    modal.classList.add('flex');
    document.body.style.overflow = 'hidden'; // Kunci scroll
}

function closeCertModal() {
    const modal = document.getElementById('certModal');
    modal.classList.add('hidden');
    modal.classList.remove('flex');
    document.body.style.overflow = 'auto'; // Aktifkan scroll
}

// Tutup modal jika klik di area mana saja di luar gambar
document.getElementById('certModal').addEventListener('click', function(e) {
    if (e.target === this) {
        closeCertModal();
    }
});
</script>