@extends('layouts.app')

@section('title', 'Tambah Project')

@section('content')
{{-- x-data mendeteksi kategori dari URL (query string) --}}
<div class="max-w-3xl mx-auto" x-data="{ category: '{{ request()->query('category', 'design') }}' }">
    <div class="mb-8">
        <a href="{{ route('admin.projects.index', ['category' => request()->query('category')]) }}" class="text-indigo-400 hover:text-indigo-300 text-sm font-medium flex items-center gap-2 mb-2 transition-colors">
            <i class="fa-solid fa-arrow-left"></i> Kembali ke Daftar
        </a>
        <h1 class="text-3xl font-extrabold text-white tracking-tight">Tambah Projek <span x-text="category === 'web' ? 'Web' : 'Desain'"></span></h1>
        <p class="text-zinc-400 mt-1">Pamerkan karya terbaikmu ke dalam portfolio.</p>
    </div>

    <div class="relative group">
        <div class="absolute -inset-1 bg-gradient-to-r from-indigo-500 to-purple-600 rounded-3xl blur opacity-10 group-focus-within:opacity-20 transition duration-500"></div>
        
        <form action="{{ route('admin.projects.store') }}" method="POST" enctype="multipart/form-data"
            class="relative bg-[#18181b] border border-white/10 p-8 rounded-3xl shadow-2xl space-y-6">
            @csrf

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                {{-- Judul --}}
                <div class="md:col-span-2">
                    <label class="block text-sm font-bold text-zinc-400 uppercase tracking-widest mb-2">Judul Projek <span class="text-red-500">*</span></label>
                    <input type="text" name="title" value="{{ old('title') }}" placeholder="Contoh: E-Commerce App" required
                        class="w-full bg-zinc-900/50 border border-white/10 text-white rounded-xl px-4 py-3 focus:ring-2 focus:ring-indigo-500 outline-none transition-all">
                </div>

                {{-- Kategori (Dinamis dengan x-model) --}}
                <div>
                    <label class="block text-sm font-bold text-zinc-400 uppercase tracking-widest mb-2">Kategori <span class="text-red-500">*</span></label>
                    <div class="relative">
                        <select name="category" x-model="category" required 
                            class="w-full bg-zinc-900/50 border border-white/10 text-white rounded-xl px-4 py-3 appearance-none focus:ring-2 focus:ring-indigo-500 outline-none cursor-pointer">
                            <option value="design">Graphic Design</option>
                            <option value="web">Web Development</option>
                        </select>
                        <div class="absolute inset-y-0 right-4 flex items-center pointer-events-none text-zinc-500">
                            <i class="fa-solid fa-chevron-down text-xs"></i>
                        </div>
                    </div>
                </div>

                {{-- Thumbnail --}}
                <div>
                    <label class="block text-sm font-bold text-zinc-400 uppercase tracking-widest mb-2">Thumbnail <span class="text-red-500">*</span></label>
                    <input type="file" name="image" id="image" accept="image/*" required class="hidden">
                    <label for="image" class="w-full bg-zinc-900/50 border-2 border-dashed border-white/10 text-zinc-500 rounded-xl px-4 py-3 flex items-center justify-center gap-2 cursor-pointer hover:border-indigo-500/50 hover:bg-indigo-500/5 transition-all">
                        <i class="fa-solid fa-image text-indigo-500"></i>
                        <span id="file-name" class="text-sm truncate">Pilih Gambar</span>
                    </label>
                </div>
            </div>

            {{-- SEKSI LINK (Dinamis: Muncul di Web & Desain) --}}
            <div class="space-y-6 pt-4 border-t border-white/5">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    {{-- Link Utama (Bisa Link Deploy atau Link Behance) --}}
                    <div class="md:col-span-1">
                        <label class="block text-sm font-bold text-zinc-400 uppercase tracking-widest mb-2" 
                               x-text="category === 'web' ? 'Link Deploy / Demo' : 'Link Behance / Portfolio'"></label>
                        <input type="url" name="link_deploy" value="{{ old('link_deploy') }}" placeholder="https://..." 
                            class="w-full bg-zinc-900/50 border border-white/10 text-white rounded-xl px-4 py-3 focus:ring-2 focus:ring-indigo-500 outline-none transition-all">
                    </div>

                    {{-- Link GitHub (Hanya muncul jika Web) --}}
                    <div x-show="category === 'web'" x-transition>
                        <label class="block text-sm font-bold text-zinc-400 uppercase tracking-widest mb-2">Link GitHub</label>
                        <input type="url" name="link_github" value="{{ old('link_github') }}" placeholder="https://github.com/..." 
                            class="w-full bg-zinc-900/50 border border-white/10 text-white rounded-xl px-4 py-3 focus:ring-2 focus:ring-indigo-500 outline-none transition-all">
                    </div>
                </div>

                {{-- Tech Stack (Hanya muncul jika Web) --}}
                <div x-show="category === 'web'" x-transition>
                    <label class="block text-sm font-bold text-zinc-400 uppercase tracking-widest mb-2">Tech Stack (Pisahkan dengan koma)</label>
                    <input type="text" name="tech_stack" value="{{ old('tech_stack') }}" placeholder="Laravel, Tailwind CSS, AlpineJS" 
                        class="w-full bg-zinc-900/50 border border-white/10 text-white rounded-xl px-4 py-3 focus:ring-2 focus:ring-indigo-500 outline-none transition-all">
                </div>
            </div>

            {{-- Deskripsi --}}
            <div class="pt-4 border-t border-white/5">
                <label class="block text-sm font-bold text-zinc-400 uppercase tracking-widest mb-2">Deskripsi Singkat <span class="text-red-500">*</span></label>
                <textarea name="description" rows="4" placeholder="Ceritakan tentang proses pembuatan atau fitur utama..." required
                    class="w-full bg-zinc-900/50 border border-white/10 text-white rounded-xl px-4 py-3 focus:ring-2 focus:ring-indigo-500 outline-none transition-all">{{ old('description') }}</textarea>
            </div>

            <div class="flex flex-col sm:flex-row gap-4 pt-4">
                <button type="submit" class="flex-1 py-4 bg-indigo-600 hover:bg-indigo-500 text-white font-black rounded-xl transition-all active:scale-[0.98] shadow-lg shadow-indigo-500/20 uppercase tracking-wider">
                    Simpan Projek
                </button>
                <a href="{{ route('admin.projects.index', ['category' => request()->query('category')]) }}" class="px-8 py-4 bg-zinc-800 hover:bg-zinc-700 text-zinc-300 font-bold rounded-xl transition-all text-center">
                    Batal
                </a>
            </div>
        </form>
    </div>
</div>

<script>
    document.getElementById('image').addEventListener('change', function(e) {
        document.getElementById('file-name').textContent = e.target.files[0] ? e.target.files[0].name : "Pilih Gambar";
    });
</script>

<style>
    [x-cloak] { display: none !important; }
</style>
@endsection