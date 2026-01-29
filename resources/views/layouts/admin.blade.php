<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Admin Panel')</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    @vite(['resources/css/admin.css', 'resources/js/admin.js'])
    @stack('styles')
    @php
        $favicon =
            isset($profile) && $profile->photo ? asset('storage/' . $profile->photo) : asset('images/profile.jpg');
    @endphp

    <link rel="icon" type="image/png" href="{{ $favicon }}">
</head>

<body>
    <div class="d-flex" style="min-height:100vh">

{{-- SIDEBAR --}}
    <aside class="admin-sidebar">
        @include('layouts.admin.sidebar')
    </aside>

        {{-- CONTENT --}}
        <main class="flex-fill p-4 bg-light">
            @yield('content')
        </main>

    </div>

    @stack('scripts')
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
