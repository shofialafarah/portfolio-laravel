@extends('layouts.admin')

@section('title', 'Halaman Admin')

@section('content')
<h1>{{ isset($headline) ? 'Edit' : 'Tambah' }} Headline</h1>

<form method="POST"
      action="{{ isset($headline)
        ? route('admin.headlines.update', $headline)
        : route('admin.headlines.store') }}">

    @csrf
    @isset($headline)
        @method('PUT')
    @endisset

    <div class="mb-3">
        <label>Teks Headline</label>
        <input type="text" name="text" class="form-control"
               value="{{ old('text', $headline->text ?? '') }}">
    </div>

    <div class="mb-3">
        <label>Urutan</label>
        <input type="number" name="order" class="form-control"
               value="{{ old('order', $headline->order ?? 0) }}">
    </div>

    <div class="form-check mb-3">
        <input type="checkbox" name="is_active" class="form-check-input"
               {{ old('is_active', $headline->is_active ?? true) ? 'checked' : '' }}>
        <label class="form-check-label">Aktif</label>
    </div>

    <button class="btn btn-primary">Simpan</button>
</form>
@endsection
