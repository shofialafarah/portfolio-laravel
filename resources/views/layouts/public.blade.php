<!DOCTYPE html>
<html lang="id" class="dark">

<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Portfolio')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />
</head>

<body class="bg-[#100425] text-gray-100">

    @include('partials.navbar')

    <main>
        @yield('content')
    </main>

    @include('partials.footer')

</body>

</html>
