@extends('layouts.admin')

@section('content')
    <div class="container py-4">
        <div class="flex justify-between items-center mb-4">
            <h1 class="text-2xl font-bold">Tambah Projek</h1>

            <form action="{{ route('admin.projects.store') }}" method="POST" enctype="multipart/form-data">

                @csrf

                {{-- Judul --}}
                <div class="mb-4">
                    <label class="form-label fw-semibold">Judul Projek <span class="text-danger">*</span></label>
                    <input type="text" name="title" class="form-control @error('title') is-invalid @enderror"
                        value="{{ old('title') }}" placeholder="Input Judul Projek" required>
                    @error('title')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                {{-- Kategori --}}
                <div class="mb-4">
                    <label class="form-label fw-semibold">Kategori Projek <span class="text-danger">*</span></label>
                    <select name="category" class="form-control">
                        <option value="#" disabled selected>-- Pilih Kategori Projek --</option>
                        <option value="web">Web</option>
                        <option value="design">Design</option>
                    </select>
                </div>

                {{-- Foto Project --}}
                <div class="mb-4">
                    <label class="form-label fw-semibold">Foto Project <span class="text-danger">*</span></label>
                    <input type="file" name="image" class="form-control @error('image') is-invalid @enderror"
                        accept="image/*" required>
                    <small class="text-muted">Portrait & landscape aman</small>
                    @error('image')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                {{-- Deskripsi Projek --}}
                <div class="mb-4">
                    <label class="form-label fw-semibold">Deskripsi <span class="text-danger">*</span></label>
                    <input type="text" name="description" class="form-control" value="{{ old('description') }}"
                        placeholder="Input Deskripsi projek" required>
                </div>

                {{-- ACTION --}}
                <div class="flex gap-3">
                    <button class="btn btn-primary">Simpan</button>
                    <a href="{{ route('admin.projects.index') }}" class="btn btn-secondary">Batal</a>
                </div>
            </form>

        </div>
    </div>
@endsection
