<x-guest-layout>
    <!-- Session Status -->
    {{-- <x-auth-session-status class="mb-4" :status="session('status')" /> --}}

    {{-- <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
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
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded dark:bg-gray-900 border-gray-300 dark:border-gray-700 text-indigo-600 shadow-sm focus:ring-indigo-500 dark:focus:ring-indigo-600 dark:focus:ring-offset-gray-800" name="remember">
                <span class="ms-2 text-sm text-gray-600 dark:text-gray-400">{{ __('Remember me') }}</span>
            </label>
        </div>

        <div class="flex items-center justify-end mt-4">
            @if (Route::has('password.request'))
                <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif

            <x-primary-button class="ms-3">
                {{ __('Log in') }}
            </x-primary-button>
        </div>
    </form> --}}

    <div class="flex flex-col items-center justify-center px-6 py-8 mx-auto pt:mt-0 dark:bg-gray-900">
        <a href="#" class="flex items-center justify-center mb-8 text-2xl font-semibold lg:mb-10 dark:text-white">
            <img src="/images/logo.svg" class="mr-4 h-11" alt="FlowBite Logo">
            <span>Flowbite</span>  
        </a>
        <!-- Card -->
        <div class="w-full max-w-xl p-6 space-y-8 sm:p-8 bg-white rounded-lg shadow dark:bg-gray-800">
            <h2 class="text-2xl font-bold text-gray-900 dark:text-white">
                Sign in to platform 
            </h2>
            <form class="mt-8 space-y-6" action="#">
                <div>
                    <x-input-label for="email" :value="__('Email')" />
                    {{-- <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your email</label> --}}
                    <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" placeholder="sansan@mail.com" required autofocus autocomplete="username" />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    {{-- <input type="email" name="email" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="name@company.com" required> --}}
                </div>
                <div>
                    <x-input-label for="password" :value="__('Password')" />
                    {{-- <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your password</label> --}}
                    <x-text-input id="password" class="block mt-1 w-full"
                            placeholder="••••••••" 
                            type="password"
                            name="password"
                            required autocomplete="current-password" />

                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    {{-- <input type="password" name="password" id="password" placeholder="••••••••" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" required> --}}
                </div>
                <div class="flex items-start">
                    <div class="flex items-center h-5">
                        <input id="remember" aria-describedby="remember" name="remember" type="checkbox" class="w-4 h-4 border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-primary-300 dark:focus:ring-primary-600 dark:ring-offset-gray-800 dark:bg-gray-700 dark:border-gray-600" required>
                    </div>
                    <div class="ml-3 text-sm">
                    <label for="remember" class="font-medium text-gray-900 dark:text-white">Remember me</label>
                    </div>
                    <a href="#" class="ml-auto text-sm text-primary-700 hover:underline dark:text-primary-500">Lost Password?</a>
                </div>

                <x-primary-button class="ms-3">
                    {{ __('Login to your account') }}
                </x-primary-button>
                {{-- <button type="submit" class="w-full px-5 py-3 text-base font-medium text-center text-white bg-primary-700 rounded-lg hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 sm:w-auto dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">Login to your account</button> --}}
                <div class="text-sm font-medium text-gray-500 dark:text-gray-400">
                    Not registered? <a class="text-primary-700 hover:underline dark:text-primary-500">Create account</a>
                </div>
            </form>
        </div>
    </div>
</x-guest-layout>
