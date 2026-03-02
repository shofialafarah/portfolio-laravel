@extends('layouts.app')

@section('title', 'Kelola Projek')

@section('content')
<div class="max-w-7xl mx-auto">
    <div class="flex flex-col md:flex-row md:items-center justify-between gap-6 mb-10">
        <div>
            <h1 class="text-3xl font-extrabold text-white tracking-tight">Kelola Projek</h1>
            <p class="text-zinc-400 mt-1">Daftar karya dan proyek yang sudah kamu kerjakan.</p>
        </div>

        <a href="{{ route('admin.projects.create') }}" class="inline-flex items-center gap-2 px-6 py-3 bg-indigo-600 hover:bg-indigo-500 text-white font-bold rounded-xl transition-all active:scale-95 shadow-lg shadow-indigo-500/20">
            <i class="fa-solid fa-plus text-sm"></i>
            Tambah Project
        </a>
    </div>

    <div class="relative group">
        <div class="absolute -inset-1 bg-gradient-to-r from-indigo-500/20 to-purple-600/20 rounded-3xl blur opacity-25"></div>
        
        <div class="relative bg-[#18181b] border border-white/10 rounded-3xl overflow-hidden shadow-2xl">
            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="bg-white/5 border-b border-white/10">
                            <th class="px-6 py-4 text-xs font-bold uppercase tracking-widest text-zinc-500">Preview</th>
                            <th class="px-6 py-4 text-xs font-bold uppercase tracking-widest text-zinc-500">Info Project</th>
                            <th class="px-6 py-4 text-xs font-bold uppercase tracking-widest text-zinc-500">Kategori</th>
                            <th class="px-6 py-4 text-xs font-bold uppercase tracking-widest text-zinc-500 text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-white/5">
                        @forelse ($projects as $project)
                            <tr class="hover:bg-white/[0.02] transition-colors group/row">
                                <td class="px-6 py-4">
                                    <div class="relative w-24 h-16 rounded-lg overflow-hidden border border-white/10 shadow-lg group-hover/row:border-indigo-500/50 transition-colors">
                                        <img src="{{ asset('storage/' . $project->image) }}" 
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
                                <td class="px-6 py-4">
                                    <span class="px-3 py-1 bg-zinc-800 text-zinc-300 text-xs font-semibold rounded-full border border-white/5 uppercase tracking-tighter">
                                        {{ $project->category ?? 'Uncategorized' }}
                                    </span>
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
                                              action="{{ route('admin.projects.destroy', $project) }}" 
                                              method="POST" class="hidden">
                                            @csrf @method('DELETE')
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="px-6 py-20 text-center">
                                    <div class="flex flex-col items-center">
                                        <i class="fa-solid fa-folder-open text-5xl text-zinc-800 mb-4"></i>
                                        <p class="text-zinc-500">Belum ada projek yang ditambahkan.</p>
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