@extends('layouts.app')

@section('title', 'Skill')

@section('content')
<div class="max-w-7xl mx-auto">
    <div class="flex flex-col md:flex-row md:items-center justify-between gap-6 mb-10">
        <div>
            <h1 class="text-3xl font-extrabold text-white tracking-tight">Kelola Skill</h1>
            <p class="text-zinc-400 mt-1">Daftar keahlian yang ditampilkan di portfolio kamu.</p>
        </div>

        <div class="flex items-center gap-3">
            <div class="relative group">
                <i class="fa-solid fa-magnifying-glass absolute left-4 top-1/2 -translate-y-1/2 text-zinc-500 group-focus-within:text-indigo-400 transition-colors"></i>
                <input type="text" id="search" 
                    class="bg-[#18181b] border border-white/10 text-white text-sm rounded-xl pl-11 pr-4 py-2.5 w-64 focus:ring-2 focus:ring-indigo-500 focus:border-transparent outline-none transition-all" 
                    placeholder="Cari skill...">
            </div>
            <button id="resetBtn" class="p-2.5 bg-zinc-800 border border-white/5 text-zinc-400 rounded-xl hover:bg-zinc-700 hover:text-white transition-all shadow-lg" title="Reset">
                <i class="fa-solid fa-rotate-right"></i>
            </button>
        </div>
    </div>

    <div class="mb-8">
        <a href="{{ route('admin.skills.create') }}" class="inline-flex items-center gap-2 px-6 py-3 bg-indigo-600 hover:bg-indigo-500 text-white font-bold rounded-xl transition-all active:scale-95 shadow-lg shadow-indigo-500/20">
            <i class="fa-solid fa-plus text-sm"></i>
            Tambah Skill Baru
        </a>
    </div>

    <div id="skill-wrapper" class="min-h-[400px]">
        @include('admin.skills.partials.skill-cards', ['skills' => $skills])
    </div>
</div>

{{-- SweetAlert & Logic tetap dipertahankan dengan penyesuaian tema --}}
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    // Global function untuk SweetAlert agar serasi dengan Dark Mode
    const swalDark = {
        background: '#18181b',
        color: '#fff',
        confirmButtonColor: '#4f46e5',
        cancelButtonColor: '#ef4444',
    };

    // Handling Delete dengan Event Delegation agar AJAX search tetap berfungsi
    document.addEventListener('submit', function(e) {
        if (e.target.classList.contains('delete-form')) {
            e.preventDefault();
            const form = e.target;

            Swal.fire({
                ...swalDark,
                title: 'Hapus skill ini?',
                text: "Data yang dihapus tidak bisa dikembalikan!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Ya, hapus!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) form.submit();
            });
        }
    });

    // AJAX Search
    const searchInput = document.getElementById('search');
    const skillWrapper = document.getElementById('skill-wrapper');
    const resetBtn = document.getElementById('resetBtn');

    const fetchSkills = (query) => {
        fetch(`/admin/skills?search=${query}`, {
            headers: { 'X-Requested-With': 'XMLHttpRequest' }
        })
        .then(res => res.text())
        .then(html => skillWrapper.innerHTML = html);
    };

    searchInput?.addEventListener('keyup', function() { fetchSkills(this.value); });
    resetBtn?.addEventListener('click', function() { 
        searchInput.value = ''; 
        fetchSkills(''); 
    });
</script>
@endsection