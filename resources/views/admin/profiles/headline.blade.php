@extends('layouts.app')
@section('title', 'Edit Headline')
@section('content')
    <div class="max-w-4xl mx-auto">
        <div class="flex items-center gap-8 mb-8 border-b border-white/5">
            <a href="{{ route('admin.profile.edit') }}"
                class="pb-4 text-sm font-bold transition-all relative {{ request()->routeIs('admin.profile.edit') ? 'text-indigo-400' : 'text-zinc-500 hover:text-zinc-300' }}">
                Biodata Profil
                @if (request()->routeIs('admin.profile.edit'))
                    <div
                        class="absolute bottom-0 left-0 w-full h-0.5 bg-indigo-500 shadow-[0_-4px_10px_rgba(79,70,229,0.5)]">
                    </div>
                @endif
            </a>
            <a href="{{ route('admin.headlines.index') }}"
                class="pb-4 text-sm font-bold transition-all relative {{ request()->routeIs('admin.headlines.index') ? 'text-indigo-400' : 'text-zinc-500 hover:text-zinc-300' }}">
                Headline Text
                @if (request()->routeIs('admin.headlines.index'))
                    <div
                        class="absolute bottom-0 left-0 w-full h-0.5 bg-indigo-500 shadow-[0_-4px_10px_rgba(79,70,229,0.5)]">
                    </div>
                @endif
            </a>
        </div>
        <div class="mb-8">
            <h1 class="text-3xl font-bold tracking-tight text-white">Kelola Headline</h1>
            <p class="text-zinc-400 mt-1">Atur teks sapaan dinamis yang muncul di halaman depan.</p>
        </div>

        @if ($errors->any())
            <div class="mb-4 p-4 bg-red-500/10 border border-red-500/20 text-red-400 rounded-xl text-sm">
                {{ $errors->first() }}
            </div>
        @endif

        {{-- Form Tambah --}}
        <form method="POST" action="{{ route('admin.headlines.store') }}" class="mb-8 flex gap-3">
            @csrf
            <input type="text" name="text"
                class="flex-1 bg-[#18181b] border border-white/10 rounded-xl px-4 py-3 text-white focus:outline-none focus:ring-2 focus:ring-indigo-500 transition-all"
                placeholder="Tambah headline baru (contoh: Fullstack Developer)" required>
            <button
                class="bg-indigo-600 hover:bg-indigo-700 text-white px-6 py-3 rounded-xl font-bold transition-all flex items-center gap-2">
                <i class="fa fa-plus text-xs"></i> Tambah
            </button>
        </form>

        {{-- List Headline --}}
        <div class="bg-[#18181b] border border-white/5 rounded-2xl overflow-hidden shadow-xl">
            <ul id="headline-list" class="divide-y divide-white/5">
                @forelse ($headlines as $headline)
                    <li class="flex items-center justify-between p-4 hover:bg-white/[0.02] transition-all cursor-move group"
                        draggable="true" data-id="{{ $headline->id }}">

                        <div class="flex items-center gap-4">
                            <i class="fa fa-grip-vertical text-zinc-600 group-hover:text-zinc-400"></i>
                            <span class="text-zinc-200 font-medium">{{ $headline->text }}</span>
                        </div>

                        {{--  TOGGLE STATUS  --}}
                        <div class="flex items-center gap-2">
                            <form id="toggle-form-{{ $headline->id }}" method="POST"
                                action="{{ route('admin.headlines.update', $headline) }}">
                                @csrf
                                @method('PUT')
                                <input type="hidden" name="toggle" value="1">
                                <button type="button"
                                    onclick="confirmToggle({{ $headline->id }}, '{{ $headline->is_active ? 'mematikan' : 'mengaktifkan' }}')"
                                    class="px-3 py-1 rounded-lg text-xs font-bold uppercase tracking-wider transition-all {{ $headline->is_active ? 'bg-emerald-500/10 text-emerald-500 border border-emerald-500/20' : 'bg-zinc-800 text-zinc-500 border border-white/5' }}">
                                    {{ $headline->is_active ? 'Active' : 'Off' }}
                                </button>
                            </form>

                            <form method="POST" action="{{ route('admin.headlines.destroy', $headline) }}"
                                class="delete-form">
                                @csrf
                                @method('DELETE')
                                <button type="button"
                                    class="btn-delete p-2 text-zinc-500 hover:text-red-500 hover:bg-red-500/10 rounded-lg transition-all">
                                    <i class="fa fa-trash-can"></i>
                                </button>
                            </form>
                        </div>
                    </li>
                @empty
                    <li class="p-10 text-center text-zinc-500 italic">
                        Belum ada headline. Silakan tambah data di atas.
                    </li>
                @endforelse
            </ul>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        // Konfirmasi hapus pakai SweetAlert (Style Dark)
        document.querySelectorAll('.btn-delete').forEach(btn => {
            btn.addEventListener('click', function() {
                const form = this.closest('form');
                Swal.fire({
                    title: 'Hapus Headline?',
                    text: "Data ini tidak bisa dikembalikan!",
                    icon: 'warning',
                    background: '#18181b',
                    color: '#fff',
                    showCancelButton: true,
                    confirmButtonColor: '#ef4444',
                    cancelButtonColor: '#27272a',
                    confirmButtonText: 'Ya, Hapus!',
                    cancelButtonText: 'Batal'
                }).then((result) => {
                    if (result.isConfirmed) form.submit();
                });
            });
        });

        // Drag and Drop Logic (Native Tailwind Style)
        const list = document.getElementById('headline-list');
        let dragItem = null;

        list.addEventListener('dragstart', e => {
            dragItem = e.target;
            e.target.classList.add('opacity-50');
        });

        list.addEventListener('dragend', e => {
            e.target.classList.remove('opacity-50');
        });

        list.addEventListener('dragover', e => {
            e.preventDefault();
            const target = e.target.closest('li');
            if (target && target !== dragItem) {
                const rect = target.getBoundingClientRect();
                const next = (e.clientY - rect.top) / (rect.bottom - rect.top) > 0.5;
                list.insertBefore(dragItem, next ? target.nextSibling : target);
            }
        });

        list.addEventListener('drop', () => {
            const ids = [...list.children].map(li => li.dataset.id);
            fetch("{{ route('admin.headlines.reorder') }}", {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({
                    ids
                })
            });
        });
    </script>
@endpush
