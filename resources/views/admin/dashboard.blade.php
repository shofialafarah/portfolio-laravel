@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto">
    <div class="mb-10">
        <h1 class="text-3xl font-extrabold text-white tracking-tight">Dashboard</h1>
        <p class="text-zinc-400 mt-2">Halo, <span class="text-indigo-400 font-bold">{{ auth()->user()->name }}</span>! Selamat datang kembali di panel kendali.</p>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        @php
            $stats = [
                ['label' => 'Total Skill', 'count' => \App\Models\Skill::count(), 'icon' => 'fa-screwdriver-wrench', 'color' => 'indigo'],
                ['label' => 'Total Project', 'count' => \App\Models\Project::count(), 'icon' => 'fa-code-branch', 'color' => 'purple'],
                ['label' => 'Total Certification', 'count' => \App\Models\Certification::count(), 'icon' => 'fa-award', 'color' => 'amber'],
            ];
        @endphp

        @foreach($stats as $stat)
        <div class="group relative">
            <div class="absolute -inset-0.5 bg-{{ $stat['color'] }}-500 rounded-2xl blur opacity-0 group-hover:opacity-20 transition duration-500"></div>
            <div class="relative bg-[#18181b] border border-white/10 p-6 rounded-2xl shadow-2xl">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-zinc-500 text-xs font-bold uppercase tracking-[0.2em] mb-1">{{ $stat['label'] }}</p>
                        <h3 class="text-4xl font-black text-white">{{ $stat['count'] }}</h3>
                    </div>
                    <div class="w-12 h-12 flex items-center justify-center rounded-xl bg-zinc-800 border border-white/5">
                        <i class="fa-solid {{ $stat['icon'] }} text-xl text-{{ $stat['color'] }}-400"></i>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection