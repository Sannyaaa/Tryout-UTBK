
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
        <div class="h-screen w-full flex flex-col sm:justify-center items-center scroll-smooth pt-6 sm:pt-0 bg-gray-50 dark:bg-gray-900">

                <section class="max-w-7xl w-full px-4 sm:px-6 lg:px-8">
                    <div class="w-full flex-col justify-start items-center lg:gap-16 gap-10 inline-flex lg:pt-[180px] pt-12 lg:pb-28 pb-12">
                        <div class="border border-indigo-300 h-[550px] rounded-lg w-full bg-white">
                            <div class="p-8 flex justify-between items-center border-b border-indigo-100">
                                <div class="block">
                                    <svg width="204" height="18" viewBox="0 0 204 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <circle cx="8.78677" cy="8.78677" r="8.78677" transform="matrix(1 0 0 -1 0 17.6912)" fill="#E0E7FF"/>
                                    <circle cx="8.78677" cy="8.78677" r="8.78677" transform="matrix(1 0 0 -1 28.1177 17.6912)" fill="#A5B4FC"/>
                                    <circle cx="8.78677" cy="8.78677" r="8.78677" transform="matrix(1 0 0 -1 56.2353 17.6912)" fill="#E0E7FF"/>
                                    <path d="M91.3824 8.9044C91.3824 13.7572 95.3164 17.6912 100.169 17.6912H195.066C199.919 17.6912 203.853 13.7572 203.853 8.9044C203.853 4.0516 199.919 0.117632 195.066 0.117632H100.169C95.3163 0.117632 91.3824 4.0516 91.3824 8.9044Z" fill="#E0E7FF"/>
                                    </svg>                      
                                </div>
                                <div class="block">
                                    <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <circle cx="8.78677" cy="8.78677" r="8.78677" transform="matrix(1 0 0 -1 0 17.6912)" fill="#E0E7FF"/>
                                    </svg>                      
                                </div>
                            </div>
                            <div class="relative h-[calc(550px-85px)] flex justify-center items-center flex-col">
                                <div class="max-w-xl -mt-12">
                                    <img src="{{ asset('assets/404 error with portals-rafiki.png') }}" class="w-full" alt="">
                                </div>
                                <div class="block text-center -mt-16 mb-10">
                                    <h5 class="text-lg md:text-xl leading-8 text-sky-500 font-bold mb-1.5">Oops! It seems like you've taken a wrong turn</h5>
                                    <p class="text-sm text-gray-500">We're working to bring it back.</p>
                                    <div class="mt-4">
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



    
