<x-guest-layout>
    <div class="p-8 bg-white rounded-lg shadow-lg max-w-md">
        <div class="mb-4 text-sm text-gray-600 dark:text-gray-400">
            {{ __('Lupa kata sandi? Masukkan alamat email yang terdaftar dan kami akan mengirimkan tautan penggantian kata sandi ke alamat email anda.') }}
        </div>

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <form method="POST" action="{{ route('password.email') }}">
            @csrf

            <!-- Email Address -->
            <div>
                <x-input-label for="email" :value="__('Email-mu')" />
                <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" placeholder="test@mail.com" required autofocus />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <div class="flex items-center justify-between mt-4">
                <x-secondary-link href="{{ route('login') }}">
                    {{ __('Kembali') }}
                </x-secondary-link>
                <x-primary-button>
                    {{ __(' Reset Password ') }}
                </x-primary-button>
            </div>
        </form>
    </div>
</x-guest-layout>
