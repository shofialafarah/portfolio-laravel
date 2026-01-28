@extends('layouts.app')

@section('title', 'Portfolio')

@section('content')
    <div class="text-center mb-5">
        <h1 class="text-3xl font-bold">Halo, saya Shofia 👋</h1>
        <p class="text-gray-600 mt-2">Fresh Graduate | Web Developer</p>
    </div>

    <h2 class="text-xl font-semibold mb-4">Skill</h2>

    <div class="row">
        @foreach ($skills as $skill)
            <div class="col-md-2 col-4 text-center mb-4">
                <img src="{{ asset('storage/' . $skill->icon) }}"
                     alt="{{ $skill->name }}"
                     class="mx-auto mb-2"
                     style="height:60px; object-fit:contain">
                <p class="text-sm">{{ $skill->name }}</p>
            </div>
        @endforeach
    </div>
@endsection
