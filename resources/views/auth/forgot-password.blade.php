<x-guest-layout>
    <div class="p-8 bg-white rounded-lg shadow-lg max-w-md">
        <div class="mb-4 text-sm text-gray-600 dark:text-gray-400">
            {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
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

            <div class="flex items-center  mt-4">
                <x-primary-button>
                    {{ __(' Reset Password ') }}
                </x-primary-button>
            </div>
        </form>
    </div>
</x-guest-layout>
