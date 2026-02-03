<div class="sidebar-glass">

    {{-- USER --}}
    <div class="mb-4 text-center">
        <h5 class="fw-semibold mb-0">{{ auth()->user()->name }}</h5>
        <small class="text-white-50">Administrator</small>
    </div>

    {{-- MENU --}}
    <ul class="nav flex-column gap-3">

        {{-- DASHBOARD --}}
        <li>
            <a href="{{ route('admin.dashboard') }}"
                class="menu-card glass-menu {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                <i class="fa fa-tachometer"></i>
                <span>Dashboard</span>
            </a>
        </li>

        {{-- PROFILE --}}
        <li>
            <div class="menu-card glass-menu"
            data-bs-toggle="collapse" data-bs-target="#profileMenu"
            aria-expanded="{{ request()->routeIs('admin.profile.*') ||
            request()->routeIs('admin.headlines.*') ? 'true' : 'false' }}" id="profileToggle">
                <div class="d-flex justify-content-between align-items-center">
                    <div class="d-flex align-items-center">
                        <i class="fa fa-user me-2"></i>
                        <span>Profile</span>
                    </div>
                    <i class="fa fa-chevron-down small ms-auto arrow"></i>
                </div>

            </div>

            <div class="collapse mt-2 {{ request()->routeIs('admin.profile.*') || request()->routeIs('admin.headlines.*') ? 'show' : '' }}"
                id="profileMenu">

                <a href="{{ route('admin.profile.edit') }}" class="menu-sub glass-sub-menu">
                    Biodata
                </a>

                <a href="{{ route('admin.headlines.index') }}" class="menu-sub glass-sub-menu">
                    Headline
                </a>
            </div>
        </li>

        {{-- SKILL --}}
        <li>
            <a href="{{ route('admin.skills.index') }}"
                class="menu-card glass-menu {{ request()->routeIs('admin.skills.*') ? 'active' : '' }}">
                <i class="fa fa-cogs"></i>
                <span>Skill</span>
            </a>
        </li>

        {{-- PROJECT --}}
        <li>
            <a href="{{ route('admin.projects.index') }}"
                class="menu-card glass-menu {{ request()->routeIs('admin.projects.*') ? 'active' : '' }}">
                <i class="fa fa-cogs"></i>
                <span>Project</span>
            </a>
        </li>

        {{-- CERTIFICATION --}}
        <li>
            <a href="{{ route('admin.certifications.index') }}"
                class="menu-card glass-menu {{ request()->routeIs('admin.certifications.*') ? 'active' : '' }}">
                <i class="fa fa-certificate"></i>
                <span>Certification</span>
            </a>
        </li>
    </ul>

    <hr class="border-white opacity-25 my-4">

    <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button class="btn btn-danger btn-sm w-100">Logout</button>
    </form>

</div>
