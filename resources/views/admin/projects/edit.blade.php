@extends('layouts.app')

@section('title', 'Edit Project')

@section('content')
    {{-- Inisialisasi Alpine.js dengan kategori dari database --}}
    <div class="max-w-3xl mx-auto" x-data="{ category: '{{ $project->category }}' }">
        <div class="mb-8 text-center md:text-left">
            <a href="{{ route('admin.projects.index', ['category' => $project->category]) }}"
                class="text-indigo-400 hover:text-indigo-300 text-sm font-medium inline-flex items-center gap-2 mb-2 transition-colors">
                <i class="fa-solid fa-arrow-left"></i> Kembali ke Daftar
            </a>
            <h1 class="text-3xl font-extrabold text-white tracking-tight">Edit Projek</h1>
            <p class="text-zinc-400 mt-1">Update detail projek <span
                    class="text-indigo-400 font-bold">"{{ $project->title }}"</span></p>
        </div>

        <div class="relative group">
            <div
                class="absolute -inset-1 bg-gradient-to-r from-indigo-500 to-purple-600 rounded-3xl blur opacity-10 group-focus-within:opacity-20 transition duration-500">
            </div>

            <form action="{{ route('admin.projects.update', $project) }}" method="POST" enctype="multipart/form-data"
                class="relative bg-[#18181b] border border-white/10 p-8 rounded-3xl shadow-2xl space-y-6">
                @csrf
                @method('PUT')

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    {{-- Judul --}}
                    <div class="md:col-span-2">
                        <label class="block text-sm font-bold text-zinc-400 uppercase tracking-widest mb-2">Judul
                            Projek</label>
                        <input type="text" name="title" value="{{ old('title', $project->title) }}" required
                            class="w-full bg-zinc-900/50 border border-white/10 text-white rounded-xl px-4 py-3 focus:ring-2 focus:ring-indigo-500 outline-none transition-all">
                    </div>

                    {{-- Kategori (Dinamis dengan x-model) --}}
                    <div>
                        <label class="block text-sm font-bold text-zinc-400 uppercase tracking-widest mb-2">Kategori</label>
                        <div class="relative">
                            <select name="category" x-model="category" required
                                class="w-full bg-zinc-900/50 border border-white/10 text-white rounded-xl px-4 py-3 appearance-none focus:ring-2 focus:ring-indigo-500 outline-none cursor-pointer">
                                <option value="web" class="bg-zinc-900">Web Development</option>
                                <option value="design" class="bg-zinc-900">Graphic Design</option>
                            </select>
                            <i
                                class="fa-solid fa-chevron-down absolute right-4 top-1/2 -translate-y-1/2 text-zinc-500 text-xs pointer-events-none"></i>
                        </div>
                    </div>

                    {{-- Ganti Thumbnail --}}
                    <div>
                        <label class="block text-sm font-bold text-zinc-400 uppercase tracking-widest mb-2">Ganti Thumbnail
                            (Opsional)</label>
                        <input type="file" name="image" id="image" accept="image/*" class="hidden">
                        <label for="image"
                            class="w-full bg-zinc-900/50 border-2 border-dashed border-white/10 text-zinc-500 rounded-xl px-4 py-3 flex items-center justify-center gap-2 cursor-pointer hover:border-indigo-500/50 transition-all">
                            <i class="fa-solid fa-cloud-arrow-up"></i>
                            <span id="file-name" class="text-sm truncate">Pilih Gambar Baru</span>
                        </label>
                    </div>
                </div>

                {{-- Thumbnail Saat Ini --}}
                <div class="p-4 bg-zinc-900/50 border border-white/5 rounded-2xl flex flex-col items-center">
                    <span class="text-[10px] font-bold text-zinc-500 uppercase tracking-[0.2em] mb-3">Thumbnail Saat
                        Ini</span>
                    <img src="{{ config('filesystems.disks.s3.url') . '/' . $project->image }}"
                        class="rounded-lg border border-white/10 max-h-40 shadow-xl">
                </div>

                {{-- SEKSI LINK & TECH (Dinamis Berdasarkan Kategori) --}}
                <div class="space-y-6 pt-6 border-t border-white/5">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        {{-- Link Utama (Selalu muncul untuk Web & Desain) --}}
                        <div>
                            <label class="block text-sm font-bold text-zinc-400 uppercase tracking-widest mb-2"
                                x-text="category === 'web' ? 'Link Deploy / Demo' : 'Link Behance / Portfolio'"></label>
                            <input type="url" name="link_deploy" value="{{ old('link_deploy', $project->link_deploy) }}"
                                placeholder="https://..."
                                class="w-full bg-zinc-900/50 border border-white/10 text-white rounded-xl px-4 py-3 focus:ring-2 focus:ring-indigo-500 outline-none transition-all">
                        </div>

                        {{-- Link GitHub (Hanya muncul jika kategori Web) --}}
                        <div x-show="category === 'web'" x-transition x-cloak>
                            <label class="block text-sm font-bold text-zinc-400 uppercase tracking-widest mb-2">Link
                                GitHub</label>
                            <input type="url" name="link_github" value="{{ old('link_github', $project->link_github) }}"
                                placeholder="https://github.com/..."
                                class="w-full bg-zinc-900/50 border border-white/10 text-white rounded-xl px-4 py-3 focus:ring-2 focus:ring-indigo-500 outline-none transition-all">
                        </div>
                    </div>

                    {{-- Tech Stack (Hanya muncul jika kategori Web) --}}
                    <div x-show="category === 'web'" x-transition x-cloak>
                        <label class="block text-sm font-bold text-zinc-400 uppercase tracking-widest mb-2">Tech Stack
                            (Pisahkan dengan koma)</label>
                        <input type="text" name="tech_stack" value="{{ old('tech_stack', $project->tech_stack) }}"
                            placeholder="Contoh: Laravel, Tailwind, MySQL"
                            class="w-full bg-zinc-900/50 border border-white/10 text-white rounded-xl px-4 py-3 focus:ring-2 focus:ring-indigo-500 outline-none transition-all">
                    </div>
                </div>

                {{-- Deskripsi --}}
                <div class="pt-4 border-t border-white/5">
                    <label class="block text-sm font-bold text-zinc-400 uppercase tracking-widest mb-2">Deskripsi</label>
                    <textarea name="description" rows="4" required
                        class="w-full bg-zinc-900/50 border border-white/10 text-white rounded-xl px-4 py-3 focus:ring-2 focus:ring-indigo-500 outline-none transition-all">{{ old('description', $project->description) }}</textarea>
                </div>

                <div class="flex flex-col md:flex-row gap-4 pt-4">
                    <button type="submit"
                        class="flex-1 py-4 bg-indigo-600 hover:bg-indigo-500 text-white font-black rounded-xl transition-all shadow-lg shadow-indigo-500/20 uppercase tracking-wider active:scale-95">
                        Update Projek
                    </button>
                    <a href="{{ route('admin.projects.index', ['category' => $project->category]) }}"
                        class="px-8 py-4 bg-zinc-800 hover:bg-zinc-700 text-zinc-300 font-bold rounded-xl transition-all text-center">
                        Batal
                    </a>
                </div>
            </form>
        </div>
    </div>

    <script>
        document.getElementById('image').addEventListener('change', function(e) {
            if (e.target.files[0]) {
                document.getElementById('file-name').textContent = e.target.files[0].name;
                document.getElementById('file-name').classList.add('text-indigo-400');
            }
        });
    </script>

    <style>
        [x-cloak] {
            display: none !important;
        }
    </style>
@endsection
