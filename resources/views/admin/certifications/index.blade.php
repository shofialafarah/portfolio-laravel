@extends('layouts.app')

@section('title', 'Certification')

@section('content')
    <div class="max-w-7xl mx-auto">
        <div class="flex flex-col md:flex-row md:items-center justify-between gap-6 mb-10">
            <div>
                <h1 class="text-3xl font-extrabold text-white tracking-tight">Kelola Sertifikat</h1>
                <p class="text-zinc-400 mt-1">Daftar pencapaian dan sertifikasi profesional kamu.</p>
            </div>
            <a href="{{ route('admin.certifications.create') }}"
                class="inline-flex items-center gap-2 px-6 py-3 bg-indigo-600 hover:bg-indigo-500 text-white font-bold rounded-xl transition-all shadow-lg shadow-indigo-500/20">
                <i class="fa-solid fa-plus text-sm"></i> Tambah Sertifikat
            </a>
        </div>

        <div class="relative bg-[#18181b] border border-white/10 rounded-3xl overflow-hidden shadow-2xl">
            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="bg-white/5 border-b border-white/10">
                            <th class="px-6 py-4 text-xs font-bold uppercase text-zinc-500">Preview</th>
                            <th class="px-6 py-4 text-xs font-bold uppercase text-zinc-500">Sertifikat</th>
                            <th class="px-6 py-4 text-xs font-bold uppercase text-zinc-500">Tahun</th>
                            <th class="px-6 py-4 text-xs font-bold uppercase text-zinc-500">Status</th>
                            <th class="px-6 py-4 text-xs font-bold uppercase text-zinc-500 text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-white/5">
                        @foreach ($certifications as $cert)
                            <tr class="hover:bg-white/[0.02] transition-colors">
                                <td class="px-6 py-4">
                                    <img src="{{ rtrim(config('filesystems.disks.s3.url'), '/') . '/' . ltrim($certification->image, '/') }}"
                                        class="w-full h-full object-cover"
                                        onerror="this.src='https://placehold.co/600x400?text=Sertifikat'"
                                        class="w-20 h-14 object-contain rounded border border-white/10 bg-zinc-800">
                                </td>
                                <td class="px-6 py-4">
                                    <div class="flex flex-col">
                                        <span class="text-white font-bold">{{ $cert->title }}</span>
                                        <span class="text-zinc-500 text-sm">{{ $cert->issuer }}</span>
                                    </div>
                                </td>
                                <td class="px-6 py-4 text-zinc-300">{{ $cert->year }}</td>
                                <td class="px-6 py-4">
                                    <span
                                        class="px-3 py-1 {{ $cert->is_active ? 'bg-emerald-500/10 text-emerald-500' : 'bg-zinc-800 text-zinc-500' }} text-[10px] font-bold uppercase rounded-full border border-white/5">
                                        {{ $cert->is_active ? 'Aktif' : 'Nonaktif' }}
                                    </span>
                                </td>
                                <td class="px-6 py-4 text-center">
                                    <div class="flex justify-center gap-3">
                                        <a href="{{ route('admin.certifications.edit', $cert) }}"
                                            class="w-9 h-9 flex items-center justify-center rounded-lg bg-zinc-800 text-zinc-400 hover:text-yellow-500 border border-white/5">
                                            <i class="fa-solid fa-pen-to-square"></i>
                                        </a>
                                        <button onclick="confirmDelete({{ $cert->id }})"
                                            class="w-9 h-9 flex items-center justify-center rounded-lg bg-zinc-800 text-zinc-400 hover:text-red-500 border border-white/5">
                                            <i class="fa-solid fa-trash-can"></i>
                                        </button>
                                        <form id="delete-form-{{ $cert->id }}"
                                            action="{{ route('admin.certifications.destroy', $cert) }}" method="POST"
                                            class="hidden">
                                            @csrf @method('DELETE')
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script>
        function confirmDelete(id) {
            Swal.fire({
                background: '#18181b',
                color: '#fff',
                title: 'Hapus sertifikat?',
                text: 'Data akan dihapus permanen!',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#ef4444',
                confirmButtonText: 'Ya, hapus!'
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('delete-form-' + id).submit();
                }
            });
        }
    </script>
@endsection
