<!DOCTYPE html>
<html lang="id" class="dark">

<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Portfolio')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />
    @php
        $favicon =
            isset($profile) && $profile->photo ? asset('storage/' . $profile->photo) : asset('images/profile.jpg');
    @endphp

    <link rel="icon" type="image/png" href="{{ $favicon }}">
    <style>
        /* 1. Keadaan awal: Elemen tidak terlihat dan agak turun ke bawah */
        .scroll-reveal {
            opacity: 0;
            transform: translateY(30px);
            transition: all 0.8s cubic-bezier(0.4, 0, 0.2, 1);
            visibility: hidden;
            /* Mencegah elemen ter-klik sebelum muncul */
        }

        /* 2. Keadaan setelah kena sensor JS (Class 'revealed' ditambahkan) */
        .scroll-reveal.revealed {
            opacity: 1;
            transform: translateY(0);
            visibility: visible;
        }
    </style>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body class="bg-[#100425] text-gray-100">

    {{--  BACKGROUND SHAPE --}}
    <div class="bg-shape purple"></div>
    <div class="bg-shape blue"></div>
    <div class="bg-shape pink"></div>

    @include('partials.navbar')

    <main>
        @yield('content')
    </main>

    @include('partials.footer')

    @yield('scripts')

</body>

</html>
