@extends('layouts.app')

@section('title', 'Tambah Projek - Admin')

@section('content')
<div class="max-w-3xl mx-auto">
    <div class="mb-8">
        <a href="{{ route('admin.projects.index') }}" class="text-indigo-400 hover:text-indigo-300 text-sm font-medium flex items-center gap-2 mb-2 transition-colors">
            <i class="fa-solid fa-arrow-left"></i> Kembali ke Daftar
        </a>
        <h1 class="text-3xl font-extrabold text-white tracking-tight">Tambah Projek Baru</h1>
        <p class="text-zinc-400 mt-1">Pamerkan karya terbaikmu ke dalam portfolio.</p>
    </div>

    <div class="relative group">
        <div class="absolute -inset-1 bg-gradient-to-r from-indigo-500 to-purple-600 rounded-3xl blur opacity-10 group-focus-within:opacity-20 transition duration-500"></div>
        
        <form action="{{ route('admin.projects.store') }}" method="POST" enctype="multipart/form-data"
            class="relative bg-[#18181b] border border-white/10 p-8 rounded-3xl shadow-2xl space-y-6">
            @csrf

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="md:col-span-2">
                    <label class="block text-sm font-bold text-zinc-400 uppercase tracking-widest mb-2">Judul Projek <span class="text-red-500">*</span></label>
                    <input type="text" name="title" value="{{ old('title') }}" placeholder="Contoh: E-Commerce Redesign" required
                        class="w-full bg-zinc-900/50 border border-white/10 text-white rounded-xl px-4 py-3 focus:ring-2 focus:ring-indigo-500 focus:border-transparent outline-none transition-all placeholder:text-zinc-600 @error('title') border-red-500 @enderror">
                    @error('title') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                </div>

                <div>
                    <label class="block text-sm font-bold text-zinc-400 uppercase tracking-widest mb-2">Kategori <span class="text-red-500">*</span></label>
                    <div class="relative">
                        <select name="category" required class="w-full bg-zinc-900/50 border border-white/10 text-white rounded-xl px-4 py-3 appearance-none focus:ring-2 focus:ring-indigo-500 outline-none cursor-pointer">
                            <option value="" disabled selected>Pilih Kategori</option>
                            <option value="web" class="bg-zinc-900">Web Development</option>
                            <option value="design" class="bg-zinc-900">Graphic Design</option>
                        </select>
                        <i class="fa-solid fa-chevron-down absolute right-4 top-1/2 -translate-y-1/2 text-zinc-500 pointer-events-none text-xs"></i>
                    </div>
                </div>

                <div>
                    <label class="block text-sm font-bold text-zinc-400 uppercase tracking-widest mb-2">Thumbnail <span class="text-red-500">*</span></label>
                    <input type="file" name="image" id="image" accept="image/*" required class="hidden">
                    <label for="image" class="w-full bg-zinc-900/50 border-2 border-dashed border-white/10 text-zinc-500 rounded-xl px-4 py-3 flex items-center justify-center gap-2 cursor-pointer hover:border-indigo-500/50 hover:bg-indigo-500/5 transition-all">
                        <i class="fa-solid fa-image"></i>
                        <span id="file-name" class="text-sm truncate">Pilih Gambar</span>
                    </label>
                    @error('image') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                </div>
            </div>

            <div>
                <label class="block text-sm font-bold text-zinc-400 uppercase tracking-widest mb-2">Deskripsi Singkat <span class="text-red-500">*</span></label>
                <textarea name="description" rows="3" placeholder="Jelaskan sedikit tentang projek ini..." required
                    class="w-full bg-zinc-900/50 border border-white/10 text-white rounded-xl px-4 py-3 focus:ring-2 focus:ring-indigo-500 outline-none transition-all placeholder:text-zinc-600">{{ old('description') }}</textarea>
            </div>

            <div class="flex gap-4 pt-4">
                <button type="submit" class="flex-1 py-4 bg-indigo-600 hover:bg-indigo-500 text-white font-black rounded-xl transition-all active:scale-[0.98] shadow-lg shadow-indigo-500/20 uppercase tracking-wider">
                    Simpan Projek
                </button>
                <a href="{{ route('admin.projects.index') }}" class="px-8 py-4 bg-zinc-800 hover:bg-zinc-700 text-zinc-300 font-bold rounded-xl transition-all text-center">
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
@endsection