@extends('layouts.admin')

@section('title', 'Halaman Admin')

@section('content')
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.skills.store') }}" method="post" enctype="multipart/form-data"
        class="p-3 border rounded max-w-md mx-auto bg-white">
        @csrf

        <div class="mb-3">
            <label class="form-label">Kategori Skill</label>
            <select name="category" class="form-select" required>
                <option value="">-- Pilih Kategori --</option>
                <option value="design">Design</option>
                <option value="web">Web Development</option>
                <option value="office">Microsoft / Administrasi</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="name" class="form-label">Nama Skill</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="Nama Skill">
        </div>

        <div class="mb-3">
            <label for="icon" class="form-label">Upload Icon</label>
            <input type="file" class="form-control" id="icon" name="icon">
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
@endsection
