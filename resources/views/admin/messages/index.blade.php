@extends('layouts.app')

@section('title', 'Inbox Pesan')

@section('content')
    <div class="max-w-7xl mx-auto">

        {{-- HEADER --}}
        <div class="flex flex-col md:flex-row md:items-center justify-between gap-6 mb-10">
            <div>
                <h1 class="text-3xl font-extrabold text-white tracking-tight">Inbox Pesan</h1>
                <p class="text-zinc-400 mt-1">
                    Semua pesan yang dikirim dari halaman portfolio kamu.
                </p>
            </div>

            <div>
                <span
                    class="bg-indigo-600 text-white px-5 py-2 rounded-xl text-sm font-semibold shadow-lg shadow-indigo-500/20">
                    Total: {{ $messages->total() }} Pesan
                </span>
            </div>
        </div>

        {{-- TABLE CONTAINER --}}
        <div class="bg-[#18181b] border border-white/10 rounded-2xl overflow-hidden shadow-xl">

            <div class="overflow-x-auto">
                <table class="w-full text-left">

                    <thead class="bg-white/5 text-zinc-400 text-xs uppercase tracking-wider">
                        <tr>
                            <th class="px-6 py-4 font-semibold">Pengirim</th>
                            <th class="px-6 py-4 font-semibold">Kontak</th>
                            <th class="px-6 py-4 font-semibold">Pesan</th>
                            <th class="px-6 py-4 font-semibold">Tanggal</th>
                            <th class="px-6 py-4 font-semibold text-center">Aksi</th>
                        </tr>
                    </thead>

                    <tbody class="divide-y divide-white/5 text-sm text-zinc-300">

                        @forelse($messages as $msg)
                            <tr class="hover:bg-white/5 transition-all">

                                <td class="px-6 py-4 font-medium text-white">
                                    {{ $msg->email }}
                                </td>

                                <td class="px-6 py-4">
                                    {{ $msg->phone }}
                                </td>

                                <td class="px-6 py-4 max-w-xs truncate">
                                    {{ $msg->message }}
                                </td>

                                <td class="px-6 py-4 text-xs text-zinc-500">
                                    {{ $msg->created_at->diffForHumans() }}
                                </td>

                                <td class="px-6 py-4">
                                    <div class="flex justify-center gap-3">

                                        {{-- WhatsApp --}}
                                        <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $msg->phone) }}"
                                            target="_blank"
                                            class="p-2 bg-green-500/10 text-green-400 rounded-lg hover:bg-green-500 hover:text-white transition-all">
                                            <i class="fa-brands fa-whatsapp"></i>
                                        </a>

                                        {{-- Delete --}}
                                        <form action="{{ route('admin.messages.destroy', $msg->id) }}" method="POST"
                                            class="delete-form">
                                            @csrf
                                            @method('DELETE')

                                            <button type="submit"
                                                class="p-2 bg-red-500/10 text-red-400 rounded-lg hover:bg-red-500 hover:text-white transition-all">
                                                <i class="fa-solid fa-trash"></i>
                                            </button>
                                        </form>

                                    </div>
                                </td>

                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center py-20 text-zinc-500 italic">
                                    Belum ada pesan masuk.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        {{-- PAGINATION --}}
        <div class="mt-8">
            {{ $messages->links() }}
        </div>

    </div>


    {{-- SWEETALERT DARK VERSION --}}
    @push('scripts')
        <script>
            const swalDark = {
                background: '#18181b',
                color: '#fff',
                confirmButtonColor: '#ef4444',
                cancelButtonColor: '#27272a',
            };

            document.addEventListener('submit', function(e) {
                if (e.target.classList.contains('delete-form')) {
                    e.preventDefault();
                    const form = e.target;

                    Swal.fire({
                        ...swalDark,
                        title: 'Hapus pesan ini?',
                        text: "Data yang dihapus tidak bisa dikembalikan!",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonText: 'Ya, hapus!',
                        cancelButtonText: 'Batal'
                    }).then((result) => {
                        if (result.isConfirmed) form.submit();
                    });
                }
            });
        </script>
    @endpush
@endsection
