<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <!-- Login Form -->
    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required
                autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />
            <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required
                autocomplete="current-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox"
                    class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                <span class="ms-2 text-sm text-gray-600">
                    {{ __('Remember me') }}
                </span>
            </label>
        </div>

        <!-- Actions -->
        <div class="flex items-center justify-between mt-4">
            @if (Route::has('password.request'))
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif

            <x-primary-button>
                {{ __('Log in') }}
            </x-primary-button>
        </div>
    </form>

    <!-- Divider -->
    <div class="flex items-center my-6">
        <div class="flex-grow border-t border-gray-300"></div>
        <span class="mx-4 text-sm text-gray-500">atau</span>
        <div class="flex-grow border-t border-gray-300"></div>
    </div>

    <!-- Login with Google -->
    <a href="{{ route('google.login') }}"
        class="w-full flex items-center justify-center gap-3
               px-4 py-3
               border border-gray-300
               rounded-lg
               text-sm font-medium
               hover:bg-gray-100
               transition">
        <!-- Google Icon -->
        <svg class="w-5 h-5" viewBox="0 0 48 48">
            <path fill="#EA4335"
                d="M24 9.5c3.1 0 5.8 1.1 8 3.1l6-6C34.3 2.7 29.6 0 24 0 14.6 0 6.4 5.7 2.5 14l7 5.4C11.2 13.4 17.1 9.5 24 9.5z" />
            <path fill="#4285F4"
                d="M46.1 24.6c0-1.6-.1-2.8-.4-4H24v7.6h12.7c-.5 3-2.2 5.5-4.8 7.2l7.4 5.7c4.3-4 6.8-9.9 6.8-16.5z" />
            <path fill="#FBBC05"
                d="M9.5 28.4c-.5-1.4-.8-2.9-.8-4.4s.3-3 .8-4.4l-7-5.4C.9 17.1 0 20.4 0 24s.9 6.9 2.5 9.8l7-5.4z" />
            <path fill="#34A853"
                d="M24 48c5.6 0 10.3-1.8 13.7-4.9l-7.4-5.7c-2.1 1.4-4.8 2.2-6.3 2.2-6.9 0-12.8-3.9-14.5-9.6l-7 5.4C6.4 42.3 14.6 48 24 48z" />
        </svg>

        <span>Login dengan Google</span>
    </a>
</x-guest-layout>
