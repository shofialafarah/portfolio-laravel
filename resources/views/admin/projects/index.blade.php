@extends('layouts.admin')

@section('title','Projects')

@section('content')
<h1 class="mb-4">Kelola Project</h1>

<form method="POST" action="{{ route('admin.projects.store') }}" enctype="multipart/form-data" class="row g-2 mb-4">
    @csrf
    <div class="col-md-3">
        <input type="text" name="title" class="form-control" placeholder="Judul">
    </div>

    <div class="col-md-2">
        <select name="category" class="form-control">
            <option value="web">Web</option>
            <option value="design">Design</option>
        </select>
    </div>

    <div class="col-md-3">
        <input type="file" name="image" class="form-control">
    </div>

    <div class="col-md-4">
        <input type="text" name="description" class="form-control" placeholder="Deskripsi">
    </div>

    <div class="col-md-12">
        <button class="btn btn-primary">Tambah</button>
    </div>
</form>

<table class="table table-dark table-bordered">
    @foreach($projects as $project)
    <tr>
        <td>{{ $project->title }}</td>
        <td>{{ ucfirst($project->category) }}</td>
        <td>
            <form method="POST" action="{{ route('admin.projects.destroy', $project) }}">
                @csrf @method('DELETE')
                <button class="btn btn-sm btn-danger">Hapus</button>
            </form>
        </td>
    </tr>
    @endforeach
</table>
@endsection
