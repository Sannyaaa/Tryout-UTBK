
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
        <div class="h-screen w-full flex flex-col justify-center items-center scroll-smooth pt-6 sm:pt-0 bg-gray-50 dark:bg-gray-900">

                <section class="max-w-7xl w-full px-4 sm:px-6 lg:px-8">
                    <div class="w-full flex-col justify-start items-center lg:gap-16 gap-10 inline-flex">
                        <div class="border border-indigo-300 rounded-lg w-full bg-white">
                            <div class="relative  flex justify-center items-center flex-col">
                                <div class="max-w-xl -mt-12">
                                    <img src="{{ asset('assets/404 error with portals-rafiki.png') }}" class="w-full" alt="">
                                </div>
                                <div class="block text-center -mt-12 mb-10">
                                    <h5 class="text-lg md:text-4xl w-3/4 mx-auto leading-8 text-sky-500 font-extrabold">Oops! Kamu mainnya terlalu jauh untuk bisa kesini.</h5>
                                    <p class="text-sm text-gray-500 mt-4">We're working to bring it back.</p>
                                    <div class="mt-4 inline-block">
                                        <x-primary-link href="{{ Auth::check() ? route('dashboard') : route('home-page') }}">
                                            Kembali
                                        </x-primary-link>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

        </div>
    </body>
</html>



    
