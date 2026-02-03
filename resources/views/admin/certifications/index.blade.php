@extends('layouts.admin')

@section('title', 'Kelola Sertifikat')

@section('content')
<div class="container py-4">

    <div class="flex justify-between items-center mb-4">
        <h1 class="text-2xl font-bold">Kelola Sertifikat</h1>

        <a href="{{ route('admin.certifications.create') }}"
           class="btn btn-primary">
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
            <table class="table table-bordered align-middle">
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
                    @foreach ($certifications as $cert)
                        <tr>
                            <td>
                                <img src="{{ asset('storage/' . $cert->image) }}"
                                     class="img-fluid rounded"
                                     style="max-height:80px">
                            </td>
                            <td>{{ $cert->title }}</td>
                            <td>{{ $cert->issuer ?? '-' }}</td>
                            <td>{{ $cert->year ?? '-' }}</td>
                            <td>
                                <span class="badge {{ $cert->is_active ? 'bg-success' : 'bg-secondary' }}">
                                    {{ $cert->is_active ? 'Aktif' : 'Nonaktif' }}
                                </span>
                            </td>
                            <td class="flex gap-2">
                                <a href="{{ route('admin.certifications.edit', $cert) }}"
                                   class="btn btn-sm btn-warning">
                                    Edit
                                </a>

                                <form action="{{ route('admin.certifications.destroy', $cert) }}"
                                      method="POST"
                                      onsubmit="return confirm('Hapus sertifikat ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-danger">
                                        Hapus
                                    </button>
                                </form>
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
