@extends('layouts.app')

@section('title', 'Daftar Skill')

@section('content')
    <h1 class="mb-4">Daftar Skill</h1>

    <div class="row">
        @foreach ($skills as $skill)
            <div class="col-md-3 mb-4">
                <div class="card p-3 text-center">
                    <img src="{{ asset('storage/' . $skill->icon) }}" alt="{{ $skill->name }}" class="mx-auto mb-3"
                        style="width: 64px; height: 64px;">
                    <h5 class="card-title">{{ $skill->name }}</h5>

                    <div class="d-flex justify-content-center gap-2">
                        <a href="{{ route('admin.skills.edit', $skill->id) }}" class="btn btn-warning btn-sm flex-fill">Edit</a>

                        <form action="{{ route('admin.skills.destroy', $skill->id) }}" method="post"
                            class="delete-form flex-fill m-0">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm w-100">Hapus</button>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <a href="{{ route('admin.skills.create') }}" class="btn btn-primary">Tambah Skill Baru</a>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        //Konfirmasi hapus pakai SweetAlert
        document.querySelectorAll('.delete-form').forEach(form => {
            form.addEventListener('submit', function(e) {
                e.preventDefault();

                Swal.fire({
                    title: 'Yakin ingin menghapus skill ini?',
                    text: "Data yang sudah dihapus tidak bisa dikembalikan!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#d33',
                    cancelButtonColor: '#3085d6',
                    confirmButtonText: 'Ya, hapus!',
                    cancelButtonText: 'Batal'
                }).then((result) => {
                    if (result.isConfirmed) {
                        form.submit();
                    }
                });
            });
        });
    </script>
@endsection
