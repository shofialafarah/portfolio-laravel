@extends('layouts.admin')

@section('title', 'Halaman Admin')

@section('content')
    <h1 class="mb-3">Dashboard</h1>

    <p>Halo, <strong>{{ auth()->user()->name ?? 'Admin' }}</strong> 👋</p>

    <div class="row mt-4">
        <div class="col-md-4">
            <div class="card p-3">
                <h5>Total Skill</h5>
                <h2>{{ \App\Models\Skill::count() }}</h2>
            </div>
        </div>
    </div>
@endsection
