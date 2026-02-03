@extends('layouts.admin')

@section('content')
<div class="container py-4">
        <div class="flex justify-between items-center mb-4">
            <h1 class="text-2xl font-bold">Tambah Sertifikat</h1>

        <form action="{{ route('admin.certifications.store') }}" method="POST" enctype="multipart/form-data">

            @csrf

            {{-- Judul --}}
            <div class="mb-4">
                <label class="form-label fw-semibold">Judul Sertifikat <span class="text-danger">*</span></label>
                <input type="text" name="title"
                    class="form-control @error('title') is-invalid @enderror"
                    value="{{ old('title') }}" placeholder="Input judul sertifikat" required>
                @error('title') <div class="invalid-feedback" >{{ $message }}</div> @enderror
            </div>

            {{-- Penyelenggara --}}
            <div class="mb-4">
                <label class="form-label fw-semibold">Penyelenggara <span class="text-danger">*</span></label>
                <input type="text" name="issuer"
                    class="form-control"
                    value="{{ old('issuer') }}" placeholder="Input nama penyelenggara" required>
            </div>

            {{-- Tahun --}}
            <div class="mb-4">
                <label class="form-label fw-semibold">Tahun <span class="text-danger">*</span></label>
                <input type="number" name="year"
                    class="form-control"
                    value="{{ old('year') }}" placeholder="Input tahun pembuatan sertifikat" required>
            </div>

            {{-- IMAGE --}}
            <div class="mb-4">
                <label class="form-label fw-semibold">Gambar Sertifikat <span class="text-danger">*</span></label>
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
