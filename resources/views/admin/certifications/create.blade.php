@extends('layouts.app')

@section('title', 'Tambah Certificate')

@section('content')
    <div class="max-w-3xl mx-auto">
        <div class="mb-8">
            <a href="{{ route('admin.certifications.index') }}"
                class="text-indigo-400 hover:text-indigo-300 text-sm font-medium flex items-center gap-2 mb-2">
                <i class="fa-solid fa-arrow-left"></i> Kembali ke Daftar
            </a>
            <h1 class="text-3xl font-extrabold text-white tracking-tight">Tambah Sertifikat</h1>
            <p class="text-zinc-400 mt-1">Input kredensial baru untuk memvalidasi keahlianmu.</p>
        </div>

        <div class="relative group">
            <div
                class="absolute -inset-1 bg-gradient-to-r from-emerald-500 to-teal-600 rounded-3xl blur opacity-10 group-focus-within:opacity-20 transition duration-500">
            </div>

            <form action="{{ route('admin.certifications.store') }}" method="POST" enctype="multipart/form-data"
                class="relative bg-[#18181b] border border-white/10 p-8 rounded-3xl shadow-2xl space-y-6">
                @csrf

                <div>
                    <label class="block text-sm font-bold text-zinc-400 uppercase tracking-widest mb-2">Judul Sertifikat
                        <span class="text-red-500">*</span></label>
                    <input type="text" name="title" value="{{ old('title') }}"
                        placeholder="Contoh: AWS Certified Solutions Architect" required
                        class="w-full bg-zinc-900/50 border border-white/10 text-white rounded-xl px-4 py-3 focus:ring-2 focus:ring-emerald-500 outline-none transition-all placeholder:text-zinc-600">
                    @error('title')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-sm font-bold text-zinc-400 uppercase tracking-widest mb-2">Penyelenggara
                            <span class="text-red-500">*</span></label>
                        <input type="text" name="issuer" value="{{ old('issuer') }}"
                            placeholder="Contoh: Udemy, Google, Dicoding" required
                            class="w-full bg-zinc-900/50 border border-white/10 text-white rounded-xl px-4 py-3 focus:ring-2 focus:ring-emerald-500 outline-none transition-all">
                    </div>

                    <div>
                        <label class="block text-sm font-bold text-zinc-400 uppercase tracking-widest mb-2">Tahun <span
                                class="text-red-500">*</span></label>
                        <input type="number" name="year" value="{{ old('year', date('Y')) }}" required
                            class="w-full bg-zinc-900/50 border border-white/10 text-white rounded-xl px-4 py-3 focus:ring-2 focus:ring-emerald-500 outline-none transition-all">
                        @error('year')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div>
                    <label class="block text-sm font-bold text-zinc-400 uppercase tracking-widest mb-2">Upload Sertifikat
                        <span class="text-red-500">*</span></label>
                    <input type="file" name="image" id="cert-image" accept="image/*" required class="hidden">
                    <label for="cert-image"
                        class="w-full bg-zinc-900/50 border-2 border-dashed border-white/10 text-zinc-500 rounded-xl px-4 py-6 flex flex-col items-center justify-center gap-2 cursor-pointer hover:border-emerald-500/50 hover:bg-emerald-500/5 transition-all">
                        <i class="fa-solid fa-file-invoice text-2xl mb-1"></i>
                        <span id="file-name" class="text-sm font-medium">Klik untuk upload JPG/PNG</span>
                    </label>
                    @error('image')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <label
                    class="flex items-center gap-3 p-4 bg-zinc-900/30 border border-white/5 rounded-2xl cursor-pointer hover:bg-zinc-900/50 transition-all">
                    <!-- Supaya kalau gak dicentang tetap terkirim angka 0 -->
                    <input type="hidden" name="is_active" value="0">

                    <input type="checkbox" name="is_active" value="1" checked
                        class="w-5 h-5 rounded border-zinc-700 bg-zinc-800 text-emerald-500 focus:ring-emerald-500">
                    <span class="text-sm font-bold text-zinc-300 uppercase tracking-wider">Tampilkan di Website</span>
                </label>

                <div class="flex gap-4 pt-4">
                    <button type="submit"
                        class="flex-1 py-4 bg-emerald-600 hover:bg-emerald-500 text-white font-black rounded-xl transition-all shadow-lg shadow-emerald-500/20 uppercase tracking-widest">
                        Simpan Sertifikat
                    </button>
                    <a href="{{ route('admin.certifications.index') }}"
                        class="px-8 py-4 bg-zinc-800 hover:bg-zinc-700 text-zinc-300 font-bold rounded-xl transition-all text-center">
                        Batal
                    </a>
                </div>
            </form>
        </div>
    </div>

    <script>
        document.getElementById('cert-image').addEventListener('change', function(e) {
            const fileName = e.target.files[0] ? e.target.files[0].name : "Klik untuk upload JPG/PNG";
            const labelText = document.getElementById('file-name');

            labelText.textContent = fileName;

            if (e.target.files[0]) {
                labelText.classList.add('text-emerald-400'); // Beri warna hijau kalau ada file
            }
        });
    </script>
@endsection
