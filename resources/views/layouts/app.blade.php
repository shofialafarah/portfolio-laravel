<!DOCTYPE html>
<html lang="en" class="dark">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') | Portfolio Admin</title>

    <link href="https://fonts.googleapis.com/css2?family=Bricolage+Grotesque:wght@300;400;500;600;700;800&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <style>
        .transition-all {
            transition: all 0.3s ease;
        }

        .rotate-180 {
            transform: rotate(180deg);
        }

        /* Efek active untuk sub-menu */
        .menu-sub.active {
            background: rgba(255, 255, 255, 0.15);
            color: #fff !important;
            border-radius: 8px;
        }
    </style>

    @php
        $adminProfile = \App\Models\Profile::first();

        $favicon =
            $adminProfile && $adminProfile->photo
                ? asset('storage/' . $adminProfile->photo)
                : asset('images/profile.jpg');
    @endphp

    <link rel="icon" type="image/png" href="{{ $favicon }}">

    <script src="https://cdn.tailwindcss.com"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <script>
        tailwind.config = {
            darkMode: 'class',
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['Bricolage Grotesque', 'sans-serif'],
                    },
                }
            }
        }
    </script>
</head>

<body class="bg-[#09090b] text-zinc-100 font-sans antialiased">

    <div class="flex min-h-screen">
        <aside class="w-64 border-r border-white/5 bg-[#18181b] hidden md:block">
            @include('layouts.sidebar')
        </aside>

        <main class="flex-1 flex flex-col min-w-0 overflow-hidden">
            <header class="md:hidden flex items-center justify-between p-4 border-b border-white/5 bg-[#18181b]">
                <span class="font-bold tracking-tight">Portfolio Admin</span>
                <button class="text-zinc-400"><i class="fa-solid fa-bars text-xl"></i></button>
            </header>

            <div class="flex-1 overflow-y-auto p-6 md:p-10">
                @yield('content')
            </div>
        </main>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        @if (session('success'))
            Swal.fire({
                background: '#18181b',
                color: '#fff',
                icon: 'success',
                title: 'Berhasil!',
                text: "{{ session('success') }}",
                confirmButtonColor: '#4f46e5',
            });
        @endif

        @if (session('error'))
            Swal.fire({
                background: '#18181b',
                color: '#fff',
                icon: 'error',
                title: 'Oops...',
                text: "{{ session('error') }}",
                confirmButtonColor: '#ef4444',
            });
        @endif
    </script>
    @stack('scripts')
    <script>
        // Fungsi baru untuk konfirmasi Toggle Active/Off
        function confirmToggle(id, aksi) {
            Swal.fire({
                title: 'Yakin ingin ' + aksi + '?',
                text: "Status headline akan segera berubah di halaman depan.",
                icon: 'question',
                background: '#18181b',
                color: '#fff',
                showCancelButton: true,
                confirmButtonColor: '#4f46e5',
                cancelButtonColor: '#27272a',
                confirmButtonText: 'Ya, Lakukan!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('toggle-form-' + id).submit();
                }
            });
        }
    </script>
    <script>
        function confirmLogout() {
            Swal.fire({
                title: 'Ingin keluar?',
                text: "Anda harus login kembali untuk mengakses halaman admin.",
                icon: 'warning',
                background: '#18181b',
                color: '#fff',
                showCancelButton: true,
                confirmButtonColor: '#ef4444',
                cancelButtonColor: '#27272a',
                confirmButtonText: 'Ya, Logout',
                cancelButtonText: 'Batal',
                reverseButtons: true
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('logout-form').submit();
                }
            });
        }
    </script>
</body>

</html>
