<x-guest-layout>

    <div class="me-16 w-full max-w-2xl hidden lg:flex">
        <div class="">
            <div class="mt-8">
                <h2 class="text-5xl font-extrabold text-sky-500 dark:text-gray-50 leading-tight mx-auto text-center">
                    {{ __('Selamat Datang Kembali, Pejuang UTBK!') }}
                </h2>
            </div>

            <div class="mx-auto max-w-xl -mt-8">
                <img src="{{ asset('assets/Learning-pana.png') }}" class="w-full" alt="">
            </div>

            {{-- <div class="text-center w-full -mt-6">
                <p class="font-medium text-lg text-slate-600 mx-auto w-2/3 leading-7">
                    Ayo lanjutkan perjalananmu menuju kampus impian. Masuk untuk melanjutkan tryoutmu!
                </p>
            </div> --}}
        </div>
    </div>

    <div class="w-full max-w-lg px-8 py-6 bg-white border dark:bg-gray-800 shadow-2xl shadow-blue-100 overflow-hidden sm:rounded-lg">

        <div class="">
            {{-- <div class=" bg-gradient-to-tr from-sky-400 to-sky-500 px-8 py-4"> --}}
                <div class="text-sm font-medium text-gray-500 dark:text-gray-400 mt-3 mb-4 text-center">
                    <h2 class="text-5xl font-bold mb-2 text-sky-500 dark:text-gray-50">
                        Login
                    </h2>
                    {{-- Masukkan Data yang Sesuai dengan Telah Disetujui --}}
                </div>
                
            {{-- </div> --}}

            <!-- Session Status -->
            <x-auth-session-status class="mb-4" :status="session('status')" />

            <form method="POST" action="{{ route('login') }}" class="">
                @csrf

                <!-- Email Address -->
                <div>
                    <x-input-label for="login" :value="__('Nomer Handphone / Email')" />
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
                <div class="text-base font-semibold text-center text-white  bg-gradient-to-tr from-sky-400 to-sky-500 rounded-lg hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 sm:w-auto dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 mt-6">

                    <x-primary-button class="w-full py-1">
                        {{ __('Masuk Sekarang') }}
                    </x-primary-button>
                    
                </div>

                <div class="mt-4 w-full text-center">
                    <x-secondary-link href="{{ route('google.login') }}" class="mx-auto py-1">
                        <span><i class="fa-brands fa-google me-2"></i></span> Login dengan Google
                    </x-secondary-link>
                </div>

                <div class="text-center">
                    <div class="text-sm font-medium text-gray-500 dark:text-gray-400 mt-6 mb-6 flex justify-between">
                        <div>
                            Belum punya akun? <a href="{{ route('register') }}" class="text-sky-700 hover:underline dark:text-sky-500">Buat Sekarang</a>
                        </div>

                        <div>
                            <a href="{{ route('password.request') }}" class="text-sky-700 hover:underline dark:text-sky-500">Lupa Password?</a>
                        </div>
                    </div>

                    {{-- <a class=" hover:underline text-sm text-sky-600 dark:text-sky-400 hover:text-sky-900 dark:hover:text-indigo-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-indigo-800 mt-3" href="/">
                        {{ __('Kembali ke Beranda') }}
                    </a> --}}

                    <a class="underline text-sm text-sky-600 dark:text-sky-400 hover:text-sky-900 dark:hover:text-indigo-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-indigo-800" href="/">
                        {{ __('Kembali ke Beranda') }}
                    </a>

                    {{-- @if (Route::has('password.request'))
                        <a class="underline text-sm text-sky-600 dark:text-sky-400 hover:text-sky-900 dark:hover:text-indigo-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-indigo-800" href="{{ route('password.request') }}">
                            {{ __('lupa password?') }}
                        </a>
                    @endif --}}
                </div>
                
            </form>
        </div>

    </div>
    
    
</x-guest-layout>
