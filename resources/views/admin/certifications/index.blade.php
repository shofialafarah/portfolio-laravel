@extends('layouts.admin')

@section('content')
    <div class="container py-4">

        <div class="flex justify-between items-center mb-4">
            <h1 class="text-2xl font-bold">Kelola Sertifikat</h1>

            <a href="{{ route('admin.certifications.create') }}" class="btn btn-primary">
                + Tambah Sertifikat
            </a>
        </div>

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if ($certifications->count())
            <div class="table-responsive">
                <table class="table table-bordered table-dark align-middle text-center">
                    <thead class="table-light">
                        <tr>
                            <th width="120">Preview</th>
                            <th>Judul</th>
                            <th>Penyelenggara</th>
                            <th>Tahun</th>
                            <th>Status</th>
                            <th width="140">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($certifications as $certification)
                            <tr>
                                <td>
                                    <img src="{{ asset('storage/' . $certification->image) }}" class="img-fluid rounded"
                                        style="max-height:80px">
                                </td>
                                <td>{{ $certification->title }}</td>
                                <td>{{ $certification->issuer ?? '-' }}</td>
                                <td>{{ $certification->year ?? '-' }}</td>
                                <td>
                                    <span class="badge {{ $certification->is_active ? 'bg-success' : 'bg-secondary' }}">
                                        {{ $certification->is_active ? 'Aktif' : 'Nonaktif' }}
                                    </span>
                                </td>
                                <td>
                                    <div class="d-flex justify-content-center gap-2">
                                        <a href="{{ route('admin.certifications.edit', $certification) }}"
                                            class="btn btn-sm btn-warning" title="Edit">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                        <button class="btn btn-sm btn-danger" onclick="confirmDelete({{ $certification->id }})"
                                            title="Hapus">
                                            <i class="fa fa-trash"></i>
                                        </button>

                                        <form id="delete-form-{{ $certification->id }}"
                                            action="{{ route('admin.certifications.destroy', $certification) }}" method="POST"
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
                Belum ada sertifikat. Silakan tambah sertifikat baru.
            </div>
        @endif

    </div>
@endsection
<script>
    function confirmDelete(id) {
        Swal.fire({
            title: 'Yakin mau hapus?',
            text: 'Data sertifikat akan dihapus permanen',
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
