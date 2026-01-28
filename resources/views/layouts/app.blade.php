<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Admin Panel')</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="d-flex" style="min-height:100vh">

    {{-- SIDEBAR --}}
    <aside class="bg-dark text-white p-3" style="width:240px">
        <h4 class="mb-4">Admin Panel</h4>

        <ul class="nav flex-column gap-2">
            <li class="nav-item">
                <a href="{{ route('admin.dashboard') }}"
                   class="nav-link text-white {{ request()->routeIs('admin.dashboard') ? 'fw-bold' : '' }}">
                    Dashboard
                </a>
            </li>

            <li class="nav-item">
                <a href="{{ route('admin.skills.index') }}"
                   class="nav-link text-white {{ request()->routeIs('admin.skills.*') ? 'fw-bold' : '' }}">
                    Skill
                </a>
            </li>
        </ul>

        <hr>

        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button class="btn btn-sm btn-danger w-100">Logout</button>
        </form>
    </aside>

    {{-- CONTENT --}}
    <main class="flex-fill p-4 bg-light">
        @yield('content')
    </main>

</div>

</body>
</html>
