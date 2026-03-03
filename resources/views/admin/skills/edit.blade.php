@extends('layouts.app')

@section('title', 'Edit Skill')

@section('content')
<div class="max-w-2xl mx-auto">
    <div class="mb-8">
        <a href="{{ route('admin.skills.index') }}" class="text-indigo-400 hover:text-indigo-300 text-sm font-medium flex items-center gap-2 mb-2 transition-colors">
            <i class="fa-solid fa-arrow-left"></i> Kembali ke Daftar
        </a>
        <h1 class="text-3xl font-extrabold text-white tracking-tight">Edit Skill</h1>
        <p class="text-zinc-400 mt-1">Perbarui informasi untuk skill <span class="text-indigo-400 font-bold">{{ $skill->name }}</span>.</p>
    </div>

    <div class="relative group">
        <div class="absolute -inset-1 bg-gradient-to-r from-indigo-500 to-purple-600 rounded-3xl blur opacity-10 group-focus-within:opacity-20 transition duration-500"></div>
        
        <form action="{{ route('admin.skills.update', $skill->id) }}" method="post" enctype="multipart/form-data"
            class="relative bg-[#18181b] border border-white/10 p-8 rounded-3xl shadow-2xl space-y-6">
            @csrf
            @method('PUT')

            <div>
                <label class="block text-sm font-bold text-zinc-400 uppercase tracking-widest mb-2">
                    Kategori Skill <span class="text-red-500">*</span>
                </label>
                <div class="relative">
                    <select name="category" required
                        class="w-full bg-zinc-900/50 border border-white/10 text-white rounded-xl px-4 py-3 appearance-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent outline-none transition-all cursor-pointer">
                        <option value="design" {{ $skill->category == 'design' ? 'selected' : '' }} class="bg-zinc-900">Design</option>
                        <option value="web" {{ $skill->category == 'web' ? 'selected' : '' }} class="bg-zinc-900">Web Development</option>
                        <option value="office" {{ $skill->category == 'office' ? 'selected' : '' }} class="bg-zinc-900">Microsoft / Administrasi</option>
                    </select>
                    <i class="fa-solid fa-chevron-down absolute right-4 top-1/2 -translate-y-1/2 text-zinc-500 pointer-events-none text-xs"></i>
                </div>
            </div>

            <div>
                <label for="name" class="block text-sm font-bold text-zinc-400 uppercase tracking-widest mb-2">
                    Nama Skill <span class="text-red-500">*</span>
                </label>
                <input type="text" name="name" id="name" value="{{ old('name', $skill->name) }}" required
                    class="w-full bg-zinc-900/50 border border-white/10 text-white rounded-xl px-4 py-3 focus:ring-2 focus:ring-indigo-500 focus:border-transparent outline-none transition-all">
                @error('name')
                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                @enderror
            </div>

            <div class="space-y-4">
                <label class="block text-sm font-bold text-zinc-400 uppercase tracking-widest">
                    Icon Skill
                </label>
                
                <div class="flex items-center gap-6 p-4 bg-zinc-900/30 border border-white/5 rounded-2xl">
                    <div class="w-20 h-20 bg-zinc-800 rounded-xl border border-white/10 p-3 flex items-center justify-center overflow-hidden">
                        <img src="{{ Storage::disk('s3')->url($skill->icon) }}" alt="{{ $skill->name }}" class="max-w-full max-h-full object-contain">
                    </div>
                    <div>
                        <p class="text-xs text-zinc-500 font-medium">Icon Saat Ini</p>
                        <p class="text-sm text-zinc-300 italic mt-1">Biarkan kosong jika tidak ingin mengubah icon.</p>
                    </div>
                </div>

                <div class="relative group/file">
                    <input type="file" name="icon" id="icon"
                        class="absolute inset-0 w-full h-full opacity-0 cursor-pointer z-10">
                    <div class="w-full bg-zinc-900/50 border-2 border-dashed border-white/10 text-zinc-500 rounded-xl px-4 py-6 flex flex-col items-center justify-center gap-2 group-hover/file:border-indigo-500/50 group-hover/file:bg-indigo-500/5 transition-all">
                        <i class="fa-solid fa-cloud-arrow-up text-xl text-zinc-400 group-hover/file:text-indigo-400 transition-colors"></i>
                        <p class="text-sm font-medium" id="file-name">Pilih file baru untuk mengganti</p>
                    </div>
                </div>
                @error('icon')
                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex gap-4 pt-4">
                <button type="submit" 
                    class="flex-1 py-4 bg-indigo-600 hover:bg-indigo-500 text-white font-black rounded-xl transition-all active:scale-[0.98] shadow-lg shadow-indigo-500/20 flex items-center justify-center gap-3 tracking-wider uppercase">
                    <i class="fa-solid fa-rotate"></i>
                    Update Skill
                </button>
                <a href="{{ route('admin.skills.index') }}" 
                   class="px-8 py-4 bg-zinc-800 hover:bg-zinc-700 text-zinc-300 font-bold rounded-xl transition-all text-center">
                   Batal
                </a>
            </div>
        </form>
    </div>
</div>

<script>
    // Preview nama file baru
    document.getElementById('icon').addEventListener('change', function(e) {
        const fileName = e.target.files[0] ? e.target.files[0].name : "Pilih file baru untuk mengganti";
        document.getElementById('file-name').textContent = fileName;
        document.getElementById('file-name').classList.add('text-indigo-400');
    });
</script>
@endsection