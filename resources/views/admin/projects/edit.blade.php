@extends('layouts.admin')

@section('content')
    <div class="container py-4">
        <div class="flex justify-between items-center mb-4">
            <h1 class="text-2xl font-bold">Edit Projek</h1>

            <form action="{{ route('admin.projects.update', $project) }}" method="POST" enctype="multipart/form-data">

                @csrf
                @method('PUT')

                {{-- Judul --}}
                <div class="mb-4">
                    <label class="form-label fw-semibold">Judul Projek</label>
                    <input type="text" name="title" class="form-control @error('title') is-invalid @enderror"
                        value="{{ old('title', $project->title) }}" required>
                    @error('title')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                {{-- Kategori --}}
                <div class="mb-4">
                    <select name="category" class="form-control">
                        <option disabled>-- Pilih Kategori Projek --</option>
                        <option value="web" {{ $project->category == 'web' ? 'selected' : '' }}>Web</option>
                        <option value="design" {{ $project->category == 'design' ? 'selected' : '' }}>Design</option>
                    </select>
                </div>

                {{-- Preview Gambar --}}
                @if ($project->image)
                    <div class="mb-4">
                        <label class="form-label fw-semibold">Gambar Saat Ini</label>
                        <div class="border rounded p-2 bg-light text-center">
                            <img src="{{ asset('storage/' . $project->image) }}" style="max-height:120px"
                                class="img-fluid rounded">
                        </div>
                    </div>
                @endif

                {{-- Ganti Gambar --}}
                <div class="mb-4">
                    <label class="form-label fw-semibold">Ganti Foto (opsional)</label>
                    <input type="file" name="image" class="form-control @error('image') is-invalid @enderror"
                        accept="image/*">
                    @error('image')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                {{-- Deskripsi --}}
                <div class="mb-4">
                    <label class="form-label fw-semibold">Deskripsi</label>
                    <input type="text" name="description" class="form-control"
                        value="{{ old('description', $project->description) }}">
                </div>

                {{-- ACTION --}}
                <div class="flex gap-3">
                    <button class="btn btn-primary">Update</button>
                    <a href="{{ route('admin.projects.index') }}" class="btn btn-secondary">Batal</a>
                </div>

            </form>

        </div>
    </div>
@endsection
