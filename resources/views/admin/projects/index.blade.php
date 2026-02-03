@extends('layouts.admin')

@section('title', 'Projects')

@section('content')
    <div class="container py-4">

        <div class="flex justify-between items-center mb-4">
            <h1 class="text-2xl font-bold">Kelola Projek</h1>

            <a href="{{ route('admin.projects.create') }}" class="btn btn-primary">
                + Tambah Project
            </a>
        </div>

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if ($projects->count())
            <div class="table-responsive">
                <table class="table table-bordered table-dark align-middle text-center">
                    <thead class="table-light">
                        <tr>
                            <th width="120">Preview</th>
                            <th>Judul</th>
                            <th>Kategori</th>
                            <th>Deskripsi</th>
                            <th width="140">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($projects as $project)
                            <tr>
                                <td>
                                    <img src="{{ asset('storage/' . $project->image) }}" class="img-fluid rounded"
                                        style="max-height:80px">
                                </td>
                                <td>{{ $project->title ?? '-' }}</td>
                                <td>{{ $project->category ?? '-' }}</td>
                                <td>{{ $project->description ?? '-' }}</td>
                                <td>
                                    <div class="d-flex justify-content-center gap-2">

                                        <a href="{{ route('admin.projects.edit', $project) }}" class="btn btn-sm btn-warning"
                                            title="Edit">
                                            <i class="fa fa-edit"></i>
                                        </a>

                                        <button class="btn btn-sm btn-danger" onclick="confirmDelete({{ $project->id }})"
                                            title="Hapus">
                                            <i class="fa fa-trash"></i>
                                        </button>

                                        <form id="delete-form-{{ $project->id }}"
                                            action="{{ route('admin.projects.destroy', $project) }}" method="POST"
                                            class="d-none">
                                            @csrf
                                            @method('DELETE')
                                        </form>

                                    </div>
                                </td>

                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @else
            <div class="alert alert-info text-center">
                Belum ada projek. Silakan tambah projek baru.
            </div>
        @endif
    @endsection
    <script>
        function confirmDelete(id) {
            Swal.fire({
                title: 'Yakin mau hapus?',
                text: 'Data project akan dihapus permanen',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#6c757d',
                confirmButtonText: 'Ya, hapus',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('delete-form-' + id).submit();
                }
            });
        }
    </script>
