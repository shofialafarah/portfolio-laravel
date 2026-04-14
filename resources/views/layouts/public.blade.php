<!DOCTYPE html>
<html lang="id" class="dark">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Portfolio')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />
    @php
        $photoPath = data_get($profile, 'photo');

        $favicon = $photoPath ? asset('storage/' . $photoPath) : asset('images/foto-profil.jpg');
    @endphp

    <!-- SEO Meta Tags -->
    <title>Shofia Lafarah | Web Developer & Graphic Designer</title>
    <meta name="description"
        content="Portfolio Shofia Nabila Elfa Rahma. Membangun solusi web modern dengan Laravel dan desain grafis kreatif.">
    <meta name="keywords"
        content="Shofia Nabila Elfa Rahma, Shofia Lafarah, Web Developer, Graphic Designer, Shofia's Portfolio">
    <meta name="author" content="Shofia Nabila Elfa Rahma">

    <meta property="og:site_name" content="Portfolio Shofia Nabila Elfa Rahma">
    <!-- Schema Markup  -->
    <script type="application/ld+json">
        {
            "@context": "https://schema.org",
            "@type": "WebSite",
            "name": "Portfolio Shofia Nabila Elfa Rahma",
            "url": "https://portfolio-laravel-shofialafarah.vercel.app"
        }
    </script>

    <meta name="google-site-verification" content="r70oh3Ydsemhdi1vNyO83gX8ZNewiS8tPlC4IHQ5AgE" />
    <!-- Open Graph / Facebook / WhatsApp -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:title" content="Shofia Lafarah Portfolio">
    <meta property="og:description" content="Portfolio Shofia Nabila Elfa Rahma - Web Developer & Graphic Designer">
    <meta property="og:image" content="{{ asset('images/saya.jpg') }}">

    <!-- Twitter / X  -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:url" content="{{ url()->current() }}">
    <meta name="twitter:title" content="Shofia Lafarah Portfolio">
    <meta name="twitter:description" content="Portfolio Shofia Nabila Elfa Rahma - Web Developer & Graphic Designer">
    <meta name="twitter:image" content="{{ asset('images/saya.jpg') }}">
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="630">

    <link rel="icon" type="image/png" href="{{ asset('images/foto-profil.jpg') }}">
    <style>
        .scroll-reveal {
            opacity: 0;
            transform: translateY(30px);
            transition: all 0.8s cubic-bezier(0.4, 0, 0.2, 1);
            visibility: hidden;
        }

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