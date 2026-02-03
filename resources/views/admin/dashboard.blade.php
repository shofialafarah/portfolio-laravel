@extends('layouts.admin')

@section('content')
    <div class="container py-4">

        <div class="flex justify-between items-center mb-4">
            <h1 class="text-2xl font-bold">Dashboard</h1>

            <p>Halo, <strong>{{ auth()->user()->name ?? 'Admin' }}</strong> !</p>

            <div class="row mt-4">
                <div class="col-md-4">
                    <div class="card p-3 bg-dark text-white">
                        <h5>Total Skill</h5>
                        <h2>{{ \App\Models\Skill::count() }}</h2>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card p-3 bg-dark text-white">
                        <h5>Total Project</h5>
                        <h2>{{ \App\Models\Project::count() }}</h2>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card p-3 bg-dark text-white">
                        <h5>Total Certification</h5>
                        <h2>{{ \App\Models\Certification::count() }}</h2>
                    </div>
            </div>
        </div>
    </div>
@endsection
