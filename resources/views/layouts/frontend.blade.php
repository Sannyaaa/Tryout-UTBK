
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

         {{-- CDN font awesome --}}
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

        <link rel="stylesheet" href="{{ asset('css/style.css') }}">

        <style>
            /* Custom CSS for the login page */
            body {
                background: #f9f9f9;
                scroll-behavior: smooth;
            }
        </style>

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans text-gray-900 antialiased scroll-smooth">
        <div class="min-h-screen w-full flex flex-col sm:justify-center items-center scroll-smooth bg-gray-50 dark:bg-gray-900">
            <div class="w-full bg-white dark:bg-gray-800 shadow-md overflow-hidden scroll-smooth">

                <nav class="bg-white border-gray-200 dark:bg-gray-900">
                    <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto py-6">
                        <a href="/" class="flex items-center space-x-3 rtl:space-x-reverse">
                            <img src="{{ Storage::url($component->navbar_image ?? '') }}" class="h-8" alt="Navbar Logo" />
                            {{-- <span class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white">Flowbite</span> --}}
                        </a>
                        <div class="flex items-center lg:order-2 space-x-3 lg:space-x-0 rtl:space-x-reverse">
                            
                            @if (Auth::user())
                                <div class="flex gap-4 items-center">
                                    <div>
                                        <x-primary-link href="{{ route('dashboard') }}">
                                            Dashboard
                                        </x-primary-link>
                                    </div>
                                    <button type="button" class="flex text-sm bg-gray-800 rounded-full lg:me-0 focus:ring-4 focus:ring-gray-300 dark:focus:ring-gray-600" id="user-menu-button" aria-expanded="false" data-dropdown-toggle="user-dropdown" data-dropdown-placement="bottom">
                                        <span class="sr-only">Open user menu</span>
                                        <img class="w-10 h-10 rounded-full" src="{{ Auth::user()->avatar != null ? Storage::url(Auth::user()->avatar ?? '') : 'https://openclipart.org/image/2000px/247319' }}" alt="user photo">
                                    </button>
                                </div>
                            @else
                                <div class="gap-3 flex">
                                    <x-primary-link href="{{ route('login') }}" class="">
                                    Login
                                    </x-primary-link>
                                </div>
                            @endif
                            <!-- Dropdown menu -->
                            <div class="z-50 hidden my-4 text-base list-none bg-white divide-y divide-gray-100 rounded-lg shadow dark:bg-gray-700 dark:divide-gray-600" id="user-dropdown">
                                <div class="px-4 py-3">
                                    <span class="block text-sm text-gray-900 dark:text-white">{{ Auth::user()->name ?? '' }}</span>
                                    <span class="block text-sm  text-gray-500 truncate dark:text-gray-400">{{ Auth::user()->email ?? '' }}</span>
                                </div>
                                <ul class="py-2" aria-labelledby="user-menu-button">
                                    <li>
                                        <a href="{{ route('dashboard') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Dashboard</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('user.profile') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Settings</a>
                                    </li>
                                    <li>
                                        <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Sign out</a>
                                    </li>
                                </ul>
                            </div>
                            
                            <button data-collapse-toggle="navbar-user" type="button" class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg lg:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600" aria-controls="navbar-user" aria-expanded="false">
                                <span class="sr-only">Open main menu</span>
                                <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h15M1 7h15M1 13h15"/>
                                </svg>
                            </button>
                        </div>
                        <div class="items-center justify-between hidden w-full lg:flex lg:w-auto lg:order-1" id="navbar-user">
                            <ul class="flex flex-col font-medium p-4 lg:p-0 mt-4 border border-gray-100 rounded-lg bg-gray-50 mx-8 lg:space-x-4 rtl:space-x-reverse lg:flex-row lg:mt-0 lg:border-0 lg:bg-white dark:bg-gray-800 lg:dark:bg-gray-900 dark:border-gray-700">
                                <li>
                                    <a href="{{ route('home-page') }}" class="block  px-4 rounded-lg py-2 {{ Route::is('home-page') ? 'lg:bg-sky-50 text-white lg:text-sky-700 bg-sky-700 lg:dark:text-sky-500' : 'text-sky-800 hover:bg-gray-100 lg:hover:bg-sky-50 lg:hover:text-sky-700' }} dark:text-white lg:dark:hover:text-sky-500 dark:hover:bg-gray-700 dark:hover:text-white lg:dark:hover:bg-transparent dark:border-gray-700 transition-all " aria-current="page">Home</a>
                                </li>
                                <li>
                                    <a href="{{ route('packages') }}" class="block  px-4 rounded-lg py-2 {{ Route::is('packages') ? 'lg:bg-sky-50 text-white lg:text-sky-700 bg-sky-700 lg:dark:text-sky-500' : 'text-sky-700 hover:bg-gray-100 lg:hover:bg-sky-50 lg:hover:text-sky-700' }} dark:text-white lg:dark:hover:text-sky-500 dark:hover:bg-gray-700 dark:hover:text-white lg:dark:hover:bg-transparent dark:border-gray-700 transition-all ">Paket</a>
                                </li>
                                <li>
                                    <a href="{{ route('mentor-page') }}" class="block  px-4 rounded-lg py-2 {{ Route::is('mentor-page') ? 'lg:bg-sky-50 text-white lg:text-sky-700 bg-sky-700 lg:dark:text-sky-500' : 'text-sky-700 hover:bg-gray-100 lg:hover:bg-sky-50 lg:hover:text-sky-700' }} dark:text-white lg:dark:hover:text-sky-500 dark:hover:bg-gray-700 dark:hover:text-white lg:dark:hover:bg-transparent dark:border-gray-700 transition-all">Mentor</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </nav>

                <main class=" scroll-smooth">
                    @yield('content')
                </main>

                <footer class="bg-gradient-to-r from-sky-900 to-sky-950 text-white">
                    <div class="max-w-screen-xl px-4 py-16 mx-auto sm:px-6 lg:px-8">
                        <div class="grid grid-cols-1 gap-8 lg:grid-cols-3">
                            <div>
                                <img src="{{ Storage::url($component->footer_image ?? '') }}" class="mr-5 h-6 sm:h-9" alt="Footer Logo" />
                                <div class="max-w-xs mt-4 text-sm text-zinc-200">
                                    {!! $component->short_desc ?? 'Short Description' !!}
                                </div>
                                <div class="flex mt-8 space-x-6 text-zinc-200">
                                    <a class="hover:opacity-75" href="{{ $component->facebook ?? '' }}" target="_blank" rel="noreferrer">
                                        <span class="sr-only"> Facebook </span>
                                        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                            <path fillRule="evenodd" d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z" clipRule="evenodd" />
                                        </svg>
                                    </a>
                                    <a class="hover:opacity-75" href="{{ $component->instagram ?? '' }}" target="_blank" rel="noreferrer">
                                        <span class="sr-only"> Instagram </span>
                                        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                            <path fillRule="evenodd" d="M12.315 2c2.43 0 2.784.013 3.808.06 1.064.049 1.791.218 2.427.465a4.902 4.902 0 011.772 1.153 4.902 4.902 0 011.153 1.772c.247.636.416 1.363.465 2.427.048 1.067.06 1.407.06 4.123v.08c0 2.643-.012 2.987-.06 4.043-.049 1.064-.218 1.791-.465 2.427a4.902 4.902 0 01-1.153 1.772 4.902 4.902 0 01-1.772 1.153c-.636.247-1.363.416-2.427.465-1.067.048-1.407.06-4.123.06h-.08c-2.643 0-2.987-.012-4.043-.06-1.064-.049-1.791-.218-2.427-.465a4.902 4.902 0 01-1.772-1.153 4.902 4.902 0 01-1.153-1.772c-.247-.636-.416-1.363-.465-2.427-.047-1.024-.06-1.379-.06-3.808v-.63c0-2.43.013-2.784.06-3.808.049-1.064.218-1.791.465-2.427a4.902 4.902 0 011.153-1.772A4.902 4.902 0 015.45 2.525c.636-.247 1.363-.416 2.427-.465C8.901 2.013 9.256 2 11.685 2h.63zm-.081 1.802h-.468c-2.456 0-2.784.011-3.807.058-.975.045-1.504.207-1.857.344-.467.182-.8.398-1.15.748-.35.35-.566.683-.748 1.15-.137.353-.3.882-.344 1.857-.047 1.023-.058 1.351-.058 3.807v.468c0 2.456.011 2.784.058 3.807.045.975.207 1.504.344 1.857.182.466.399.8.748 1.15.35.35.683.566 1.15.748.353.137.882.3 1.857.344 1.054.048 1.37.058 4.041.058h.08c2.597 0 2.917-.01 3.96-.058.976-.045 1.505-.207 1.858-.344.466-.182.8-.398 1.15-.748.35-.35.566-.683.748-1.15.137-.353.3-.882.344-1.857.048-1.055.058-1.37.058-4.041v-.08c0-2.597-.01-2.917-.058-3.96-.045-.976-.207-1.505-.344-1.858a3.097 3.097 0 00-.748-1.15 3.098 3.098 0 00-1.15-.748c-.353-.137-.882-.3-1.857-.344-1.023-.047-1.351-.058-3.807-.058zM12 6.865a5.135 5.135 0 110 10.27 5.135 5.135 0 010-10.27zm0 1.802a3.333 3.333 0 100 6.666 3.333 3.333 0 000-6.666zm5.338-3.205a1.2 1.2 0 110 2.4 1.2 1.2 0 010-2.4z" clipRule="evenodd" />
                                        </svg>
                                    </a>
                                    <a class="hover:opacity-75" href="{{ $component->x ?? '' }}" target="_blank" rel="noreferrer">
                                        <span class="sr-only"> Twitter </span>
                                        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                            <path d="M8.29 20.251c7.547 0 11.675-6.253 11.675-11.675 0-.178 0-.355-.012-.53A8.348 8.348 0 0022 5.92a8.19 8.19 0 01-2.357.646 4.118 4.118 0 001.804-2.27 8.224 8.224 0 01-2.605.996 4.107 4.107 0 00-6.993 3.743 11.65 11.65 0 01-8.457-4.287 4.106 4.106 0 001.27 5.477A4.072 4.072 0 012.8 9.713v.052a4.105 4.105 0 003.292 4.022 4.095 4.095 0 01-1.853.07 4.108 4.108 0 003.834 2.85A8.233 8.233 0 012 18.407a11.616 11.616 0 006.29 1.84" />
                                        </svg>
                                    </a>
                                    <a class="hover:opacity-75" href={{ $component->tiktok ?? '' }} target="_blank" rel="noreferrer">
                                        <span class="sr-only"> Tiktok </span>
                                        <span class="h-6 w-6 text-lg">
                                            <i class="fa-brands fa-tiktok"></i>
                                        </span>
                                    </a>
                                    <a class="hover:opacity-75" href="{{ $component->youtube ?? '' }}" target="_blank" rel="noreferrer">
                                        <span class="sr-only"> Youtube </span>
                                        <span class="h-6 w-6 text-lg">
                                            <i class="fa-brands fa-youtube"></i>
                                        </span>
                                    </a>
                                </div>
                            </div>
                            <div class="grid grid-cols-1 gap-4 lg:col-span-2 sm:grid-cols-2 lg:grid-cols-3">
                                <div>
                                    <p class="font-medium">
                                        Helpful Links
                                    </p>
                                    <nav class="flex flex-col mt-4 space-y-2 text-sm text-zinc-200">
                                        <a class="hover:opacity-75" href="#home"> Home </a>
                                        <a class="hover:opacity-75" href="#features"> Feature </a>
                                        <a class="hover:opacity-75" href="#aboutUs"> About Us </a>
                                        <a class="hover:opacity-75" href="#teachers"> Teacher </a>
                                        <a class="hover:opacity-75" href="#testimonials"> Testimonial </a>
                                        <a class="hover:opacity-75" href="#faqs"> FAQ </a>
                                    </nav>
                                </div>

                                <div>
                                    <p class="font-medium">
                                        Products
                                    </p>
                                    <nav class="flex flex-col mt-4 space-y-2 text-sm text-zinc-200">
                                        <a class="hover:opacity-75" href> Tryout </a>
                                        <a class="hover:opacity-75" href> Event Tryout </a>
                                        <a class="hover:opacity-75" href> Bimbel </a>
                                    </nav>
                                </div>
                                
                                <div>
                                    <p class="font-medium">
                                        Contact
                                    </p>
                                    <nav class="flex flex-col mt-4 space-y-2 text-lg text-zinc-200">
                                        <a class="hover:opacity-75" href> <i class="fa-solid fa-phone"></i> <span class="text-sm ms-1">{{ $component->phone ?? '' }}</span> </a>
                                        <a class="hover:opacity-75" href> <i class="fa-solid fa-envelope"></i> <span class="text-sm ms-1">{{ $component->email ?? '' }}</span> </a>
                                        <a class="hover:opacity-75 inline-flex" href> <i class="fa-solid fa-location-dot"></i> <span class="text-sm ms-2">{!! $component->address ?? '' !!}</span> </a>
                                    </nav>
                                </div>
                            </div>
                        </div>
                        <div class="mt-8 text-xs text-zinc-200">
                            {!! $component->copyright ?? 'Copyright here' !!}
                        </div>
                    </div>
                </footer>
            </div>
        </div>
    </body>
</html>

