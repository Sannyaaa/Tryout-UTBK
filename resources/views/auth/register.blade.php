<x-guest-layout>

    <div class="me-16 w-full max-w-2xl">
        <div class="-mt-28">

            <div class="mx-auto max-w-2xl">
                <img src="{{ asset('assets/Students-rafiki.png') }}" alt="">
            </div>

            <div class="text-center w-full -mt-20">
                <h2 class="text-5xl font-extrabold text-sky-500 dark:text-gray-50 mx-auto text-center w-2/3">
                    {{ __('Siap Meraih Mimpi? Daftar Sekarang!') }}
                </h2>
                {{-- <p class="font-medium text-lg text-slate-600 mx-auto w-2/3 leading-7">
                    Mulai persiapkan dirimu dengan tryout terbaik. Gabung bersama ribuan pejuang UTBK lainnya!
                </p> --}}
            </div>
        </div>
    </div>

    <div class="w-full max-w-lg px-8 py-6 bg-white border dark:bg-gray-800 shadow-2xl shadow-blue-100 overflow-hidden sm:rounded-lg">

        <div class="">
            {{-- <div class=" bg-gradient-to-tr from-sky-400 to-sky-500 px-8 py-4"> --}}
                <div class="text-sm font-medium text-gray-500 dark:text-gray-400 mt-3 mb-4 text-center">
                    <h2 class="text-5xl font-bold mb-2 text-sky-500 dark:text-gray-50">
                        Register
                    </h2>
                    {{-- Masukkan Data yang Sesuai dengan Telah Disetujui --}}
                </div>
                
            {{-- </div> --}}

            <!-- Session Status -->
            <x-auth-session-status class="mb-4" :status="session('status')" />

            <form method="POST" action="{{ route('register') }}">
                @csrf

                <!-- Name -->
                <div>
                    <x-input-label for="name" :value="__('Name')" />
                    <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                </div>

                <!-- Email Address -->
                <div class="mt-4">
                    <x-input-label for="email" :value="__('Email')" />
                    <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                <!-- Password -->
                <div class="mt-4">
                    <x-input-label for="password" :value="__('Password')" />

                    <x-text-input id="password" class="block mt-1 w-full"
                                    type="password"
                                    name="password"
                                    required autocomplete="new-password" />

                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>

                <!-- Confirm Password -->
                <div class="mt-4">
                    <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

                    <x-text-input id="password_confirmation" class="block mt-1 w-full"
                                    type="password"
                                    name="password_confirmation" required autocomplete="new-password" />

                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                </div>

                <div class=" mt-4">
                    <div class="mt-4 space-y-4">

                        <div class="text-base font-semibold text-center text-white  bg-gradient-to-tr from-sky-400 to-sky-500 rounded-lg hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 sm:w-auto dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 mt-6">
                            <x-primary-button class="">
                                {{ __('Daftar Sekarang') }}
                            </x-primary-button>
                        </div>

                        <div class="text-sm text-center font-medium text-gray-500 dark:text-gray-400 mt-5 mb-2">
                            Sudah punya akun? <a href="{{ route('login') }}" class="text-indigo-700 hover:underline dark:text-indigo-500">Login Sekarang</a>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

</x-guest-layout>
