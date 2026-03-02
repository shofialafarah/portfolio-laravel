<nav class="sticky top-4 z-50 px-4">
    <div
        class="max-w-7xl mx-auto px-4 sm:px-6 py-3
               bg-zinc-900/60 border-white/10 text-white
               border border-white/30
               rounded-2xl shadow-lg">

        <div class="flex items-center justify-between relative">
            <!-- Brand (left) -->
            <a href="/" class="text-xl font-bold text-indigo-600">
                Shofia
            </a>

            <!-- MENU (centered) — hidden on mobile -->
            <div class="hidden md:block absolute left-1/2 transform -translate-x-1/2">
                <div class="flex items-center gap-6 text-sm font-medium">
                    <a href="#home" class="text-gray-300 hover:text-white transition">
                        Home
                    </a>
                    <a href="#skills" class="text-gray-300 hover:text-white transition">
                        Skills
                    </a>
                    <a href="#projects" class="text-gray-300 hover:text-white transition">
                        Projects
                    </a>
                    <a href="#certifications" class="text-gray-300 hover:text-white transition">
                        Certifications
                    </a>
                    <a href="#comments" class="text-gray-300 hover:text-white transition">
                        Contact
                    </a>
                </div>
            </div>

            <!-- Right side: Login + Hamburger -->
            <div class="flex items-center gap-3">
                <!-- Tombol Login -->
                <a href="/login"
                    class="px-4 sm:px-5 py-2
                          border border-indigo-500
                          text-indigo-300
                          hover:bg-indigo-600 hover:text-white
                          transition-all duration-300
                          rounded-lg
                          leading-none text-sm">
                    Login
                </a>

                <!-- Hamburger button — visible on mobile only -->
                <button id="hamburger-btn"
                    class="md:hidden flex flex-col justify-center items-center w-8 h-8 gap-1.5 focus:outline-none"
                    aria-label="Toggle menu">
                    <span class="hamburger-line block w-6 h-0.5 bg-white rounded transition-all duration-300"></span>
                    <span class="hamburger-line block w-6 h-0.5 bg-white rounded transition-all duration-300"></span>
                    <span class="hamburger-line block w-6 h-0.5 bg-white rounded transition-all duration-300"></span>
                </button>
            </div>
        </div>

        <!-- Mobile Dropdown Menu -->
        <div id="mobile-menu"
            class="md:hidden overflow-hidden max-h-0 transition-all duration-300 ease-in-out">
            <div class="flex flex-col gap-1 pt-3 pb-2 text-sm font-medium border-t border-white/10 mt-3">
                <a href="#home"
                    class="mobile-nav-link px-3 py-2 rounded-lg text-gray-300 hover:text-white hover:bg-white/10 transition">
                    Home
                </a>
                <a href="#skills"
                    class="mobile-nav-link px-3 py-2 rounded-lg text-gray-300 hover:text-white hover:bg-white/10 transition">
                    Skills
                </a>
                <a href="#projects"
                    class="mobile-nav-link px-3 py-2 rounded-lg text-gray-300 hover:text-white hover:bg-white/10 transition">
                    Projects
                </a>
                <a href="#certifications"
                    class="mobile-nav-link px-3 py-2 rounded-lg text-gray-300 hover:text-white hover:bg-white/10 transition">
                    Certifications
                </a>
                <a href="#comments"
                    class="mobile-nav-link px-3 py-2 rounded-lg text-gray-300 hover:text-white hover:bg-white/10 transition">
                    Contact
                </a>
            </div>
        </div>

    </div>
</nav>

{{-- Hamburger Toggle Script --}}
<script>
    const btn = document.getElementById('hamburger-btn');
    const menu = document.getElementById('mobile-menu');
    const lines = btn.querySelectorAll('.hamburger-line');
    let isOpen = false;

    btn.addEventListener('click', () => {
        isOpen = !isOpen;

        // Animate menu open/close
        menu.style.maxHeight = isOpen ? menu.scrollHeight + 'px' : '0';

        // Animate hamburger to X
        if (isOpen) {
            lines[0].style.transform = 'translateY(8px) rotate(45deg)';
            lines[1].style.opacity = '0';
            lines[2].style.transform = 'translateY(-8px) rotate(-45deg)';
        } else {
            lines[0].style.transform = '';
            lines[1].style.opacity = '1';
            lines[2].style.transform = '';
        }
    });

    // Close menu when a link is clicked
    document.querySelectorAll('.mobile-nav-link').forEach(link => {
        link.addEventListener('click', () => {
            isOpen = false;
            menu.style.maxHeight = '0';
            lines[0].style.transform = '';
            lines[1].style.opacity = '1';
            lines[2].style.transform = '';
        });
    });
</script>