@extends('layouts.admin')

@section('content')
<div class="container py-5">
    <div class="max-w-2xl mx-auto rounded-xl shadow p-6">

        <h1 class="text-2xl font-bold mb-6">Tambah Sertifikat</h1>

        <form action="{{ route('admin.certifications.store') }}" method="POST" enctype="multipart/form-data">

            @csrf

            {{-- TITLE --}}
            <div class="mb-4">
                <label class="form-label fw-semibold">Judul Sertifikat</label>
                <input type="text" name="title"
                    class="form-control @error('title') is-invalid @enderror"
                    value="{{ old('title') }}" required>
                @error('title') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>

            {{-- ISSUER --}}
            <div class="mb-4">
                <label class="form-label fw-semibold">Penyelenggara</label>
                <input type="text" name="issuer"
                    class="form-control"
                    value="{{ old('issuer') }}">
            </div>

            {{-- YEAR --}}
            <div class="mb-4">
                <label class="form-label fw-semibold">Tahun</label>
                <input type="number" name="year"
                    class="form-control"
                    value="{{ old('year') }}" placeholder="2024">
            </div>

            {{-- IMAGE --}}
            <div class="mb-4">
                <label class="form-label fw-semibold">Gambar Sertifikat</label>
                <input type="file" name="image"
                    class="form-control @error('image') is-invalid @enderror"
                    accept="image/*" required>
                <small class="text-muted">Portrait & landscape aman</small>
                @error('image') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>

            {{-- ACTIVE --}}
            <div class="form-check mb-4">
                <input class="form-check-input" type="checkbox" name="is_active" value="1" checked>
                <label class="form-check-label">
                    Tampilkan di website
                </label>
            </div>

            {{-- ACTION --}}
            <div class="flex gap-3">
                <button class="btn btn-primary">Simpan</button>
                <a href="{{ route('admin.certifications.index') }}" class="btn btn-secondary">Batal</a>
            </div>
        </form>

    </div>
</div>
@endsection
