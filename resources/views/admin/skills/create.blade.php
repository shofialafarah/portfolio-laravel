@extends('layouts.app')

@section('title', 'Tambah Skill Baru - Admin')

@section('content')
<div class="max-w-2xl mx-auto">
    <div class="mb-8">
        <a href="{{ route('admin.skills.index') }}" class="text-indigo-400 hover:text-indigo-300 text-sm font-medium flex items-center gap-2 mb-2 transition-colors">
            <i class="fa-solid fa-arrow-left"></i> Kembali ke Daftar
        </a>
        <h1 class="text-3xl font-extrabold text-white tracking-tight">Tambah Skill Baru</h1>
        <p class="text-zinc-400 mt-1">Lengkapi form di bawah untuk menambahkan keahlian baru.</p>
    </div>

    @if ($errors->any())
        <div class="mb-6 p-4 bg-red-500/10 border border-red-500/20 rounded-2xl">
            <div class="flex gap-3">
                <i class="fa-solid fa-circle-exclamation text-red-500 mt-1"></i>
                <ul class="text-sm text-red-400 space-y-1">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        </div>
    @endif

    <div class="relative group">
        <div class="absolute -inset-1 bg-gradient-to-r from-indigo-500 to-purple-600 rounded-3xl blur opacity-10 group-focus-within:opacity-20 transition duration-500"></div>
        
        <form action="{{ route('admin.skills.store') }}" method="post" enctype="multipart/form-data"
            class="relative bg-[#18181b] border border-white/10 p-8 rounded-3xl shadow-2xl space-y-6">
            @csrf

            <div>
                <label class="block text-sm font-bold text-zinc-400 uppercase tracking-widest mb-2">
                    Kategori Skill <span class="text-red-500">*</span>
                </label>
                <div class="relative">
                    <select name="category" required
                        class="w-full bg-zinc-900/50 border border-white/10 text-white rounded-xl px-4 py-3 appearance-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent outline-none transition-all cursor-pointer">
                        <option value="" disabled selected class="bg-zinc-900">-- Pilih Kategori --</option>
                        <option value="design" class="bg-zinc-900">Design</option>
                        <option value="web" class="bg-zinc-900">Web Development</option>
                        <option value="office" class="bg-zinc-900">Administrasi</option>
                    </select>
                    <i class="fa-solid fa-chevron-down absolute right-4 top-1/2 -translate-y-1/2 text-zinc-500 pointer-events-none text-xs"></i>
                </div>
            </div>

            <div>
                <label for="name" class="block text-sm font-bold text-zinc-400 uppercase tracking-widest mb-2">
                    Nama Skill <span class="text-red-500">*</span>
                </label>
                <input type="text" name="name" id="name" placeholder="Contoh: Laravel, Figma, dll" required
                    class="w-full bg-zinc-900/50 border border-white/10 text-white rounded-xl px-4 py-3 focus:ring-2 focus:ring-indigo-500 focus:border-transparent outline-none transition-all placeholder:text-zinc-600">
            </div>

            <div>
                <label for="icon" class="block text-sm font-bold text-zinc-400 uppercase tracking-widest mb-2">
                    Upload Icon <span class="text-red-500">*</span>
                </label>
                <div class="relative group/file">
                    <input type="file" name="icon" id="icon" required
                        class="absolute inset-0 w-full h-full opacity-0 cursor-pointer z-10">
                    <div class="w-full bg-zinc-900/50 border-2 border-dashed border-white/10 text-zinc-500 rounded-xl px-4 py-8 flex flex-col items-center justify-center gap-3 group-hover/file:border-indigo-500/50 group-hover/file:bg-indigo-500/5 transition-all">
                        <div class="w-12 h-12 rounded-full bg-zinc-800 flex items-center justify-center group-hover/file:scale-110 transition-transform">
                            <i class="fa-solid fa-cloud-arrow-up text-xl text-zinc-400 group-hover/file:text-indigo-400"></i>
                        </div>
                        <p class="text-sm font-medium" id="file-name">Klik atau drag icon ke sini (PNG/SVG/JPG)</p>
                    </div>
                </div>
            </div>

            <div class="pt-4">
                <button type="submit" 
                    class="w-full py-4 bg-indigo-600 hover:bg-indigo-500 text-white font-black rounded-xl transition-all active:scale-[0.98] shadow-lg shadow-indigo-500/20 flex items-center justify-center gap-3 tracking-wider uppercase">
                    <i class="fa-solid fa-save"></i>
                    Simpan Keahlian
                </button>
            </div>
        </form>
    </div>
</div>

<script>
    // Preview Nama File yang diupload
    document.getElementById('icon').addEventListener('change', function(e) {
        const fileName = e.target.files[0] ? e.target.files[0].name : "Klik atau drag icon ke sini (PNG/SVG/JPG)";
        document.getElementById('file-name').textContent = fileName;
        document.getElementById('file-name').classList.add('text-indigo-400');
    });
</script>
@endsection