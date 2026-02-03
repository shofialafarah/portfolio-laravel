@extends('layouts.admin')

@section('content')
    <div class="container py-4">

        <div class="flex justify-between items-center mb-4">
            <h1 class="text-2xl font-bold">Dashboard</h1>

            <p>Halo, <strong>{{ auth()->user()->name ?? 'Admin' }}</strong> 👋</p>

            <div class="row mt-4">
                <div class="col-md-4">
                    <div class="card p-3">
                        <h5>Total Skill</h5>
                        <h2>{{ \App\Models\Skill::count() }}</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
