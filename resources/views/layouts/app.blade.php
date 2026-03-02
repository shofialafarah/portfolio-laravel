<!DOCTYPE html>
<html lang="en" class="dark">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Portfolio shofialafarah')</title>

    <link href="https://fonts.googleapis.com/css2?family=Bricolage+Grotesque:wght@300;400;500;600;700;800&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <script src="https://cdn.tailwindcss.com"></script>
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
        // Logika untuk menampilkan notifikasi dari Session Laravel
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
</body>

</html>
