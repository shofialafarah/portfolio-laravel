@extends('layouts.admin')

@section('title', 'Halaman Admin')

@section('content')
<h1 class="mb-4">Edit Biodata</h1>

@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

<form method="POST" action="{{ route('admin.profile.update') }}" enctype="multipart/form-data">
    @csrf

    <div class="mb-3">
        <label>Nama</label>
        <input type="text" name="name" class="form-control" value="{{ $profile->name }}">
    </div>

    <div class="mb-3">
        <label>About</label>
        <textarea name="about" rows="5" class="form-control">{{ $profile->about }}</textarea>
    </div>

    <div class="mb-3">
        <label>Foto Profil</label>
        <input type="file" name="photo" class="form-control">
        @if($profile->photo)
            <img src="{{ asset('storage/'.$profile->photo) }}" class="mt-3 rounded" width="120">
        @endif
    </div>

    <button class="btn btn-primary">Simpan</button>
</form>
@endsection
