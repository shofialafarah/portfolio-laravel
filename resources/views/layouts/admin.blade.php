<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Halaman Admin')</title>

    {{-- FontAwesome --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    {{-- Bootstrap --}}
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


    {{-- Bootstrap --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    {{-- ✅ SWEETALERT2 DI SINI --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    {{-- SUCCESS --}}
    @if (session('success'))
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Berhasil',
                text: "{{ session('success') }}",
                timer: 2000,
                showConfirmButton: false
            });
        </script>
    @endif

    {{-- ERROR VALIDATION --}}
    @if ($errors->any())
        <script>
            Swal.fire({
                icon: 'error',
                title: 'Gagal',
                html: `
            <ul style="text-align:left;">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        `,
            });
        </script>
    @endif
    @stack('scripts')
</body>

</html>
