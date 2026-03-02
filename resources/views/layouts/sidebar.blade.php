<div class="flex flex-col h-full p-6 text-zinc-300">
    {{-- USER PROFILE SECTION --}}
    <div class="mb-10 px-2">
        <div class="flex flex-col">
            <span class="text-white font-bold text-xl tracking-tight">{{ auth()->user()->name }}</span>
            <span class="text-zinc-500 text-xs uppercase tracking-[0.2em] mt-1">Administrator</span>
        </div>
        <div class="h-[1px] w-full bg-gradient-to-r from-white/10 to-transparent mt-6"></div>
    </div>

    {{-- MENU SECTION --}}
    <nav class="flex-1 space-y-2">
        {{-- DASHBOARD --}}
        <a href="{{ route('admin.dashboard') }}"
            class="flex items-center gap-4 px-4 py-3 rounded-xl transition-all duration-300 group {{ request()->routeIs('admin.dashboard') ? 'bg-indigo-500/10 text-indigo-400 border border-indigo-500/20 shadow-[0_0_20px_rgba(79,70,229,0.1)]' : 'hover:bg-white/5 hover:text-white' }}">
            <i
                class="fa-solid fa-chart-pie text-lg {{ request()->routeIs('admin.dashboard') ? 'text-indigo-400' : 'group-hover:text-indigo-400' }}"></i>
            <span class="font-medium">Dashboard</span>
        </a>

        {{-- Profile Dropdown (Alpine.js) --}}
        <div x-data="{ open: {{ request()->routeIs('admin.profile.*') || request()->routeIs('admin.headlines.*') ? 'true' : 'false' }} }">
            <button @click="open = !open"
                class="w-full flex items-center justify-between px-4 py-3 rounded-xl transition-all {{ request()->routeIs('admin.profile.*') || request()->routeIs('admin.headlines.*') ? 'bg-white/5 text-white' : 'text-zinc-400 hover:bg-white/5 hover:text-white' }}">
                <div class="flex items-center gap-3">
                    <i class="fa-solid fa-user-astronaut text-sm"></i>
                    <span class="font-medium">Profile</span>
                </div>
                <i class="fa-solid fa-chevron-down text-[10px] transition-transform duration-300"
                    :class="open ? 'rotate-180' : ''"></i>
            </button>

            <div x-show="open" x-cloak x-transition class="mt-2 ml-4 border-l border-white/10 space-y-1">
                <a href="{{ route('admin.profile.edit') }}"
                    class="block px-6 py-2 text-sm transition-colors {{ request()->routeIs('admin.profile.edit') ? 'text-indigo-400 font-semibold' : 'text-zinc-500 hover:text-zinc-200' }}">
                    Biodata
                </a>
                <a href="{{ route('admin.headlines.index') }}"
                    class="block px-6 py-2 text-sm transition-colors {{ request()->routeIs('admin.headlines.index') ? 'text-indigo-400 font-semibold' : 'text-zinc-500 hover:text-zinc-200' }}">
                    Headline
                </a>
            </div>
        </div>

        {{-- SKILL --}}
        <a href="{{ route('admin.skills.index') }}"
            class="flex items-center gap-4 px-4 py-3 rounded-xl transition-all duration-300 group {{ request()->routeIs('admin.skills.*') ? 'bg-indigo-500/10 text-indigo-400 border border-indigo-500/20 shadow-[0_0_20px_rgba(79,70,229,0.1)]' : 'hover:bg-white/5 hover:text-white' }}">
            <i
                class="fa-solid fa-screwdriver-wrench text-lg {{ request()->routeIs('admin.skills.*') ? 'text-indigo-400' : 'group-hover:text-indigo-400' }}"></i>
            <span class="font-medium">Skills</span>
        </a>

        {{-- PROJECTS DROPDOWN --}}
        <div x-data="{ open: {{ request()->routeIs('admin.projects.*') ? 'true' : 'false' }} }">
            <button @click="open = !open"
                class="w-full flex items-center justify-between px-4 py-3 rounded-xl transition-all {{ request()->routeIs('admin.projects.*') ? 'bg-white/5 text-white' : 'text-zinc-400 hover:bg-white/5 hover:text-white' }}">
                <div class="flex items-center gap-3">
                    <i class="fa-solid fa-code-branch text-sm"></i>
                    <span class="font-medium">Projects</span>
                </div>
                <i class="fa-solid fa-chevron-down text-[10px] transition-transform duration-300"
                    :class="open ? 'rotate-180' : ''"></i>
            </button>

            <div x-show="open" x-cloak x-transition class="mt-2 ml-4 border-l border-white/10 space-y-1">
                <a href="{{ route('admin.projects.index', ['category' => 'design']) }}"
                    class="block px-6 py-2 text-sm transition-colors {{ request()->query('category') == 'design' ? 'text-indigo-400 font-semibold' : 'text-zinc-500 hover:text-zinc-200' }}">
                    Graphic Design
                </a>
                <a href="{{ route('admin.projects.index', ['category' => 'web']) }}"
                    class="block px-6 py-2 text-sm transition-colors {{ request()->query('category') == 'web' ? 'text-indigo-400 font-semibold' : 'text-zinc-500 hover:text-zinc-200' }}">
                    Web Development
                </a>
            </div>
        </div>

        {{-- CERTIFICATION --}}
        <a href="{{ route('admin.certifications.index') }}"
            class="flex items-center gap-4 px-4 py-3 rounded-xl transition-all duration-300 group {{ request()->routeIs('admin.certifications.*') ? 'bg-indigo-500/10 text-indigo-400 border border-indigo-500/20 shadow-[0_0_20px_rgba(79,70,229,0.1)]' : 'hover:bg-white/5 hover:text-white' }}">
            <i
                class="fa-solid fa-award text-lg {{ request()->routeIs('admin.certifications.*') ? 'text-indigo-400' : 'group-hover:text-indigo-400' }}"></i>
            <span class="font-medium">Certifications</span>
        </a>

        {{-- CERTIFICATION --}}
        <a href="{{ route('admin.messages.index') }}"
            class="flex items-center p-3 rounded-lg hover:bg-zinc-800 {{ request()->routeIs('admin.messages.*') ? 'bg-zinc-800 text-white' : 'text-zinc-400' }}">
            <i class="fa-solid fa-envelope mr-3"></i>
            <span>Inbox Pesan</span>

            {{-- Opsional: Tambah Badge Angka kalau mau --}}
            @php $unread = \App\Models\Message::where('read_at', null)->count(); @endphp
            @if ($unread > 0)
                <span class="ml-auto bg-red-500 text-white text-[10px] px-2 py-0.5 rounded-full">
                    {{ $unread }}
                </span>
            @endif
        </a>
    </nav>

    {{-- FOOTER / LOGOUT --}}
    <div class="mt-auto pt-6 border-t border-white/5">
        <form id="logout-form" method="POST" action="{{ route('logout') }}" class="hidden">
            @csrf
        </form>

        <button type="button" onclick="confirmLogout()"
            class="flex items-center gap-4 w-full px-4 py-3 rounded-xl text-zinc-500 hover:bg-red-500/10 hover:text-red-400 transition-all duration-300 group">
            <i class="fa-solid fa-right-from-bracket text-lg group-hover:rotate-12 transition-transform"></i>
            <span class="font-medium">Logout System</span>
        </button>
    </div>
</div>
