@extends('layouts.app')
@section('title', 'Edit Biodata')

@section('content')
<div class="max-w-3xl mx-auto">
    <div class="mb-8">
        <h1 class="text-3xl font-bold tracking-tight text-white">Edit Biodata</h1>
        <p class="text-zinc-400 mt-1">Perbarui informasi dasar profil Anda.</p>
    </div>

    <form method="POST" action="{{ route('admin.profile.update') }}" enctype="multipart/form-data" 
        class="bg-[#18181b] border border-white/5 rounded-2xl p-6 md:p-8 shadow-xl">
        @csrf

        <div class="space-y-6">
            {{-- NAMA --}}
            <div>
                <label class="block text-sm font-semibold text-zinc-400 mb-2">Nama Lengkap</label>
                <input type="text" name="name" value="{{ $profile->name }}"
                    class="w-full bg-[#09090b] border border-white/10 rounded-xl px-4 py-3 text-white focus:outline-none focus:ring-2 focus:ring-indigo-500 transition-all">
            </div>

            {{-- ABOUT --}}
            <div>
                <label class="block text-sm font-semibold text-zinc-400 mb-2">Tentang Saya (About)</label>
                <textarea name="about" rows="6" 
                    class="w-full bg-[#09090b] border border-white/10 rounded-xl px-4 py-3 text-white focus:outline-none focus:ring-2 focus:ring-indigo-500 transition-all resize-none">{{ $profile->about }}</textarea>
            </div>

            {{-- FOTO --}}
            <div>
                <label class="block text-sm font-semibold text-zinc-400 mb-2">Foto Profil</label>
                <div class="flex items-center gap-6">
                    @if($profile->photo)
                        <div class="relative group">
                            <img src="{{ asset('storage/'.$profile->photo) }}" 
                                class="w-24 h-24 rounded-2xl object-cover border-2 border-indigo-500/20 shadow-lg shadow-indigo-500/10">
                            <div class="absolute inset-0 bg-black/40 rounded-2xl opacity-0 group-hover:opacity-100 flex items-center justify-center transition-all cursor-default">
                                <span class="text-[10px] font-bold text-white uppercase tracking-tighter">Current</span>
                            </div>
                        </div>
                    @endif
                    
                    <div class="flex-1">
                        <input type="file" name="photo" 
                            class="block w-full text-sm text-zinc-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-bold file:bg-indigo-500/10 file:text-indigo-400 hover:file:bg-indigo-500/20 transition-all cursor-pointer">
                        <p class="mt-2 text-xs text-zinc-600 italic">*Format: JPG, PNG, WEBP. Maks 2MB.</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="mt-10 pt-6 border-t border-white/5 flex justify-end">
            <button class="bg-indigo-600 hover:bg-indigo-700 text-white px-8 py-3 rounded-xl font-bold transition-all shadow-lg shadow-indigo-600/20 active:scale-95">
                Simpan Perubahan
            </button>
        </div>
    </form>
</div>
@endsection