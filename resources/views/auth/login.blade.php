<x-guest-layout>
    <div class="w-full max-w-md px-6 flex flex-col">
        <div class="text-center mb-6">
            <h2 class="text-3xl font-bold text-white tracking-tight">
                Selamat Datang
            </h2>
            <p class="text-zinc-400 text-xs mt-1">Silakan masuk untuk melanjutkan</p>
        </div>

        <div class="relative group">
            <div class="absolute -inset-0.5 bg-gradient-to-r from-indigo-500 to-purple-600 rounded-2xl blur opacity-20"></div>
            
            <div class="relative bg-zinc-900 border border-white/10 p-6 rounded-2xl shadow-2xl">
                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <div class="space-y-4">
                        <div>
                            <label class="text-[10px] font-bold text-indigo-400 uppercase tracking-widest ml-1">Email</label>
                            <input id="email" class="block w-full mt-1 px-4 py-2 bg-zinc-800 border-zinc-700 text-white text-sm rounded-xl focus:ring-1 focus:ring-indigo-500 focus:border-transparent outline-none transition-all" 
                                type="email" name="email" :value="old('email')" required autofocus />
                            <x-input-error :messages="$errors->get('email')" class="mt-1" />
                        </div>

                        <div>
                            <label class="text-[10px] font-bold text-indigo-400 uppercase tracking-widest ml-1">Password</label>
                            <div class="relative">
                                <input id="password" class="block w-full mt-1 px-4 py-2 bg-zinc-800 border-zinc-700 text-white text-sm rounded-xl focus:ring-1 focus:ring-indigo-500 focus:border-transparent outline-none transition-all" 
                                    type="password" name="password" required />
                                <button type="button" onclick="togglePasswordVisibility()" class="absolute right-3 top-1/2 -translate-y-1/2 text-zinc-500 hover:text-white transition-colors">
                                    <i class="fa-solid fa-eye" id="eye-icon"></i>
                                </button>
                            </div>
                            <x-input-error :messages="$errors->get('password')" class="mt-1" />
                        </div>
                    </div>

                    <button type="submit" class="w-full mt-6 py-2.5 bg-indigo-600 hover:bg-indigo-700 text-white text-sm font-bold rounded-xl transition-all active:scale-95 shadow-lg shadow-indigo-500/20">
                        Masuk Sekarang
                    </button>
                </form>
            </div>
        </div>
    </div>

    <script>
        // 1. Fungsi Toggle Password
        function togglePasswordVisibility() {
            const passwordInput = document.getElementById('password');
            const eyeIcon = document.getElementById('eye-icon');
            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                eyeIcon.classList.remove('fa-eye');
                eyeIcon.classList.add('fa-eye-slash');
            } else {
                passwordInput.type = 'password';
                eyeIcon.classList.remove('fa-eye-slash');
                eyeIcon.classList.add('fa-eye');
            }
        }

        // 2. SweetAlert Notifikasi
        document.addEventListener('DOMContentLoaded', function() {
            @if(session('status'))
                Swal.fire({
                    icon: 'success',
                    title: 'Berhasil!',
                    text: "{{ session('status') }}",
                    background: '#18181b',
                    color: '#fff',
                    confirmButtonColor: '#4f46e5'
                });
            @endif

            @if($errors->any())
                Swal.fire({
                    icon: 'error',
                    title: 'Login Gagal',
                    text: 'Email atau password yang Anda masukkan salah.',
                    background: '#18181b',
                    color: '#fff',
                    confirmButtonColor: '#4f46e5'
                });
            @endif
        });
    </script>
</x-guest-layout>