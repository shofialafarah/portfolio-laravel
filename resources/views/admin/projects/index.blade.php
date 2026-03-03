@extends('layouts.app')

@section('title', 'Project - ' . ($category ?? 'Semua'))

@section('content')
    <div class="max-w-7xl mx-auto">
        <div class="flex flex-col md:flex-row md:items-center justify-between gap-6 mb-10">
            <div>
                {{-- Judul Dinamis berdasarkan Kategori --}}
                <h1 class="text-3xl font-extrabold text-white tracking-tight">
                    Kelola Projek {{ $category == 'web' ? 'Web Development' : 'Graphic Design' }}
                </h1>
                <p class="text-zinc-400 mt-1">Daftar karya yang sudah kamu kerjakan di kategori ini.</p>
            </div>

            {{-- Tombol tambah tetap satu, tapi kita bisa kirim parameter kategori --}}
            <a href="{{ route('admin.projects.create', ['category' => $category]) }}"
                class="inline-flex items-center gap-2 px-6 py-3 bg-indigo-600 hover:bg-indigo-500 text-white font-bold rounded-xl transition-all active:scale-95 shadow-lg shadow-indigo-500/20">
                <i class="fa-solid fa-plus text-sm"></i>
                Tambah {{ $category == 'web' ? 'Web' : 'Desain' }}
            </a>
        </div>

        <div class="relative group">
            <div class="absolute -inset-1 bg-gradient-to-r from-indigo-500/20 to-purple-600/20 rounded-3xl blur opacity-25">
            </div>

            <div class="relative bg-[#18181b] border border-white/10 rounded-3xl overflow-hidden shadow-2xl">
                <div class="overflow-x-auto">
                    <table class="w-full text-left border-collapse">
                        <thead>
                            <tr class="bg-white/5 border-b border-white/10">
                                <th class="px-6 py-4 text-xs font-bold uppercase tracking-widest text-zinc-500">Preview</th>
                                <th class="px-6 py-4 text-xs font-bold uppercase tracking-widest text-zinc-500">Info Project</th>

                                {{-- KOLOM TECH STACK (Hanya muncul jika tab Web) --}}
                                @if ($category == 'web')
                                    <th class="px-6 py-4 text-xs font-bold uppercase tracking-widest text-zinc-500">Tech Stack</th>
                                @endif

                                {{-- KOLOM LINKS (Muncul di Web & Desain sekarang) --}}
                                <th class="px-6 py-4 text-xs font-bold uppercase tracking-widest text-zinc-500">Links</th>

                                <th class="px-6 py-4 text-xs font-bold uppercase tracking-widest text-zinc-500 text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-white/5">
                            @forelse ($projects as $project)
                                <tr class="hover:bg-white/[0.02] transition-colors group/row">
                                    <td class="px-6 py-4">
                                        <div class="relative w-24 h-16 rounded-lg overflow-hidden border border-white/10 shadow-lg group-hover/row:border-indigo-500/50 transition-colors">
                                            <img src="{{ Storage::disk('s3')->url($project->image) }}" onerror="this.src='https://placehold.co/600x400?text=No+Image'"
                                                class="w-full h-full object-cover group-hover/row:scale-110 transition-transform duration-500"
                                                alt="{{ $project->title }}">
                                        </div>
                                    </td>
                                    <td class="px-6 py-4">
                                        <div class="flex flex-col">
                                            <span class="text-white font-bold group-hover/row:text-indigo-400 transition-colors">{{ $project->title ?? '-' }}</span>
                                            <span class="text-zinc-500 text-sm line-clamp-1 mt-1">{{ Str::limit($project->description, 50) ?? '-' }}</span>
                                        </div>
                                    </td>

                                    {{-- ISI DATA TECH STACK (Khusus Web) --}}
                                    @if ($category == 'web')
                                        <td class="px-6 py-4">
                                            <div class="flex flex-wrap gap-1">
                                                @if($project->tech_stack)
                                                    @foreach (explode(',', $project->tech_stack) as $tech)
                                                        <span class="text-[10px] bg-indigo-500/10 text-indigo-400 px-2 py-0.5 rounded border border-indigo-500/20">{{ trim($tech) }}</span>
                                                    @endforeach
                                                @else
                                                    <span class="text-zinc-600 text-[10px]">-</span>
                                                @endif
                                            </div>
                                        </td>
                                    @endif

                                    {{-- ISI DATA LINKS (Dinamis: Web & Desain) --}}
                                    <td class="px-6 py-4">
                                        <div class="flex gap-3 items-center">
                                            @if ($project->category == 'web')
                                                @if ($project->link_github)
                                                    <a href="{{ $project->link_github }}" target="_blank" class="text-zinc-500 hover:text-white transition-colors" title="GitHub"><i class="fa-brands fa-github text-lg"></i></a>
                                                @endif
                                                @if ($project->link_deploy)
                                                    <a href="{{ $project->link_deploy }}" target="_blank" class="text-zinc-500 hover:text-indigo-400 transition-colors" title="Live Preview"><i class="fa-solid fa-rocket text-base"></i></a>
                                                @endif
                                            @else
                                                {{-- Tampilan Link untuk Desain --}}
                                                @if ($project->link_deploy)
                                                    <a href="{{ $project->link_deploy }}" target="_blank" class="flex items-center gap-2 text-zinc-500 hover:text-blue-400 transition-colors">
                                                        <i class="fa-brands fa-behance text-lg"></i>
                                                        <span class="text-xs font-medium">Behance</span>
                                                    </a>
                                                @else
                                                    <span class="text-[10px] italic text-zinc-600">No Link</span>
                                                @endif
                                            @endif
                                        </div>
                                    </td>

                                    <td class="px-6 py-4 text-center">
                                        <div class="flex justify-center items-center gap-3">
                                            <a href="{{ route('admin.projects.edit', $project) }}"
                                                class="w-9 h-9 flex items-center justify-center rounded-lg bg-zinc-800 text-zinc-400 hover:bg-yellow-500/10 hover:text-yellow-500 border border-white/5 transition-all">
                                                <i class="fa-solid fa-pen-to-square"></i>
                                            </a>
                                            <button onclick="confirmDelete({{ $project->id }})"
                                                class="w-9 h-9 flex items-center justify-center rounded-lg bg-zinc-800 text-zinc-400 hover:bg-red-500/10 hover:text-red-500 border border-white/5 transition-all">
                                                <i class="fa-solid fa-trash-can"></i>
                                            </button>
                                            <form id="delete-form-{{ $project->id }}"
                                                action="{{ route('admin.projects.destroy', $project) }}" method="POST"
                                                class="hidden">
                                                @csrf @method('DELETE')
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="100%" class="px-6 py-20 text-center">
                                        <div class="flex flex-col items-center">
                                            <i class="fa-solid fa-folder-open text-zinc-700 text-5xl mb-4"></i>
                                            <p class="text-zinc-500">Belum ada project di kategori ini.</p>
                                        </div>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <script>
        function confirmDelete(id) {
            Swal.fire({
                background: '#18181b',
                color: '#fff',
                title: 'Hapus project?',
                text: 'Data ini tidak bisa dikembalikan!',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#ef4444',
                cancelButtonColor: '#3f3f46',
                confirmButtonText: 'Ya, hapus!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('delete-form-' + id).submit();
                }
            });
        }
    </script>
@endsection