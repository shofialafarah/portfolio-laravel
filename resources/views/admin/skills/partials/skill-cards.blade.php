<div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-6 gap-6">
    @forelse($skills as $skill)
    <div class="group relative flex flex-col bg-[#18181b] border border-white/10 rounded-2xl p-6 transition-all duration-300 hover:border-indigo-500/50 hover:shadow-2xl hover:shadow-indigo-500/10">
        
        <div class="flex flex-col items-center gap-4 flex-1">
            <div class="w-16 h-16 flex items-center justify-center bg-zinc-800 rounded-2xl border border-white/5 overflow-hidden p-2 group-hover:scale-110 transition-transform duration-500">
                @if($skill->icon)
                    <img src="{{ Storage::disk('s3')->url($skill->icon) }}" class="w-full h-full object-contain" alt="{{ $skill->name }}">
                @else
                    <i class="fa-solid fa-code text-2xl text-zinc-600"></i>
                @endif
            </div>
            <h3 class="text-white font-bold text-center group-hover:text-indigo-400 transition-colors">{{ $skill->name }}</h3>
        </div>

        <div class="flex items-center gap-2 mt-6">
            <a href="{{ route('admin.skills.edit', $skill->id) }}" class="flex-1 py-2 bg-zinc-800 hover:bg-yellow-500/10 text-zinc-400 hover:text-yellow-400 rounded-lg text-center transition-all border border-white/5">
                <i class="fa-solid fa-pen-to-square"></i>
            </a>
            <form action="{{ route('admin.skills.destroy', $skill->id) }}" method="POST" class="flex-1 delete-form">
                @csrf @method('DELETE')
                <button type="submit" class="w-full py-2 bg-zinc-800 hover:bg-red-500/10 text-zinc-400 hover:text-red-400 rounded-lg transition-all border border-white/5">
                    <i class="fa-solid fa-trash-can"></i>
                </button>
            </form>
        </div>
    </div>
    @empty
    <div class="col-span-full py-20 text-center">
        <i class="fa-solid fa-box-open text-5xl text-zinc-800 mb-4"></i>
        <p class="text-zinc-500">Skill tidak ditemukan.</p>
    </div>
    @endforelse
</div>