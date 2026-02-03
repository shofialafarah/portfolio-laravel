@extends('layouts.admin')

@section('title', 'Halaman Admin')

@section('content')
<h1 class="mb-4">Kelola Headline</h1>

@if ($errors->any())
    <div class="alert alert-danger">
        {{ $errors->first() }}
    </div>
@endif

<form method="POST" action="{{ route('admin.headlines.store') }}" class="mb-4 d-flex gap-2">
    @csrf
    <input type="text" name="text" class="form-control" placeholder="Tambah headline baru" required>
    <button class="btn btn-primary">Tambah</button>
</form>

<ul id="headline-list" class="list-group">
    @foreach ($headlines as $headline)
        <li class="list-group-item d-flex justify-content-between align-items-center"
            draggable="true"
            data-id="{{ $headline->id }}">

            <span>{{ $headline->text }}</span>

            <div class="d-flex gap-2">
                {{-- TOGGLE --}}
                <form method="POST" action="{{ route('admin.headlines.update', $headline) }}">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="toggle" value="1">
                    <button class="btn btn-sm {{ $headline->is_active ? 'btn-success' : 'btn-secondary' }}">
                        {{ $headline->is_active ? 'ON' : 'OFF' }}
                    </button>
                </form>

                {{-- DELETE --}}
                <form method="POST" action="{{ route('admin.headlines.destroy', $headline) }}">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-sm btn-danger">
                        <i class="fa fa-trash"></i>
                    </button>
                </form>
            </div>
        </li>
    @endforeach
    @else
        <div class="alert alert-info text-center">
            Belum ada sertifikat. Silakan tambah sertifikat baru.
        </div>
    @endif
</ul>
@endsection

@push('scripts')
<script>
const list = document.getElementById('headline-list');
let dragItem = null;

list.addEventListener('dragstart', e => {
    dragItem = e.target;
});

list.addEventListener('dragover', e => {
    e.preventDefault();
    const target = e.target.closest('li');
    if (target && target !== dragItem) {
        list.insertBefore(dragItem, target);
    }
});

list.addEventListener('drop', () => {
    const ids = [...list.children].map(li => li.dataset.id);

    fetch("{{ route('admin.headlines.reorder') }}", {
        method: 'POST',
        headers: {
            'X-CSRF-TOKEN': '{{ csrf_token() }}',
            'Content-Type': 'application/json'
        },
        body: JSON.stringify({ ids })
    });
});
</script>
@endpush
