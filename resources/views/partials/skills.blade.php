{{-- ================= SKILLS ================= --}}
<section id="skills" class="max-w-7xl mx-auto px-4 sm:px-6 py-12 sm:py-20 md:py-24 scroll-reveal">
    <div class="flex justify-center mb-10 md:mb-12">
        <h2 class="section-title text-3xl md:text-4xl font-bold text-center">
            Tech Stack & Tools
        </h2>
    </div>

    <div class="card-glass rounded-3xl p-4 sm:p-6 md:p-10 shadow-2xl">
        {{-- Di HP: 1 kolom scroll, sm ke atas: grid --}}
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6 md:gap-8">

            {{-- DESIGN --}}
            <div class="card-inner rounded-2xl p-5 sm:p-6 hover:-translate-y-2 transition-all duration-300">
                <h3 class="text-xl font-semibold mb-5 text-indigo-400 text-center">
                    <span class="inline-block hover:scale-110 transition-transform">🎨</span> Design
                </h3>
                <div class="grid grid-cols-3 gap-4 sm:gap-6">
                    @foreach ($designSkills as $index => $skill)
                        <div class="text-center hover:scale-110 transition-transform duration-300"
                            style="animation-delay: {{ $index * 0.15 }}s">
                            <div class="bg-zinc-900/50 rounded-xl p-3 mb-2 hover:bg-indigo-600/20 transition-all duration-300">
                                <img src="{{ Storage::disk('s3')->url($skill->icon) }}" class="h-10 sm:h-12 mx-auto"
                                    alt="{{ $skill->name }}">
                            </div>
                            <p class="text-xs text-gray-300">{{ $skill->name }}</p>
                        </div>
                    @endforeach
                </div>
            </div>

            {{-- WEB / PROGRAMMING --}}
            <div class="card-inner rounded-2xl p-5 sm:p-6 hover:-translate-y-2 transition-all duration-300">
                <h3 class="text-xl font-semibold mb-5 text-indigo-400 text-center">
                    <span class="inline-block hover:scale-110 transition-transform">💻</span> Programming
                </h3>
                <div class="grid grid-cols-3 gap-4 sm:gap-6">
                    @foreach ($webSkills as $index => $skill)
                        <div class="text-center hover:scale-110 transition-transform duration-300"
                            style="animation-delay: {{ $index * 0.15 }}s">
                            <div class="bg-zinc-900/50 rounded-xl p-3 mb-2 hover:bg-indigo-600/20 transition-all duration-300">
                                <img src="{{ Storage::disk('s3')->url($skill->icon) }}" class="h-10 sm:h-12 mx-auto"
                                    alt="{{ $skill->name }}">
                            </div>
                            <p class="text-xs text-gray-300">{{ $skill->name }}</p>
                        </div>
                    @endforeach
                </div>
            </div>

            {{-- OFFICE / ADMINISTRATION --}}
            <div class="card-inner rounded-2xl p-5 sm:p-6 hover:-translate-y-2 transition-all duration-300 sm:col-span-2 md:col-span-1">
                <h3 class="text-xl font-semibold mb-5 text-indigo-400 text-center">
                    <span class="inline-block hover:scale-110 transition-transform">📊</span> Administration
                </h3>
                <div class="grid grid-cols-3 gap-4 sm:gap-6">
                    @foreach ($officeSkills as $index => $skill)
                        <div class="text-center hover:scale-110 transition-transform duration-300"
                            style="animation-delay: {{ $index * 0.15 }}s">
                            <div class="bg-zinc-900/50 rounded-xl p-3 mb-2 hover:bg-indigo-600/20 transition-all duration-300">
                                <img src="{{ Storage::disk('s3')->url($skill->icon) }}" class="h-10 sm:h-12 mx-auto"
                                    alt="{{ $skill->name }}">
                            </div>
                            <p class="text-xs text-gray-300">{{ $skill->name }}</p>
                        </div>
                    @endforeach
                </div>
            </div>

        </div>
    </div>
</section>