<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Portfolio shofialafarah')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @php
        // Ambil data profil langsung dari DB
        $guestProfile = \App\Models\Profile::first();
        $photoPath = $guestProfile ? $guestProfile->photo : null;

        $favicon = $photoPath ? asset('storage/' . $photoPath) : asset('images/foto-profil.jpg');
    @endphp

    <link rel="icon" type="image/png" href="{{ $favicon }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body class="font-sans antialiased">
    <div class="min-h-screen w-full flex flex-col justify-center items-center bg-zinc-950">
        <div class="w-full h-full flex items-center justify-center">
            {{ $slot }}
        </div>
    </div>
</body>

</html>
