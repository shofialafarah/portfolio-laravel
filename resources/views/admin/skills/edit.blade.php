@extends('layouts.app')

@section('title', 'Edit Skill')

@section('content')
    <h2>Edit Skill</h2>

    <form action="{{ route('admin.skills.update', $skill->id) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <select name="category" class="form-select" required>
            <option value="design" {{ $skill->category == 'design' ? 'selected' : '' }}>Design</option>
            <option value="web" {{ $skill->category == 'web' ? 'selected' : '' }}>Web Development</option>
            <option value="office" {{ $skill->category == 'office' ? 'selected' : '' }}>Microsoft / Administrasi</option>
        </select>

        <div class="mb-3">
            <label for="name" class="form-label">Nama Skill</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $skill->name) }}"
                required>
            @error('name')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="icon" class="form-label">Icon Skill (biarkan kosong jika tidak diubah)</label>
            <input type="file" name="icon" id="icon" class="form-control">
            <small>Icon sekarang:</small><br>
            <img src="{{ asset('storage/' . $skill->icon) }}" alt="{{ $skill->name }}"
                style="height: 80px; object-fit: contain;" srcset="">
            @error('icon')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Update Skill</button>
        <a href="{{ route('admin.skills.index') }}" class="btn btn-secondary">Batal</a>
    </form>
@endsection
