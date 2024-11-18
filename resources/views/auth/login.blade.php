<x-guest-layout>
    <h2 class="text-2xl font-bold text-gray-900 dark:text-white">
        Login Sekarang
    </h2>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="login" :value="__('No Whatsapp / Email')" />
            <x-text-input id="login" class="block mt-1 w-full" type="login" name="login" :value="old('login')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('login')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class=" mt-4 flex items-center justify-between">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded dark:bg-gray-900 border-gray-300 dark:border-gray-700 text-indigo-600 shadow-sm focus:ring-indigo-500 dark:focus:ring-indigo-600 dark:focus:ring-offset-gray-800" name="remember">
                <span class="ms-2 text-sm text-gray-600 dark:text-gray-400">{{ __('Remember me') }}</span>
            </label>

            @if (Route::has('password.request'))
                <a class="underline text-sm text-indigo-600 dark:text-indigo-400 hover:text-indigo-900 dark:hover:text-indigo-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-indigo-800" href="{{ route('password.request') }}">
                    {{ __('lupa password?') }}
                </a>
            @endif
        </div>

        <div class="mt-4 space-y-4">

            <x-primary-button class="">
                {{ __('Login Sekarang') }}
            </x-primary-button>

            <div class="text-sm font-medium text-gray-500 dark:text-gray-400 mt-3">
                Belum punya akun? <a href="{{ route('register') }}" class="text-indigo-700 hover:underline dark:text-indigo-500">Buat Sekarang</a>
            </div>
        </div>
    </form>
    
</x-guest-layout>
