@extends('layouts.app')

@section('title', 'Edit Certificate')

@section('content')
<div class="max-w-3xl mx-auto">
    <div class="mb-8">
        <a href="{{ route('admin.certifications.index') }}" class="text-indigo-400 hover:text-indigo-300 text-sm font-medium inline-flex items-center gap-2 mb-2 transition-colors">
            <i class="fa-solid fa-arrow-left"></i> Kembali ke Daftar
        </a>
        <h1 class="text-3xl font-extrabold text-white tracking-tight">Edit Sertifikat</h1>
        <p class="text-zinc-400 mt-1">Perbarui data kredensial pencapaianmu.</p>
    </div>

    <div class="relative group">
        <div class="absolute -inset-1 bg-gradient-to-r from-emerald-500 to-teal-600 rounded-3xl blur opacity-10 group-focus-within:opacity-20 transition duration-500"></div>
        
        <form action="{{ route('admin.certifications.update', $certification) }}" method="POST" enctype="multipart/form-data"
            class="relative bg-[#18181b] border border-white/10 p-8 rounded-3xl shadow-2xl space-y-6">
            @csrf @method('PUT')

            <div>
                <label class="block text-sm font-bold text-zinc-400 uppercase tracking-widest mb-2">Judul Sertifikat</label>
                <input type="text" name="title" value="{{ old('title', $certification->title) }}" required
                    class="w-full bg-zinc-900/50 border border-white/10 text-white rounded-xl px-4 py-3 focus:ring-2 focus:ring-emerald-500 outline-none transition-all">
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label class="block text-sm font-bold text-zinc-400 uppercase tracking-widest mb-2">Penyelenggara</label>
                    <input type="text" name="issuer" value="{{ old('issuer', $certification->issuer) }}" required
                        class="w-full bg-zinc-900/50 border border-white/10 text-white rounded-xl px-4 py-3 focus:ring-2 focus:ring-emerald-500 outline-none transition-all">
                </div>
                <div>
                    <label class="block text-sm font-bold text-zinc-400 uppercase tracking-widest mb-2">Tahun</label>
                    <input type="number" name="year" value="{{ old('year', $certification->year) }}" required
                        class="w-full bg-zinc-900/50 border border-white/10 text-white rounded-xl px-4 py-3 focus:ring-2 focus:ring-emerald-500 outline-none transition-all">
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 items-end">
                <div class="space-y-3">
                    <span class="block text-sm font-bold text-zinc-400 uppercase tracking-widest">Sertifikat Saat Ini</span>
                    <div class="p-2 bg-zinc-900 border border-white/5 rounded-2xl flex justify-center overflow-hidden h-36">
                        <img src="{{ asset('storage/' . $certification->image) }}" class="h-full object-contain rounded-lg">
                    </div>
                </div>
                <div>
                    <span class="block text-sm font-bold text-zinc-400 uppercase tracking-widest mb-3">Ganti Gambar</span>
                    <input type="file" name="image" id="cert-image" accept="image/*" class="hidden">
                    <label for="cert-image" class="w-full bg-zinc-900/50 border-2 border-dashed border-white/10 text-zinc-500 rounded-xl px-4 py-10 flex flex-col items-center justify-center gap-2 cursor-pointer hover:border-emerald-500/50 transition-all">
                        <i class="fa-solid fa-cloud-arrow-up"></i>
                        <span id="file-name" class="text-xs font-medium">Klik untuk ganti</span>
                    </label>
                </div>
            </div>

            <label class="flex items-center gap-3 p-4 bg-zinc-900/30 border border-white/5 rounded-2xl cursor-pointer">
                <input type="checkbox" name="is_active" value="1" {{ $certification->is_active ? 'checked' : '' }} class="w-5 h-5 rounded border-zinc-700 bg-zinc-800 text-emerald-500 focus:ring-emerald-500">
                <span class="text-sm font-bold text-zinc-300 uppercase tracking-wider">Tampilkan di Website</span>
            </label>

            <div class="flex gap-4 pt-4">
                <button type="submit" class="flex-1 py-4 bg-emerald-600 hover:bg-emerald-500 text-white font-black rounded-xl transition-all shadow-lg shadow-emerald-500/20 uppercase tracking-widest">
                    Update Sertifikat
                </button>
                <a href="{{ route('admin.certifications.index') }}" class="px-8 py-4 bg-zinc-800 hover:bg-zinc-700 text-zinc-300 font-bold rounded-xl transition-all text-center">
                    Batal
                </a>
            </div>
        </form>
    </div>
</div>

<script>
    document.getElementById('cert-image').addEventListener('change', function(e) {
        document.getElementById('file-name').textContent = e.target.files[0] ? e.target.files[0].name : "Klik untuk ganti";
        document.getElementById('file-name').classList.add('text-emerald-400');
    });
</script>
@endsection