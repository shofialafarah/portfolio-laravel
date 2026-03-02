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
            <i class="fa-solid fa-chart-pie text-lg {{ request()->routeIs('admin.dashboard') ? 'text-indigo-400' : 'group-hover:text-indigo-400' }}"></i>
            <span class="font-medium">Dashboard</span>
        </a>

        {{-- SKILL --}}
        <a href="{{ route('admin.skills.index') }}" 
           class="flex items-center gap-4 px-4 py-3 rounded-xl transition-all duration-300 group {{ request()->routeIs('admin.skills.*') ? 'bg-indigo-500/10 text-indigo-400 border border-indigo-500/20 shadow-[0_0_20px_rgba(79,70,229,0.1)]' : 'hover:bg-white/5 hover:text-white' }}">
            <i class="fa-solid fa-screwdriver-wrench text-lg {{ request()->routeIs('admin.skills.*') ? 'text-indigo-400' : 'group-hover:text-indigo-400' }}"></i>
            <span class="font-medium">Skills</span>
        </a>

        {{-- PROJECT --}}
        <a href="{{ route('admin.projects.index') }}" 
           class="flex items-center gap-4 px-4 py-3 rounded-xl transition-all duration-300 group {{ request()->routeIs('admin.projects.*') ? 'bg-indigo-500/10 text-indigo-400 border border-indigo-500/20 shadow-[0_0_20px_rgba(79,70,229,0.1)]' : 'hover:bg-white/5 hover:text-white' }}">
            <i class="fa-solid fa-code-branch text-lg {{ request()->routeIs('admin.projects.*') ? 'text-indigo-400' : 'group-hover:text-indigo-400' }}"></i>
            <span class="font-medium">Projects</span>
        </a>

        {{-- CERTIFICATION --}}
        <a href="{{ route('admin.certifications.index') }}" 
           class="flex items-center gap-4 px-4 py-3 rounded-xl transition-all duration-300 group {{ request()->routeIs('admin.certifications.*') ? 'bg-indigo-500/10 text-indigo-400 border border-indigo-500/20 shadow-[0_0_20px_rgba(79,70,229,0.1)]' : 'hover:bg-white/5 hover:text-white' }}">
            <i class="fa-solid fa-award text-lg {{ request()->routeIs('admin.certifications.*') ? 'text-indigo-400' : 'group-hover:text-indigo-400' }}"></i>
            <span class="font-medium">Certifications</span>
        </a>
    </nav>

    {{-- FOOTER / LOGOUT --}}
    <div class="mt-auto pt-6 border-t border-white/5">
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button class="flex items-center gap-4 w-full px-4 py-3 rounded-xl text-zinc-500 hover:bg-red-500/10 hover:text-red-400 transition-all duration-300 group">
                <i class="fa-solid fa-right-from-bracket text-lg group-hover:rotate-12 transition-transform"></i>
                <span class="font-medium">Logout System</span>
            </button>
        </form>
    </div>
</div>