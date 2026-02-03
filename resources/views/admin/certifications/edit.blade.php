@extends('layouts.admin')

@section('content')
    <div class="container py-5">
        <div class="max-w-2xl mx-auto rounded-xl p-6">

            <h1 class="text-2xl font-bold mb-6">Edit Sertifikat</h1>

            <form action="{{ route('admin.certifications.update', $certification) }}" method="POST"
                enctype="multipart/form-data">
                @csrf
                @method('PUT')

                {{-- TITLE --}}
                <div class="mb-4">
                    <label class="form-label fw-semibold">Judul Sertifikat</label>
                    <input type="text" name="title" class="form-control"
                        value="{{ old('title', $certification->title) }}" required>
                </div>

                {{-- ISSUER --}}
                <div class="mb-4">
                    <label class="form-label fw-semibold">Penyelenggara</label>
                    <input type="text" name="issuer" class="form-control"
                        value="{{ old('issuer', $certification->issuer) }}">
                </div>

                {{-- YEAR --}}
                <div class="mb-4">
                    <label class="form-label fw-semibold">Tahun</label>
                    <input type="number" name="year" class="form-control"
                        value="{{ old('year', $certification->year) }}">
                </div>

                {{-- CURRENT IMAGE --}}
                <div class="mb-4">
                    <label class="form-label fw-semibold">Sertifikat Saat Ini</label>

                    <div class="border rounded-lg p-2 bg-gray-100 flex justify-center">
                        <div class="w-[180px] h-[240px] bg-white flex items-center justify-center overflow-hidden rounded">
                            <img src="{{ asset('storage/' . $certification->image) }}"
                                class="max-w-full max-h-full object-contain" alt="Preview Sertifikat">
                        </div>
                    </div>

                    <p class="text-xs text-gray-500 mt-1 text-center">
                        Preview diperkecil (klik gambar untuk full)
                    </p>
                </div>


                {{-- NEW IMAGE --}}
                <div class="mb-4">
                    <label class="form-label fw-semibold">Ganti Gambar (opsional)</label>

                    <input type="file" name="image" class="form-control" accept="image/*">

                    <small class="text-muted">
                        Upload JPG / PNG / JPEG. Kosongkan jika tidak ingin mengganti.
                    </small>
                </div>

                {{-- ACTIVE --}}
                <div class="form-check mb-4">
                    <input class="form-check-input" type="checkbox" name="is_active" value="1"
                        {{ $certification->is_active ? 'checked' : '' }}>
                    <label class="form-check-label">
                        Tampilkan di website
                    </label>
                </div>

                {{-- ACTION --}}
                <div class="flex gap-3">
                    <button class="btn btn-primary">Update</button>
                    <a href="{{ route('admin.certifications.index') }}" class="btn btn-secondary">Kembali</a>
                </div>

            </form>

        </div>
    </div>
@endsection
